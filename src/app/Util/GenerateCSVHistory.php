<?php

namespace App\Util;

use App\Interfaces\GenerateHistory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class GenerateCSVHistory implements GenerateHistory{
    public function generateHistory($request){
        $user = auth()->user();
        $orders = $user->getOrders();
        $writer = WriterEntityFactory::createCSVWriter();
        $writer->openToBrowser("{$user->getName()}-order-history.csv");
        for($i = 0; $i < count($orders); $i++){
            $order = $orders[$i];
            $cell1 = "Order #".$order->getId();
            $cell2 = "Total Price: ".$order->getTotalPrice();
            $writer->addRow(WriterEntityFactory::createRowFromArray([$cell1, $cell2]));
            $cell1 = "Created At:";
            $cell2 = $order->getCreated_at();
            $cell3 = "Last Update At:";
            $cell4 = $order->getUpdated_at();
            $writer->addRow(WriterEntityFactory::createRowFromArray([$cell1, $cell2, $cell3, $cell4]));
            $writer->addRow(WriterEntityFactory::createRowFromArray(["ITEMS:"]));
            $items = $order->getFishOrders();
            $writer->addRow(WriterEntityFactory::createRowFromArray(["TYPE", "CUT/SIZE", "SPECIE", "QUANTITY", "ITEM PRICE"]));
            for($j = 0; $j < count($items); $j++){
                $item = $items[$j];
                if($item->getType() == "PET"){
                    $pet = $item->getPetFishes();
                    $writer->addRow(WriterEntityFactory::createRowFromArray([
                        "PET",
                        $pet->getSize(),
                        $pet->getSpecie()->getName(),
                        $item->getQuantityFish(),
                        '$'.$item->getTotalPrice()
                    ]));
                }
                elseif($item->getType() == "FOOD"){
                    $food = $item->getFoodFishes();
                    $writer->addRow(WriterEntityFactory::createRowFromArray([
                        "FOOD",
                        $food->getCut(),
                        $food->getSpecie()->getName(),
                        $item->getQuantityKG(),
                        '$'.$item->getTotalPrice()
                    ]));
                }
            }
            $writer->addRow(WriterEntityFactory::createRow([]));
            $writer->addRow(WriterEntityFactory::createRow([]));
        }
        $writer->close();
    }
}