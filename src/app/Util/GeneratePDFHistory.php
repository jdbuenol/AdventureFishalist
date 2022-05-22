<?php

namespace App\Util;

use App\Interfaces\GenerateHistory;

class GeneratePDFHistory implements GenerateHistory{
    public function generateHistory($request){
        $user = auth()->user();
        $orders = $user->getOrders();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<style>
        table, th, td {
            border: 1px solid;
        }
        </style>');
        $mpdf->WriteHTML('<h1>'.$user->getName().'\'s orders history</h1>');
        for($i = 0; $i < count($orders); $i++){
            $order = $orders[$i];
            $mpdf->WriteHTML('<p><b>Order</b> #'.$order->getId().' <b>Total Price: </b>$'.$order->getTotalPrice().'</p>');
            $mpdf->WriteHTML('<p><b>Created At: </b>'.$order->getCreated_at().' <b>Last Update At: </b>'.$order->getUpdated_at().'</p>');
            $mpdf->WriteHTML('<h2>Items:</h2>');
            $items = $order->getFishOrders();
            $mpdf->WriteHTML('<table>
            <tr>
            <th>TYPE</th>
            <th>CUT&frasl;SIZE</th>
            <th>SPECIE</th>
            <th>QUANTITY</th>
            <th>TOTAL PRICE</th>
            </tr>');
            for($j = 0; $j < count($items); $j++){
                $item = $items[$j];
                $type = $item->getType();
                if($type == "PET"){
                    $pet = $item->getPetFishes();
                    $mpdf->WriteHTML("<tr>
                    <td>PET</td>
                    <td>{$pet->getSize()}</td>
                    <td>{$pet->getSpecie()->getName()}</td>
                    <td>{$item->getQuantityFish()}</td>
                    <td>{$item->getTotalPrice()}</td>
                    </tr>");
                }
                else if($type == "FOOD"){
                    $food = $item->getFoodFishes();
                    $mpdf->writeHTML("<tr>
                    <td>FOOD</td>
                    <td>{$food->getCut()}</td>
                    <td>{$food->getSpecie()->getName()}</td>
                    <td>{$item->getQuantityKG()}</td>
                    <td>{$item->getTotalPrice()}</td>
                    </tr>");
                }
            }
            $mpdf->WriteHTML('</table>');
            if($i < count($orders) - 1){
                $mpdf->WriteHTML('<hr>');
            }
        }
        $mpdf->Output();
    }
}