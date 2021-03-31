<?php

namespace App\Logic\Issues;

use App\Models\Issue;

class CreateIssue
{
    public function handle(array $data): Issue
    {
        return Issue::create($data);
    }
}
