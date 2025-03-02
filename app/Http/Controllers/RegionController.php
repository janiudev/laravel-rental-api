<?php

namespace App\Http\Controllers;

use App\Http\Requests\Region\CreateRegionRequest;
use App\Http\Requests\Region\UpdateRegionRequest;
use App\Repository\RegionRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionController extends Controller
{
    public function __construct(RegionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CreateRegionRequest $request): JsonResource
    {
        return $this->asJson($this->repository->create($request->validatedData()));
    }

    public function update($id, UpdateRegionRequest $request)
    {
        $model = $this->repository->getById($id);
        $model->fill($request->validatedData());

        return $this->asJson($this->repository->update($model));
    }
}
