<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Prodi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ url('/prodi') }}" method="POST">
                    @csrf

                    <label class="block font-medium text-gray-700 mt-4 mb-2">Fakultas:</label>
                    <select name="fakultas_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Fakultas --</option>
                        @foreach($fakultas as $f)
                            <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                                {{ $f->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>

                    <label class="block font-medium text-gray-700 mt-4 mb-2">Nama Prodi:</label>
                    <input type="text" name="nama_prodi" value="{{ old('nama_prodi') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <button type="submit"
                            class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-200">
                        Simpan
                    </button>
                </form>

                <a href="{{ url('/prodi') }}" class="inline-block mt-6 text-blue-600 font-semibold hover:underline">
                    ← Kembali ke daftar
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
