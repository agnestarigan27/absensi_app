<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'operator',
            'email' => 'operator@gmail.com',
            'role' => 'operator',
            'password' => bcrypt('operator'),
        ]);
        User::create([
            'name' => 'siswa1',
            'email' => 'siswa1@gmail.com',
            'role' => 'siswa',
            'password' => bcrypt('siswa1'),
        ]);
        User::create([
            'name' => 'guru1',
            'email' => 'guru1@gmail.com',
            'role' => 'guru',
            'password' => bcrypt('guru1'),
        ]);
        User::create([
            'name' => 'orangtua1',
            'email' => 'orangtua1@gmail.com',
            'role' => 'orangtua',
            'password' => bcrypt('orangtua1'),
        ]);
    }
}
