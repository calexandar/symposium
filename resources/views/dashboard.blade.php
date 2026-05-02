<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <ul>
                        @foreach($conferences as $conference)
                            <li><a href="#" class="flex items-center gap-2">
                                    @if(Auth::user()->favoriteConferences->contains($conference))
                                       <a href="#" onclick="favoriteConference({{ $conference->id }})"> <span id="favorite-icon-{{ $conference->id }}" class="text-red-500">♥</span>                               
                                    @else
                                       <a href="#" onclick="unfavoriteConference({{ $conference->id }})">  <span id="favorite-icon-{{ $conference->id }}" class="text-gray-300">♥</span>
                                    @endif
                                    {{ $conference->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Add JavaScript to handle favorite/unfavorite actions if needed
   function favoriteConference(conferenceId) {
        fetch(`/conferences/${conferenceId}/favorite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the UI to reflect the new favorite status
                const heartIcon = document.querySelector(`#favorite-icon-${conferenceId}`);
                heartIcon.classList.remove('text-gray-300');
                heartIcon.classList.add('text-red-500');
            }
        })
    }

    function unfavoriteConference(conferenceId) {
        fetch(`/conferences/${conferenceId}/favorite`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the UI to reflect the new favorite status
                const heartIcon = document.querySelector(`#favorite-icon-${conferenceId}`);
                heartIcon.classList.remove('text-red-500');
                heartIcon.classList.add('text-gray-300');
            }
        })
    }
</script>
