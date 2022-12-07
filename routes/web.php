<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use NunoMaduro\Collision\Provider;
use ThiccPan\Larashipcost\Larashipcost;
use ThiccPan\Larashipcost\ProviderBuilder;
use ThiccPan\Larashipcost\ProvinsiLocationBuilder;
use ThiccPan\Larashipcost\KotaLocationBuilder;
use ThiccPan\Larashipcost\Provinsi;
use ThiccPan\Larashipcost\ShippingBuilder;
use ThiccPan\Larashipcost\RajaOngkirProvider;
use ThiccPan\Larashipcost\RatuOngkirProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/rajaongkir/provinsi/{id}', function ($id) {
//     $rajaOngkir = new RajaOngkirProvider;
//     $value = $rajaOngkir->setIdKota($id)
//         ->setDestination(114)
//         ->setWeight(1700)
//         ->setCourier("jne")
//         ->getShippingCost();

//     var_dump(json_decode($value, true));
// });

// Route::get('/rajaongkir/provinsi', function () {
//     $rajaOngkir = new RajaOngkirProvider;
//     $value = $rajaOngkir->getProvinsi();
//     $value = json_decode($value, true);

//     // var_dump(json_decode($value, true));
//     return view('form', [
//         'value' => $value 
//     ]);
// });

// Route::get('/kotak', function() {
//     $rajaOngkir = new RajaOngkirProvider;
//     $value = $rajaOngkir->getKota();
//     $value = json_decode($value, true);
//     return view('form', [
//         'value' => $value 
//     ]);
// });

// // route ratuongkir

// Route::get('/ratuongkir/provinsi/', function () {
//     $ratuOngkir = new RatuOngkirProvider;
//     $value = $ratuOngkir->getAllProvinsi();
//     var_dump(json_decode($value, true));
// });

// Route::get('/ratuongkir/provinsi/{idProv}', function ($idProv) {
//     $ratuOngkir = new RatuOngkirProvider;
//     $value = $ratuOngkir
//         ->setIdProvinsi($idProv)
//         ->getProvinsi();

//     $output = json_decode($value, true);
//     var_dump($output['provinsi']);
// });

// Route::get('/ratuongkir/provinsi/{idProv}/kota', function ($idProv) {
//     $ratuOngkir = new RatuOngkirProvider;
//     $value = $ratuOngkir->setIdProvinsi($idProv)
//         ->getAllKota();
//     $value = json_decode($value, true);

//     var_dump($value['latitude']);
// });

// Route::get('/ratuongkir/provinsi/{idProv}/kota/{idKota}', function ($idProv, $idKota) {
//     $ratuOngkir = new RatuOngkirProvider;
//     $value = $ratuOngkir->setIdProvinsi($idProv)
//         ->setIdKota($idKota)
//         ->getKota();
//         $value = json_decode($value, true);

//         var_dump($value['latitude']);
// });

// Route::get('/ratuongkir/shipping/{idAsal}/{idTujuan}', function ($idAsal, $idTujuan)
// {
//     $ratuongkir = new RatuOngkirProvider;
//     $value = $ratuongkir
//     ->setIdKota($idAsal)
//     ->setDestination($idTujuan)
//     ->setWeight(10)
//     ->getShippingCost();

//     var_dump($value);
// });


// Route Utama

Route::get('/laracommerce', function () {
    $provider = new ProviderBuilder;
    $rajaOngkir = $provider->build('rajaongkir');
    $valueRaja = $rajaOngkir->getKota();
    $valueRaja = json_decode($valueRaja, true);

    $provider2= new ProviderBuilder;
    $ratuOngkir = $provider2->build('ratuongkir');
    $valueRatu = $ratuOngkir->getAllKota();
    $valueRatu = json_decode($valueRatu, true);

    // return view('forminput', ['value1' => $valueRaja]);
    return view('forminput', ['value1' => $valueRaja, 'value2' => $valueRatu ]);
});

Route::post('/calculateRatuOngkir', function(Request $req) {
    $weight = $req->input('weight');
    $courier = $req->input('courier');
    $origin = $req->input('origin');
    $destination = $req->input('destination');
    $ratuongkir = new RatuOngkirProvider(null, $origin, $destination, $weight, $courier);
    $value = $ratuongkir->getShippingCost();

    return view('outputratu', ['value' => $value,'weight'=> $weight, 'origin'=> $origin, 'destination'=> $destination, 'courier'=>$courier ]);
});

Route::post('/calculateRajaOngkir', function(Request $req) {
    $weight = $req->input('weight');
    $courier = $req->input('courier');
    $origin = $req->input('origin');
    $destination = $req->input('destination');
    $rajaOngkir = new RajaOngkirProvider(null, $origin, $destination, $weight, $courier);
    $value = $rajaOngkir->getShippingCost();
    $value=json_decode($value, true);
    return view('outputraja', ['value' => $value,'weight'=> $weight]);
});
   