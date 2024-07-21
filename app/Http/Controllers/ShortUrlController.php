<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use App\Models\UrlHit;
use App\Models\UrlLog;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(['long_url' => 'required|url|max:4000']);
        
        $shortCode = Str::random(6);
        ShortUrl::create([
            'long_url' => $request->long_url,
            'short_code' => $shortCode,
        ]);

        return response()->json([
            'status' => 'success',
            'short_url' => url('/short/' . $shortCode)
        ], 200);
    }

    public function show($code)
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();
        $count = $shortUrl->urlLog->count();

        if ($count >= 10) {
            return response()->json([
                'status' => 'fail',
                'message' => '開啟超過10次'
            ], 403);
        }

        UrlLog::create([
            'short_url_id' => $shortUrl->id,
            'click_time' => now(),
            'count' => $count + 1,
        ]);

        return response()->json([
            'status' => 'success',
            'long_url' => $shortUrl->long_url,
            'count' => $count + 1
        ], 200);
    }
}
