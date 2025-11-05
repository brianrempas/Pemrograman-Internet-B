

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            @if(session('success'))
            <div
                style="max-width: 500px; margin-bottom: 16px; padding: 12px 16px; border-radius: 8px; background-color: #28a745; color: #fff; font-weight: bold; box-shadow: 0 2px 6px rgba(0,0,0,0.15); text-align: left;">
                {{ session('success') }}
            </div>

            @endif
            @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-4">

                {{-- Top Buttons --}}
                @if(auth()->user()->role === 'admin')
                <div class="mb-4 flex justify-end space-x-2">
                    <a href="{{ url('/') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
                    <a href="{{ url('/fakultas/create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Fakultas</a>
                </div>
                @else
                <div class="mb-4">
                    <a href="{{ url('/') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
                </div>
                @endif

                {{-- Table --}}
                <div class="overflow-x-auto w-full">
                    <table class="w-full border border-gray-200 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 border-r border-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Fakultas</th>
                                @if(auth()->user()->role === 'admin')
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($fakultas as $f)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-r border-gray-200">{{ $f->id }}</td>
                                <td class="px-6 py-4 border-r border-gray-200">{{ $f->nama_fakultas }}</td>
                                @if(auth()->user()->role === 'admin')
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ url('/fakultas/'.$f->id.'/edit') }}"
                                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-200 inline-block">
                                        Edit
                                    </a>
                                    <form action="{{ url('/fakultas/'.$f->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-200 inline-block">
                                            Hapus
                                        </button>
                                    </form>
                                </td>

                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
