<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('code',10)->unique();
            $table->string('name',50);
            $table->string('npwp',50);
            $table->string('address',250)->nullable();
            $table->string('logo_url',250)->nullable();
            $table->string('representative_name',250)->nullable();
            $table->string('representative_position',250)->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
