<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->tinyIncrements('id');
			$table->unsignedTinyInteger('ip_address_id')->nullable(false);
			$table->string('value')->nullable(false)->unique();
            $table->timestamps();

			$table->foreign('ip_address_id')->references('id')->on('ip_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
