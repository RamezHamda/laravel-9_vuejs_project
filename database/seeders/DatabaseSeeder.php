<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

         $client = User::create([
             'name' => 'moazzaq',
             'email' => 'moazzaq@gmail.com',
             'password' => bcrypt('123456'),
             'type' => 'client',
         ]);
         $clientProfile = $client->profile()->create();

        $client1 = User::create([
            'name' => 'client1',
            'email' => 'client1@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'client',
        ]);

        $client1Profile = $client1->profile()->create();

        $freelancer = User::create([
            'name' => 'freelancer',
            'email' => 'freelancer@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'freelancer',
        ]);

        $freelancerProfile = $freelancer->profile()->create();

        $freelancer1 = User::create([
            'name' => 'freelancer1',
            'email' => 'freelancer1@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'freelancer',
        ]);
        $freelancer1Profile = $freelancer1->profile()->create();

        $this->call([
           CategorySeeder::class,
           TagSeeder::class,
        ]);
    }
}
