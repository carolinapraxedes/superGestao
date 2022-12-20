<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Comandos STATUS, RESET, REFRESH E FRESH
     * a) php artisan migrate:status
     *vai listar as migrations que já foram executadas
    *
    *b) php artisan migrate:reset
    *vai reverter todas as migrations no banco. na migration mais atual para 
    * a mais antiga, o metodo reset vai sair executando os metodos down de 
    * cada migration, fazendo que o banco volte para o estado original.
    * executa o rollback de todas as migrations
    *
    *c) php artisan migrate:refresh
    *ele vai recriar o banco de dados.vai executar os metodos down de cada migration 
    * e na sequencia vai automaticamente o metodo up com o comado migrate.
    * ele vai zerar o banco. executa o rollback de todas as migrations mais o
    * migrate para recriar os objetos
    *
    *d) php artisan migrate:fresh
    * faz o drop de todos os objetos do banco de dados mais o migrate para
    * recriar os objetos. ele nao faz rollback, ele apenas apaga e cria. 
    *ele nao precisa executar o down da migrate, nesse caso executa apenas o UP
    *
    *
    *
    *
    *
     */




     /*
     O php artisan migrate vai verificar todas as migrations que não foram
     executadas (da mais antiga pra mais recente) e vai executando os métodos UP 
     */ 
    public function up()
    {
        Schema::create('contact_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',50);
            $table->string('phoneNumber',20);
            $table->string('email',80);
            $table->integer('reasonContact');
            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     /*
     O metodo DOWN vai desfazer tudo oq foi feito no metodo UP
     */ 
    public function down()
    {
        //para executar o down, digite php artisan migrate:rollback. ela acontece da mais atual para a mais antiga 
        Schema::dropIfExists('contact_sites');
    }
};
