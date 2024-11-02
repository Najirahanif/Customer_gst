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
        Schema::create('customers', function (Blueprint $table) {
            // Auto-incrementing primary key with a length of 11
            $table->integer('id', 11)->autoIncrement();

            // Nullable TEXT field with a limit of 100 characters
            $table->string('name', 100)->nullable();

            // Nullable VARCHAR field with a limit of 256 characters
            $table->string('email', 256)->nullable();

            // Nullable TEXT field with a limit of 15 characters
            $table->string('phonenumber', 15)->nullable();

            // Nullable integer with a length of 10
            $table->integer('premiumamount')->nullable();

            // Nullable integer with a length of 5
            $table->integer('gstpercent')->nullable();

            // Nullable integer with a length of 10
            $table->integer('gstamount')->nullable();

            // Nullable integer with a length of 30
            $table->bigInteger('totalpremiumcollected')->nullable();

            // Integer column with a default value of 0 for soft deletes
            $table->integer('deleted_at')->default(0);

            // Datetime columns with current timestamp as default for creation and updates
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Datetime columns with current timestamp as default for creation and updates
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};