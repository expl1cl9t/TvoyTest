<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<div style="background-image: url('{{asset('storage/images/teacher-dashboard/background.jpg')}}')" class="bg-fixed bg-origin-content bg-clip-border h-screen w-full flex flex-row text-red-50">
    <div class="hidden md:inline-block h-full w-1/4 dark:bg-slate-300 bg-cyan-100 border-s-8 flex-col relative resize-x overflow-x-hidden max-w-96">
        <div>
            <div class="p-2 w-full h-32 text-left text-3xl font-semibold leading-7 text-gray-900 justify-self-start border-b-amber-400">
                <p>{{auth()->user()->Name}} {{auth()->user()->Surname}}</p>
                <p>Возраст: {{date_diff(date_create(date('Y-m-d')),date_create(auth()->user()->Birthday))->format('%y')}} лет</p>
                <p class="{{auth()->user()->status->id == 2 ? 'text-green-600' : 'text-red-600'}} {{auth()->user()->status->id == 2 ? 'shadow-green-600' : 'shadow-red-600'}} shadow-2xl mt-5 p-1 rounded-2xl bg-slate-700 pb-3 text-center">{{auth()->user()->status->StatusName}}</p>
            </div>
        </div>

        <div class="p-2 mt-10 w-full h-32 text-left text-xl font-semibold leading-7 text-gray-900 justify-self-start">
            <h2>Данные о учебном заведении: </h2>
            <p>Название: {{auth()->user()->school->Name}}</p>
            <p>Населенный пункт: {{auth()->user()->school->City}}</p>
        </div>

        @if(auth()->user()->role->id == 1)
            <div>
                <div class="p-2 w-full h-32 text-left text-xl font-semibold leading-7 text-gray-900 justify-self-start">
                    <p>Вы авторизованы как преподователь</p>
                </div>
            </div>
        @else
            <div>
                <div class="p-2 w-full h-32 text-left text-xl font-semibold leading-7 text-gray-900 justify-self-start">
                    <p>Вы авторизованы как обучающийся</p>
                </div>
            </div>
        @endif

        <div class="absolute bottom-0 left-0">
            <a href="{{route('profile')}}"><div class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200" id="profileButton">
                    <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.6666 14V12.6667C12.6666 11.9594 12.3857 11.2811 11.8856 10.781C11.3855 10.281 10.7072 10 9.99998 10H5.99998C5.29274 10 4.61446 10.281 4.11436 10.781C3.61426 11.2811 3.33331 11.9594 3.33331 12.6667V14"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M7.99998 7.33333C9.47274 7.33333 10.6666 6.13943 10.6666 4.66667C10.6666 3.19391 9.47274 2 7.99998 2C6.52722 2 5.33331 3.19391 5.33331 4.66667C5.33331 6.13943 6.52722 7.33333 7.99998 7.33333Z"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-2xl font-semibold leading-7 text-gray-900">Профиль</p>
                </div></a>
            <div class="flex flex-col w-full items-center">
                <div id="allTestsButton" class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200">
                    <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.6666 14V12.6667C10.6666 11.9594 10.3857 11.2811 9.8856 10.781C9.3855 10.281 8.70722 10 7.99998 10H3.99998C3.29274 10 2.61446 10.281 2.11436 10.781C1.61426 11.2811 1.33331 11.9594 1.33331 12.6667V14"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M5.99998 7.33333C7.47274 7.33333 8.66665 6.13943 8.66665 4.66667C8.66665 3.19391 7.47274 2 5.99998 2C4.52722 2 3.33331 3.19391 3.33331 4.66667C3.33331 6.13943 4.52722 7.33333 5.99998 7.33333Z"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M14.6667 14V12.6667C14.6662 12.0758 14.4696 11.5019 14.1076 11.0349C13.7456 10.5679 13.2388 10.2344 12.6667 10.0867"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M10.6667 2.08667C11.2403 2.23354 11.7487 2.56714 12.1118 3.03488C12.4748 3.50262 12.6719 4.07789 12.6719 4.67C12.6719 5.26212 12.4748 5.83739 12.1118 6.30513C11.7487 6.77287 11.2403 7.10647 10.6667 7.25334"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-2xl font-semibold leading-7 text-gray-900">Все тесты</p>
                </div>
                <div id="stats" class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200">
                    <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.3333 3.33331H2.66665C1.93027 3.33331 1.33331 3.93027 1.33331 4.66665V11.3333C1.33331 12.0697 1.93027 12.6666 2.66665 12.6666H13.3333C14.0697 12.6666 14.6666 12.0697 14.6666 11.3333V4.66665C14.6666 3.93027 14.0697 3.33331 13.3333 3.33331Z"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1.33331 6.66669H14.6666" stroke="#334155" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <p class="text-2xl font-semibold leading-7 text-gray-900">Статистика</p>
                </div>
            </div>
            @if(auth()->user()->role->id == 1)
                <a href="{{route('createTest')}}"><div id="createTest" class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200">
                        <svg class="w-12 h-12" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>plus-circle</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -1087.000000)" fill="#000000"> <path d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z" id="plus-circle" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                        <p class="text-2xl font-semibold leading-7 text-gray-900">Создать тест</p>
                    </div></a>
            @endif
            <div class="flex flex-col w-full items-center">
                <div class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200" id="logout">
                    <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667V3.33333C2 2.97971 2.14048 2.64057 2.39052 2.39052C2.64057 2.14048 2.97971 2 3.33333 2H6"
                            stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.6667 11.3333L14 7.99996L10.6667 4.66663" stroke="#334155" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 8H6" stroke="black" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <p class="text-2xl font-semibold leading-7 text-gray-900">Выйти из аккаунта</p>
                </div>
                <div class="flex flex-row w-full items-center gap-4 hover:border-s-8 border-sky-200" id="preferences">
                    <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_59_627)">
                            <path
                                d="M8.14667 1.33337H7.85333C7.49971 1.33337 7.16057 1.47385 6.91053 1.7239C6.66048 1.97395 6.52 2.31309 6.52 2.66671V2.78671C6.51976 3.02052 6.45804 3.25017 6.34103 3.4526C6.22401 3.65503 6.05583 3.82313 5.85333 3.94004L5.56667 4.10671C5.36398 4.22373 5.13405 4.28534 4.9 4.28534C4.66595 4.28534 4.43603 4.22373 4.23333 4.10671L4.13333 4.05337C3.82738 3.87688 3.46389 3.829 3.12267 3.92025C2.78145 4.01149 2.49037 4.2344 2.31333 4.54004L2.16667 4.79337C1.99018 5.09933 1.9423 5.46282 2.03354 5.80404C2.12478 6.14526 2.34769 6.43634 2.65333 6.61337L2.75333 6.68004C2.95485 6.79638 3.12241 6.96343 3.23937 7.16459C3.35632 7.36576 3.4186 7.59402 3.42 7.82671V8.16671C3.42093 8.40165 3.35977 8.63268 3.2427 8.83638C3.12563 9.04008 2.95681 9.20924 2.75333 9.32671L2.65333 9.38671C2.34769 9.56374 2.12478 9.85482 2.03354 10.196C1.9423 10.5373 1.99018 10.9008 2.16667 11.2067L2.31333 11.46C2.49037 11.7657 2.78145 11.9886 3.12267 12.0798C3.46389 12.1711 3.82738 12.1232 4.13333 11.9467L4.23333 11.8934C4.43603 11.7763 4.66595 11.7147 4.9 11.7147C5.13405 11.7147 5.36398 11.7763 5.56667 11.8934L5.85333 12.06C6.05583 12.1769 6.22401 12.3451 6.34103 12.5475C6.45804 12.7499 6.51976 12.9796 6.52 13.2134V13.3334C6.52 13.687 6.66048 14.0261 6.91053 14.2762C7.16057 14.5262 7.49971 14.6667 7.85333 14.6667H8.14667C8.50029 14.6667 8.83943 14.5262 9.08948 14.2762C9.33952 14.0261 9.48 13.687 9.48 13.3334V13.2134C9.48024 12.9796 9.54196 12.7499 9.65898 12.5475C9.77599 12.3451 9.94418 12.1769 10.1467 12.06L10.4333 11.8934C10.636 11.7763 10.866 11.7147 11.1 11.7147C11.334 11.7147 11.564 11.7763 11.7667 11.8934L11.8667 11.9467C12.1726 12.1232 12.5361 12.1711 12.8773 12.0798C13.2186 11.9886 13.5096 11.7657 13.6867 11.46L13.8333 11.2C14.0098 10.8941 14.0577 10.5306 13.9665 10.1894C13.8752 9.84815 13.6523 9.55707 13.3467 9.38004L13.2467 9.32671C13.0432 9.20924 12.8744 9.04008 12.7573 8.83638C12.6402 8.63268 12.5791 8.40165 12.58 8.16671V7.83337C12.5791 7.59843 12.6402 7.36741 12.7573 7.1637C12.8744 6.96 13.0432 6.79085 13.2467 6.67337L13.3467 6.61337C13.6523 6.43634 13.8752 6.14526 13.9665 5.80404C14.0577 5.46282 14.0098 5.09933 13.8333 4.79337L13.6867 4.54004C13.5096 4.2344 13.2186 4.01149 12.8773 3.92025C12.5361 3.829 12.1726 3.87688 11.8667 4.05337L11.7667 4.10671C11.564 4.22373 11.334 4.28534 11.1 4.28534C10.866 4.28534 10.636 4.22373 10.4333 4.10671L10.1467 3.94004C9.94418 3.82313 9.77599 3.65503 9.65898 3.4526C9.54196 3.25017 9.48024 3.02052 9.48 2.78671V2.66671C9.48 2.31309 9.33952 1.97395 9.08948 1.7239C8.83943 1.47385 8.50029 1.33337 8.14667 1.33337Z"
                                stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path
                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                stroke="#334155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_59_627">
                                <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-2xl font-semibold leading-7 text-gray-900">Настройки</p>
                </div>
            </div>
        </div>

    </div>
 {{$slot}}
</div>
</body>
</html>
