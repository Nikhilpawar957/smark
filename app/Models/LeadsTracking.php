<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadsTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'mobile_no',
        'country',
        'lead_stage',
        'instagram_url',
        'instagram_count',
        'youtube_url',
        'youtube_count',
        'facebook_url',
        'facebook_count',
        'twitter_url',
        'twitter_count',
        'telegram_url',
        'telegram_count',
        'quora_url',
        'quora_count',
        'other_url',
        'other_count',
        'category_id',
        'error_message',
        'referral_code',
        'updated_by'
    ];
}
