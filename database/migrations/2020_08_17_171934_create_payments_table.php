<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('transaction_date');
            $table->string('reference',250)->unique();
            $table->float('amount');
            $table->string('source',50);
            $table->string('description',255);
            $table->bigInteger('member_id');
            $table->bigInteger('company_id');
            $table->bigInteger('allocation_id');
            $table->string('status',50);
            $table->text('log_data')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
