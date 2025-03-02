<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attribute\CreateAttributeRequest;
use App\Http\Requests\Attribute\UpdateAttributeRequest;
use App\Http\Resources\Attribute\AttributeResource;
use App\Repository\AttributeRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeController extends Controller
{
    protected string $resource = AttributeResource::class;

    public function __construct(AttributeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CreateAttributeRequest $request): JsonResource
    {
        return $this->asJson($this->repository->create($request->validatedData()));
    }

    public function update($id, UpdateAttributeRequest $request): JsonResource
    {
        $model = $this->repository->getById($id);
        $model->fill($request->validatedData());

        return $this->asJson($this->repository->update($model));
    }
}
