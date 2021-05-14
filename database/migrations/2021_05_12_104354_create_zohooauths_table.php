<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZohooauthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zohooauths', function (Blueprint $table) {
            $table->id();
            $table->string('user_mail');
            $table->string("client_id");
            $table->string("refresh_token");
            $table->string("grant_token");
            $table->string("access_token");
            $table->string("expiry_time");
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
        Schema::dropIfExists('zohooauths');
    }
}
