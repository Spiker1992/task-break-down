<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Logic\Issues\CreateIssue;
use App\Models\Issue;

class IssueController extends Controller
{
    public function store(IssueRequest $request): Issue
    {
        $data = $request->validated() + [
            'reporter_id' => $request->user()->id,
        ];

        return app(CreateIssue::class)->handle($data);
    }
}
