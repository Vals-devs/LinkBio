<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $theme = $user->theme()->first();

        if (!$theme) {
            return response()->json([
                'primary_color' => '#3b82f6',
                'background_color' => '#f8fafc',
                'font_family' => 'Inter, sans-serif',
                'layout_style' => 'minimal',
            ]);
        }

        return response()->json([
            'id' => $theme->id,
            'primary_color' => $theme->primary_color,
            'background_color' => $theme->background_color,
            'font_family' => $theme->font_family,
            'layout_style' => $theme->layout_style,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'primary_color' => 'sometimes|required|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'background_color' => 'sometimes|required|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'font_family' => 'sometimes|required|string|max:255',
            'layout_style' => 'sometimes|required|string|in:minimal,card,gradient,glassmorphism,neo-brutalism',
        ]);

        $user = $request->user();
        $theme = $user->theme()->first();

        if (!$theme) {
            $theme = $user->theme()->create([
                'primary_color' => $validated['primary_color'] ?? '#3b82f6',
                'background_color' => $validated['background_color'] ?? '#f8fafc',
                'font_family' => $validated['font_family'] ?? 'Inter, sans-serif',
                'layout_style' => $validated['layout_style'] ?? 'minimal',
            ]);
        } else {
            $theme->update($validated);
        }

        return response()->json([
            'id' => $theme->id,
            'primary_color' => $theme->primary_color,
            'background_color' => $theme->background_color,
            'font_family' => $theme->font_family,
            'layout_style' => $theme->layout_style,
        ]);
    }
}
