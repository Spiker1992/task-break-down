<?php

namespace Tests\Factories;

use App\Models\IssueType;
use App\Models\User;

class CreateIssueFactory
{
    public static function handle(?string $reporter = 'joe.doe@domain.com'): array
    {
        return collect(static::setDefaultData())
            ->when($reporter, fn ($data) => $data->merge(static::setReporter($reporter)))
            ->toArray();
    }

    protected static function setDefaultData(): array
    {
        $issueTypeId  = IssueType::hasKey('issue')
            ->pluck('id')
            ->first();

        return [
            'title' => 'My Issues',
            'description' => 'Description',
            'issue_type_id' => $issueTypeId,
        ];
    }

    protected static function setReporter(string $email): array
    {
        $reporterId  = User::hasEmails([$email])
            ->pluck('id')
            ->first();

        return ['reporter_id' => $reporterId];
    }
}
