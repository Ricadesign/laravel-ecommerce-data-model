<?php

namespace App\Nova\Fields;

use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Text;

class OrderProductFields
{
    public function __invoke()
    {
        return [
            Number::make('Quantity'),
            Currency::make('Price'),
            Text::make('Product Name', 'product_name')
        ];
    }

}
