<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Kampus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Dashboard Header -->
                    <header class="text-center mb-8">
                        <h1 class="text-4xl font-bold text-gray-800 mb-2">Dashboard Kampus</h1>
                        <h3 class="text-lg text-gray-600 mb-2">2405551179 Brian Salomo Rempasito</h3>
                        <p class="text-gray-500">Pilih salah satu menu di bawah ini untuk mengelola data:</p>
                    </header>

                    <!-- Menu Cards -->
                    <div class="flex flex-wrap justify-center gap-6 mt-6">
                        <a href="{{ url('/mahasiswa') }}"
                           style="display:flex; align-items:center; justify-content:center; padding:20px 60px; min-width:200px; background-color:#007bff; color:#fff; font-weight:bold; text-decoration:none; border-radius:10px; box-shadow:0 6px 12px rgba(0,0,0,0.15); transition:0.3s;">
                            Kelola Mahasiswa
                        </a>

                        <a href="{{ url('/prodi') }}"
                           style="display:flex; align-items:center; justify-content:center; padding:20px 60px; min-width:200px; background-color:#007bff; color:#fff; font-weight:bold; text-decoration:none; border-radius:10px; box-shadow:0 6px 12px rgba(0,0,0,0.15); transition:0.3s;">
                            Kelola Program Studi
                        </a>

                        <a href="{{ url('/fakultas') }}"
                           style="display:flex; align-items:center; justify-content:center; padding:20px 60px; min-width:200px; background-color:#007bff; color:#fff; font-weight:bold; text-decoration:none; border-radius:10px; box-shadow:0 6px 12px rgba(0,0,0,0.15); transition:0.3s;">
                            Kelola Fakultas
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
