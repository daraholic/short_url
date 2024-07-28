<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;

use App\Models\ShortUrl;
use App\Models\UrlLog;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function create(StoreShortUrlRequest $request)
    {
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
