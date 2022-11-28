<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'is_president' => 1,
            'name' => 'Sergio',
            'last_name' => 'Vargas',
            'document_number' => '1236549876',
            'address' => 'Calle falsa 123',
            'phone' => '+573021234567',
            'birth_place' => 'Bogota',
            'email' => 'sergiovargas9@gmail.com',
            'password' => \Hash::make('123456'),
            'email_verified_at' => \Carbon\carbon::now(),
        ]);
        \DB::table('users')->insert([
            'name' => 'pepito',
            'boss_id' => 1,
            'last_name' => 'perez',
            'document_number' => '1236549876',
            'address' => 'Calle falsa 123',
            'phone' => '+573021234567',
            'birth_place' => 'Bogota',
            'email' => 'pepitoperez@gmail.com',
            'password' => \Hash::make('123456'),
            'email_verified_at' => \Carbon\carbon::now(),
        ]);
        \DB::table('users')->insert([
            'name' => 'pacho',
            'boss_id' => 1,
            'last_name' => 'perez',
            'document_number' => '1236549876',
            'address' => 'Calle falsa 123',
            'phone' => '+573021234567',
            'birth_place' => 'Bogota',
            'email' => 'pachoperez@gmail.com',
            'password' => \Hash::make('123456'),
            'email_verified_at' => \Carbon\carbon::now(),
        ]);
        \DB::table('users')->insert([
            'name' => 'juan',
            'boss_id' => 1,
            'last_name' => 'perez',
            'document_number' => '1236549876',
            'address' => 'Calle falsa 123',
            'phone' => '+573021234567',
            'birth_place' => 'Bogota',
            'email' => 'juanperez@gmail.com',
            'password' => \Hash::make('123456'),
            'email_verified_at' => \Carbon\carbon::now(),
        ]);

        \DB::table('roles')->insert([
            'area' => 'Marketing y Estrategias',
            'cargo' => 'Director Creativo',
        ]);
        \DB::table('roles')->insert([
            'area' => 'Marketing y Estrategias',
            'cargo' => 'Copy',
        ]);
        \DB::table('roles')->insert([
            'area' => 'Marketing y Estrategias',
            'cargo' => 'Community Manager',
        ]);
        \DB::table('roles')->insert([
            'area' => 'Desarrollo',
            'cargo' => 'Diseñador UX',
        ]);
        \DB::table('roles')->insert([
            'area' => 'Desarrollo',
            'cargo' => 'Programador Junior',
        ]);
        \DB::table('roles')->insert([
            'area' => 'Desarrollo',
            'cargo' => 'Senior',
        ]);

        \DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'rol' => 1,
        ]);
        \DB::table('user_roles')->insert([
            'user_id' => 2,
            'role_id' => 2,
            'rol' => 2,
        ]);
        \DB::table('user_roles')->insert([
            'user_id' => 3,
            'role_id' => 3,
            'rol' => 2,
        ]);
        \DB::table('user_roles')->insert([
            'user_id' => 4,
            'role_id' => 4,
            'rol' => 1,
        ]);
        \DB::table('user_roles')->insert([
            'user_id' => 2,
            'role_id' => 1,
            'rol' => 1,
        ]);
    }
}
