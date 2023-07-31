<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.avatar')
</script>
 <!-- plugin for charts  -->
 <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
 <!-- plugin for scrollbar  -->
 <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
 <!-- github button -->
 <!-- main script file  -->
 <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4') }}" async></script>
 <!-- plugin for charts  -->
 <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
 <!-- plugin for scrollbar  -->
 <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
 <!-- github button -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- main script file  -->
 <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4') }}" async></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        const modal = document.getElementById('berhasilLogin');
        
        // Periksa apakah login berhasil (Anda dapat mengatur nilai ini di controller login)
        const loginBerhasil = {{ session('loginBerhasil') ? 'true' : 'false' }};
        
        // Periksa apakah login berhasil dan tampilkan modal
        if (loginBerhasil) {
            modal.classList.remove('hidden');
        }
        
        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }
        
        // Tambahkan event listener ke tombol OK pada modal
        const closeButton = modal.querySelector('[data-modal-hide="berhasilLogin"]');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden'); // Mengaktifkan scroll pada body
        });
    });
</script>

 <!-- Javascript untuk berhasil registrasi popup  -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        const modal = document.getElementById('registrasiBerhasil');
        
        // Periksa apakah login berhasil (Anda dapat mengatur nilai ini di controller login)
        const loginBerhasil = {{ session('registrasiBerhasil') ? 'true' : 'false' }};
        
        // Periksa apakah login berhasil dan tampilkan modal
        if (loginBerhasil) {
            modal.classList.remove('hidden');
        }
        
        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }
        
        // Tambahkan event listener ke tombol OK pada modal
        const closeButton = modal.querySelector('[data-modal-hide="registrasiBerhasil"]');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden'); // Mengaktifkan scroll pada body
        });
    });
</script>

 <!-- Javascript untuk berhasil memesan pada pelanggan popup  -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        const modal = document.getElementById('pesananBerhasil');
        
        // Periksa apakah login berhasil (Anda dapat mengatur nilai ini di controller login)
        const loginBerhasil = {{ session('pesananBerhasil') ? 'true' : 'false' }};
        
        // Periksa apakah login berhasil dan tampilkan modal
        if (loginBerhasil) {
            modal.classList.remove('hidden');
        }
        
        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }
        
        // Tambahkan event listener ke tombol OK pada modal
        const closeButton = modal.querySelector('[data-modal-hide="pesananBerhasil"]');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden'); // Mengaktifkan scroll pada body
        });
    });
</script>
 <!-- Javascript untuk batal memesan pada pelanggan popup  -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        const modal = document.getElementById('batalPesanan');
        
        // Periksa apakah login berhasil (Anda dapat mengatur nilai ini di controller login)
        const loginBerhasil = {{ session('batalPesanan') ? 'true' : 'false' }};
        
        // Periksa apakah login berhasil dan tampilkan modal
        if (loginBerhasil) {
            modal.classList.remove('hidden');
        }
        
        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }
        
        // Tambahkan event listener ke tombol OK pada modal
        const closeButton = modal.querySelector('[data-modal-hide="batalPesanan"]');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden'); // Mengaktifkan scroll pada body
        });
    });
</script>
 <!-- Javascript untuk batal memesan pada pelanggan popup  -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        const modal = document.getElementById('ubahPassword');
        
        // Periksa apakah login berhasil (Anda dapat mengatur nilai ini di controller login)
        const loginBerhasil = {{ session('ubahPassword') ? 'true' : 'false' }};
        
        // Periksa apakah login berhasil dan tampilkan modal
        if (loginBerhasil) {
            modal.classList.remove('hidden');
        }
        
        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            modal.classList.add('hidden');
        }
        
        // Tambahkan event listener ke tombol OK pada modal
        const closeButton = modal.querySelector('[data-modal-hide="ubahPassword"]');
        closeButton.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.querySelector('body').classList.remove('overflow-hidden'); // Mengaktifkan scroll pada body
        });
    });
</script>


  
  

 {{-- <script>
    $(document).ready(function() {
        // Ambil ID pengemudi dari URL
        var pengemudiId = {{ $id_pengemudi }};

        // Gunakan ID pengemudi sesuai kebutuhan, misalnya untuk mengisi nilai input
        $('#mobilForm input[name="id_pengemudi"]').val(pengemudiId);
    });
</script> --}}
 