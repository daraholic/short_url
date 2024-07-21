<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlLog extends Model
{
    use HasFactory;
    
    protected $table = 'UrlLog';

    protected $fillable = ['short_url_id', 'click_time', 'count'];
}
