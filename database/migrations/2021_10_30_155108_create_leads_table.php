<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id');
            $table->integer('order_weight')->default(0);
            $table->string('contact_name')->nullable();;
            $table->string('title')->default('New Lead');
            $table->string('company_name')->default('New Lead')->nullable();
            $table->integer('company_phone')->nullable();
            $table->string('company_address_line_one')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_state')->nullable();
            $table->integer('company_zip_code')->nullable();
            $table->foreignId('state_id')->nullable();

            $table->foreignId('status_id');
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
        Schema::dropIfExists('leads');
    }
}
