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
        Schema::create('campaign_kpis', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->string('ratio')->nullable();
            $table->integer('ratio_value')->nullable();
            $table->integer('brokerage')->nullable();
            $table->string('kpi_condition')->nullable();
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
        Schema::dropIfExists('campaign_kps');
    }
};
