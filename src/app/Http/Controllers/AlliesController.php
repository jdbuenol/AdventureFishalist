<?php
//AUTHOR: Julian David Bueno
namespace App\Http\Controllers;

class AlliesController{

    function show(){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://www.teismobilestore.tk/public/api/mobiles');
        $body = json_decode($response->getBody())->data;
        $body[0]->imageUrl = "https://m.media-amazon.com/images/I/61kt+kewE2L._AC_SX569_.jpg";
        $body[1]->imageUrl = "http://www.vicionet.com/Vel/418-large_default/apple-iphone-11-128gb-.jpg";
        $body[2]->imageUrl = "https://www.alkosto.com/medias/840023222511-001-750Wx750H?context=bWFzdGVyfGltYWdlc3wxODg4MzF8aW1hZ2UvanBlZ3xpbWFnZXMvaGRmL2hhMy8xMTAwMDU4MDA0Njg3OC5qcGd8ODk3OTVhOTkzZWM0NTA0Y2UyNzA2OWY1ZTBhOWJhYjI5M2Y5NDU3ZGJkNzFjNmU5MTc0YjY1ZDY4YmYyYmUwOA";
        $body[3]->imageUrl = "https://micelu.co/wp-content/uploads/2021/11/Samsung-A22-menta-600x600-1.jpeg";
        return view('allies.show')
        ->with('viewData', ['body' => $body]);
    }
}