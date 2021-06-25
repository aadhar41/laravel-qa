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
        \App\Models\User::factory(5)->create()->each(function ($u) {
            $u->questions()
                ->saveMany(
                    \App\Models\Question::factory(rand(1, 5))->make()
                );
        });
        // \App\Models\Question::factory(10)->create();
    }
}
