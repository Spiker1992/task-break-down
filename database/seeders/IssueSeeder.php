<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Label;
use App\Models\IssueType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class IssueSeeder extends Seeder
{
    protected array $seedPlan = [
        'basic' => [
            'issue' => [
                'title' => 'A basic issue',
                'description' => 'This issue has no labels and assignees, all you get is an issue.',
                'reporter' => 'joe.doe@domain.com',
                'issue_type' => 'task',
            ],
        ],
        'an-issue' => [
            'issue' => [
                'title' => 'We have a bug!',
                'description' => 'An example of a bug.',
                'reporter' => 'jane.doe@domain.com',
                'issue_type' => 'issue',
            ],
            'label' => [
                'BE'
            ],
        ],
        'with-a-label' => [
            'issue' => [
                'title' => 'With a label!',
                'description' => 'This issues comes with a label.',
                'reporter' => 'joe.doe@domain.com',
                'issue_type' => 'task',
            ],
            'label' => [
                'FE'
            ],
        ],
        'assigned-issue' => [
            'issue' => [
                'title' => 'Assigned issue!',
                'description' => 'This issue was assigned to Jane.',
                'reporter' => 'joe.doe@domain.com',
                'issue_type' => 'task',
            ],
            'label' => [
                'BE'
            ],
            'assignees' => [
                'jane.doe@domain.com'
            ],
        ],
    ];

    public function run()
    {
        foreach ($this->seedPlan as $plan) {
            $issue = $this->createIssue($plan);

            $this->assignLabel($issue, $plan);
            $this->assignAssignees($issue, $plan);
        }
    }

    protected function createIssue(array $plan): Issue
    {
        $attributes = $plan['issue'];
        $data = Arr::only($attributes, [
            'title',
            'description',
        ]);

        $data['reporter_id'] = User::hasEmails([$attributes['reporter']])
            ->pluck('id')
            ->first();

        $data['issue_type_id'] = IssueType::hasKey($attributes['issue_type'])
            ->pluck('id')
            ->first();

        return Issue::create($data);
    }

    protected function assignLabel(Issue $issue, array $plan): void
    {
        if (!isset($plan['label'])) {
            return;
        }

        $labels = Label::hasNames($plan['label'])->pluck('id');

        $issue->relatedLabels()->attach($labels);
    }

    protected function assignAssignees(Issue $issue, array $plan): void
    {
        if (!isset($plan['assignees'])) {
            return;
        }

        $users = User::hasEmails($plan['assignees'])->pluck('id');

        $issue->relatedAssignees()->attach($users);
    }
}
