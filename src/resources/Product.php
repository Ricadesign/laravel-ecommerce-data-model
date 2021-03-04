<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;
use App\Nova\Fields\OrderProductFields;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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
            Text::make('Name')->rules('required')->hideFromIndex(function (ResourceIndexRequest $request) {
                return $request->viaRelationship();
            }),
            Text::make('Short Description', 'short_description')->rules('required')->hideFromIndex(),
            Textarea::make('Description')->rules('required'),
            Number::make('Stock')->rules('required')->hideFromIndex(function (ResourceIndexRequest $request) {
                return $request->viaRelationship();
            }),
            Currency::make('Price')->rules('required')->hideFromIndex(function (ResourceIndexRequest $request) {
                return $request->viaRelationship();
            }),
            BelongsTo::make('Category'),
            HasOne::make('Features', 'features', 'App\Nova\Features'),
            Boolean::make('Visible')->hideFromIndex(function (ResourceIndexRequest $request) {
                return $request->viaRelationship();
            }),
            Images::make('Images')
                ->hideFromIndex()
                ->setFileName(function($originalFilename, $extension){
                    return md5($originalFilename) . '.' . $extension;
                }),
            BelongsToMany::make('Orders')->fields(new OrderProductFields),
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
