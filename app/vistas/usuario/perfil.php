  <div class="dashboard-main-body">
      <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
          <h6 class="font-semibold mb-0 dark:text-white">Perfil</h6>
          <ul class="flex items-center gap-[6px]">
              <li class="font-medium">
                  <a href="<?= BASE_URL ?>inicio" class="flex items-center gap-2 hover:text-primary-600 dark:text-white dark:hover:text-primary-600">
                      <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                      Dashboard
                  </a>
              </li>
              <li class="dark:text-white">-</li>
              <li class="font-medium dark:text-white">Ver perfil</li>
          </ul>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <div class="col-span-12 lg:col-span-4">
              <div class="user-grid-card relative border border-neutral-200 dark:border-neutral-600 rounded-2xl overflow-hidden bg-white dark:bg-neutral-700 h-full">
                  <img src="<?= BASE_URL ?>assets/images/user-grid/user-grid-bg1.png" alt="" class="w-full object-fit-cover">
                  <div class="pb-6 ms-6 mb-6 me-6 -mt-[100px]">
                      <div class="text-center border-b border-neutral-200 dark:border-neutral-600">
                          <img src="<?= BASE_URL ?>assets/images/user-grid/user-grid.png" alt="" class="border br-white border-width-2-px w-200-px h-[200px] rounded-full object-fit-cover mx-auto">
                          <h6 class="mb-0 mt-[200px]"><?= ucfirst($_SESSION['nombreUsuario']) ?></h6>
                          <span class="text-secondary-light mb-4"><?= $_SESSION['emailUsuario'] ?></span>
                      </div>
                      <div class="mt-6">
                          <h6 class="text-xl mb-4">Información Personal</h6>
                          <ul>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200">Nombre</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: <?= ucfirst($_SESSION['nombreUsuario']) ?></span>
                              </li>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Correo</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: <?= $_SESSION['emailUsuario'] ?></span>
                              </li>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Teléfono</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: </span>
                              </li>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Ocupación</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: </span>
                              </li>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Rol</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: </span>
                              </li>
                              <li class="flex items-center gap-1 mb-3">
                                  <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Idioma</span>
                                  <span class="w-[70%] text-secondary-light font-medium">: </span>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-span-12 lg:col-span-8">
              <div class="card h-full border-0">
                  <div class="card-body p-6">

                      <ul class="tab-style-gradient flex flex-wrap text-sm font-medium text-center mb-5" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                          <li class="" role="presentation">
                              <button class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600" id="edit-profile-tab" data-tabs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile" aria-selected="false">
                                  Editar Perfil
                              </button>
                          </li>
                          <li class="" role="presentation">
                              <button class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="change-password-tab" data-tabs-target="#change-password" type="button" role="tab" aria-controls="change-password" aria-selected="false">
                                  Cambiar Contraseña
                              </button>
                          </li>
                      </ul>

                      <div id="default-tab-content">
                          <div class="hidden" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                              <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4">Profile Image</h6>
                              <!-- Upload Image Start -->
                              <div class="mb-6 mt-4">
                                  <div class="avatar-upload">
                                      <div class="avatar-edit absolute bottom-0 end-0 me-6 mt-4 z-[1] cursor-pointer">
                                          <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                          <label for="imageUpload" class="w-8 h-8 flex justify-center items-center bg-primary-100 dark:bg-primary-600/25 text-primary-600 dark:text-primary-400 border border-primary-600 hover:bg-primary-100 text-lg rounded-full">
                                              <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                          </label>
                                      </div>
                                      <div class="avatar-preview">
                                          <div id="imagePreview">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- Upload Image End -->
                              <form action="#">
                                  <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6">
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="name" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nombre <span class="text-danger-600">*</span></label>
                                              <input type="text" class="form-control rounded-lg" id="name" placeholder="Enter Full Name">
                                          </div>
                                      </div>
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="email" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Correo Electrónico <span class="text-danger-600">*</span></label>
                                              <input type="email" class="form-control rounded-lg" id="email" placeholder="Enter email address">
                                          </div>
                                      </div>
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="number" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Teléfono</label>
                                              <input type="email" class="form-control rounded-lg" id="number" placeholder="Enter phone number">
                                          </div>
                                      </div>
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="depart" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Ocupación <span class="text-danger-600">*</span> </label>
                                              <select class="form-control rounded-lg form-select" id="depart">
                                                  <option>Enter Event Title </option>
                                                  <option>Enter Event Title One </option>
                                                  <option>Enter Event Title Two</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="desig" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Rol <span class="text-danger-600">*</span> </label>
                                              <select class="form-control rounded-lg form-select" id="desig">
                                                  <option>Enter Designation Title </option>
                                                  <option>Enter Designation Title One </option>
                                                  <option>Enter Designation Title Two</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-span-12 sm:col-span-6">
                                          <div class="mb-5">
                                              <label for="Language" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Idioma <span class="text-danger-600">*</span> </label>
                                              <select class="form-control rounded-lg form-select" id="Language">
                                                  <option> English</option>
                                                  <option> Bangla </option>
                                                  <option> Hindi</option>
                                                  <option> Arabic</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="flex items-center justify-center gap-3">
                                      <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg">
                                          Cancelar
                                      </button>
                                      <button type="button" class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                                          Guardar
                                      </button>
                                  </div>
                              </form>
                          </div>
                          <div class="hidden" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                              <div class="mb-5">
                                  <label for="your-password" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Nueva Contraseña <span class="text-danger-600">*</span></label>
                                  <div class="relative">
                                      <input type="password" class="form-control rounded-lg" id="your-password" placeholder="Enter New Password*">
                                      <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#your-password"></span>
                                  </div>
                              </div>
                              <div class="mb-5">
                                  <label for="confirm-password" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Confirmación de Contraseña <span class="text-danger-600">*</span></label>
                                  <div class="relative">
                                      <input type="password" class="form-control rounded-lg" id="confirm-password" placeholder="Confirm Password*">
                                      <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#confirm-password"></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>