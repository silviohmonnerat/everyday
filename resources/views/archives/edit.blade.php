<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Archive Edit') }}
                </h2>

                <a class="btn btn-success" href="{{ route('archives.create') }}">
                    {{ __('Archive Create') }}
                </a>
            </div>
        </div>
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
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $archive->title }}" required autofocus />
                        </div>

                        <!-- Sound type -->
                        <div class="mt-4">
                            <x-label for="sound_type" :value="__('Sound type')" />
                            <x-select name="sound_type" id="sound_type" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Field Recording" {{ $archive->sound_type == 'Field Recording' ? "selected" : "" }}>Field Recording</option>
                                <option valeu="Composition (Mixtape, DJ sets, etc.)" {{ $archive->sound_type == 'Composition (Mixtape, DJ sets, etc.)' ? "selected" : "" }}>Composition (Mixtape, DJ sets, etc.)</option>
                                <option valeu="Audio sample from media" {{ $archive->sound_type == 'Audio sample from media' ? "selected" : "" }}>Audio sample from media</option>
                            </x-select>
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-label for="content" :value="__('Content')" />
                            <x-select name="content" id="content" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Sound-only" {{ $archive->content == 'Sound-only' ? "selected" : "" }}>Sound-only</option>
                                <option valeu="Videos" {{ $archive->content == 'Videos' ? "selected" : "" }}>Videos</option>
                                <option valeu="Text" {{ $archive->content == 'Text' ? "selected" : "" }}>Text</option>
                                <option valeu="Images" {{ $archive->content == 'Images' ? "selected" : "" }}>Images</option>
                            </x-select>
                        </div>

                        <!-- Date -->
                        <div class="mt-4">
                            <x-label for="date" :value="__('Date')" />
                            <x-input id="date" class="block mt-1 w-full" type="text" name="date" value="{{ $archive->date }}" required autofocus />
                        </div>

                        <!-- Season -->
                        <div class="mt-4">
                            <x-label for="season" :value="__('Season')" />
                            <x-select name="season" id="season" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Spring" {{ $archive->season == 'Spring' ? "selected" : "" }}>Spring</option>
                                <option valeu="Summer" {{ $archive->season == 'Summer' ? "selected" : "" }}>Summer</option>
                                <option valeu="Fall" {{ $archive->season == 'Fall' ? "selected" : "" }}>Fall</option>
                                <option valeu="Winter" {{ $archive->season == 'Winter' ? "selected" : "" }}>Winter</option>
                            </x-select>
                        </div>

                        <!-- Time Of Day -->
                        <div class="mt-4">
                            <x-label for="time_of_day" :value="__('Time of day')" />
                            <x-select name="time_of_day" id="time_of_day" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Dawn" {{ $archive->time_of_day == 'Dawn' ? "selected" : "" }}>Dawn</option>
                                <option valeu="Morning" {{ $archive->time_of_day == 'Morning' ? "selected" : "" }}>Morning</option>
                                <option valeu="Afternoon" {{ $archive->time_of_day == 'Afternoon' ? "selected" : "" }}>Afternoon</option>
                                <option valeu="Evening" {{ $archive->time_of_day == 'Evening' ? "selected" : "" }}>Evening</option>
                                <option valeu="Dusk" {{ $archive->time_of_day == 'Dusk' ? "selected" : "" }}>Dusk</option>
                                <option valeu="Night" {{ $archive->time_of_day == 'Night' ? "selected" : "" }}>Night</option>
                            </x-select>
                        </div>

                        <!-- Type of location -->
                        <div class="mt-4">
                            <x-label for="type_of_location" :value="__('Type of location')" />
                            <x-select name="type_of_location" id="type_of_location" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Iran" {{ $archive->type_of_location == 'Iran' ? "selected" : "" }}>Iran</option>
                                <option valeu="Within/beyond geographical border" {{ $archive->type_of_location == 'Within/beyond geographical border' ? "selected" : "" }}>Within/beyond geographical border</option>
                                <option valeu="Diasporic" {{ $archive->type_of_location == 'Diasporic' ? "selected" : "" }}>Diasporic</option>
                                <option valeu="Historical" {{ $archive->type_of_location == 'Historical' ? "selected" : "" }}>Historical</option>
                            </x-select>
                        </div>

                        <!-- Location -->
                        <div class="mt-4">
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ $archive->location }}" required autofocus />
                        </div>

                        <!-- Recordist -->
                        <div class="mt-4">
                            <x-label for="recordist" :value="__('Recordist')" />
                            <x-input id="recordist" class="block mt-1 w-full" type="text" name="recordist" value="{{ $archive->recordist }}" required autofocus />
                        </div>

                        <!-- Artist -->
                        <div class="mt-4">
                            <x-label for="artist" :value="__('Artist')" />
                            <x-input id="artist" class="block mt-1 w-full" type="text" name="artist" placeholder="player, singer, etc..." value="{{ $archive->artist }}" required autofocus />
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
                                        value="{{ $archive->length }}"
                                        required
                                        autofocus
                                    />
                                    <x-input
                                        id="amount"
                                        class="block mt-1 w-full"
                                        type="number"
                                        value="{{ $archive->length }}"
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
                            <x-select name="device_recorder" id="device_recorder" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Professional Recorders" {{ $archive->device_recorder == 'Professional Recorders' ? "selected" : "" }}>Professional Recorders</option>
                                <option valeu="Smartphones" {{ $archive->device_recorder == 'Smartphones' ? "selected" : "" }}>Smartphones</option>
                                <option valeu="Other" {{ $archive->device_recorder == 'Other' ? "selected" : "" }}>Other</option>
                            </x-select>
                        </div>

                        <!-- Format/Quality -->
                        <div class="mt-4">
                            <x-label for="format_quality" :value="__('Format/Quality')" />
                            <x-select name="format_quality" id="format_quality" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="compressed low-quality" {{ $archive->format_quality == 'compressed low-quality' ? "selected" : "" }}>compressed low-quality</option>
                                <option valeu="compressed high-quality" {{ $archive->format_quality == 'compressed high-quality' ? "selected" : "" }}>compressed high-quality</option>
                                <option valeu="uncompressed" {{ $archive->format_quality == 'uncompressed' ? "selected" : "" }}>uncompressed</option>
                            </x-select>
                        </div>

                        <!-- Access and License -->
                        <div class="mt-4">
                            <x-label for="access_and_license" :value="__('Access and License')" />
                            <x-select name="access_and_license" id="access_and_license" class="block mt-1 w-full" required autofocus>
                                <option>Select</option>
                                <option valeu="Download directly with the option of donation (via paypal)" {{ $archive->access_and_license == 'Download directly with the option of donation (via paypal)' ? "selected" : "" }}>Download directly with the option of donation (via paypal)</option>
                                <option valeu="Download after purchase (external link to bandcamp, etc.)" {{ $archive->access_and_license == 'Download after purchase (external link to bandcamp, etc.)' ? "selected" : "" }}>Download after purchase (external link to bandcamp, etc.)</option>
                                <option valeu="Requesting it through webforms for archival materials" {{ $archive->access_and_license == 'Requesting it through webforms for archival materials' ? "selected" : "" }}>Requesting it through webforms for archival materials</option>
                                <option valeu="Listen-only or preview" {{ $archive->access_and_license == 'Listen-only or preview' ? "selected" : "" }}>Listen-only or preview</option>
                            </x-select>
                        </div>

                        <!-- Tags -->
                        <div class="mt-4">
                            <x-label for="tags" :value="__('Tags')" />
                            <x-input id="tags" class="block mt-1 w-full" type="text" name="tags" value="{{ $archive->tags }}" required autofocus />
                        </div>

                        <!-- Media -->
                        <div class="mt-4">
                            <x-label for="media" :value="__('URL Media')" />
                            <x-input id="media" class="block mt-1 w-full" type="text" name="media" placeholder="e.g: https://youtube.com" value="{{ $archive->media }}" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Editar Archive') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
