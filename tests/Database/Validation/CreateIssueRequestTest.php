<?php

namespace Tests\Database\Validation;

use App\Http\Requests\IssueRequest;
use Tests\ValidationTestCase;

class CreateIssueRequestTest extends ValidationTestCase
{
    protected string $request = IssueRequest::class;

    /**
     * @dataProvider validationDataProvider
     * 
     * @param mixed $value
     */
    public function testValidation(string $fieldName, $value, bool $expected)
    {
        $pass = $this->getValidator($fieldName, $value)
            ->passes();

        $this->assertEquals($expected, $pass);
    }

    public function validationDataProvider(): array
    {
        return [
            'title must be set' => ['title', 'test', true],
            'title cant be empty' => ['title', '', false],
            'description must be set' => ['description', 'test', true],
            'description cant be empty' => ['description', '', false],
            'issue type must be set' => ['issue_type_id', '', false],
            'issue type must exist' => ['issue_type_id', 999, false],
            'issue type exist' => ['issue_type_id', 1, true],
        ];
    }
}
