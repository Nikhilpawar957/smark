<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadConversion extends Model
{
    use HasFactory;

    protected $fillable = [
        "lead_code",
        "slug_id",
        "campaign_id",
        "influencer_id",
        "lead_name",
        "mobile_no",
        "lead_amt",
        "lead_commision",
        "influencer_paid_share_amt",
        "brand_paid_share_amt",
        "influencer_paid_brokerage_amt",
        "brand_paid_brokerage_amt",
        "lead_value",
        "brand_id",
        "lead_status",
        "updated_by",
    ];
}
