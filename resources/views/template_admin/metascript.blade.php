 <!-- plugin for charts  -->
 <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
 <!-- plugin for scrollbar  -->
 <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
 <!-- github button -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- main script file  -->
 <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4') }}" async></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

 <script>
    window.addEventListener('DOMContentLoaded', () =>{
        const overlay = document.querySelector('#overlay')
        const delBtn = document.querySelector('#delete-btn')
        const closeBtn = document.querySelector('#close-modal')

        const toggleModal = () => {
            overlay.classList.toggle('hidden')
            overlay.classList.toggle('flex')
        }

        delBtn.addEventListener('click', toggleModal)

        closeBtn.addEventListener('click', toggleModal)
    })
</script>
<script>
    jQuery(document).ready(function () {
    ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $(".upload__inputfile").each(function () {
        $(this).on("change", function (e) {
            imgWrap = $(this).closest(".upload_box").find(".upload_img-wrap");
            var maxLength = $(this).attr("data-max_length");

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {
                if (!f.type.match("image.*")) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false;
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result +
                                ")' data-number='" +
                                $(".upload__img-close").length +
                                "' data-file='" +
                                f.name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        };
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $("body").on("click", ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        if (file.includes("storage")) {
            let deleted_images = $("#deleted_images").val();
            deleted_images += $(this).parent().data("id") + ",";
            $("#deleted_images").val(deleted_images);
            console.log($("#deleted_images").val());
        }
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

function deleteModalHandler(index) {
    $("#deleteItem").attr("action", $("#delete_route_" + index).val());
    $("#delete_route_input").val($("#delete_route_" + index).val());
}

//detail images
function productImages(){
let thumbnails=document.getElementsByClassName('thumbnail-product');
let activeImages=document.getElementsByClassName('active_thumb');
for(var i=0;i<thumbnails.length;i++){
    thumbnails[i].addEventListener('mouseover',function(){
        // console.log(activeImages)
        if(activeImages.length>0){
            activeImages[0].classList.remove('active_thumb');
        }
        this.classList.add('active_thumb');
        document.getElementsByClassName('featured-img')[0].src=this.src;       
    });
}

let btnLeft=document.getElementById('arrow-left');
let btnRight=document.getElementById('arrow-right');

btnLeft.addEventListener('click',function(){
    document.getElementById('slider_thumbnail').scrollLeft-=180;
});
btnRight.addEventListener('click',function(){
    document.getElementById('slider_thumbnail').scrollLeft+=180;
});
}
</script>

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

<script>
    tinymce.init({
    selector: '#keterangan',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
      // Konfigurasi lainnya (jika diperlukan)
    });
</script>

<script>
    let paketIdToDelete = null;
    let mobilIdToDelete = null;
  
    // Fungsi untuk menampilkan modal
    function showModal(paketId, mobilId) {
      // Simpan data paket dan mobil yang ingin dihapus
      paketIdToDelete = paketId;
      mobilIdToDelete = mobilId;
  
      // Tampilkan modal
      document.getElementById('modal-confirm').classList.remove('hidden');
    }
  
    // Fungsi untuk menyembunyikan modal
    function hideModal() {
      document.getElementById('modal-confirm').classList.add('hidden');
    }
  
    // Fungsi untuk menghapus data setelah konfirmasi
    function hapusData() {
      // Buat form tambahan untuk mengirim data penghapusan
      let deleteForm = document.createElement('form');
      deleteForm.action = "{{ route('hapusPaket') }}";
      deleteForm.method = "post";
      deleteForm.innerHTML = `
          @csrf
          <input type="hidden" name="id_paket" value="${paketIdToDelete}">
          <input type="hidden" name="id_mobil" value="${mobilIdToDelete}">
      `;
      document.body.appendChild(deleteForm);
      deleteForm.submit();
  
      // Sembunyikan modal setelah menghapus data
      hideModal();
    }
  
    // Fungsi untuk membatalkan penghapusan
    function batalTolak() {
      // Kosongkan data paket dan mobil yang ingin dihapus
      paketIdToDelete = null;
      mobilIdToDelete = null;
  
      // Sembunyikan modal
      hideModal();
    }
  </script>
  