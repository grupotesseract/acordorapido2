<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

use Illuminate\Database\Seeder;

/**
 * Class AdminUserSeeder.
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            factory(App\Models\User::class)->create([
                    'name'     => 'Admin',
                    'email'    => 'admin@example.com',
                    'password' => bcrypt(env('ADMIN_PWD', '123456')), ]
            );
        } catch (\Illuminate\Database\QueryException $exception) {
        }
    }
}
