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
        //tabela filiais  
        Schema::create('branches',function(Blueprint $table){
            $table->id();
            $table->string('name',30);
            $table->timestamps();
        });

        /*a tabela filiais vai ter um relacionamento
        de muitos para muitos com a tabela produtos
        o mesmo produto pode estar em varias filiais,
        e uma filial pode ser utilizada em varios
        produtos.

        no relacionamento de muitos para muitos,esse tipo
        de relacionamento envolve uma terceira tabela que vai
        armazenar as chaves primarias de cada uma das tabelas
        envolvidas no relacionamento */

        //essa vai ser a tabela auxiliar                
        Schema::create('productsBranches',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('branchId');
            $table->unsignedBigInteger('productsId');
            $table->float('sellPrice',8,2);
            $table->integer('stockMin');
            $table->integer('stockMax');
            $table->timestamps();

            //estabelecendo as relações entre as tabelas
            //ou seja, pegando as foreign key
            $table->foreign('branchId')->references('id')->on('branches');
            //estou ligando a tabela productsBranches com a tabela branch
            $table->foreign('productsId')->references('id')->on('products');
            //estou ligando a tabela productsBranches com a tabela products

        });

        //removendo colunas da tabela products, é necessário remover 
        //pq cada filial vai ter um valor diferente para essas colunas
        Schema::table('products',function(Blueprint $table){
            $table->dropColumn(['sellPrice','stockMin','stockMax']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando as colunas de volta para a tabela products
        Schema::table('products',function(Blueprint $table){
            $table->float('sellPrice',8,2);
            $table->integer('stockMin');
            $table->integer('stockMax');
        });

        /*NESSE CASO, removendo a tabela productsBranches, juntamente as chaves estrangeiras
        que estão fazendo a ligação também irão sumir*/ 
        Schema::dropIfExists('productsBranches');

        Schema::dropIfExists('branches');
    }
};
