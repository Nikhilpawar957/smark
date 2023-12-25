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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_name')->nullable();
            $table->integer('campaign_type')->comment('1 - Performance, 2 - Barter, 3 - Branding')->nullable();
            $table->integer('offer_type')->comment('0 - General, 1 - Special')->nullable();
            $table->integer('brand_id')->comment('foreign key for brands')->nullable();
            $table->integer('tag_id')->comment('foreign key for tags')->nullable();

            // step 1 (Performance Campaign)
            $table->string('brand_payout_option')->nullable();
            $table->double('brand_payout_value')->nullable();
            $table->double('brand_commission_per_transaction')->nullable();

            $table->string('influencer_payout_option')->nullable();
            $table->double('influencer_payout_value')->nullable();
            $table->double('influencer_commission_per_transaction')->nullable();

            $table->date('end_date')->nullable();
            $table->integer('enable_asci')->default(0);

            $table->string('channels')->nullable();
            $table->integer('category')->nullable();

            $table->text('brand_tags')->nullable();
            $table->text('hash_tags')->nullable();

            $table->text('brand_campaign_brief')->nullable();
            $table->text('brand_campaign_kpi')->nullable();
            $table->text('brand_campaign_tc')->nullable();

            $table->text('influencer_campaign_brief')->nullable();
            $table->text('influencer_campaign_kpi')->nullable();
            $table->text('influencer_campaign_tc')->nullable();

            // step 3
            $table->text('landing_page_url')->nullable();
            $table->string('utm')->nullable();
            $table->string('utm_tag')->nullable();
            $table->string('utm_id')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_term')->nullable();
            $table->string('utm_medium')->nullable();

            // step 4
            $table->integer('campaign_visibility')->default(0)->nullable()->comment('0-default visible to all,1-visible to selected,2-hidden to selected');
            $table->integer('status')->default('2')->comment('1-approved,2-pending,3-stopped,4-declined');

            //step 5
            $table->integer('commission_type_on_first_transaction')->nullable()->comment('0-Commission Percentage,1-Commission Value');
            $table->integer('commission_type_on_other_transaction')->nullable()->comment('0-Commission Percentage,1-Commission Value');

            $table->double('commission_on_first_transaction_company')->nullable();
            $table->double('commission_on_first_transaction_influencer')->nullable();

            $table->double('commission_on_other_transaction_company')->nullable();
            $table->double('commission_on_other_transaction_influencer')->nullable();

            $table->double('lead_commission_value_influencer')->nullable();
            $table->double('lead_commission_value_brand')->nullable();

            $table->double('lead_acquisition_value_brand')->nullable();
            $table->double('lead_acquisition_value_influencer')->nullable();

            $table->timestamp('effective_from')->nullable();
            $table->text('note')->nullable();
            $table->integer('kpichangenotification')->default(0);

            // barter and branding campaign
            $table->integer('platform_mandatory')->nullable();
            $table->integer('media_approval')->nullable();
            $table->integer('deliverable_notification')->nullable();
            $table->string('send_notification_on')->nullable();

            // branding campaign
            $table->double('brand_maximum_payout')->nullable();
            $table->double('influencer_maximum_payout')->nullable();

            // barter campaign
            $table->string('brand_product_cost')->nullable();
            $table->string('brand_commission_per_sale')->nullable();
            $table->string('brand_campaign_payout')->nullable();
            $table->string('influencer_product_cost')->nullable();
            $table->string('influencer_commission_per_sale')->nullable();
            $table->string('influencer_campaign_payout')->nullable();

            // asci fields
            $table->string('govt_regulatory_body')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('certificate')->nullable();

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
        Schema::dropIfExists('campaigns');
    }
};
