<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Icon</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kategori)
                            <tr>
                                <td>{{ $kategori->id }}</td>
                                <td>{{ $kategori->kategori }}</td>
                                <td>{{ $kategori->icon }}</td>
                                <td>{{ $kategori->keterangan }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
