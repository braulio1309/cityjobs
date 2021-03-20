<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->times(1)->create([
            "name" => "Edinson",
            "email" => "maxpayne65535@gmail.com",
            "password" => bcrypt("123"),
            "enlinea"=>1,
            "primeravez"=>0,
            "tipoini"=>1
        ]);
        $this->call(LosPlanesSeeder::class);
    }
}
