           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <?= form_error('menu', '<div class="alert alert-warning text-center" role="alert">', '</div>'); ?>

               <?= $this->session->flashdata('message'); ?>

               <div class="row">
                   <div class="col-lg-6">
                       <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Set Role Baru</a>

                       <table class="table table-hover">
                           <thead>
                               <tr>
                                   <th scope="col">No</th>
                                   <th scope="col">Nama Role</th>
                                   <th scope="col-span">Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $i = 1; ?>
                               <?php foreach ($role as $rl) : ?>
                                   <tr>
                                       <th scope="row"><?= $i; ?></th>
                                       <td><?= $rl['role'] ?></td>
                                       <td>
                                           <a href="<?= base_url('admin/roleaccess/') . $rl['role_id'];
                                                    ?>" class="badge badge-warning">Set Akses</a>
                                           <a href="#" class="badge badge-success">Edit</a>
                                           <a href="#" class="badge badge-danger">Delete</a>
                                       </td>
                                   </tr>
                                   <?php $i++; ?>
                               <?php endforeach; ?>

                           </tbody>
                       </table>

                   </div>
               </div>


           </div>
           <!-- /.container-fluid -->

           </div>
           <!-- End of Main Content -->
           <!-- Modal -->
           <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title text-center" id="newRoleModalLabel">Set Role Baru</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <form action="<?= base_url('admin/role'); ?>" method="POST">

                           <div class="modal-body">
                               <div class="form-group">
                                   <input type="text" class="form-control" id="role" name="role" placeholder="Masukkan Role">
                               </div>

                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Tambah</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>