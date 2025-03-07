<?php

namespace Database\Seeders;

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
        $user = \App\Models\User::whereEmail('expertspeer@wowpdf.net')->first();
        if(!$user){
            \App\Models\User::factory(1)->create([
                'name'=> 'Peer',
                'email'=> 'expertspeer@wowpdf.net',
            ]);
        }
        $this->call(Blog1Seeder::class);
        $this->call(Blog2Seeder::class);
        $this->call(Blog3Seeder::class);
        $this->call(Blog4Seeder::class);
    }
}
