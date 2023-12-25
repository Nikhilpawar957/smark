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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('director_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('city')->nullable();
            $table->integer('state')->nullable();
            $table->integer('country')->nullable();
            $table->smallInteger('status')->comment('0:pending,1:approval,2:Decline,3:ProfilePending,4:Deleted')->default(3);
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
        Schema::dropIfExists('brands');
    }
};
