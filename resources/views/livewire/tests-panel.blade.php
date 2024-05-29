<div class="flex h-full w-full flex-col items-start overflow-y-scroll">
    <div class="flex flex-row gap-6 justify-center w-full p-10">
        <button wire:click="changeToAvailableTests" class="text-red-50 dark:bg-slate-300 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold dark:text-gray-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Доступные тесты</button>
        <button wire:click="changeToPassedTests" class="text-red-50 dark:bg-slate-300 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold dark:text-gray-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Пройденные тесты</button>
    </div>
    <div class="flex flex-row gap-6 justify-between w-full p-24">
        <div>
            @if(count($tests) == 0)
                <p class="text-xl font-semibold leading-7 text-gray-900">Для вас нет доступных тестов</p>
            @else
                <div class="grid grid-cols-2 gap-6 ">
                @foreach($tests as $test)
                    <div wire:key="{{$test->id}}" class="flex flex-row p-5 justify-start items-start bg-red-200 h-full w-96 dark:bg-green-400 border-8 rounded-3xl gap-6">
                        <div class="flex flex-col justify-between pt-2">
                            <div class="rounded-3xl bg-black w-26 h-26">ТЕСТ</div>
                        </div>
                        <div class="flex flex-col p-8 gap-6 font-medium font-sans text-gray-900 rounded-2xl dark:bg-green-200">
                            <p>Название теста: {{mb_strtolower($test->Title)}}</p>
                            <p>Описание теста:</p>
                            <p>{{$test->Description}}</p>
                            <p>Время на выполнение: {{floor($test->TimeToComplete / 60)}} минут{{floor($test->TimeToComplete / 6 % 10) > 5 ? '' : 'ы'}} {{$test->TimeToComplete % 60}} секунд</p>
                            <div class="flex flex-col items-start gap-6 justify-center align-center">
                                <p>Предмет: {{mb_strtolower($test->subject->SubjectName)}}</p>
                                <p>Автор теста: <br> {{mb_substr($test->author->Name,0,1)}}. {{mb_substr($test->author->Patronymic,0,1)}}. {{$test->author->Surname}}</p>
                            </div>
                            <button
                                class="text-red-50 mt-5 dark:bg-slate-300 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold dark:text-gray-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >Перейти на страницу теста</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="bg-blue-100 h-auto w-1/4 p-10 gap-4 text-xl font-semibold leading-7 text-gray-900 rounded-3xl absolute right-10 top-1/4">
            <p>Фильтры</p>
            @foreach(\App\Models\Subject::all() as $subject)
                <div class="flex flex-row items-center text-base rounded-xl p-4 bg-cyan-100 mt-2">
                    <div class="mr-2">
                        <input type="checkbox" wire:model="subjectFilter" value="{{$subject->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <label for="last-name" class=" block text-xl font-medium leading-6 text-gray-900">{{$subject->SubjectName}}</label>
                </div>
            @endforeach
            <button wire:click="applyFilters"
                class="text-red-50 mt-5 dark:bg-slate-300 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold dark:text-gray-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >Применить</button>
        </div>
    </div>
</div>
