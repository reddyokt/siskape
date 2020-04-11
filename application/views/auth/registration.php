 <body class="bg-gradient-success" style="background:#02d657;">

     <div class="container">
         <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
             <div class="card-body p-0">
                 <!-- Nested Row within Card Body -->
                 <div class="row">
                     <div class="col-lg">
                         <div class="p-5">
                             <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                             </div>
                             <form class="user" method="post" action="<?php echo base_url('auth/registration') ?>">
                                 <div class="form-group">
                                     <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="NIM" value="<?= set_value('nim'); ?>">
                                     <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                     <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                     <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>
                                 <div class="form-group ">
                                     <select type="text" class="form-control mb-3 custom-select" id="prodi" name="prodi" placeholder="Pilih Prodi">
                                         <option selected>Pilih Prodi</option>
                                         <option>Teknik Sipil</option>
                                         <option>Teknik Elektro</option>
                                         <option>Teknik Industri</option>
                                         <option>Teknik Mesin</option>
                                         <option>Teknik Kimia</option>
                                         <option>Arsitektur</option>
                                         <option>Teknik Informatika</option>
                                         <option>D3 OAB</option>
                                     </select>
                                 </div>
                                 <div class=" form-group row">
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                         <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                     </div>
                                     <div class="col-sm-6">
                                         <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                     </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary btn-user btn-block">
                                     Register Account
                                 </button>
                             </form>
                             <hr>
                             <div class="text-center">
                                 <a class="small" href="forgot-password.html">Forgot Password?</a>
                             </div>
                             <div class="text-center">
                                 <a class="small" href="<?php echo base_url('auth'); ?>">Already have an account? Login!</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
     </div>