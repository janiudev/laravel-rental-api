<?php

namespace App\Repository;

class ProductRepository extends Repository
{
    protected array $with = ['attributes.attribute', 'pricing.region', 'pricing.rentalPeriod'];
}
