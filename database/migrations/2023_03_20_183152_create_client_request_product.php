<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->timestamps();
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientID');
            $table->timestamps();

            //pegando a fk
            $table->foreign('clientID')->references('id')->on('clients');
        });
        Schema::create('request_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requestID');
            $table->unsignedBigInteger('productID');
            $table->timestamps();

            $table->foreign('requestID')->references('id')->on('clients');
            $table->foreign('productID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        //esse metodo quando executado vai desabilitar
        //a restrição de foreign key do banco de dados 
        Schema::dropIfExists('clients');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_products');
        Schema::enableForeignKeyConstraints();
        //estamos reabilitando a validação de fk
        //na tentativa de rollback n haverá problemas
    }
};
