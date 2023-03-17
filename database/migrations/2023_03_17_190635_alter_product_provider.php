<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        //Vai criar a coluna em produtos que recebe o fk de provider
        Schema::table('products',function(Blueprint $table){

             //insere um registro de provider para estabelecer o relacionamento
             $providerID = DB::table('providers')->insert([
                 'name'=> 'Default Provider',
                 'site'=> 'defaultprovidersg.com.br',
                 'uf'=> 'SP',
                 'email'=> 'contato@defaultprovidersg.com.br',
             ]);


            $table->unsignedBigInteger('providerID')->default($providerID)->after('id');
            //vai criar essa coluna dps da coluna ID de product
            $table->foreign('providerID')->references('id')->on('providers');
            //essa tabela vai ter um fk que será o id da tabela provider
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function(Blueprint $table){
            $table->dropForeign('products_providerID_foreign');
            //vou tirar na tabela products a fk providerID
            $table->dropColumn('providerID');
            //removendo a coluna providerID na tabela products

        });
    }
};
