<x-dashboard-layout title="Главная страница">
        @if(auth()->user()->role->id == 2)
            <livewire:tests-panel/>
        @else
            <livewire:teacger-dashboard></livewire:teacger-dashboard>
        @endif
</x-dashboard-layout>
