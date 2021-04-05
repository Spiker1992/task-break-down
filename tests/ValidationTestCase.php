<?php

namespace Tests;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;

abstract class ValidationTestCase extends DatabaseTestCase
{
    protected string $request;
    protected array $rules;
    protected Factory $validator;

    public function setUp(): void
    {
        parent::setUp();

        $this->rules = (new $this->request)->rules();
        $this->validator = $this->app['validator'];
    }

    protected function getValidator(string $field, string $value): Validator
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->rules[$field]]
        );
    }
}
