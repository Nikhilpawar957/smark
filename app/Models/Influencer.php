<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'influencer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_no',
        'address',
        'pincode',
        'city',
        'state',
        'country',
        'influencer_type',
        'influencer_tier',
        'instagram_url',
        'instagram_count',
        'youtube_url',
        'youtube_count',
        'facebook_url',
        'facebook_count',
        'twitter_url',
        'twitter_count',
        'quora_url',
        'quora_count',
        'telegram_url',
        'telegram_count',
        'other_url',
        'other_count',
        'category',
        'profile_image',
        'status',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
