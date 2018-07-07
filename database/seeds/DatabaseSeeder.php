<?php

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
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 1
        ]);

        factory(App\Record::class, 100000)
            ->create()
            ->each(function ($r) {
                $r->firstProp()->create([
                    'property_8' => str_random(8)
                ]);
                $r->secondProp()->create([
                    'property_9' => str_random(8)
                ]);
                $r->thirdProp()->create([
                    'property_10' => str_random(8)
                ]);
            });
    }
}
