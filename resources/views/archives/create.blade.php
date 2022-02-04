<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archive Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('archives.store') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Sound type -->
                        <div class="mt-4">
                            <x-label for="sound_type" :value="__('Sound type')" />
                            <x-select name="sound_type" id="sound_type" class="block mt-1 w-full" :value="old('sound_type')" required autofocus>
                                <option value="">Select</option>
                                <option value="Field Recording" :value="old('sound_type')">Field Recording</option>
                                <option value="Composition (Mixtape, DJ sets, etc.)" :value="old('sound_type')">Composition (Mixtape, DJ sets, etc.)</option>
                                <option value="Audio sample from media" :value="old('sound_type')">Audio sample from media</option>
                            </x-select>
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-label for="content" :value="__('Content')" />
                            <x-select name="content" id="content" class="block mt-1 w-full" :value="old('content')" required autofocus>
                                <option value="">Select</option>
                                <option value="Sound-only">Sound-only</option>
                                <option value="Videos">Videos</option>
                                <option value="Text">Text</option>
                                <option value="Images">Images</option>
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
                                <option value="">Select</option>
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                                <option value="Winter">Winter</option>
                            </x-select>
                        </div>

                        <!-- Time Of Day -->
                        <div class="mt-4">
                            <x-label for="time_of_day" :value="__('Time Of Day')" />
                            <x-select name="time_of_day" id="time_of_day" class="block mt-1 w-full" :value="old('time_of_day')" required autofocus>
                                <option value="">Select</option>
                                <option value="Dawn">Dawn</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Evening">Evening</option>
                                <option value="Dusk">Dusk</option>
                                <option value="Night">Night</option>
                            </x-select>
                        </div>

                        <!-- Type of location -->
                        <div class="mt-4">
                            <x-label for="type_of_location" :value="__('Type of location')" />
                            <x-select name="type_of_location" id="type_of_location" class="block mt-1 w-full" :value="old('type_of_location')" required autofocus>
                                <option value="">Select</option>
                                <option value="Iran">Iran</option>
                                <option value="Within/beyond geographical border">Within/beyond geographical border</option>
                                <option value="Diasporic">Diasporic</option>
                                <option value="Historical">Historical</option>
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
                                <option value="">Select</option>
                                <option value="Professional Recorders">Professional Recorders</option>
                                <option value="Smartphones">Smartphones</option>
                                <option value="Other">Other</option>
                            </x-select>
                        </div>

                        <!-- Format/Quality -->
                        <div class="mt-4">
                            <x-label for="format_quality" :value="__('Format/Quality')" />
                            <x-select name="format_quality" id="format_quality" class="block mt-1 w-full" :value="old('format_quality')" required autofocus>
                                <option value="">Select</option>
                                <option value="compressed low-quality">compressed low-quality</option>
                                <option value="compressed high-quality">compressed high-quality</option>
                                <option value="uncompressed">uncompressed</option>
                            </x-select>
                        </div>

                        <!-- Access and License -->
                        <div class="mt-4">
                            <x-label for="access_and_license" :value="__('Access and License')" />
                            <x-select name="access_and_license" id="access_and_license" class="block mt-1 w-full" :value="old('access_and_license')" required autofocus>
                                <option value="">Select</option>
                                <option value="Download directly with the option of donation (via paypal)">Download directly with the option of donation (via paypal)</option>
                                <option value="Download after purchase (external link to bandcamp, etc.)">Download after purchase (external link to bandcamp, etc.)</option>
                                <option value="Requesting it through webforms for archival materials">Requesting it through webforms for archival materials</option>
                                <option value="Listen-only or preview">Listen-only or preview</option>
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
