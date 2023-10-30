@extends('dashboard.siswa.components.layouts.index');

@section('container')
    <div class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div class="flex flex-col gap-4">
                        <div class="text-sm font-medium text-gray-400">NISN</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataSiswa as $siswa)
                                {{ $siswa->nisn }}
                            @endforeach
                        </div>
                        <div class="text-sm font-medium text-gray-400">Nama Siswa</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataSiswa as $siswa)
                                {{ $siswa->nama }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div class="flex flex-col gap-4">
                        <div class="text-sm font-medium text-gray-400">Kelas</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataKelas as $kelas)
                                {{ $kelas->nama_kelas }}
                            @endforeach
                        </div>
                        <div class="text-sm font-medium text-gray-400">Kompetensi Keahlian</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataKelas as $kelas)
                                {{ $kelas->kompetensi_keahlian }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div class="flex flex-col gap-4">
                        <div class="text-sm font-medium text-gray-400">Jumlah Tagihan</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataPembayaran as $pembayaran)
                                {{ $pembayaran->count() }}
                            @endforeach
                        </div>
                        <div class="text-sm font-medium text-gray-400">Tagihan Terbayar</div>
                        <div class="text-2xl font-semibold mb-1">
                            @foreach ($dataHistory as $history)
                                {{ $history->count() }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
