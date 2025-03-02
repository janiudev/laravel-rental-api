<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function create(array $payload): Model;
    public function delete(): bool|int;
    public function deleteById(int|string $id): ?bool;
    public function first(): Model;
    public function get(): Collection;
    public function getById(int|string $id): Model;
    public function with(array $relations): static;
}
