<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //
            Role::create([
                'name'=> 'Admin',
            ]);
    
            Role::create([
                'name'=> 'Moderator',
            ]);
            Role::create([
                'name'=> 'Affiliate',
            ]);
    
            Role::create([
                'name'=> 'Marketer',
            ]);
    
            Role::create([
                'name'=> 'Buyer'
            ]);
        }
    }
