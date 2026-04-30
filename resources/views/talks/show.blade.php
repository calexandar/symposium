<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><strong>Type:</strong> {{ $talk->type }}</p>
                    <p><strong>Length:</strong> {{ $talk->length }}</p>
                    <p><strong>Abstract:</strong> {{ $talk->abstract }}</p>
                    <p><strong>Organizer Notes:</strong> {{ $talk->organizer_notes }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
