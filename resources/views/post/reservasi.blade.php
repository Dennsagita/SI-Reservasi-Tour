@extends('layouts.app')
@section('action')
@section('title', 'Reservasi')

@section('content')


<section class="relative overflow-hidden py-16 bg-gray-DEFAULT-100">
    <img src="{{ ('assets/images/effect.png') }}" alt="effect" class="absolute bottom-[-400px] -z-10 w-full opacity-[0.2]">
    <div id="selectedPaketInfo" class="mx-auto max-w-7xl px-8 md:px-6">
        <div class="-mx-4 flex flex-wrap lg:justify-between mt-20">

            <!-- left info-->
            <div class="w-full px-4 md:w-1/2 xl:w-6/12">
                <div class="mb-12 max-w-[570px] lg:mb-0">
                    <div class="w-full duration-200 hover:scale-95">
                        <div class="max-h-120 w-full overflow-hidden rounded-t-xl">
                            <img id="gambarPaket" src="" alt="blog img" class="w-full hidden">
                        </div>
                        <div class="rounded-b-xl px-5 pb-5 pt-3 shadow-md shadow-blue-500/10 bg-white">
                            <div class="">
                                    <a class="mr-2 rounded-md bg-blue-50 px-3 py-1 text-sm text-slate-600" id="selectedPaketDestinasi"></a>
                            </div>
                            <hr class="my-4 border-slate-100">
                            {{-- <a href="{{ route('paketDetail', ['id' => $paket->id]) }}"> --}}
                            <div class="flex">
                                <!-- Tampilkan informasi pengguna -->
                                <p class="text-sm font-semibold capitalize text-slate-600" id="selectedPaketNama" ><span class="block text-xs text-slate-400"></span></p>
                            </div>
                        </a>
                        </div>
                    </div>

                    <h1 class="mt-10 text-2xl font-bold text-slate-700 sm:text-3xl">Deskripsi</h1>
                    <p class="text-gray-700 mb-8" id="selectedPaketKeterangan"></p>


                    <!-- Total Pembayaran -->
                    <div class="mb-8 mt-10 flex w-full max-w-[420px] items-center rounded-lg bg-white p-4 shadow-md shadow-blue-500/10">
                        <div class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded  bg-opacity-5 sm:h-[70px] sm:max-w-[70px]">
                            <img src="{{ asset('assets/LogoTittle.png') }}" class="text-3xl">
                        </div>
                        <div class="w-full">
                            <h4 class="mb-1 text-xl font-bold text-slate-700"">Harga Paket</h4>
                            <p id="selectedPaketHarga" class="text-base text-slate-400" id="selectedPaketHarga"></p>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- right contact-->
            <div class="w-full px-4 md:w-1/2 xl:w-5/12">
                <div class="relative rounded-lg bg-white p-8 shadow-lg shadow-blue-500/10 sm:p-12">
                    <h2  class="text-3xl mb-4">Reservasi Sekarang</h2>
                    <form action="{{ route('reservasi-insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2 hidden">
                                <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900">Id User</label>
                                <input type="text" name="id_user" id="id_user" value="{{ Auth::guard('user')->user()->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Id User">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="id_paket" class="block mb-2 text-sm font-medium text-gray-900">Pilih Paket</label>
                                <select name="id_paket" id="id_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="">Select Paket</option>
                                    @foreach ($paket as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_paket')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="tgl_tour_mulai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai Tour</label>
                                <input type="date" name="tgl_tour_mulai" id="tgl_tour_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="pilih tanggal">
                                @error('tgl_tour_mulai')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="tgl_tour_selesai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Selesai Tour</label>
                                <input type="date" name="tgl_tour_selesai" id="tgl_tour_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999">
                                @error('tgl_tour_selesai')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="w-full">
                                <label for="tgl_berangkat" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Berangkat</label>
                                <input type="date" name="tgl_berangkat" id="tgl_berangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999">
                                @error('tgl_berangkat')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="w-full">
                                <label for="jam_datang" class="block mb-2 text-sm font-medium text-gray-900">Jam Berangkat</label>
                                <input type="time" name="jam_datang" id="jam_datang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999">
                                @error('jam_datang')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="lokasi_penjemputan" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Penjemputan</label>
                                <input type="text" name="lokasi_penjemputan" id="lokasi_penjemputan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="(Contoh: Lobby Hotel A)">
                                @error('lokasi_penjemputan')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nominal_dp" class="block mb-2 text-sm font-medium text-gray-900">Nominal DP (Minimal 20%)</label>
                                <input type="text" name="nominal_dp" id="nominal_dp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="100000">
                                @error('nominal_dp')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-90" for="images[]">Upload Bukti DP (Transfer Bank BNI 1728388385)</label>
                                <input type="file" name="images[]" multiple data-max_length="20" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" required>
                                <p class="mt-1 text-sm text-gray-500" id="file_input_help">(MAX. 1 MB).</p>
                                {{-- @error('images[]')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div class="sm:col-span-2 hidden">
                                <label for="status_pemesanan" class="block mb-2 text-sm font-medium text-gray-900">Status Pemesanan</label>
                                <input type="text" name="status_pemesanan" id="status_pemesanan" value="baru" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="100000">
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-slate-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                            Reservasi
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

  <!-- Letakkan tag skrip ini di akhir berkas view Anda, sebelum penutup tag </body> -->
  <script>
    // Tambahkan event listener ke select dengan ID "id_paket"
    $("#id_paket").change(function() {
        viewPaket();
    });

    // Fungsi untuk mengambil dan menampilkan informasi paket yang dipilih
    function viewPaket() {
        var selectedPaketId = $("#id_paket").val();
        if (selectedPaketId) {
            // Kirim permintaan AJAX untuk mengambil detail paket
            $.ajax({
                url: "/get-paket-info/" + selectedPaketId,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    // Update div "selectedPaketInfo" dengan informasi paket yang diperoleh dari server
                    $("#selectedPaketNama").text(response.nama);
                    $("#selectedPaketDestinasi").text(response.destinasi);
                    $("#selectedPaketKeterangan").html(response.keterangan);
                    $("#selectedPaketHarga").text("Rp. " + response.harga);
                },
                error: function() {
                    alert("Gagal mengambil informasi paket.");
                }
            });
        } else {
            // Jika pengguna belum memilih paket, tampilkan pesan
            $("#selectedPaketNama").text("");
            $("#selectedPaketDestinasi").text("Tidak ada paket yang dipilih");
            $("#selectedPaketKeterangan").text("");
            $("#selectedPaketHarga").text("");
        }
    }
</script>

<script>
        document.getElementById('id_paket').addEventListener('input', function() {
    var id_paket = this.value;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/get-gambar/' + id_paket, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var gambarPaket = document.getElementById('gambarPaket');

            if (response.gambar) {
                gambarPaket.src = response.gambar;
                gambarPaket.style.display = 'block'; // Tampilkan elemen img
            } else {
                gambarPaket.style.display = 'none'; // Sembunyikan elemen img
            }
        }
    };
    xhr.send();
});
</script>
<script>
    window.onload = function() {
      // Mendapatkan elemen input tanggal mulai
      var startDateInput = document.getElementById("tgl_tour_mulai");
      
      // Mendapatkan elemen input tanggal selesai
      var endDateInput = document.getElementById("tgl_tour_selesai");
      
      // Mendapatkan tanggal saat ini
      var today = new Date();
      
      // Menambahkan 2 hari ke tanggal saat ini
      var minDate = new Date(today);
      minDate.setDate(today.getDate() + 2);
      
      // Mengubah format tanggal menjadi YYYY-MM-DD (sesuai format input type date)
      var minDateFormatted = minDate.toISOString().slice(0, 10);
      
      // Mengatur atribut min pada input tanggal mulai
      startDateInput.min = minDateFormatted;
      
      // Mengatur atribut min pada input tanggal selesai
      endDateInput.min = minDateFormatted;
    }
</script>
@endsection