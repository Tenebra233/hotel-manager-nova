<?php

namespace App\Nova\Metrics;

use App\Nova\Filters\PrenotazioniInCorsoFilter;
use App\Prenotazioni;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use SaintSystems\Nova\LinkableMetrics\LinkableValue;

class TotalePrenotazioniInCorsoMetric extends Value
{
    use LinkableValue;

    /**
     * Calculate the value of the metric.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $filters = base64_encode(json_encode([
            [
                'class' => PrenotazioniInCorsoFilter::class,
                'value' => 'status',
            ],
        ]));

        $result = $this->count($request, Prenotazioni::inCorso());
        $params = ['resourceName' => 'prenotazionis'];
        $query = [
            'prenotazionis_filter'=>$filters
        ];

        return $result->route('index', $params, $query);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            30 => '30 Days',
            60 => '60 Days',
            365 => '365 Days',
            'TODAY' => 'Today',
            'MTD' => 'Month To Date',
            'QTD' => 'Quarter To Date',
            'YTD' => 'Year To Date',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'totale-prenotazioni-in-corso-metric';
    }

    public function name()
    {
        return 'Prenotazioni In Corso';
    }
}
