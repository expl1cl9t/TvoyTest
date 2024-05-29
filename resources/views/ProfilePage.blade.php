<x-dashboard-layout title="Профиль - {{auth()->user()->Name}} {{auth()->user()->Surname}} | Промежуточное тестирование ">
    @if(auth()->user()->role->id == 1)
        <livewire:teacher-profile/>
    @else
        <livewire:student-profile/>
    @endif
</x-dashboard-layout>
