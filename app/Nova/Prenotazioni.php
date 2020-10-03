<?php

namespace App\Nova;

use App\Nova\Filters\PrenotazioniInCorsoFilter;
use App\Nova\Lenses\PrenotazioniInCorsoLense;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Silvanite\NovaToolPermissions\Nova\AccessControl;

class Prenotazioni extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Prenotazioni::class;

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
//            AccessControl::make(),
            ID::make()->sortable(),
            Date::make('Data Prenotazione', 'data_prenotazione')->format('MM-DD-YYYY'),
            Textarea::make('Note', 'note'),
            Select::make('Stato', 'status')->options([
                'S' => 'Inviato',
                'I' => 'In corso',
                'C' => 'Completato',
                'R' => 'Rifutato',
            ])->displayUsingLabels(),
            BelongsTo::make('Fattura', 'fattura', Fattura::class),
            HasOne::make('Stanza', 'stanza', Camera::class),

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
        return [
            new PrenotazioniInCorsoFilter()
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            new PrenotazioniInCorsoLense()
        ];
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

    public static function label()
    {
        return 'Prenotazioni';
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->doesntHave('stanza');
    }
}
