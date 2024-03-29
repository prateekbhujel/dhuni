<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'      => 'Admin',
            'email'     => 'admin@email.com',
            'password'  => 'password',
            'phone'     => '9862500130',
            'address'   => 'Biratnaagr, Nepal',
            'type'      => 'Admin',
        ]);
        
    }//End Method
}
