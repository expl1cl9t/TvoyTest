<div class="flex flex-col font-2xl text-gray-600 items-center w-full p-5 gap-6">
    <p class="text-2xl font-bold font-serif">Создание теста</p>
    <div id="initialData" class="bg-gray-700 border-gray-900 text-slate-200 w-full rounded-2xl overflow-y-scroll">
        <div class="flex flex-col w-full text-2xl text-left p-12 gap-6">
            <div>
                <p>Основные данные теста</p>
                <p class="text-sm text-left font-light font-sans">Все поля обязательны для ввода</p>
            </div>
            <form class="w-full gap-6 flex flex-col">
                <div class="flex flex-row justify-between gap-6">
                    <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                        <label for="Title">Название теста</label>
                        <p class="font-light text-sm">Старайтесь передать в названии суть теста макисально кратко, так как
                            максимальная длина названия - 40 символов</p>
                        <input class="overflow-auto text-gray-900 pl-3 rounded-2xl bg-slate-300" type="text" name="Title" maxlength="40">
                    </div>

                    <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                        <label for="Description">Описание теста</label>
                        <p class="font-light text-sm">Описание теста должно чётко описать содержание теста. Ограничение в 120 символов</p>
                        <textarea cols="20" rows="3" class="resize-none text-gray-900 pl-3 rounded-2xl bg-slate-300" name="Description" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="flex flex-row justify-between gap-6">
                    <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                        <label for="Subject">Выберите предмет</label>
                        <p class="font-light text-sm">Если тест затрагивает несколько предметов, выберите основной</p>
                        <select name="Subject" class="text-gray-900 bg-slate-200 rounded-2xl pl-3">
                            <option selected disabled value="">Выберите предмет...</option>
                            @foreach($Subjects as $Subject)
                                <option value="{{ $Subject->id }}">{{ $Subject->SubjectName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                        <label for="TimeToComplete">Задайте максимальное время выполнения теста</label>
                        <p class="font-light text-sm">В полных минутах</p>
                        <input class="overflow-auto text-gray-900 pl-3 rounded-2xl bg-slate-300 pr-3" type="number" name="TimeToComplete" max="45">
                    </div>
                    <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                        <label for="TimeToComplete">Задайте соотношение баллов к оценкам</label>
                        <p class="font-light text-sm">Помните, что вы задаёте минимальный порог для получения оценки</p>
                        <div class="flex flex-col gap-4" >
                            <div class="flex flex-row w-full justify-center">
                                <label for="fiveGrade">5 - </label>
                                <input type="number" id="fiveGrade" max="100" class="w-16 ml-2 rounded-2xl text-gray-900 pl-2 bg-slate-200">
                            </div>
                            <div class="flex flex-row w-full justify-center">
                                <label for="fourGrade">4 - </label>
                                <input type="number" id="fourGrade" max="100" class="w-16 ml-2 rounded-2xl text-gray-900 pl-2 bg-slate-200">
                            </div>
                            <div class="flex flex-row w-full justify-center">
                                <label for="threeGrade">3 - </label>
                                <input type="number" id="threeGrade" max="100" class="w-16 ml-2 rounded-2xl text-gray-900 pl-2 bg-slate-200">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col border-gray-500 border-2 p-2 gap-4 w-full rounded-2xl">
                    <label for="Title">Выберите группы, которым будет доступен тест</label>
                    <p class="font-light text-sm">Вы можете выбрать неограниченное число групп</p>
                    <div class="flex flex-row gap-4">
                        @foreach($Groups as $Group)
                            <div>
                                <input class="bg-slate-200 checked:bg-green-600" type="checkbox" name="pickedGroups" id="pickedGroups" value="{{ $Group->id }}">
                                <label for="pickedGroups" class="font-semibold text-sm">{{ $Group->Name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="p-5 bg-slate-800 rounded-2xl" type="submit">Подтвердить данные и перейти к добавлению вопросов</button>
            </form>
        </div>
    </div>
</div>
