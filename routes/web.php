<?php

use Illuminate\Support\Facades\Route;
use ThiccPan\Larashipcost\Larashipcost;
use ThiccPan\Larashipcost\ProvinsiLocationBuilder;
use ThiccPan\Larashipcost\KotaLocationBuilder;

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

Route::get('/provinsi', function ()
{
    $lokasi = new ProvinsiLocationBuilder;
    echo $lokasi->getAllProvinsi();
});

Route::get('/provinsi/{id}', function ($id)
{
    $provinsi = new ProvinsiLocationBuilder;
    $provinsi->setId($id);
    echo $provinsi->getProvinsi();
    
});

Route::get('/kota', function ()
{
    $lokasi = new KotaLocationBuilder;
    echo $lokasi->getAllKota();
});

Route::get('/kota/{id}', function ($id)
{
    $kota = new KotaLocationBuilder;
    $kota->setId($id);
    echo $kota->getKota();
    
});

Route::get('/kota/{id}', function ($id)
{
    $kota = new KotaLocationBuilder;
    $kota->setId($id);
    echo $kota->getKota();
    
});
