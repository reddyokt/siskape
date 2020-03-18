           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <?php if (validation_errors()) : ?>
                   <div class="alert alert-warning text-center" role="alert">
                       <?= validation_errors(); ?>
                   </div>
               <?php endif; ?>
               <?= form_error('menu', '<div class="alert alert-warning text-center" role="alert">', '</div>'); ?>

               <?= $this->session->flashdata('message'); ?>

               <div class="row">
                   <div class="col-lg-12">
                       <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah SubMenu</a>

                       <table class="table table-hover">
                           <thead>
                               <tr>
                                   <th scope="col">No</th>
                                   <th scope="col">Judul</th>
                                   <th scope="col-span">Menu</th>
                                   <th scope="col-span">Url</th>
                                   <th scope="col-span">Icon</th>
                                   <th scope="col-span">Active</th>
                                   <th scope="col-span">Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $i = 1; ?>
                               <?php foreach ($submenu as $sm) : ?>
                                   <tr>
                                       <th scope="row"><?= $i; ?></th>
                                       <td><?= $sm['title'] ?></td>
                                       <td><?= $sm['menu'] ?></td>
                                       <td><?= $sm['url'] ?></td>
                                       <td><?= $sm['icon'] ?></td>
                                       <td><?= $sm['is_active'] ?></td>
                                       <td>
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
           <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title text-center" id="newSubMenuModalLabel">Tambah SubMenu</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <form action="<?= base_url('menu/submenu'); ?>" method="POST">

                           <div class="modal-body">
                               <div class="form-group">
                                   <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Nama Menu">
                               </div>

                               <div class="form-group">
                                   <select name="menu_id" id="menu_id" class="form-control">
                                       <option value="">Pilih Menu</option>
                                       <?php foreach ($menu as $mn) :  ?>
                                           <option value="<?= $mn['id']; ?>"><?= $mn['menu']; ?></option>
                                       <?php endforeach;  ?>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                               </div>
                               <div class="form-group">
                                   <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                               </div>
                               <div class="form-group">
                                   <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                       <label class="form-check-label" for="is_active">
                                           Active?
                                       </label>
                                   </div>

                               </div>

                           </div>
                           <div class=" modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Tambah</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>