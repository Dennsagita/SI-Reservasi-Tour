<div id="popup-modal" tabindex="-1" class="fixed z-990 top-0 left-0 right-0  hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin Ingin Logout?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="window.location.href='{{ route('logout') }}'">Logout</button>
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
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

 <!-- Modal Paket Pilihan Pengemudi -->
 <div class="hidden fixed z-50 inset-0 overflow-y-auto" id="modal-confirm">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Bagian overlay modal -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <!-- Konten modal -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:w-1/2" role="dialog" aria-modal="true" aria-labelledby="modal-confirm-title">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <!-- Isi konten modal -->
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-confirm-title">
                Anda yakin ingin menolak paket pilihan pengemudi?
              </h3>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6">
          <div class="flex mx-auto flex-col items-center sm:flex-row-reverse sm:justify-end">
            <!-- Tombol "Ya, Tolak" -->
            <button type="button" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:mt-0" onclick="hapusData()">Ya, Tolak</button>
            <!-- Tombol "Batal" -->
            <button type="button" class="mt-3 w-full sm:w-auto inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0" onclick="batalTolak()">Batal</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>