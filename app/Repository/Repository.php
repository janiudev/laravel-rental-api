<?php

namespace App\Repository;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class Repository implements RepositoryInterface
{
    public readonly Model $model;
    protected Builder $query;
    protected array $with = [];

    public function __construct()
    {
        $this->model = $this->resolveModel();
        $this->query = $this->model->newQuery();
    }

    public function all(): Collection
    {
        return $this->newQuery()->eagerLoad()->query->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->newQuery()->eagerLoad()->query->paginate($perPage);
    }

    public function create(array $payload): Model
    {
        return $this->model->create($payload);
    }

    public function update(Model $model): Model
    {
        $model->save();

        return $model;
    }

    public function delete(): bool|int
    {
        return $this->newQuery()->query->delete();
    }

    /**
     * @throws Exception
     */
    public function deleteById(int|string $id): ?bool
    {
        return $this->getById($id)->delete();
    }

    public function first(): Model
    {
        return $this->newQuery()->eagerLoad()->query->firstOrFail();
    }

    public function get(): Collection
    {
        return $this->newQuery()->eagerLoad()->query->get();
    }

    public function getById(int|string $id): Model
    {
        return $this->newQuery()->eagerLoad()->query->findOrFail($id);
    }

    public function with(array $relations): static
    {
        $this->with = $relations;
        return $this;
    }

    protected function newQuery(): static
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    protected function eagerLoad(): static
    {
        $this->query->with($this->with);

        return $this;
    }

    /**
     * @throws Exception
     */
    private function resolveModel(): Model
    {
        $repositoryClass = class_basename(static::class);
        $modelClass = "App\\Models\\" . Str::replaceLast('Repository', '', $repositoryClass);

        if (!class_exists($modelClass)) {
            throw new Exception("Model {$modelClass} does not exist.");
        }

        return new $modelClass();
    }
}
