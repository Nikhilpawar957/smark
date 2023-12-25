<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_code')->nullable();
            $table->string('lead_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('lead_timestamp')->nullable();
            $table->string('city')->nullable();
            $table->string('lead_status')->nullable();
            $table->string('lead_commission')->nullable();
            $table->string('acquisition_status')->nullable();
            $table->timestamp('acquisition_timestamp')->nullable();
            $table->string('acquisition_commission_value')->nullable();
            $table->string('customer_code')->nullable();
            $table->integer('transaction_status')->nullable()->comment('first transaction status');
            $table->double('transaction_value')->nullable()->comment('first transaction value');
            $table->timestamp('transaction_date')->nullable()->comment('first transaction date');
            $table->double('transaction_count_minus_first')->nullable();
            $table->text('transaction_dates_minus_first')->nullable();
            $table->text('transaction_values_minus_first')->nullable();
            $table->string('slug')->nullable()->comment('slug from tbl_slugs');
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('utm')->nullable();
            $table->string('utm_id')->nullable();
            $table->string('campaign_name')->nullable()->comment('campaign_name from tbl_campaigns');
            $table->string('brand_id')->nullable()->comment('brand_id from tbl_brands');
            $table->string('brand_name')->nullable()->comment('brand_name from tbl_brands');
            $table->integer('is_active')->nullable()->comment('1-active,2-inactive');
            $table->text('reason')->nullable();
            $table->integer('updated_by')->nullable()->comment('foreign key for admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_leads');
    }
};
