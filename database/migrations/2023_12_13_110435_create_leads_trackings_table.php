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
        Schema::create('leads_trackings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('country')->nullable();
            $table->string('lead_stage')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('instagram_count')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('facebook_count')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('youtube_count')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('twitter_count')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('telegram_count')->nullable();
            $table->string('quora_url')->nullable();
            $table->string('quora_count')->nullable();
            $table->string('other_url')->nullable();
            $table->string('other_count')->nullable();
            $table->string('category_id')->nullable();
            $table->string('error_message')->nullable();
            $table->string('referral_code')->nullable();
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
        Schema::dropIfExists('leads_trackings');
    }
};
