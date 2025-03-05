<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Resources\Resources;
use App\Repository\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class Controller
{
    protected Repository $repository;
    protected string $resource = Resources::class;

    public function index(Request $request): JsonResource
    {
        $result = $this->repository->all();

        return $this->asJson($result);
    }

    public function show(string $id): JsonResource
    {
        return $this->asJson($this->repository->getById($id));
    }

    public function asJson(array|Model|Collection $result)
    {
        return new $this->resource($result);
    }
}
