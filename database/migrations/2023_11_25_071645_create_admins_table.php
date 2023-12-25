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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->text('address')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('city')->nullable();
            $table->integer('state')->nullable();
            $table->integer('country')->nullable();
            $table->integer('role')->nullable()->comment('foreign key for roles table');
            $table->string('designation')->nullable();
            $table->smallInteger('status')->comment('0 - Inactive, 1 - Active')->nullable();
            $table->integer('reporting_to')->nullable()->comment('foreign key for admins table');
            $table->string('gender')->nullable();
            $table->string('relation_status')->nullable();
            $table->date('dob')->nullable();
            $table->date('doj')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('created_by')->nullable()->comment('foreign key for admins table');
            $table->integer('updated_by')->nullable()->comment('foreign key for admins table');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
};
