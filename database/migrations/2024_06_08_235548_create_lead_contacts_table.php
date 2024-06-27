<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id')->nullable();
            $table->unsignedInteger('campaign_id')->nullable();
            $table->string('campaign_title', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->text('message')->nullable();
            $table->string('status', 191)->default('pending');
            $table->text('note')->nullable();
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('lead_contacts');
    }
}
