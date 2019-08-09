<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       		'name' => 'Eduardo',
       		'email' => 'e.arregui@gmail.com',
       		'password' => bcrypt('123123')
       ]);

       User::create([
          'name' => 'Ruben',
          'email' => 'r.arregui@gmail.com',
          'password' => bcrypt('123123')
       ]);

       User::create([
          'name' => 'Juan',
          'email' => 'j.arregui@gmail.com',
          'password' => bcrypt('123123')
       ]) ;
    }
}
