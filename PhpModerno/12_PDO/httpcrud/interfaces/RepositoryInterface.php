<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function create(array $data): void;
    public function get(): array;
    public function update(array $data): void;
    public function delete(int $id): void;
    public function exists(int $id): bool;
}
