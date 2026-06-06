<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = $request->user()->links()->orderBy('order', 'asc')->get();
        return response()->json($links);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $maxOrder = $request->user()->links()->max('order') ?? -1;

        $link = $request->user()->links()->create([
            'title' => $validated['title'],
            'url' => $validated['url'],
            'order' => $maxOrder + 1,
            'is_active' => true,
        ]);

        return response()->json($link, 201);
    }

    public function update(Request $request, $id)
    {
        $link = $request->user()->links()->findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
            'is_active' => 'sometimes|required|boolean',
            'order' => 'sometimes|required|integer',
        ]);

        $link->update($validated);

        return response()->json($link);
    }

    public function destroy(Request $request, $id)
    {
        $link = $request->user()->links()->findOrFail($id);
        $link->delete();

        return response()->json([
            'message' => 'Link deleted successfully.'
        ]);
    }

    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|uuid|exists:links,id',
        ]);

        $ids = $validated['ids'];
        $user = $request->user();

        // Update orders for each link
        foreach ($ids as $index => $id) {
            $user->links()->where('id', $id)->update(['order' => $index]);
        }

        return response()->json([
            'message' => 'Links reordered successfully.'
        ]);
    }
}
