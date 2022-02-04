<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archive Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('archives.update',$archive->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $archive->name }}" :value="old('title')" required autofocus />
                        </div>

                        <!-- Sound type -->
                        <div class="mt-4">
                            <x-label for="sound_type" :value="__('Sound type')" />
                            <x-select name="sound_type" id="sound_type" class="block mt-1 w-full" :value="old('sound_type')" required autofocus>
                                <option>Select</option>
                                <option>Field Recording</option>
                                <option>Composition (Mixtape, DJ sets, etc.)</option>
                                <option>Audio sample from media</option>
                            </x-select>
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-label for="content" :value="__('Content')" />
                            <x-select name="content" id="content" class="block mt-1 w-full" :value="old('content')" required autofocus>
                                <option>Select</option>
                                <option>Sound-only</option>
                                <option>Videos</option>
                                <option>Text</option>
                                <option>Images</option>
                            </x-select>
                        </div>

                        <!-- Date -->
                        <div class="mt-4">
                            <x-label for="date" :value="__('Date')" />
                            <x-input id="date" class="block mt-1 w-full" type="text" name="date" :value="old('date')" required autofocus />
                        </div>

                        <!-- Season -->
                        <div class="mt-4">
                            <x-label for="season" :value="__('Season')" />
                            <x-select name="season" id="season" class="block mt-1 w-full" :value="old('season')" required autofocus>
                                <option>Select</option>
                                <option>Spring</option>
                                <option>Summer</option>
                                <option>Fall</option>
                                <option>Winter</option>
                            </x-select>
                        </div>

                        <!-- Time Of Day -->
                        <div class="mt-4">
                            <x-label for="time_of_day" :value="__('Time Of Day')" />
                            <x-select name="time_of_day" id="time_of_day" class="block mt-1 w-full" :value="old('time_of_day')" required autofocus>
                                <option>Select</option>
                                <option>Dawn</option>
                                <option>Morning</option>
                                <option>Afternoon</option>
                                <option>Evening</option>
                                <option>Dusk</option>
                                <option>Night</option>
                            </x-select>
                        </div>

                        <!-- Type of location -->
                        <div class="mt-4">
                            <x-label for="type_of_location" :value="__('Type of location')" />
                            <x-select name="type_of_location" id="type_of_location" class="block mt-1 w-full" :value="old('type_of_location')" required autofocus>
                                <option>Select</option>
                                <option>Iran</option>
                                <option>Within/beyond geographical border</option>
                                <option>Diasporic</option>
                                <option>Historical</option>
                            </x-select>
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus />
                        </div>

                        <!-- Recordist -->
                        <div class="mt-4">
                            <x-label for="recordist" :value="__('Recordist')" />
                            <x-input id="recordist" class="block mt-1 w-full" type="text" name="recordist" :value="old('recordist')" required autofocus />
                        </div>

                        <!-- Artist -->
                        <div class="mt-4">
                            <x-label for="artist" :value="__('Artist')" />
                            <x-input id="artist" class="block mt-1 w-full" type="text" name="artist" placeholder="player, singer, etc..." :value="old('artist')" required autofocus />
                        </div>

                        <!-- Length -->
                        <div class="mt-4">
                            <x-label for="length" :value="__('Length')" />
                            <div class="control">
                                <div class="range">
                                    <input
                                        id="length"
                                        class="block mt-1 w-full"
                                        type="range"
                                        name="length"
                                        min="0"
                                        max="9999"
                                        oninput="amount.value=length.value"
                                        value="0"
                                        :value="old('length')"
                                        required
                                        autofocus
                                    />
                                    <x-input
                                        id="amount"
                                        class="block mt-1 w-full"
                                        type="number"
                                        value="0"
                                        min="0"
                                        max="9999"
                                        oninput="length.value=amount.value"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Device/Recorder -->
                        <div class="mt-4">
                            <x-label for="device_recorder" :value="__('Device/Recorder')" />
                            <x-select name="device_recorder" id="device_recorder" class="block mt-1 w-full" :value="old('device_recorder')" required autofocus>
                                <option>Select</option>
                                <option>Professional Recorders </option>
                                <option>Smartphones</option>
                                <option>Other</option>
                            </x-select>
                        </div>

                        <!-- Format/Quality -->
                        <div class="mt-4">
                            <x-label for="format_quality" :value="__('Format/Quality')" />
                            <x-select name="format_quality" id="format_quality" class="block mt-1 w-full" :value="old('format_quality')" required autofocus>
                                <option>Select</option>
                                <option>compressed low-quality</option>
                                <option>compressed high-quality</option>
                                <option>uncompressed</option>
                            </x-select>
                        </div>

                        <!-- Access and License -->
                        <div class="mt-4">
                            <x-label for="access_and_license" :value="__('Access and License')" />
                            <x-select name="access_and_license" id="access_and_license" class="block mt-1 w-full" :value="old('access_and_license')" required autofocus>
                                <option>Select</option>
                                <option>Download directly with the option of donation (via paypal)</option>
                                <option>Download after purchase (external link to bandcamp, etc.) </option>
                                <option>Requesting it through webforms for archival materials</option>
                                <option>Listen-only or preview</option>
                            </x-select>
                        </div>

                        <!-- Tags -->
                        <div class="mt-4">
                            <x-label for="tags" :value="__('Tags')" />
                            <x-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" required autofocus />
                        </div>

                        <!-- Media -->
                        <div class="mt-4">
                            <x-label for="media" :value="__('Link Media')" />
                            <x-input id="media" class="block mt-1 w-full" type="text" name="media" placeholder="e.g: https://youtube.com" :value="old('media')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="reset" class="ml-4">
                                {{ __('Cancel') }}
                            </x-button>

                            <x-button class="ml-4">
                                {{ __('Add Archive') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
