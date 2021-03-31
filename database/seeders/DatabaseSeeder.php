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
        (new IssueTypesSeeder)->run();
        (new UserSeeder)->run();
        (new LabelSeeder)->run();
        (new IssueSeeder)->run();
    }
}
