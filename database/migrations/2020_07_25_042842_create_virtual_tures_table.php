<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualTuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_tures', function (Blueprint $table) {
            $table->id();
            $table->string('con_name')->nullable();
            $table->string('con_email')->nullable();
            $table->string('con_number')->nullable();
            $table->string('time')->nullable();
            $table->text('con_message')->nullable();
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
        Schema::dropIfExists('virtual_tures');
    }
}
