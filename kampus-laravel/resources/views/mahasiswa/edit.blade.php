<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
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

                {{-- Fakultas Selector --}}
                <form method="GET" action="{{ url('/mahasiswa/'.$m->id.'/edit') }}" class="mb-6">
                    <label class="block font-medium text-gray-700 mb-2">Pilih Fakultas:</label>
                    <select name="fakultas_id" onchange="this.form.submit()"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Fakultas --</option>
                        @foreach ($fakultas as $f)
                            <option value="{{ $f->id }}" {{ $f->id == $selectedFakultas ? 'selected' : '' }}>
                                {{ $f->nama_fakultas }}
                            </option>
                        @endforeach
                    </select>
                </form>

                {{-- Edit Form --}}
                @if($selectedFakultas)
                    <form action="{{ url('/mahasiswa/' . $m->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label class="block font-medium text-gray-700 mt-4 mb-2">NIM:</label>
                        <input type="text" name="nim" value="{{ old('nim', $m->nim) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <label class="block font-medium text-gray-700 mt-4 mb-2">Nama:</label>
                        <input type="text" name="nama" value="{{ old('nama', $m->nama) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <label class="block font-medium text-gray-700 mt-4 mb-2">Program Studi:</label>
                        <select name="prodi_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach ($prodis as $p)
                                <option value="{{ $p->id }}" {{ $p->id == old('prodi_id', $m->prodi_id) ? 'selected' : '' }}>
                                    {{ $p->nama_prodi }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit"
                                class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transform hover:-translate-y-1 transition-all duration-200">
                            Update
                        </button>
                    </form>
                @endif

                <a href="{{ url('/mahasiswa') }}" class="inline-block mt-6 text-blue-600 font-semibold hover:underline">
                    ← Kembali ke daftar
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
