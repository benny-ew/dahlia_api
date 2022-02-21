<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('user_id')->nullable();
            $table->string('email',50);
            $table->uuid('company_id')->nullable();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('citizen_id', 20)->nullable();
            $table->string('position', 20)->nullable();
            $table->string('status', 20);
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')
            // ->references('id')
            // ->on('user')
            // ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
