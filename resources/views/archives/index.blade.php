<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archives') }}
        </h2>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('archives.create') }}">Add Product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>title</th>
                            <th>Content</th>
                            <th width="280px">Actions</th>
                        </tr>
                        @foreach ($archives as $archive)
                            <tr>
                                <td>{{ $archive->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->content }}</td>
                                <td>
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
                    </table>

                    {!! $archives->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
