<?php

namespace App\Nova;

use Coroowicaksono\ChartJsIntegration\AreaChart;
use Coroowicaksono\ChartJsIntegration\BarChart;
use Coroowicaksono\ChartJsIntegration\DoughnutChart;
use Coroowicaksono\ChartJsIntegration\LineChart;
use Coroowicaksono\ChartJsIntegration\PieChart;
use Coroowicaksono\ChartJsIntegration\StackedChart;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class Fattura extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Fattura::class;

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
            BelongsTo::make('Cliente', 'user', User::class),
            HasMany::make('Prenotazioni', 'prenotazione', Prenotazioni::class),
            DateTime::make('Data', 'data'),
            Number::make('IVA', 'aliquota_iva'),
            Number::make('Totale', 'totale'),
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
        return [
            (new LineChart())
                ->title('Revenue')
                ->model('\App\Fattura') // Use Your Model Here
                ->options([
                    // add array of filter with this format
                    'sum' => 'totale',
                    'uom' => 'day',
                    'latestData' => '*',
                ])
        ];
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

    public static function label()
    {
        return 'Fatture';
    }
}
