<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\PageVisit;

class PublicController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', strtolower($username))->firstOrFail();
        
        $links = $user->links()
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();
            
        $theme = $user->theme;

        return response()->json([
            'user' => $user,
            'links' => $links,
            'theme' => $theme,
        ]);
    }

    public function trackVisit(Request $request, $username)
    {
        $user = User::where('username', strtolower($username))->firstOrFail();

        $userAgent = $request->header('User-Agent', '');
        $deviceType = 'desktop';

        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent)) {
            $deviceType = 'mobile';
        } elseif (preg_match('/ipad|playbook|silk/i', $userAgent)) {
            $deviceType = 'tablet';
        }

        $referrer = $request->input('referrer') ?: $request->header('referer');
        if ($referrer) {
            $parsedUrl = parse_url($referrer);
            $referrer = $parsedUrl['host'] ?? $referrer;
        } else {
            $referrer = 'Direct';
        }

        PageVisit::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'device_type' => $deviceType,
            'referrer' => $referrer,
            'visited_at' => now(),
        ]);

        return response()->json(['message' => 'Visit tracked successfully.']);
    }

    public function trackClick(Request $request, $linkId)
    {
        $link = Link::findOrFail($linkId);
        $link->increment('click_count');

        return response()->json(['message' => 'Click tracked successfully.']);
    }
}
