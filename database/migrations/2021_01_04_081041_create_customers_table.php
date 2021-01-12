<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name',100,'	utf8_unicode_ci')->nullable();
            $table->string('gender',10,'utf8_unicode_ci')->nullable();
            $table->string('email',50,'utf8_unicode_ci')->nullable();
            $table->string('address',100,'utf8_unicode_ci')->nullable();
            $table->string('phone_number',20,'utf8_unicode_ci')->nullable();
            $table->string('note',200,'utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
