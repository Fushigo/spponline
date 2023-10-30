@extends('dashboard.siswa.components.layouts.index')

@section('container')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID_PEMBAYARAN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NISN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PETUGAS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TGL_BAYAR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        BULAN_BAYAR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TAHUN_BAYAR
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NOMINAL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STATUS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dataPembayaran as $pembayaran)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $pembayaran->id_pembayaran }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pembayaran->siswa->nisn }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->petugas->nama_petugas }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->tgl_bayar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->bulan_bayar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->spp->tahun }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->spp->nominal }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pembayaran->status }}
                        </td>
                        <td class="px-6 py-4 flex flex-row justify-between items-center gap-x-8">
                            @if ($pembayaran->status == 'Unpaid')
                                <form action="/admin/dashboard/pembayaran/siswa/{{ $pembayaran->id_pembayaran }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline  p-4 bg-white shadow-lg rounded-lg">Bayar</button>
                                </form>
                            @else
                                <form>
                                    <button type="button"
                                        class="font-medium text-slate-400 dark:text-blue-500 hover:underline  p-4 bg-slate-200 shadow-lg rounded-lg cursor-not-allowed">Sudah
                                        dibayar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
