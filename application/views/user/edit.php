           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <?= form_error('menu', '<div class="alert alert-warning text-center" role="alert">', '</div>'); ?>

               <?= $this->session->flashdata('message'); ?>


               <div class="row">
                   <div class="col-lg-6">
                       <?= form_open_multipart('user/edit'); ?>
                       <div class="form-group row">
                           <label for="name" class="col-sm-3 col-form-label">NIM</label>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" id="nim" name="nim" value="<?= $user['nim'] ?>" readonly>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                           </div>
                           <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                       </div>
                       <div class="form-group row">
                           <label for="email" class="col-sm-3 col-form-label">Email</label>
                           <div class="col-sm-9">
                               <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="email" class="col-sm-3 col-form-label">Program Studi</label>
                           <div class="col-sm-9">
                               <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $user['prodi'] ?>" readonly>
                           </div>
                       </div>
                       <div class="form-group row">
                           <div class="col-sm-3">Foto</div>
                           <div class="col-sm-9">
                               <div class="row">
                                   <div class="col-sm-4">
                                       <img src=" <?= base_url('/assets/img/profile/') . $user['image'] ?> " class="img-thumbnail">
                                   </div>
                                   <div class="col-sm-8">
                                       <div class="custom-file">
                                           <input type="file" class="custom-file-input" id="image" name="image">
                                           <label class="custom-file-label" for="image">Choose file</label>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="form-group row justify-content-end">
                           <div class=" col-sm-9">
                               <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                       </div>
                   </div>

               </div>

               </form>

           </div>

           </div>
           </div>


           </div>
           <!-- /.container-fluid -->

           </div>
           <!-- End of Main Content -->