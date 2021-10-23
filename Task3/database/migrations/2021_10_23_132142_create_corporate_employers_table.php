<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_employers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Username',10);
            $table->text('Name',20);
            $table->text('Email',25);
            $table->text('Address',40);
            $table->text('Phone',11);
            $table->text('Job_Type',10);
            $table->text('Password',10);
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
        Schema::dropIfExists('corporate_employers');
    }
}
