<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_contacts', function (Blueprint $table) {
            $table->id();
            $table->string("member_id");
            $table->string("contact_type", 25);
            $table->string("contact", 80);
            $table->unique(["member_id", "contact_type", "contact"]);
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
        Schema::dropIfExists('member_contacts');
    }
}
