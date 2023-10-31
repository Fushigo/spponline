<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePembayaranRequest;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $dataPembayaran = Pembayaran::where('id_siswa', Auth::guard('siswa')->user()->id_siswa)->where('status', 'Unpaid')->get();
        return view('dashboard.siswa.pembayaran.index', compact('dataPembayaran'));
    }

    public function show()
    {
        $dataHistory = Pembayaran::where('id_siswa', Auth::guard('siswa')->user()->id_siswa)->where('status', 'Paid')->get();
        return view('dashboard.siswa.pembayaran.history', compact('dataHistory'));
    }

    public function destroy($id)
    {
        $history = Pembayaran::where('id_pembayaran', $id)->first();
        $history->delete();
        return redirect('/admin/dashboard/pembayaran/siswa/history');
    }

    public function update(UpdatePembayaranRequest $request, $id)
    {
        // $updateData = [
        //     'status' => 'Paid',
        // ];

        $data = Pembayaran::where('id_pembayaran', $id)->first();

        $nominal = $data->spp->nominal;
        $nominalPembayaran = (int)$nominal;

        // dd($data->siswa->nama);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $id,
                'gross_amount' => $nominalPembayaran,
            ),
            'customer_details' => array(
                'first_name' => $data->siswa->nama,
                'phone' => $data->siswa->no_telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // $updateStatus = Pembayaran::where('id_pembayaran', $id)->first();
        // $updateStatus->update($updateData);
        return view('dashboard.siswa.pembayaran.checkOut', compact('snapToken', 'data'));
    }

    public  function updatePembayaran($id)
    {
        $updateData = [
            'status' => 'Paid',
        ];

        $updateStatus = Pembayaran::where('id_pembayaran', $id)->first();
        $updateStatus->update($updateData);

        return redirect('/admin/dashboard/pembayaran/siswa');
    }
}
