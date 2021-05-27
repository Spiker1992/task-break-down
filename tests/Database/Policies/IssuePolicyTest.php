<?php

namespace Tests\Database\Policies;

use App\Models\User;
use App\Policies\Issue;
use Database\Seeders\IssueSeeder;
use Tests\DatabaseTestCase;

class IssuePolicyTest extends DatabaseTestCase
{
    protected string $policy = Issue::class;

    /**
     * @dataProvider updatePermissionsDataProvider
     * 
     * @param mixed $value
     */
    public function testUpdatePermissions(string $userEmail, string $issueKey, bool $expected = true)
    {
        $user = User::whereEmail($userEmail)
            ->firstOrFail();
        $issue = IssueSeeder::$issues[$issueKey];

        $actual = (new $this->policy)->update($user, $issue);

        $this->assertEquals($expected, $actual);
    }

    public function updatePermissionsDataProvider(): array
    {
        return [
            'has access' => ['joe.doe@domain.com', 'basic'],
            'doesnt have access' => ['jane.doe@domain.com', 'basic', false],
        ];
    }
}
