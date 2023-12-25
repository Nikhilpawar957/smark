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
        Schema::create('campaign_assets', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->integer('asset_type')->comment('0-logo,1-images,2-videos,3-hotoffercard,4-documents');
            $table->text('path');
            $table->integer('updated_by')->comment('foreign key for admins')->nullable();
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
        Schema::dropIfExists('campaign_assets');
    }
};
