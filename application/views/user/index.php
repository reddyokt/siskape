           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <!-- tampilan profile-->
               <div class="row">
                   <div class="col-lg-7">
                       <?= $this->session->flashdata('message');   ?>
                   </div>
               </div>
               <div class="card mb-3" style="max-width: 556px;">
                   <div class="row no-gutters">
                       <div class="col-md-4">
                           <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="image_profile">
                       </div>

                       <div class="col-md-8">
                           <div class="card-body">

                               <h4 class="card-title"><?= $user['name'] ?></h4>
                               <table>
                                   </tr>
                                   <tr>
                                       <th scope="row">NIM</th>
                                       <td>: </td>
                                       <td><?= $user['nim'] ?></td>
                                   </tr>
                                   <tr>
                                       <th scope="row">Email</th>
                                       <td>: </td>
                                       <td><?= $user['email'] ?></td>
                                   </tr>
                                   <tr>
                                       <th scope="row">Fakultas</th>
                                       <td>: </td>
                                       <td>Fakultas Teknik</td>
                                   </tr>
                                   <tr>
                                       <th scope="row">Program Studi</th>
                                       <td>: </td>
                                       <td><?= $user['prodi'] ?></td>
                                   </tr>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
           <!-- /.container-fluid -->

           </div>
           <!-- End of Main Content -->