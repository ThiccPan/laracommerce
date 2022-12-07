<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hasil Perhitungan</title>
        <link rel="icon" href="{{url('/img/logo_square.png')}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/calculate.css')}}">
    </head>
    <body>
        <div class="con-base">
            <img src="{{url('/img/Logo.png')}}">
            <div class="con-details">
                <h1 class="title">Rincian</h1>
                <pre class="details">Berat       : <?php echo $weight ?> Kg</pre>
                <pre class="details">Asal         : <?php echo $value["rajaongkir"]['origin_details']["city_name"] ?>, <?php echo $value["rajaongkir"]['origin_details']["province"] ?></pre>
                <pre class="details">Tujuan    : <?php echo $value["rajaongkir"]['destination_details']["city_name"] ?>, <?php echo $value["rajaongkir"]['destination_details']["province"] ?> </pre>
                <pre class="details">Kurir        : <?php echo $value["rajaongkir"]["results"]["0"]["name"] ?> </pre>
                <pre class="details">Provider : Raja Ongkir</pre>
                <pre class="total" id="total">TOTAL <span>Rp. <?php echo number_format($value["rajaongkir"]["results"]["0"]["costs"]["0"]["cost"]["0"]["value"],2) ?></span></pre>
                <form action="/laracommerce">
                    <button>HITUNG LAGI</button>
                </form>
            </div>
        </div>
    </body>
</html>