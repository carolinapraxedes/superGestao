<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\reasonContact;

class reasonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        reasonContact::create(['reasonContact'=>'Questions']);
        reasonContact::create(['reasonContact'=>'Commendation']);
        reasonContact::create(['reasonContact'=>'Complain']);
    }
}
