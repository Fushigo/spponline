@extends('dashboard.petugas.components.layouts.index')

@section('container')
    <form action="{{ route('pembayaran.store') }}" method="POST">
        @method('POST')
        @csrf

        <div class="mb-6">
            <label for="id_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
            <select name="id_siswa" id="id_siswa"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($dataSiswa as $siswa)
                    <option value="{{ $siswa->id_siswa }}">{{ $siswa->nisn }} -
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="id_petugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PETUGAS</label>
            <select name="id_petugas" id="id_petugas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($dataPetugas as $petugas)
                    <option value="{{ $petugas->id_petugas }}">{{ $petugas->id_petugas }} -
                        {{ $petugas->nama_petugas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="tgl_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TGL_BAYAR</label>
            <input type="date" id="tgl_bayar" name="tgl_bayar"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="bulan_bayar"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BULAN_BAYAR</label>
            <input type="text" id="bulan_bayar" name="bulan_bayar"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="tahun_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                Bayar</label>
            <select name="tahun_bayar" id="tahun_bayar"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Pilih Tahun</option>
                @foreach ($dataSpp as $spp)
                    <option value="{{ $spp->id_spp }}">
                        {{ $spp->id_spp }} - {{ $spp->tahun }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="id_spp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal</label>
            <input type="hidden" name="id_spp" id="nominal"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <input type="text" disabled name="id_spp_display" id="nominal_display"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            {{-- <select name="id_spp" id="id_spp"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($dataSpp as $spp)
                    <option value="{{ $spp->id_spp }}">
                        {{ $spp->id_spp }} - {{ $spp->tahun }} - {{ $spp->nominal }}
                    </option>
                @endforeach
            </select> --}}
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
