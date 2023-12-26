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
        Schema::create('influencers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('city')->nullable();
            $table->integer('state')->nullable();
            $table->integer('country')->nullable();
            $table->integer('influencer_type')->default(0)->comment('foreign key for campaign_types');
            $table->integer('influencer_tier')->nullable()->comment('foreign key for tiers');
            $table->string('instagram_url')->nullable();
            $table->string('instagram_count')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('youtube_count')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('facebook_count')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('twitter_count')->nullable();
            $table->string('quora_url')->nullable();
            $table->string('quora_count')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('telegram_count')->nullable();
            $table->string('other_url')->nullable();
            $table->string('other_count')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->integer('tag')->comment('foreign key for tags')->nullable();
            $table->text('profile_image')->nullable();
            $table->integer('status')->nullable()->comment('1 - Profile Pending, 2 - Pending, 3 - Approved, 4 - Declined');
            $table->string('referral_code')->default('E-1')->comment('referral_code from admins table');
            $table->integer('updated_by')->nullable()->comment('foreign key for admins table');
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
        Schema::dropIfExists('influencers');
    }
};
