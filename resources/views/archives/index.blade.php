<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between h-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Archives') }}
            </h2>

            <span class="hidden sm:block ml-3">
                <a class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-green-400 hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('archives.create') }}">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Add Archive') }}
                </a>
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th align="left" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Catalogue Number</th>
                                <th align="left" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">title</th>
                                <th align="left" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Sound type</th>
                                <th align="left" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                                <th align="left" scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Time Of Day</th>
                                <th align="right" scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($archives as $archive)
                                <tr class="transition duration-150 ease-in-out">
                                    <td align="left" scope="row" class="px-6 py-4 whitespace-nowrap">{{ $archive->catalogue_number }}</td>
                                    <td align="left" scope="row" class="px-6 py-4 whitespace-nowrap">{{ $archive->title }}</td>
                                    <td align="left" scope="row" class="px-6 py-4 whitespace-nowrap">{{ $archive->sound_type }}</td>
                                    <td align="left" scope="row" class="px-6 py-4 whitespace-nowrap">{{ $archive->content }}</td>
                                    <td align="left" scope="row" class="px-6 py-4 whitespace-nowrap">{{ $archive->time_of_day }}</td>
                                    <td align="right" scope="row" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('archives.destroy', $archive->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('archives.show',$archive->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('archives.edit',$archive->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $archives->links() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
