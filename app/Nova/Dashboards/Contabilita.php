<?php

namespace App\Nova\Dashboards;

use Coroowicaksono\ChartJsIntegration\StackedChart;
use Laravel\Nova\Dashboard;

class Contabilita extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            (new StackedChart())
                ->title('Revenue')
                ->series(array([
                    'barPercentage' => 0.5,
                    'label' => 'Product #1',
                    'backgroundColor' => '#ffcc5c',
                    'data' => [30, 70, 80],
                ],[
                    'barPercentage' => 0.5,
                    'label' => 'Product #2',
                    'backgroundColor' => '#ff6f69',
                    'data' => [40, 62, 79],
                ]))
                ->options([
                    'xaxis' => [
                        'categories' => [ 'Jan', 'Feb', 'Mar' ]
                    ],
                ])
                ->width('1/3'),
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'contabilita';
    }
}
