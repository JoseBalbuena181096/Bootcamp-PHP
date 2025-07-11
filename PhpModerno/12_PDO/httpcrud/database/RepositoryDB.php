<?php

namespace App\Database;

use PDO;
use App\interfaces\RepositoryInterface;
use App\Database\BaseRepository;

class RepositoryDB extends BaseRepository implements RepositoryInterface
{
    const TABLE = 'beer';
    public function get(): array
    {
        $sql = 'SELECT * FROM ' . self::TABLE;
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function exists(int $id): bool
    {
        $sql = 'SELECT * FROM ' . self::TABLE . ' WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->rowCount() > 0;
        return $result;
    }

    public function create(array $data): void
    {
        $sql = 'INSERT INTO ' . self::TABLE 
        . ' (name, alcohol, idBrand) VALUES (:name, :alcohol, :idBrand)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function update(array $data): void
    {
        $sql = 'UPDATE ' . self::TABLE 
        . ' SET name = :name, alcohol = :alcohol, idBrand = :idBrand WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function delete(int $id): void
    {
        $sql = 'DELETE FROM ' . self::TABLE . ' WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
