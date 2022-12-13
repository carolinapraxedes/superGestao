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
