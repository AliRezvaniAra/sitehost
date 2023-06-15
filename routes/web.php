<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sitehost.nz/1.0/dns/list_domains.json?apikey=d17261d51ff7046b760bd95b4ce781ac&client_id=293785',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
   /* $response=json_decode('{
  "return": [
    {
      "name": "example.com",
      "client_id": "1",
      "template_id": "0"
    },
    {
      "name": "example1.com",
      "client_id": "1",
      "template_id": "0"
    },
    {
      "name": "example2.com",
      "client_id": "1",
      "template_id": "0"
    }
  ],
  "msg": "Successful.",
  "status": true,
  "time": 10.91
}',true);*/
    return view('domains')->with("response",$response);
});
