<?php

namespace App\Business;

use App\exceptions\ValidationException;
use App\Interfaces\RepositoryInterface;
use App\exceptions\DataException;
use App\Interfaces\ValidatorInterface;

class Update
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

    public function update($data)
    {
        if (!$this->validator->validateUpdate($data)) {
            throw new ValidationException($this->validator->getError());
        }
        if (!$this->repository->exists((int)$data['id'])) {
            throw new DataException('Data not found to update');
        }
        return $this->repository->update($data);
    }
}