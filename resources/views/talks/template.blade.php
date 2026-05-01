  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
              <input id="title" type="text" name="title" value="{{ old('title', $talk->title) }}" autocomplete="title" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="type" class="block text-sm/6 font-medium text-gray-900">Type</label>
            <div class="mt-2 grid grid-cols-1">
              <select id="type" name="type" autocomplete="type-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach (App\Enums\TalkType::cases() as $talkType)
                    <option @selected(old('type') == $talkType->value) value="{{ $talkType->value }}">{{ ucwords($talkType->value) }}</option>
                @endforeach
              </select>
              <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
            </div>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
          </div>

        <div class="sm:col-span-3">
          <label for="length" class="block text-sm/6 font-medium text-gray-900">Length</label>
          <div class="mt-2">
            <input id="length" type="text" name="length" value="{{ old('length', $talk->length) }}" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <x-input-error :messages="$errors->get('length')" class="mt-2" />
        </div>

        <div class="col-span-full">
          <label for="abstract" class="block text-sm/6 font-medium text-gray-900">Abstract</label>
          <div class="mt-2">
            <textarea id="abstract" name="abstract" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('abstract', $talk->abstract) }}</textarea>
          </div>
          <x-input-error :messages="$errors->get('abstract')" class="mt-2" />
        </div>

        <div class="col-span-full">
          <label for="organizer_notes" class="block text-sm/6 font-medium text-gray-900">Organizer Notes</label>
          <div class="mt-2">
            <textarea id="organizer_notes" name="organizer_notes" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('organizer_notes', $talk->organizer_notes) }}</textarea>
          </div>
          <x-input-error :messages="$errors->get('organizer_notes')" class="mt-2" />
        </div>

      </div>
    </div>

  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
