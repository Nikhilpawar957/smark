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
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->comment('unique combination of campaign id and influencer id ');
            $table->integer('campaign_id')->nullable();
            $table->integer('influencer_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('slug_url')->nullable();
            $table->integer('status')->default(1)->comment('1-campaign is active,0-campaign is deactivated for that influencer');
            $table->integer('updated_by')->comment('foreign key for admins')->nullable();
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
        Schema::dropIfExists('slugs');
    }
};
