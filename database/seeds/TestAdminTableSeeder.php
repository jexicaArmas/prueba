<?php

use App\Models\User; 
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->faker = Faker::create();
      $this->users();
    }

    public function users()
    {
      $user = new User;
      $user->name  = $this->faker->name;
      $user->email = 'admin@admin.com'; 
      $user->password = bcrypt('adminpass'); 
      $user->save();    
      $this->command->warn("OK\t " . __METHOD__); 
      return; 
    }
}
