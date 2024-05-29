<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тотальная блокировка</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="flex w-full h-screen bg-slate-600 justify-center items-center flex-col">
        <div class="w-1/3 h-auto p-10 bg-white rounded-2xl">
            <h1 class="text-3xl text-red-500 font-semibold">Вы были заблокированы в системе</h1>
            <p class="text-xl text-slate-500 font-semibold">Для разблокировки аккаунта свяжитесь с администратором (<a
                    class="underline underline-offset-2" href="mailto:{{\App\Models\User::where('role_id',1)->first()->Email}}">{{\App\Models\User::where('role_id',1)->first()->Email}}</a>).</p>
            <p>Либо переведите 200 рублей по номеру телефона <a href="tel:+79181980834">+79181980834</a><span class="text-green-300 font-medium"> (Сбербанк)</span></p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Y9m2J4JrHfs?si=p1fjWDsFbMSm8NyQ?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</body>
</html>
