<!-- Modal Syarat Ketentuan Registrasi Pengemudi -->
<div id="syaratKetentuanModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Syarat dan Ketentuan (harap dibaca!)
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="syaratKetentuanModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
           <!-- Modal body -->
            <div class="p-6 space-y-6">
                <h2 class="text-xl font-bold text-gray-800">Syarat dan Ketentuan Bergabung sebagai Pengemudi di Bali Temple Tour</h2>
                <ol class="list-decimal list-inside text-base leading-relaxed text-gray-500">
                    <li>Kami mengharapkan pengemudi yang bergabung dengan Bali Temple Tour memiliki pengalaman yang memadai dalam mengemudikan kendaraan mobil dan memiliki pengetahuan yang baik tentang tempat wisata di Bali. Pengemudi harus dapat memberikan informasi yang relevan tentang tempat-tempat yang dikunjungi kepada tamu dengan ramah dan profesional.</li>
                    <li>Setiap pengemudi diwajibkan memiliki lisensi mengemudi yang sah dan dokumen kendaraan yang lengkap dan berlaku untuk setiap tur yang dilakukan. Pengemudi harus mematuhi peraturan lalu lintas dan persyaratan hukum lainnya yang berlaku di Bali.</li>
                    <li>Pengemudi harus dapat menghadiri dan memenuhi jadwal tur dengan tepat waktu. Kehandalan dan ketepatan waktu sangat penting bagi pengalaman wisata yang baik. Pengemudi juga diharapkan bersikap profesional dalam berinteraksi dengan tamu, menjaga sopan santun, dan memberikan pelayanan terbaik kepada pelanggan.</li>
                    <li>Sebagai pengemudi, Anda setuju dengan kebijakan kami yang mengenakan potongan 20% dari harga paket tour untuk biaya bersih mengemudi Anda. Potongan ini akan dihitung dari harga paket tour yang dijual kepada tamu. Sebagai contoh, jika harga paket tour adalah Rp 1.000.000, biaya bersih Anda setelah potongan akan menjadi Rp 800.000 (Rp 1.000.000 - 20%).</li>
                    <li>Sebelum bergabung sebagai pengemudi, Anda akan diminta untuk menandatangani perjanjian kerjasama yang berisi detail tentang syarat dan ketentuan ini, kewajiban dan hak Anda sebagai pengemudi, serta peraturan lain yang berlaku di Bali Temple Tour.</li>
                </ol>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <a href="{{ route('registrasipengemudi') }}"><button data-modal-hide="syaratKetentuanModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600">Saya Setuju</button></a>
                <button data-modal-hide="syaratKetentuanModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
            </div>
        </div>
    </div>
</div>

    <!-- Berhasil Registrasi -->
    <div id="registrasiBerhasil" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda berhasil registrasi, silakan melakukan login</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="registrasiBerhasil">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Berhasil Login -->
    <div id="berhasilLogin" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda berhasil login!</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="berhasilLogin">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Pemesanan Berhasil-->
    <div id="pesananBerhasil" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Pesanan berhasil dikirim, Cek berskala email anda untuk mendapatkan notifikasi, lihat status pemesanan pada profil anda</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="pesananBerhasil">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Pemesanan Batal-->
    <div id="batalPesanan" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Pengajuan Pesanan berhasil dikirim, harap cek sesaat status pesanan anda!</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="batalPesanan">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Ubah Password-->
    <div id="ubahPassword" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ Session::get('ubahPassword') }}</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="ubahPassword">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Reset Password-->
    <div id="reset" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50"></div> <!-- Latar belakang semi-transparan -->
        <div class="relative w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-6 text-center">
                    <i class="mb-8 fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #49ab07;"></i>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ Session::get('reset') }}</h3>
                    <button type="button" class="text-white bg-slate-700 hover:bg-slate-400 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-modal-hide="reset">
                        OK
                    </button>
                </div>
                
            </div>
        </div>
    </div>


  
