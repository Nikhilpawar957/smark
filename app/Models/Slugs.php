<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slugs extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'campaign_id',
        'influencer_id',
        'brand_id',
        'slug_url',
        'status',
        'updated_by',
    ];
}
