<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KmController extends Controller
{
    //
    public function add_km(Request $request, User2 $user){
        if($request->input('street') && $request->input('house') && $request->input('zip_code')&& $request->input('city')){
            $address = ''.$request->input('street') .' '.$request->input('house').' ,'.$request->input('zip_code').' , '. $request->input('city').' Warszawa, '.$request->input('city')?$request->input('city'): 'Polska';// Replace with your address
            $key = env('API_KEY');; // Replace with your Google Maps API key

            $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $key);

            $data = $response->json();
            dump('here');
            dump($data);
            if ($data['status'] != 'OK') {
                throw new Exception('Error from Google Maps API: ' . $data['status']);
            }

            $location = $data['results'][0]['geometry']['location'];

            $latitude = $location['lat'];
            $longitude = $location['lng'];

           dump("Latitude: $latitude, Longitude: $longitude");
            $team = $request->input('team');
            $stadiums = config('stadiums');
            $response2='';
            if ($team == 'Lech') {
                $addressNew = $stadiums['Lech'];

                $response2 = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($addressNew) . "&key=" . $key);

            } else if ($team == 'Widzew') {
                $addressNew = $stadiums['Widzew'];
                $response2 = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($addressNew) . "&key=" . $key);
            } else {
                return response()->json(['message' => 'Team not found']);
            }


            $latitude2 = $response2['results'][0]['geometry']['location']['lat'];
            $longitude2 = $response2['results'][0]['geometry']['location']['lng'];
            $distance = $this->getDistance($latitude, $longitude, $latitude2, $longitude2);
            $user->km+=$distance;
            $user->save();
            return response()->json(['km'=>$user->km]);
        }
        else{
            return response()->json([
                'message' => 'Invalid input',

            ], 422);
        }



    }
    function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;
    }

}
