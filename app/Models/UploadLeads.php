<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadLeads extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_code',
        'lead_name',
        'mobile_no',
        'email',
        'lead_timestamp',
        'city',
        'lead_status',
        'lead_commission',
        'acquisition_status',
        'acquisition_timestamp',
        'acquisition_commission_value',
        'customer_code',
        'transaction_status',
        'transaction_value',
        'transaction_date',
        'transaction_count_minus_first',
        'transaction_dates_minus_first',
        'transaction_values_minus_first',
        'slug',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'utm',
        'utm_id',
        'campaign_name',
        'brand_id',
        'brand_name',
        'is_active',
        'reason',
        'updated_by',
    ];
}
