<?php

namespace App\Imports;

use App\Models\LeadsTracking;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class UploadLeadTrackingImport implements ToCollection, WithHeadingRow, WithValidation
{
    function collection(Collection $rows)
    {
        //dd($this->agentId);
        $canImport = true;

        if ($canImport) {
            foreach ($rows as $row) {
                $error_msg = '';

                if (strlen($row["lead_stage"]) > 0 && ($row["lead_stage"] == 'Prospect' || $row["lead_stage"] == 'Interested' || $row["lead_stage"] == 'Invalid' || $row["lead_stage"] == 'On Boarded')) {
                    $leadstage = $row["lead_stage"];
				} else {
					$leadstage = 'On Boarded';
				}

                if (strlen($row["mobile_no"]) > 0) {
					if (!preg_match('/^[0-9]{10}+$/', $row["mobile_no"])) {
						$error_msg .= 'Mobile Number Invalid <br/>';
					}
                }

                if (strlen($row["email"]) > 0) {
					if (!filter_var($row["email"], FILTER_VALIDATE_EMAIL)) {
						$error_msg .= 'Email Invalid <br/>';
					}
                }

                $uploadId = LeadsTracking::create([
                    "full_name" => $row["lead_full_name"],
                    "email" => $row["email"],
                    "mobile_no" => $row["mobile_no"],
                    "country" => $row["country"],
                    "lead_stage" => $leadstage,
                    "instagram_url" => $row["instagram_url"],
                    "instagram_count" => $row["instagram_followers"],
                    "youtube_url" => $row["youtube_url"],
                    "youtube_count" => $row["youtube_followers"],
                    "facebook_url" => $row["facebook_url"],
                    "facebook_count" => $row["facebook_followers"],
                    "twitter_url" => $row["twitter_url"],
                    "twitter_count" => $row["twitter_followers"],
                    "telegram_url" => $row["telegram_url"],
                    "telegram_count" => $row["telegram_followers"],
                    "quora_url" => $row["quora_url"],
                    "quora_count" => $row["quora_followers"],
                    "other_url" => $row["other_url"],
                    "other_count" => $row["other_followers"],
                    "error_message" => $error_msg,
                    "updated_by" => Auth::guard('admin')->user()->id,
                ]);
            }
        }
    }

    public function rules(): array
    {
        return array(
            '*.lead_full_name' => ['required'],
            '*.email' => ['required', 'email','unique:tbl_leadstrackings,email,NULL,id,deleted_at,NULL'],
            '*.mobile_no' => ['required','unique:tbl_leadstrackings,mobile_no'],
            '*.instagram_url' => ['nullable','url','unique:tbl_leadstrackings,instagram_url,NULL,id,deleted_at,NULL'],
            '*.instagram_followers' => ['nullable','integer'],
            '*.youtube_url' => ['nullable','url','unique:tbl_leadstrackings,youtube_url,NULL,id,deleted_at,NULL'],
            '*.youtube_followers' => ['nullable','integer'],
            '*.facebook_url' => ['nullable','url','unique:tbl_leadstrackings,facebook_url,NULL,id,deleted_at,NULL'],
            '*.facebook_followers' => ['nullable','integer'],
            '*.twitter_url' => ['nullable','url','unique:tbl_leadstrackings,twitter_url,NULL,id,deleted_at,NULL'],
            '*.twitter_followers' => ['nullable','integer'],
            '*.telegram_url' => ['nullable','url','unique:tbl_leadstrackings,telegram_url,NULL,id,deleted_at,NULL'],
            '*.telegram_followers' => ['nullable','integer'],
            '*.quora_url' => ['nullable','url','unique:tbl_leadstrackings,quora_url,NULL,id,deleted_at,NULL'],
            '*.quora_followers' => ['nullable','integer'],
            '*.other_url' => ['nullable','url','unique:tbl_leadstrackings,other_url,NULL,id,deleted_at,NULL'],
            '*.other_followers' => ['nullable','integer'],
        );
    }
}
