<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalPeriod\CreateRentalPeriodRequest;
use App\Http\Requests\RentalPeriod\UpdateRentalPeriodRequest;
use App\Repository\RentalPeriodRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalPeriodController extends Controller
{
    public function __construct(RentalPeriodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(CreateRentalPeriodRequest $request): JsonResource
    {
        return $this->asJson($this->repository->create($request->validatedData()));
    }

    public function update($id, UpdateRentalPeriodRequest $request): JsonResource
    {
        $model = $this->repository->getById($id);
        $model->fill($request->validatedData());

        return $this->asJson($this->repository->update($model));
    }
}
