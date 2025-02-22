<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" dir="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= NOMBRE_APP ?></title>
  <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/images/favicon.png" sizes="16x16">
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <!-- remix icon font css  -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/remixicon.css">
  <!-- Apex Chart css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/apexcharts.css">
  <!-- Data Table css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/dataTables.min.css">
  <!-- Text Editor css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/editor-katex.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/editor.atom-one-dark.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/editor.quill.snow.css">
  <!-- Date picker css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/flatpickr.min.css">
  <!-- Calendar css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/full-calendar.css">
  <!-- Vector Map css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/jquery-jvectormap-2.0.5.css">
  <!-- Popup css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/magnific-popup.css">
  <!-- Slick Slider css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/slick.css">
  <!-- prism css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/prism.css">
  <!-- file upload css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/file-upload.css">
  
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/lib/audioplayer.css">
  <!-- main css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">

<section class="bg-white dark:bg-neutral-700 flex flex-wrap min-h-[100vh]">  
    <div class="lg:w-1/2 lg:block hidden">
        <div class="flex items-center flex-col h-full justify-center">
            <img src="<?= BASE_URL ?>assets/images/auth/forgot-pass-img.png" alt="">
        </div>
    </div>
    <div class="lg:w-1/2 py-8 px-6 flex flex-col justify-center">
        <div class="lg:max-w-[464px] mx-auto w-full">
            <div>
                <h4 class="mb-3">Contraseña olvidada</h4>
                <p class="mb-8 text-secondary-light text-lg">Introduzca la dirección de correo electrónico asociada a su cuenta y le enviaremos un enlace para restablecer su contraseña.</p>
            </div>
            <form id="formForgot" class="form-validate" method="POST">
                <div class="icon-field mb-6 relative">
                    <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                    <input type="email" id="email" class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-neutral-600 rounded-xl" placeholder="Correo Electrónico" required>
                </div>
                <button type="submit" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl"> Continuar</button>

                <div class="text-center">
                    <a href="<?= BASE_URL ?>login" class="text-primary-600 font-bold mt-6 hover:underline">Regresar</a>
                </div>
                
            </form>
        </div>
    </div>
</section>

  <!-- jQuery library js -->
  <script src="<?= BASE_URL ?>assets/js/lib/jquery-3.7.1.min.js"></script>
  <script src="<?= BASE_URL ?>js/main.js"></script>
  <!-- Apex Chart js -->
  <script src="<?= BASE_URL ?>assets/js/lib/apexcharts.min.js"></script>
  <!-- Data Table js -->
  <script src="<?= BASE_URL ?>assets/js/lib/simple-datatables.min.js"></script>
  <!-- Iconify Font js -->
  <script src="<?= BASE_URL ?>assets/js/lib/iconify-icon.min.js"></script>
  <!-- jQuery UI js -->
  <script src="<?= BASE_URL ?>assets/js/lib/jquery-ui.min.js"></script>
  <!-- Vector Map js -->
  <script src="<?= BASE_URL ?>assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Popup js -->
  <script src="<?= BASE_URL ?>assets/js/lib/magnifc-popup.min.js"></script>
  <!-- Slick Slider js -->
  <script src="<?= BASE_URL ?>assets/js/lib/slick.min.js"></script>
  <!-- prism js -->
  <script src="<?= BASE_URL ?>assets/js/lib/prism.js"></script>
  <!-- file upload js -->
  <script src="<?= BASE_URL ?>assets/js/lib/file-upload.js"></script>
  <!-- audio player -->
  <script src="<?= BASE_URL ?>assets/js/lib/audioplayer.js"></script>
  
  <script src="<?= BASE_URL ?>assets/js/flowbite.min.js"></script>
  <!-- main js -->
  <script src="<?= BASE_URL ?>assets/js/app.js"></script>
  <script src="<?= BASE_URL ?>script/forgot.js"></script>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-10 w-full max-w-[496px] max-h-full rounded-2xl bg-white dark:bg-neutral-700">
        <button type="button" class="absolute top-4 end-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="p-2.5 text-center">
            <div class="mb-8 inline-flex">
                <img src="<?= BASE_URL ?>assets/images/auth/envelop-icon.png" alt="">
            </div>
            <h6 class="mb-3">Verifica tu Correo Electrónico.</h6>
            <p class="text-secondary-light text-sm mb-0">Gracias, consulte su Correo Electrónico para obtener instrucciones para restablecer su contraseña.</p>
            <button type="button" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl mt-8" data-modal-hide="popup-modal">Aceptar</button>

        </div>
    </div>
</div>


</body>
</html>
