<?php

namespace App\Http\Requests;

use App\Models\IssueType;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class IssueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $issueTypeModel = IssueType::class;

        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'issue_type_id' => "required|exists:{$issueTypeModel},id",
        ];
    }
}
