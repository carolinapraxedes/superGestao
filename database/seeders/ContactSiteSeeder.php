<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactSite as contactSite;

class ContactSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        contactSite::factory()->count(100)->create();
        
    }
}
/*ContactSite::create([
            'name' => 'site name',
            'phoneNumber' => '895224489',
            'email'=>'sitename@email.com.br',
            'reasonContact'=>1,
            'message'=>'nada a declarar'
        ]);*/