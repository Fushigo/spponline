<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    @vite('resources/css/app.css');

</head>

<body class="w-full h-screen flex flex-col justify-center items-center font-poppins bg-blue-600">

    <main class="container w-full h-screen flex flex-row justify-around items-center">
        <div class="w-1/2 h-auto bg-white shadow-lg p-8 flex flex-col gap-4 rounded-lg">
            <h1 class="font-bold">Identitas Siswa</h1>
            <div>
                <p>NISN: {{ $data->siswa->nisn }}</p>
                <p>
                    Nama siswa: {{ $data->siswa->nama }}
                </p>
                <p>Kelas: {{ $data->siswa->kelas->nama_kelas }} - {{ $data->siswa->kelas->kompetensi_keahlian }}</p>
            </div>
            <h1 class="font-bold">Pembayaran Spp</h1>
            <div>
                <p>Tahun Bayar: {{ $data->spp->tahun }}</p>
                <p>Nominal: Rp {{ $data->spp->nominal }}</p>
            </div>
            <div class="flex flex-row">
                <button id="pay-button" class="py-4 px-8 bg-sky-600 font-bold text-white rounded-xl">Konfirmasi
                    Pembayaran</button>
            </div>
        </div>

        <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
        <div class="z-[9999] w-fit" id="snap-container"></div>
    </main>


    {{-- <script>
        var button = document.getElementById('pay-button');
        button.addEventListener("click", function() {
            window.location.href = '/siswa/updatePembayaran/{{ $data->id_pembayaran }}';
        })
    </script> --}}

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.embed('{{ $snapToken }}', {
                embedId: 'snap-container',
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    window.location.href = '/siswa/updatePembayaran/{{ $data->id_pembayaran }}';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>

</html>
