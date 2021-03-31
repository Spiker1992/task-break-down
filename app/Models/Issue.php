<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Issue extends Model
{
    protected $fillable = [
        'title',
        'description',
        'reporter_id',
        'issue_type_id',
    ];

    public function relatedType(): BelongsTo
    {
        return $this->belongsTo(IssueType::class);
    }

    public function relatedLabels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'issue_labels');
    }

    public function  relatedAssignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'issue_assignees');
    }
}
