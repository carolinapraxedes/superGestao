<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_sites', function (Blueprint $table) {
            $table->unsignedBigInteger('reasonContactId');
            //adicionando a coluna reascon Contact id
        });

        //atribuindo reasonContact p/ a nova coluna reasonContact ID
        //estou passando os dados existentes em reasonContact da tabela contactSite
        //para o reasonContactID na tabela reasonContact
        DB::statement('update contact_sites set reasonContactId = reasonContact');

        //criando a fk e removendo a coluna reasoncontact ja existente na tabela
        Schema::table('contact_sites', function (Blueprint $table) {
            $table->foreign('reasonContactId')->references('id')->on('reason_contacts');
            //adicionando uma uma coluna de fk, pegando o seu id, e colocando numa coluna na tabela contactsite
            $table->dropColumn('reasonContact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('contact_sites', function (Blueprint $table) {
            $table->integer('reasonContact');
            //criando a coluna reasoncontact de volta na tabela contact sites
            $table->dropForeign('contact_sites_reasonContactId');//('<table>_<coluna>_foreign')
            //removendo a fk criada
        });

                //atribuindo reasonContact ID  p/ a nova coluna reasonContact
                DB::statement('update contact_sites set reasonContact = reasonContactId');

                Schema::table('contact_sites', function (Blueprint $table) {
                    $table->dropColumn('reasonContactId');
                    //removendo a coluna reason Contact id
                });
        
    }
};
