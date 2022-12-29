<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  1° forma  - instanciando o objeto    
        */ 
        $provider = new Provider();
        $provider->name = 'fornecedor ABC';
        $provider->site = 'fornecedorabc.com.br';
        $provider->uf = 'RN';
        $provider->email = 'fornecedor@fornecer.com.br';
        $provider->save();


        /*   2° forma - metodo create, atenção para o metodo fillable da classe do model
            
            lembrando que para usar o metodo create do eloquent,
            é preciso estabelecer no model quais atributos podem
            ser preenchidos atraves do atributo protected fillable
        */ 
        Provider::create([
            'name'=>'Provider 200',
            'site'=>'provider200.com.br',
            'uf'=>'RS',
            'email'=>'contat@provider200.com.br'
        ]);

        /* 3° forma - inserção pelo o metodo insert
        atraves do metodo db podemos chamar a tabela e dps
        executar o metodo insert, passando os dados por meio de um array associativo

        É necessário verificar se a classe DB esta sendo importada 
        */ 
        DB::table('providers')->insert([
            'name'=>'Provider 300',
            'site'=>'provider300.com.br',
            'uf'=>'RN',
            'email'=>'contat@provider300.com.br'
        ]);
    }
}
