<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\TotalePrenotazioniInCorsoMetric;
use App\Nova\Metrics\TotalePrenotazioniMetric;
use Coroowicaksono\ChartJsIntegration\StackedChart;
use Laravel\Nova\Dashboard;

class AdminDashboard extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalePrenotazioniMetric(),
            new TotalePrenotazioniInCorsoMetric(),
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'admin-dashboard';
    }


}
