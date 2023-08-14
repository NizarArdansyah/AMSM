<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen w-screen bg-red-200">
        <div class="flex flex-col items-center justify-center h-full w-full">
            <h1 class="text-5xl font-bold text-slate-900">
                403 | Unauthorized
            </h1>
            <p class="text-xl text-slate-900 mt-8 text-center">
                Kami mendeteksi anda bukan warga desa <span class="text-blue-700">PODOSARI</span> <br>
                Silahkan hubungi admin untuk melakukan verifikasi data lebih lanjut.
            </p>

            <div class="flex gap-3 mt-4">
                <a class="px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white duration-300 transition-all bg-green-400" href="mailto:admin@podosari.kesesi.pekalongankab.go.id">Email Admin</a>
                <a class="px-4 py-2 rounded-lg hover:bg-yellow-600 hover:text-white duration-300 transition-all bg-yellow-400" href="https://wa.me/6282223120273">Whatsapp Admin</a>
            </div>

            <div class="mt-8">
                <a class="px-4 py-2 rounded-lg bg-red-400 text-white hover:bg-red-600 hover:text-white duration-300 transition-all " href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>