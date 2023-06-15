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