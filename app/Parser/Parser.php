<?php

namespace App\Parser;

use App\Http\Controllers\Controller;
use App\Models\Offer;

class Parser extends Controller
{
    public function parse($route)
    {
        //truncate table
        Offer::query()->truncate();

        //parse the XML data
        $xmlFile = file_get_contents($route);
        $xmlObject = simplexml_load_string($xmlFile);
        $json = json_encode($xmlObject);
        $data = json_decode($json, true);

        //get the offer details
        $items = $data['offers']['offer'];
        foreach ($items as $item) {
            $offer['offer_id'] = $item['id'];
            $offer['mark'] = $item['mark'];
            $offer['model'] = $item['model'];
            if (is_array($item['generation'])) {
                $offer['generation'] = null;
            } else {
                $offer['generation'] = $item['generation'];
            };
            $offer['year'] = $item['year'];
            $offer['run'] = $item['run'];
            if (is_array($item['color'])) {
                $offer['color'] = null;
            } else {
                $offer['color'] = $item['color'];
            };
            $offer['body-type'] = $item['body-type'];
            $offer['engine-type'] = $item['engine-type'];
            $offer['transmission'] = $item['transmission'];
            $offer['gear-type'] = $item['gear-type'];
            if (is_array($item['generation_id'])) {
                $offer['generation_id'] = null;
            } else {
                $offer['generation_id'] = $item['generation_id'];
            };

            // insert into mysql table or update
            Offer::updateOrCreate(
                ['offer_id' => $offer['offer_id']],
                $offer
            );
        };
    }
};
