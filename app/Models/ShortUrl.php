<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = ['long_url', 'short_code'];

    public function urlLog()
    {
        return $this->hasMany(UrlLog::class);
    }
}
