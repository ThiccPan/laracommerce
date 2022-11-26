<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        .container-utama {
            height: 100vh;
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="container-utama flex items-center justify-center">
        <div class="bg-slate-300 w-9/12 p-5">
            <h1 class="font-bold text-center text-2xl mb-5">Input Data</h1>
            
            <form action="/calculate" method="POST">
                @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="weight" class="block text-sm font-medium text-gray-700">Berat Barang</label>
                  <input type="text" name="weight" id="weight" class="mt-1 block w-full rounded-md border-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="courier" class="block text-sm font-medium text-gray-700">Kurir</label>
                  <select id="courier" name="courier" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                  </select>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="origin`" class="block text-sm font-medium text-gray-700">Asal</label>
                    <select id="origin`" name="origin" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                      @foreach ($value["rajaongkir"]["results"] as $item)
                          <option value="{{ $item["city_id"] }}">{{ $item["city_name"] }}</option>
                      @endforeach
                    </select>
                  </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="destination" class="block text-sm font-medium text-gray-700">Tujuan</label>
                  <select id="destination" name="destination" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    @foreach ($value["rajaongkir"]["results"] as $item)
                        <option value="{{ $item["city_id"] }}">{{ $item["city_name"] }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>