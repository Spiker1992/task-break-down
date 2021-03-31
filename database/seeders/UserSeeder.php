<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected array $userData = [[
        'email' => 'joe.doe@domain.com',
    ], [
        'email' => 'jane.doe@domain.com',
    ]];

    public function run()
    {
        foreach ($this->userData as $data) {
            User::factory()->create($data);
        }
    }
}
