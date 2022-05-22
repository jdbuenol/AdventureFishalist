<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\GenerateHistory;
use App\Util\GeneratePDFHistory;
use App\Util\GenerateCSVHistory;

class GenerateHistoryServiceProvider extends ServiceProvider{

    public function register(){
        $this->app->bind(GenerateHistory::class, function ($app, $params){
            $format = $params['format'];
            if($format == 'pdf'){
                return new GeneratePDFHistory();
            }
            else if($format == 'csv'){
                return new GenerateCSVHistory();
            }
        });
    }
}