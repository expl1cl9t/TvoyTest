<div class="flex flex-col items-center w-full h-full p-3 text-2xl overflow-y-scroll">
    <p class=" mb-5">Последние выполненные тесты</p>
    <div class="flex flex-col w-full h-full text-gray-900">
        <div class="grid grid-cols-2 items-center justify-center gap-8 min-w-0">
            @foreach($tests as $test)
                <div class="w-auto bg-slate-200 p-10 rounded-2xl shadow-2xl shadow-slate-700 active:animate-ping">
                    <div class="flex flex-row gap-6 items-center justify-between w-full">
                        <img class="h-12" src="{{asset('storage/images/teacher-dashboard/calendar.png')}}" alt="">
                        <data value="{{$test->created_at}}">{{date_format($test->created_at,'d M Y')}}</data>
                    </div>
                    <div class="flex flex-row items-center justify-between mt-4 border-4 border-gray-700 p-5 rounded-2xl">
                        <img class="h-12 w-12 mr-2" src="{{asset('storage/images/teacher-dashboard/testImage.png')}}" alt="">
                        <div class="flex flex-col">
                            <p class="w-96 text-justify font-bold">{{$test->test->Title}}</p>
                            <p class="m-2 w-96 text-justify font-light">{{$test->test->Description}}</p>
                            <p class="w-96 font-sans font-base">{{$test->test->subject->SubjectName}}</p>
                            <p>{{mb_substr($test->test->author->Name,0,1)}}. {{mb_substr($test->test->author->Patronymic,0,1)}}. {{$test->test->author->Surname}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row items-center justify-between mt-4 border-4 border-gray-700 p-5 rounded-2xl">
                        <img class="h-12 w-12 mr-2" src="{{asset('storage/images/teacher-dashboard/passedtest.png')}}" alt="">
                        <div class="flex flex-col">
                            <p class="w-96 text-justify font-bold">{{$test->user->Name}} {{$test->user->Surname}} - {{$test->user->group->Name}}</p>
                            <p class="m-2 w-96 text-justify font-light">Предварительная оценка: {{$test->Grade}}/5</p>
                            <p class="w-96 font-sans font-base">Потрачено времени на тест: {{$test->TimeSpent}} секунды</p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between pt-5 gap-3">
                        <button class="text-xl p-3 bg-blue-200 rounded-2xl">Отметить как проверенный</button>
                        <button class="text-xl p-3 bg-blue-200 rounded-2xl">Проверить углубенно</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div>

        </div>
    </div>
</div>
