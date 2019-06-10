<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create();
        App\User::create([
            'name'=>'JLMarcos', 'email'=>'luis@laravel.com', 'password'=>bcrypt('123456')
        ]);
    }
}
