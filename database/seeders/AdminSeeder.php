<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@ciscs.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('rahasia'),
            'is_admin' => true,
        ]);
    }
}
