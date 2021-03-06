<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsToMany;
use App\Models\Order as OrderModel;
use App\Nova\Fields\OrderProductFields;
use Laravel\Nova\Fields\Select;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'code';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'code',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Code'),
            Date::make('Created At', 'created_at')->format('DD/MM/YYYY')->pickerDisplayFormat('d/m/Y'),
            BelongsTo::make('User'),
            Select::make('Status')->options(OrderModel::STATUSES)->displayUsingLabels(),
            Select::make('Shipping Type', 'shipping_type')->options(OrderModel::SHIPPING_TYPES)->displayUsingLabels(),
            Date::make('Shipping Date', 'shipping_date')->format('DD/MM/YYYY')->pickerDisplayFormat('d/m/Y'),
            Text::make('Shipping Address', 'shipping_address')->hideFromIndex(),
            Date::make('Refund deadline', 'refund_deadline')->format('DD/MM/YYYY')->pickerDisplayFormat('d/m/Y'),
            Currency::make('Subtotal'),
            Currency::make('Total'),
            BelongsToMany::make('Products')->fields(new OrderProductFields),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
