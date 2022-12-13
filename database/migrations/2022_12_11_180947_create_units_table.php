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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit',5);// cm,mm,kg
            $table->string('description',30);
            $table->timestamps();
        });
        /*
        A tabela de units tem relação um para muitos com as tabelas products e products details
        */ 

        //adicionar o relacionamento com a tabela produts
        Schema::table('products',function(Blueprint $table){
            $table->unsignedBigInteger('unitId');// criando uma coluna com o id da unidade na tabela products
            $table->foreign('unitId')->references('id')->on('units');
            //estou dizendo que a coluna criada (unitid) vai referenciar a coluna id da tabela units

        });

        //adicionar o relacionamento com a tabela produts details
        Schema::table('products_details',function(Blueprint $table){
            $table->unsignedBigInteger('unitId');
            $table->foreign('unitId')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover o relacionamento com a tabela produts details
        Schema::table('products_details',function(Blueprint $table){
            //removendo a chave estrangeira (fk)
            $table->dropForeign('products_details_unitId_foreign'); //[table]_[coluna]_foreign
            //removendo a coluna unitId na tabela productsDetails
            $table->dropColumn('unitId');
        });

        //remover o relacionamento com a tabela produts
        Schema::table('products',function(Blueprint $table){
            //removendo a chave estrangeira (fk)
            $table->dropForeign('products_unitId_foreign'); //[table]_[coluna]_foreign
            //removendo a coluna unitId na tabela productsDetails
            $table->dropColumn('unitId');
        });

        //antes de excluir a tabela units, precisamos remover as chaves estrangeiras nas outras tabelas
        Schema::dropIfExists('units');
    }
};
