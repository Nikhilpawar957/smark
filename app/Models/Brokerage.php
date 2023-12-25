<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brokerage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "lead_code",
        "slug_id",
        "campaign_id",
        "influencer_id",
        "influencer_share_amt",
        "influencer_brokerage_amt",
        "brand_id",
        "brand_share_amt",
        "brand_brokerage_amt",
        "transaction_date",
        "lead_timestamp",
        "updated_by",
    ];
}
