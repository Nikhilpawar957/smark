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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->integer('influencer_id')->comment('foreign key for influencers')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->tinyInteger('account_type')->comment('1 - Savings Account, 2 - Current Account')->default(1);
            $table->string('ifsc_code')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_card_file')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('gst_number')->nullable();
            $table->tinyInteger('gst_certificate')->default('0')->comment('0 - No certificate,1 - Certificate');
            $table->string('gst_certificate_file')->nullable();
            $table->text('bank_address')->nullable();
            $table->string('cancelled_cheque_file')->nullable();
            $table->tinyInteger('status')->comment('0 - Unverified, 1 - Verified, 2 - Declined')->default(0);
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
        Schema::dropIfExists('bank_details');
    }
};
