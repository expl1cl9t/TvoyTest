<x-auth-reg-layout title="Регистрация">
    @if(session()->has('message'))
        <script type="module">
            import {displayErrorMessage} from "{{Vite::asset('resources/js/app.js')}}";

            console.log('ошибка');
            displayErrorMessage('{{session('message')}}');
        </script>
    @endif
    @if(session()->has('success'))
            <script type="module">
                import {displaySuccesRegisterMessage} from "{{Vite::asset('resources/js/app.js')}}";
                displaySuccesRegisterMessage('text', '{{route('auth')}}')
            </script>
    @endif
    <div class="flex w-full h-screen bg-slate-600 justify-center items-center flex-col">
        <h2 class="text-2xl mb-5 font-semibold leading-7 text-white">Регистрация</h2>
        <div class="w-1/3 h-auto p-10 bg-white rounded-2xl">
            <form method="POST" action="{{route('regUser')}}" class="flex flex-col" id="regForm" name="regForm">
                @csrf
                <h2 class="text-base font-semibold leading-7 text-gray-900">Создать новый профиль</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">После создания профиля ваши данные проверит
                    администратора,
                    после чего вы сможете использовать ресурс.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Имя</label>
                        <div class="mt-2">
                            <input name="name" type="text" id="first-name" autocomplete="name" value="{{old('name')}}"
                                   class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('name')
                            <p class="text-red-500 w-full leading-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Фамилия</label>
                        <div class="mt-2">
                            <input name="surname" type="text" id="last-name" autocomplete="surname" value="{{old('surname')}}"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('surname')
                            <p class="text-red-500 w-full leading-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name"
                               class="block text-sm font-medium leading-6 text-gray-900">Отчество</label>
                        <div class="mt-2">
                            <input name="fname" type="text" id="last-name" autocomplete="patronymic" value="{{old('fname')}}"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('fname')
                            <p class="text-red-500 w-full leading-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="birthday"
                               class="block text-sm font-medium leading-6 text-gray-900">Дата рождения</label>
                        <div class="mt-2">
                            <input name="birthday" type="date" id="last-name" autocomplete="birthday" value="{{old('birthday')}}"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('birthday')
                            <p class="text-red-500 w-full leading-6">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

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

                    <div class="sm:col-span-4">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Я преподователь
                            или обучающийся?</label>
                        <div class="mt-2">
                            <select name="role"
                                    class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="1">Преподаватель</option>
                                <option value="2">Обучающийся</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                        <div class="mt-2">
                            <input name="password" type="password" id="last-name" autocomplete="family-name"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Повторите
                            пароль</label>
                        <div class="mt-2">
                            <input name="password_confirmation" type="password" id="last-name"
                                   autocomplete="family-name"
                                   class=" pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        @error('password')
                        <p class="text-red-500 w-full leading-6">{{$message}}</p>
                        @enderror
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Школа</label>
                        <div class="mt-2">
                            <select name="school"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 ">
                                @foreach(\App\Models\School::all() as $school)
                                    <option value="{{$school->id}}">{{$school->Name}}, {{$school->City}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Сохранить
                    </button>
                </div>
            </form>
            <button id="alreadyHasAccountButton"
                    class="absolute right-0 bottom-0 rounded-md bg-slate-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 mt-5 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                У меня уже есть аккаунт
            </button>
        </div>
    </div>
        <script>
            document.querySelector('#alreadyHasAccountButton').addEventListener('click', ()=>{
                window.location.href = '{{route('auth')}}';
            });
        </script>
</x-auth-reg-layout>
