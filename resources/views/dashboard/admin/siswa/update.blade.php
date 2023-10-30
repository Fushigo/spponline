@extends('dashboard.admin.components.layouts.index')

@section('container')
    <form action="/admin/dashboard/datasiswa/{{ $siswa->id_siswa }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-6">
            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
            <input type="number" id="nisn" name="nisn" value= "{{ $siswa->nisn }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
            <input type="number" id="nis" name="nis" value= "{{ $siswa->nis }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA</label>
            <input type="text" id="nama" name="nama" value= "{{ $siswa->nama }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ALAMAT</label>
            <input type="text" id="alamat" name="alamat" value= "{{ $siswa->alamat }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="noHp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NO HP</label>
            <input type="text" id="noHp" name="no_telp" value= "{{ $siswa->no_telp }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KELAS</label>
            {{-- <input type="text" id="kelas" name="id_kelas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
            <select name="id_kelas" id="kelas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($dataKelas as $kelas)
                    <option value="{{ $kelas?->id_kelas }}" {{ $siswa->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }} - {{ $kelas->kompetensi_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <label for="id_spp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SPP</label>
            {{-- <input type="text" id="kelas" name="id_kelas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
            <select name="id_spp" id="id_spp"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($dataSpp as $spp)
                    <option value="{{ $spp?->id_spp }}" {{ $siswa->id_kelas == $spp->id_spp ? 'selected' : '' }}>
                        {{ $spp->tahun }} - {{ $spp->nominal }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
