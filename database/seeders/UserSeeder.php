<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UserSeeder extends Seeder
{
    private const DOMAIN = '@teltonika.lt';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(498)
            ->create();
        
        $surnames = ['Smith', 'Williams'];
        $name = 'John';
        foreach($surnames as $surname) {
            DB::table('users')->insert([
                'name' => $name,
                'surname' => $surname,
                'views_count' => 0,
                'email' => $name . '.' . $surname . self::DOMAIN,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);
        }
    }
}
