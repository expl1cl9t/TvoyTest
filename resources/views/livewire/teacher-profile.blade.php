<div class="flex flex-col p-10 text-gray-900 text-2xl font-sans font-semibold items-center w-full overflow-y-scroll gap-6">
    <p>Профиль преподавателя</p>
    <div id="privateData">
        <div class="flex flex-row items-start justify-between mt-4 border-4 border-gray-700 p-5 rounded-2xl bg-slate-200">
            <img class="h-12 w-12 mr-2" src="{{asset('storage/images/teacher-dashboard/userplaceholder.png')}}" alt="">
            <div class="flex flex-col border-4 p-5 rounded-3xl">
                <p class="w-96 text-justify font-bold">{{auth()->user()->Name}} {{auth()->user()->Patronymic}} {{auth()->user()->Surname}}</p>
                <p class="m-2 w-96 text-justify font-light">{{auth()->user()->role->RoleName}}</p>
                <p class="w-96 font-sans font-base">Учреждение: {{auth()->user()->school->Name}}</p>
{{--                <p>Возраст: {{date_diff(date_create(date('Y-m-d')),date_create(auth()->user()->Birthday))->format('%y')}} лет</p>--}}
                <p>Создано {{$totalTests}} теста(ов) по следующим предметам:</p>
{{--                <p class="text-5xl">{{$avg}}</p>--}}
{{--                <ul class="pl-12">--}}
{{--                    @foreach($subjects as $subject)--}}
{{--                        <li class="list-disc">{{ \App\Models\Subject::find($subject)->SubjectName}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

                <ul class="p-4 list-disc">
                @foreach($testBySubjectAndUserFiltred as $deepSubject)
                    <li>
                        {{$deepSubject->SubjectName}}
                        <ul class="pl-4 list-disc" wire:key="{{$deepSubject->id}}">
                            @foreach($deepSubject->tests as $test)
                                <li wire:key="{{$test->id}}">Тема: {{mb_strtolower($test->Title)}}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <p>Статистика результатов тестирования</p>
{{--    {{dd($stats)}}--}}
    <div class="flex flex-col items-start gap-4" id="stats">
        @foreach($stats as $stat)
            <h1>{{$stat['groupInfo']->Name}}</h1>
            <table class="border-collapse border-4 border-gray-700 bg-slate-200">
                <thead class="border-b-2 border-gray-500">
                    <tr class="p-4">
                        <th class="border-r-4 border-gray-500">Название теста</th>
                        <th class="pl-3">Предмет</th>
                        <th>Среднее время прохождения</th>
                        <th>Средняя оценка</th>
                        <th>Всего прохождений теста</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stat['passedTests'] as $testInfo)
                        <tr>
                            <th class="border-r-4 border-gray-500">{{$testInfo['testInfo']->Title}}</th>
                            <th class="pl-3">{{$testInfo['testInfo']->subject->SubjectName}}</th>
                            <th>{{round($testInfo['avgPasstime'])}} секунд(ы)</th>
                            <th>{{round($testInfo['avgGrade'],1)}}</th>
                            <th>{{count($testInfo['totalPasses'])}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</div>
