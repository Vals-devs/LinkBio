<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function summary(Request $request)
    {
        $user = $request->user();

        // 1. Total Views (Raw visits)
        $totalViews = $user->pageVisits()->count();

        // 2. Unique Visitors (Unique by IP Address/Device)
        $totalVisitors = $user->pageVisits()->distinct()->count('ip_address');

        // 3. Total Clicks
        $totalClicks = $user->links()->sum('click_count');

        // 4. Mobile Traffic percentage (Unique by IP Address/Device)
        $mobileVisits = $user->pageVisits()->where('device_type', 'mobile')->distinct()->count('ip_address');
        $mobilePercentage = $totalVisitors > 0 ? round(($mobileVisits / $totalVisitors) * 100) : 0;

        // 5. Top Performing Links
        $topLinks = $user->links()
            ->orderBy('click_count', 'desc')
            ->limit(5)
            ->get(['id', 'title', 'url', 'click_count']);

        // Format top performing links matching frontend CTR/trend expectation
        $formattedTopLinks = $topLinks->map(function ($link) use ($totalClicks) {
            $ctr = $totalClicks > 0 ? round(($link->click_count / $totalClicks) * 100, 1) : 0;
            return [
                'title' => $link->title,
                'url' => $link->url,
                'clicks' => $link->click_count,
                'ctr' => $ctr,
                'trend' => rand(2, 15), // Mock trend increment for presentation
            ];
        });

        return response()->json([
            'views' => $totalViews,
            'visitors' => $totalVisitors,
            'clicks' => $totalClicks,
            'mobile_percentage' => $mobilePercentage,
            'top_links' => $formattedTopLinks,
        ]);
    }
}
