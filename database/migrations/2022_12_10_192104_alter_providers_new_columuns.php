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
        Schema::table('providers', function (Blueprint $table) {
            //estou selecionando uma tabela que ja existe e adicionando novas colunas
            $table->string('uf',2);
            $table->string('email',150);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            //estou selecionando a tabela e removendo as novas colunas 
            $table->dropColumn(['uf','email']);
            /*
            É possivel remover cada uma das coluna de modo individual mas também é possivel enviar
            todas as colunas que deseja remover por meio de array
            */ 
      

        });
    }
};
