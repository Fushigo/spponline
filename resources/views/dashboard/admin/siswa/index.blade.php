@extends('dashboard.admin.components.layouts.index')

@section('container')
    <a href="{{ route('datasiswa.create') }}"
        class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Create
        data siswa</a>

    @if (session('success'))
        <div class="bg-teal-100 border-t-4 mt-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nisn
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Telp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kompetensi Keahlian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id Spp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dataSiswa as $siswa)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $siswa->nisn }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $siswa->nis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->no_telp }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->kelas?->nama_kelas }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->kelas?->kompetensi_keahlian }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa->spp?->id_spp }}
                        </td>
                        <td class="px-6 py-4 flex flex-row justify-between items-center gap-x-8">
                            <a href="{{ route('datasiswa.edit', $siswa->id_siswa) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline p-4 bg-white shadow-lg rounded-lg">Edit</a>
                            <form action="{{ route('datasiswa.destroy', $siswa->id_siswa) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline  p-4 bg-white shadow-lg rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
