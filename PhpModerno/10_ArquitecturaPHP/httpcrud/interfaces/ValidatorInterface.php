<?php

namespace App\Interfaces;

interface ValidatorInterface
{
    public function validate($data): bool;
    public function validateAdd($data): bool;
    public function validateUpdate($data): bool;
    public function getError(): string;
}