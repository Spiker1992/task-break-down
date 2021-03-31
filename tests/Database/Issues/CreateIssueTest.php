<?php

namespace Tests\Database\Issues;

use App\Logic\Issues\CreateIssue;
use App\Models\IssueType;
use App\Models\User;
use Tests\DatabaseTestCase;

class CreateIssueTest extends DatabaseTestCase
{
    public function testCreateIssue()
    {
        $data = $this->getData();

        (new CreateIssue)->handle($data);

        $this->assertDatabaseHas('issues', $data);
    }

    protected function getData(): array
    {
        $issueTypeId  = IssueType::hasKey('issue')
            ->pluck('id')
            ->first();

        $reporterId  = User::hasEmails(['joe.doe@domain.com'])
            ->pluck('id')
            ->first();

        return [
            'title' => 'My Issues',
            'description' => 'Description',
            'reporter_id' => $reporterId,
            'issue_type_id' => $issueTypeId,
        ];
    }
}
