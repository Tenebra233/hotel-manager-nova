<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

class Camera extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Camera::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {


        return [
            ID::make()->sortable(),
            BelongsTo::make('Piano', 'piano', Piano::class),
            BelongsTo::make('Prenotazione', 'prenotazione', Prenotazioni::class)->nullable(),
            Text::make('Numero Stanza', 'numero_camera'),
            Number::make('Numero letti singoli', 'numero_letti_singoli'),
            Number::make('Numero letti matrimonali', 'numero_letti_matrimonali'),
            Boolean::make('Cucina', 'cucina'),
            Boolean::make('Terrazzo', 'terrazzo'),
            Boolean::make('Aria Condizionata', 'aria_condizionata'),
            Boolean::make('Televisione', 'televisione'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static $group = 'Piani & Camere';

    public static function label()
    {
        return 'Camere';
    }




}
