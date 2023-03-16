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
        /* Para fazer um relação um por um, precisamos criar a chave primária de uma das tabelas
        para se conectar com a outra tabela por meio de uma chave estrangeira.
        vai da tabela mais forte/significante para o negocio para a mais fraca

        OBS: A chave estrangeira precisa ser do mesmo tipo da chave primaria 
        */ 
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->float('length',8,2);
            $table->float('width',8,2);
            $table->float('height',8,2);
            $table->timestamps();

            $table->foreign('productId')->references('id')->on('products');
            /*
            foreign = Qual coluna da nossa tabela que vai receber a chave estrangeira 
            references = indica qual é a coluna de referencia (onde vai estar a chave primaria)
            on = em qual tabela esta essa referencia            
            */ 
            $table->unique('productId');// estou indicando que valores repetidos não serão aceitos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
};

