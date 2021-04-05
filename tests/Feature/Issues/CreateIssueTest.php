<?php

namespace Tests\Feature\Issues;

use App\Http\Requests\IssueRequest;
use App\Logic\Issues\CreateIssue;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\DatabaseTestCase;
use Tests\Factories\CreateIssueFactory;
use Tests\TestCase;

class CreateIssueTest extends TestCase
{
    use WithoutMiddleware;

    public function testCreateIssue()
    {
        $payload = [
            'title' => 'My Issues',
            'description' => 'Description',
            'issue_type_id' => 1,
        ];
        $response =  new Issue();
        $user = new User();

        $this->mock(CreateIssue::class, function ($mock) use ($response) {
            $mock->shouldReceive('handle')
                ->once()
                ->andReturn($response);
        });

        $this->mock(IssueRequest::class, function ($mock) use ($user) {
            $mock->shouldReceive('validated')
                ->once()
                ->andReturn([]);

            $mock->shouldReceive('user')
                ->once()
                ->andReturn($user);
        });

        $this->post('/api/issue', $payload)
            ->assertSuccessful()
            ->assertExactJson($response->toArray());
    }
}
