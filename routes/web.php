<?php

use Illuminate\Support\Facades\Route;
use ThiccPan\Larashipcost\Larashipcost;
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

Route::get('/', function () {
    $testpackage = Larashipcost::testFunc();
    echo $testpackage;
});

Route::get('/provinsi', function () {
    $lokasi = new ProvinsiLocationBuilder;
    echo $lokasi->getAllProvinsi();
});

Route::get('/provinsi/{id}', function ($id) {
    $provinsi = new ProvinsiLocationBuilder;
    $provinsi->setId($id);
    echo $provinsi->getProvinsi();
});

// Route Get Provinsi pakai Enum
Route::get('/provinsiEnum', function () {
    $provinsi = new ProvinsiLocationBuilder;
    echo $provinsi->setIdFromEnum(Provinsi::BANTEN)->getProvinsi();
});

Route::get('/kota', function () {
    $lokasi = new KotaLocationBuilder;
    echo $lokasi->getAllKota();
});

Route::get('/kota/{id}', function ($id) {
    $kota = new KotaLocationBuilder;
    $kota->setId($id);
    echo $kota->getKota();
});

Route::get('/paket1', function () {
    $paket = new ShippingBuilder;
    echo $paket->setOrigin(501)
        ->setDestination(114)
        ->setWeight(1700)
        ->setCourier("jne")
        ->getShippingCost();
});

Route::get('/rajaongkir/provinsi/{id}', function ($id) {
    $rajaOProvinsi = new RajaOngkirLocationBuilder;
    $rajaOProvinsi->setId($id);
    echo $rajaOProvinsi->getProvinsi($id);
});

Route::get('/rajaongkir/provinsi/{id}', function ($id) {
    $rajaOngkir = new RajaOngkirProvider;
    $value = $rajaOngkir->setIdKota($id)
        ->setDestination(114)
        ->setWeight(1700)
        ->setCourier("jne")
        ->getShippingCost();

    var_dump(json_decode($value, true));
});

// route ratuongkir

Route::get('/ratuongkir/provinsi/', function () {
    $ratuOngkir = new RatuOngkirProvider;
    $value = $ratuOngkir->getAllProvinsi();
    var_dump(json_decode($value, true));
});

Route::get('/ratuongkir/provinsi/{idProv}', function ($idProv) {
    $ratuOngkir = new RatuOngkirProvider;
    $value = $ratuOngkir
        ->setIdProvinsi($idProv)
        ->getProvinsi();

    $output = json_decode($value, true);
    var_dump($output['provinsi']);
});

Route::get('/ratuongkir/provinsi/{idProv}/kota', function ($idProv) {
    $ratuOngkir = new RatuOngkirProvider;
    $value = $ratuOngkir->setIdProvinsi($idProv)
        ->getAllKota();
    $value = json_decode($value, true);

    var_dump($value['latitude']);
});

Route::get('/ratuongkir/provinsi/{idProv}/kota/{idKota}', function ($idProv, $idKota) {
    $ratuOngkir = new RatuOngkirProvider;
    $value = $ratuOngkir->setIdProvinsi($idProv)
        ->setIdKota($idKota)
        ->getKota();
        $value = json_decode($value, true);

        var_dump($value['latitude']);
});

Route::get('/ratuongkir/shipping/{idAsal}/{idTujuan}', function ($idAsal, $idTujuan)
{
    $ratuongkir = new RatuOngkirProvider;
    $value = $ratuongkir
    ->setIdKota($idAsal)
    ->setDestination($idTujuan)
    ->setWeight(10)
    ->getShippingCost();

    dd($value);
});
