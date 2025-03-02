<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Repository\ProductRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    protected string $resource = ProductResource::class;

    public function __construct(ProductRepository $repository) {
        $this->repository = $repository;
    }

    public function index(): JsonResource
    {
        $filters = request()->only(['region', 'period']);
        $result = $this->repository->findAvailableProducts($filters);

        return $this->resource::collection($result);
    }

    public function store(CreateProductRequest $request): JsonResource
    {
        /** @var Product $product */
        $product = $this->repository->create($request->validatedData());
        $product->attributes()->attach($request->post('attributes'));

        //assign product pricing
        if ($pricing = $request->post('pricing')) {
            foreach ($pricing as $price) {
                $productPricing = new ProductPricing();
                $productPricing->fill($price);
                $productPricing->product()->associate($product);

                $productPricing->save();
            }
        }

        return $this->asJson($product);
    }
}
