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
        Schema::create('lead_conversions', function (Blueprint $table) {
            $table->id();
            $table->string('lead_code')->nullable();
            $table->integer('slug_id')->nullable()->comment('foreign key for slugs');
            $table->integer('campaign_id')->nullable()->comment('foreign key for campaigns');
            $table->integer('influencer_id')->nullable()->comment('foreign key for influencers');
            $table->string('lead_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->double('lead_amt')->default(0)->nullable();
            $table->double('lead_commission')->default(0)->nullable();
            $table->double('influencer_paid_share_amt')->default(0)->nullable();
            $table->double('brand_paid_share_amt')->default(0)->nullable();
            $table->double('influencer_paid_brokerage_amt')->default(0)->nullable();
            $table->double('brand_paid_brokerage_amt')->default(0)->nullable();
            $table->double('lead_value')->default(0)->nullable();
            $table->integer('brand_id')->nullable()->comment('foreign key for tbl_brands');
            $table->string('lead_status')->nullable();
            $table->integer('updated_by')->nullable()->comment('foreign key for users');
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
        Schema::dropIfExists('lead_conversions');
    }
};
