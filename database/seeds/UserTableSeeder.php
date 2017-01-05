<?php

use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Felipe Gomes',
            'email' => 'felipegomesudi@gmail.com',
            'password' => bcrypt('assumpcao'),
            'remember_token' => str_random(10),
        ]);
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ]);
        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}