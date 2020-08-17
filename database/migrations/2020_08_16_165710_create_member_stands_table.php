<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_stands', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('stand_id')->unique();
            $table->bigInteger('allocated_by');
            $table->unique(["member_id", "stand_id"]);
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
        Schema::dropIfExists('member_stands');
    }
}
