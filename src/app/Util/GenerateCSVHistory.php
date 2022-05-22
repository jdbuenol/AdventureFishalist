<?php

namespace App\Util;

use App\Interfaces\GenerateHistory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class GenerateCSVHistory implements GenerateHistory{
    public function generateHistory($request){
        $writer = WriterEntityFactory::createCSVWriter();
        $writer->openToBrowser("history.csv");
        $cells = [
            WriterEntityFactory::createCell('Hello'),
            WriterEntityFactory::createCell('World')
        ];
        $writer->addRow(WriterEntityFactory::createRow($cells));
        $writer->close();
    }
}