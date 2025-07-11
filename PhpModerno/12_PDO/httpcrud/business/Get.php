<?php

namespace App\Business;

use App\Interfaces\RepositoryInterface;

class GET
{
    public function __construct(
        private RepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function get(): array
    {
        return $this->repository->get();
    }
}

