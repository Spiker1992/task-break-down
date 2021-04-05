<?php

namespace Tests\Database\Issues;

use App\Logic\Issues\CreateIssue;
use Tests\DatabaseTestCase;
use Tests\Factories\CreateIssueFactory;

class CreateIssueTest extends DatabaseTestCase
{
    public function testCreateIssue()
    {
        $data = CreateIssueFactory::handle();

        (new CreateIssue)->handle($data);

        $this->assertDatabaseHas('issues', $data);
    }
}
