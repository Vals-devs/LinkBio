<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroqService;

class AIController extends Controller
{
    protected GroqService $groq;

    public function __construct(GroqService $groq)
    {
        $this->groq = $groq;
    }

    public function generateBio(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'skills' => 'required|array',
            'tone' => 'required|string|max:255',
            'locale' => 'sometimes|string|in:en,id',
        ]);

        $skillsList = implode(', ', $validated['skills']);
        $tone = $validated['tone'];
        $locale = $validated['locale'] ?? 'en';
        $language = $locale === 'id' ? 'Indonesian (Bahasa Indonesia)' : 'English';

        $prompt = "Create two link-in-bio variations for a profile. Name is {$validated['name']}, working as a {$validated['profession']}. Key skills are: {$skillsList}. One variation must be in a 'Professional' tone. The other variation must be in a '{$tone}' tone. Make them highly engaging and short (maximum 60 words per variation). IMPORTANT: Write ALL text in {$language} language. Output format: return ONLY a raw JSON array of objects with keys 'tone' and 'text', like this: [{\"tone\": \"Professional\", \"text\": \"...\"}, {\"tone\": \"{$tone}\", \"text\": \"...\"}]. Do not include markdown code block syntax.";

        $systemPrompt = "You are a specialized copywriting assistant. You output raw JSON arrays of bios in the requested language, matching the tone and format requested, without any introduction or markdown wrappers.";

        $result = $this->groq->generate($prompt, $systemPrompt);

        // Try parsing JSON from Groq. If it fails (e.g. fallback or bad formatting), parse manually or return default format.
        $parsed = json_decode($result, true);

        if (!$parsed) {
            // Strip markdown block ticks if AI accidentally wrapped it
            $cleaned = preg_replace('/```(?:json)?|```/', '', $result);
            $parsed = json_decode(trim($cleaned), true);
        }

        if (!$parsed) {
            // Manual fallback if json parsing failed
            $parsed = [
                [
                    'tone' => 'Professional',
                    'text' => "{$validated['name']} is a professional {$validated['profession']} skilled in {$skillsList}. Dedicated to delivering high-quality solutions and creating impactful experiences.",
                ],
                [
                    'tone' => $tone,
                    'text' => "Hey there, I'm {$validated['name']}! 🚀 I'm a {$validated['profession']} obsessed with {$skillsList}. Let's create something cool!",
                ],
            ];
        }

        return response()->json($parsed);
    }

    public function visitorInsight(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'sometimes|string|in:en,id',
        ]);

        $user = $request->user();
        $locale = $validated['locale'] ?? 'en';
        $language = $locale === 'id' ? 'Indonesian (Bahasa Indonesia)' : 'English';

        $totalViews = $user->pageVisits()->count();
        $totalVisitors = $user->pageVisits()->distinct()->count('ip_address');
        $totalClicks = $user->links()->sum('click_count');
        $mobileVisits = $user->pageVisits()->where('device_type', 'mobile')->distinct()->count('ip_address');
        $mobilePercentage = $totalVisitors > 0 ? round(($mobileVisits / $totalVisitors) * 100) : 0;

        $topReferrer = $user->pageVisits()
            ->select('referrer', \DB::raw('count(*) as total'))
            ->groupBy('referrer')
            ->orderBy('total', 'desc')
            ->first();

        $referrerName = $topReferrer ? $topReferrer->referrer : 'None';

        $prompt = "Write a quick 2-sentence summary/insight for a user dashboard based on these stats: Total Views: {$totalViews}, Unique Visitors: {$totalVisitors}, Total Link Clicks: {$totalClicks}, Mobile traffic ratio: {$mobilePercentage}%, Top traffic source: {$referrerName}. Tone: Friendly, motivating, professional. Keep it under 50 words. IMPORTANT: Write in {$language} language.";

        $insight = $this->groq->generate($prompt, "You are a dashboard analytics advisor. Always respond in the language requested by the user.");

        return response()->json([
            'insight' => trim($insight),
        ]);
    }

    public function suggestLayout(Request $request)
    {
        $validated = $request->validate([
            'profession' => 'required|string|max:255',
        ]);

        $profession = $validated['profession'];

        $prompt = "As a design expert, suggest a high-quality link-in-bio layout theme for someone whose profession is '{$profession}'.
        Provide exactly one suggestion with:
        1. 'layout_style': one of [minimal, card, gradient, glassmorphism, neo-brutalism]
        2. 'primary_color': a beautiful hex color code
        3. 'background_color': a beautiful hex color code that complements the primary color
        4. 'font_family': a modern font stack (e.g., 'Inter, sans-serif')

        Output format: return ONLY a raw JSON object with these keys. Do not include markdown code block syntax.";

        $systemPrompt = "You are a UI/UX design expert for link-in-bio platforms. You output raw JSON objects without any introduction or markdown wrappers.";

        $result = $this->groq->generate($prompt, $systemPrompt);

        $parsed = json_decode($result, true);

        if (!$parsed) {
            $cleaned = preg_replace('/```(?:json)?|```/', '', $result);
            $parsed = json_decode(trim($cleaned), true);
        }

        if (!$parsed) {
            $parsed = [
                'layout_style' => 'minimal',
                'primary_color' => '#3b82f6',
                'background_color' => '#f8fafc',
                'font_family' => 'Inter, sans-serif',
            ];
        }

        return response()->json($parsed);
    }

    public function analyzeSeo(Request $request)
    {
        $validated = $request->validate([
            'bio' => 'required|string|max:500',
            'username' => 'required|string|max:255',
            'link_titles' => 'required|array',
            'locale' => 'sometimes|string|in:en,id',
        ]);

        $bio = $validated['bio'];
        $username = $validated['username'];
        $linkTitles = implode(', ', $validated['link_titles']);
        $locale = $validated['locale'] ?? 'en';
        $language = $locale === 'id' ? 'Indonesian (Bahasa Indonesia)' : 'English';

        $prompt = "Analyze the SEO quality of a link-in-bio profile. Provide a score from 0-100 and suggestions for improvement.

        Profile Details:
        - Bio: {$bio}
        - Username: {$username}
        - Link Titles: {$linkTitles}

        Evaluate based on:
        1. Keyword relevance and clarity
        2. Character optimization (descriptive but concise)
        3. Use of action words
        4. Consistency and professionalism

        IMPORTANT: Write the summary and suggestions in {$language} language.

        Output format: return ONLY a raw JSON object with:
        {{
          \"score\": <number 0-100>,
          \"summary\": \"<1-2 sentence summary in {$language}>\",
          \"suggestions\": [\"<suggestion 1 in {$language}>\", \"<suggestion 2 in {$language}>\", \"<suggestion 3 in {$language}>\"]
        }}

        Do not include markdown code block syntax.";

        $systemPrompt = "You are an SEO expert specializing in personal branding and link-in-bio optimization. You output raw JSON objects in the requested language without any introduction or markdown wrappers.";

        $result = $this->groq->generate($prompt, $systemPrompt);

        $parsed = json_decode($result, true);

        if (!$parsed) {
            $cleaned = preg_replace('/```(?:json)?|```/', '', $result);
            $parsed = json_decode(trim($cleaned), true);
        }

        if (!$parsed) {
            $parsed = [
                'score' => 65,
                'summary' => 'Your profile has good potential. Consider adding more keywords and action-oriented descriptions to improve discoverability.',
                'suggestions' => [
                    'Add 2-3 descriptive keywords to your bio',
                    'Use action words in your link titles (e.g., "View Portfolio", "Read Blog")',
                    'Ensure your username is memorable and matches your personal brand'
                ],
            ];
        }

        return response()->json($parsed);
    }
}
