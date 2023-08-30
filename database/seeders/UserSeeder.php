<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      User::factory()->create(
        [
            'name'=>'Parvez',
            'email'=>'miazyparvez@gamil.com',
            'role'=>'admin'
        ]
      );
      User::factory()->create(
        [
            'name'=>'Instructor',
            'email'=>'instructor@gamil.com',
            'role'=>'instructor'
        ]
      );
      User::factory()->create(
        [
            'name'=>'Member',
            'email'=>'member@gamil.com',
            'role'=>'member'
        ]
      );


      User::factory()->count(10)->create();

      User::factory()->count(10)->create([
        'role'=>'instructor'
      ]);
    }
}
