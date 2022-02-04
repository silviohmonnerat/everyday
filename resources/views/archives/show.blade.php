<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Archive Details') }}
                </h2>

                <a class="btn btn-success" href="{{ route('archives.edit',$archive->id) }}">
                    {{ __('Edit Archive') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $archive->title }}
                    {{ $archive->content }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
