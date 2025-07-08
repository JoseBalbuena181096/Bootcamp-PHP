<?php

namespace App\Validators;

use App\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    private string $error;

    public function getError(): string
    {
        return $this->error;
    }

    public function validate($data): bool
    {
        if (isset($data['id'])) {
            return $this->validateUpdate($data);
        }
        return $this->validateAdd($data);
    }

    public function validateAdd($data): bool
    {
        if (empty($data['name'])) {
            $this->error = 'Name is required';
            return false;
        }
        return true;   
    }

    public function validateUpdate($data): bool
    {
        if (empty($data['id'])) {
            $this->error = 'Id is required';
            return false;
        }
        if (empty($data['name'])) {
            $this->error = 'Name is required';
            return false;
        }
        return true;   
    }
}
