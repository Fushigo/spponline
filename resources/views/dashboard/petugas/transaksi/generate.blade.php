<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Spp</title>

    <link rel="shortcut icon" href="{{ asset('asset/Group 10.svg') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'public/css/custom.css', 'public/js/laporan.js'])
</head>

<body class="flex flex-col gap-8 p-8">
    <h1 class="text-center text-2xl">Laporan Data Pembayaran Spp</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-slate-300 dark:bg-gray-800">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300 dark:bg-gray-800">
                        NISN
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300 dark:bg-gray-800">
                        Nama Petugas
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Tanggal Bayar
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Bulan Bayar
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Tahun Bayar
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Nominal
                    </th>
                    <th scope="col" class="px-6 py-3 bg-slate-300">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataLaporan as $laporan)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            {{ $laporan->id_pembayaran }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $laporan->siswa->nisn }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            {{ $laporan->siswa->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $laporan->petugas->nama_petugas }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            {{ $laporan->tgl_bayar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $laporan->bulan_bayar }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            {{ $laporan->spp->tahun }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $laporan->spp->nominal }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            @if ($laporan->status == 'Unpaid')
                                <p class="text-red-600 font-bold">{{ $laporan->status }}</p>
                            @else
                                <p class="text-green-600 font-bold">{{ $laporan->status }}</p>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
