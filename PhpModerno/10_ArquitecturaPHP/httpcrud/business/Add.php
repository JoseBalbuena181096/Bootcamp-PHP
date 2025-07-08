<?php

namespace App\Business;

use App\exceptions\ValidationException;
use App\Interfaces\RepositoryInterface;
use App\Interfaces\ValidatorInterface;

class Add
{
    private ValidatorInterface $validator;
    private RepositoryInterface $repository;

    public function __construct(
        RepositoryInterface $repository,
        ValidatorInterface $validator
    ) {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function add($data)
    {
        if (!$this->validator->validateAdd($data)) {
            throw new ValidationException($this->validator->getError());
        }
        return $this->repository->create($data);
    }
}
