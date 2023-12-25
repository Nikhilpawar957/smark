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
        Schema::create('brokerages', function (Blueprint $table) {
            $table->id();
            $table->string('lead_code')->nullable();
            $table->integer('slug_id')->nullable()->comment('foreign key for slugs');
            $table->integer('campaign_id')->nullable()->comment('foreign key for campaigns');
            $table->integer('influencer_id')->nullable()->comment('foreign key for influencers');
            $table->double('influencer_share_amt')->nullable();
            $table->double('influencer_brokerage_amt')->nullable();
            $table->integer('brand_id')->nullable()->comment('foreign key for tbl_brands');
            $table->double('brand_share_amt')->nullable();
            $table->double('brand_brokerage_amt')->nullable();
            $table->date('transaction_date')->nullable();
            $table->timestamp('lead_timestamp')->nullable();
            $table->integer('updated_by')->nullable()->comment('foreign key for admins');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brokerages');
    }
};
