<?php

namespace App\Business;

use App\interfaces\RepositoryInterface;
use App\exceptions\DataException;

class Delete
{
    private RepositoryInterface $repository;

    public function __construct(
        RepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function delete(int $id)
    {
        if (!$this->repository->exists($id)) {
            throw new DataException('Data not found to delete');
        }
        return $this->repository->delete($id);
    }
}
