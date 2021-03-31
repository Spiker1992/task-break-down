<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\IssueType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class IssueTypesSeeder extends Seeder
{
    protected array $typesData = [[
        'key' => 'task',
        'name' => 'Task',
    ], [
        'key' => 'issue',
        'name' => 'Issue',
    ], [
        'key' => 'story',
        'name' => 'Story',
    ]];

    public function run()
    {
        IssueType::insert($this->typesData);
    }
}
