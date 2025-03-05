<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ProductRepository extends Repository
{
    protected array $with = ['attributes.attribute', 'pricing'];

    public function findAvailableProducts(array $filters, ?int $perPage = 15): LengthAwarePaginator
    {
        $query = $this->query->with($this->with);

        if (!empty($region = Arr::get($filters, 'region'))) {
            $query->whereHas('pricing', fn($q) => $q->where('region_id', $region));
        }

        if (!empty($period = Arr::get($filters, 'period'))) {
            $query->whereHas('pricing', fn($q) => $q->where('rental_period_id', $period));
        }

        return $query->paginate($perPage);
    }
}
