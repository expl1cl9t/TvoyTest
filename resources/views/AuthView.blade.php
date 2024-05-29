<x-auth-reg-layout title="Авторизация | Промежуточное тестирование">
    @if(session()->has('message'))
        <script type="module">
            import {displayErrorMessage} from "{{Vite::asset('resources/js/app.js')}}";

            displayErrorMessage('{{session('message')}}')
        </script>
    @endif
    <div class="flex w-full h-screen bg-slate-600 justify-center items-center flex-col">
        <h2 class="text-2xl mb-5 font-semibold leading-7 text-white">Авторизация</h2>
        <div class="w-1/3 h-auto p-10 bg-white rounded-2xl">
            <form method="POST" action="{{route('authUser')}}" class="flex flex-col" id="regForm" name="regForm">
                @csrf
                <h2 class="text-base font-semibold leading-7 text-gray-900">Войти в существующий профиль</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">После авторизации вы сможете использовать веб-ресурс, если администратор ранее проверил ваш аккаунт</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Электронная
                            почта</label>
                        <div class="mt-2">
                            <input name="email" id="email" type="email" autocomplete="email" value="{{old('email')}}"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('email')
                            <p class="text-red-500 w-full leading-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                        <div class="mt-2">
                            <input name="password" type="password" id="last-name" autocomplete="family-name"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                </div>
                <div class="flex flex-row items-center text-base">
                    <div class="mr-2">
                        <input type="checkbox" name="remember" id="">
                    </div>
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Запомнить меня</label>
                </div>
                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Сохранить
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-auth-reg-layout>
