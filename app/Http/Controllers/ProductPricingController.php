<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPricing\CreateProductPricingRequest;
use App\Models\ProductPricing;
use App\Repository\ProductPricingRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPricingController extends Controller
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        ProductPricingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($productId, CreateProductPricingRequest $request): JsonResource
    {
        $product = $this->productRepository->getById($productId);

        $model = new ProductPricing($request->validatedData());
        $model->product()->associate($product);

        return $this->asJson($this->repository->create($model->getAttributes()));
    }
}
