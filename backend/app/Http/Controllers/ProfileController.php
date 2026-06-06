<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'alpha_dash',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'profession' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'github_url' => 'nullable|string|url|max:255',
            'linkedin_url' => 'nullable|string|url|max:255',
            'twitter_url' => 'nullable|string|url|max:255',
            'instagram_url' => 'nullable|string|url|max:255',
        ]);

        $user->update([
            'name' => $validated['name'],
            'username' => strtolower($validated['username']),
            'email' => $validated['email'],
            'profession' => $validated['profession'],
            'bio' => $validated['bio'],
            'github_url' => $validated['github_url'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'twitter_url' => $validated['twitter_url'] ?? null,
            'instagram_url' => $validated['instagram_url'] ?? null,
        ]);

        return response()->json($user);
    }
}
