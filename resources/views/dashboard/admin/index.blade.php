@extends('dashboard.admin.components.layouts.index')

@section('container')
    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1">{{ $dataSiswa->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Jumlah Siswa</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="text-2xl font-semibold">{{ $dataKelas->count() }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-400">Jumlah Kelas</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        <div class="text-2xl font-semibold mb-1"><span
                                class="text-base font-normal text-gray-400 align-top"></span>{{ $dataSPP->count() }}</div>
                        <div class="text-sm font-medium text-gray-400">Jumlah SPP</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
