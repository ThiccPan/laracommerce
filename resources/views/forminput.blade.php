<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laracommerce</title>
        <link rel="icon" href="{{url('/img/logo_square.png')}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/home.css')}}">
    </head>
    <body>
        <div class="con-base">
            <img src="{{url('/img/Logo.png')}}">
            <form class="con-form" id="form-laracommerce" action="/calculateRajaOngkir" method="POST">
                @csrf
                <label for="input-berat" class="label" id="berat">Berat (Dalam KG)</label><br>
                <input type="text" id="input-berat" name="weight" required>
                <div class="row-form">
                    <div class="item-form" id="item-left">
                        <label for="input" class="label">Asal</label><br>
                        <div class="con-opsi">
                            <input type="text" class="input" id="in-asal" placeholder="Kota, Provinsi" readonly required>
                            <input type="hidden" class="input" id="in-asal-hidden" readonly name="origin" required>
                            <div class="opsi" id="opsi-asal">
                                @foreach ($value1["rajaongkir"]["results"] as $item)
                                    <div onclick="showAsal('{{$item["city_id"]}}','{{$item["city_name"]}}')">{{ $item["city_name"]}}</div>
                                @endforeach
                            </div>
                            <div class="opsi" id="opsi-asal2">
                                @foreach ($value2 as $item)
                                    <div onclick="showAsal('{{$item["id"]}}','{{$item["kota"]}}')">{{ $item["kota"]}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="item-form" id="item-right">
                        <label for="input" class="label">Tujuan</label><br>
                        <div class="con-opsi">
                            <input type="text" class="input" id="in-tujuan" placeholder="Kota, Provinsi" readonly required>
                            <input type="hidden" class="input" id="in-tujuan-hidden" readonly name="destination" required>
                            <div class="opsi" id="opsi-tujuan">
                                @foreach ($value1["rajaongkir"]["results"] as $item)
                                    <div onclick="showTujuan('{{$item["city_id"]}}','{{$item["city_name"]}}')">{{ $item["city_name"]}}</div>
                                @endforeach
                            </div>
                            <div class="opsi" id="opsi-tujuan2">
                                @foreach ($value2 as $item)
                                    <div onclick="showTujuan('{{$item["id"]}}','{{$item["kota"]}}')">{{ $item["kota"]}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-form">
                    <div class="item-form" id="item-left">
                        <label for="input" class="label">Kurir</label><br>
                        <div class="con-opsi">
                            <input type="text" class="input" id="in-kurir" placeholder="Nama Kurir" readonly name="courier" required>
                            <div class="opsi" id="opsi-kurir">
                                <div onclick="showKurir('jne')">JNE</div>
                                <div onclick="showKurir('tiki')">TIKI</div>
                                <div onclick="showKurir('pos')">Pos Indonesia</div>
                            </div>
                            <div class="opsi" id="opsi-kurir2">
                                <div onclick="showKurir('jne')">JNE</div>
                                <div onclick="showKurir('tiki')">TIKI</div>
                            </div>
                        </div>
                    </div>
                    <div class="item-form" id="item-right">
                        <label for="input" class="label">Provider</label><br>
                        <div class="con-opsi">
                            <input type="text" class="input" id="in-provider" placeholder="Nama Provider" readonly name="provider" required>
                            <div class="opsi" id="opsi-provider">
                                <div onclick="showProvider('Raja Ongkir')">Raja Ongkir</div>
                                <div onclick="showProvider('Ratu Ongkir')">Ratu Ongkir</div>
                            </div>
                        </div>
                    </div>
                </div>
                <button>HITUNG</button>
            </form>
        </div>
        <script>
            function showAsal(id, nama){
                document.querySelector('#in-asal').value=nama;
                document.querySelector('#in-asal-hidden').value=id;
            }
            function showTujuan(id, nama){
                document.querySelector('#in-tujuan').value=nama;
                document.querySelector('#in-tujuan-hidden').value=id;
            }
            function showKurir(anything){
                document.querySelector('#in-kurir').value=anything;
            }
            function showProvider(anything){
                document.querySelector('#in-provider').value=anything
                if(anything=='Raja Ongkir'){
                    document.querySelector('#form-laracommerce').action="/calculateRajaOngkir";
                    document.querySelector('#opsi-asal').style.visibility= "visible";
                    document.querySelector('#opsi-asal2').style.visibility = "hidden";
                    document.querySelector('#opsi-tujuan').style.visibility= "visible";
                    document.querySelector('#opsi-tujuan2').style.visibility = "hidden";
                    document.querySelector('#opsi-kurir').style.visibility= "visible";
                    document.querySelector('#opsi-kurir2').style.visibility = "hidden";
                }
                else if(anything=="Ratu Ongkir"){
                    document.querySelector('#form-laracommerce').action="/calculateRatuOngkir";
                    document.querySelector('#opsi-asal').style.visibility= "hidden";
                    document.querySelector('#opsi-asal2').style.visibility = "visible";
                    document.querySelector('#opsi-tujuan').style.visibility= "hidden";
                    document.querySelector('#opsi-tujuan2').style.visibility = "visible";
                    document.querySelector('#opsi-kurir').style.visibility= "hidden";
                    document.querySelector('#opsi-kurir2').style.visibility = "visible";
                };
            }
        </script>
    </body>
</html>