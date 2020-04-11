           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <div class="row">
                   <div class="col-lg-8">
                       <?= $this->session->flashdata('message');   ?>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-8">
                       <?= form_open_multipart('daftarkp/daftarkp'); ?>
                       <div class="form-group row">
                           <label for="name" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                               <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="alamat_perusahaan"" class=" col-sm-4 col-form-label">Alamat Perusahaan</label>
                           <div class="col-sm-8">
                               <textarea type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" rows="3"></textarea>
                               <?= form_error('alamat_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label class="col-sm-4 col-form-label" for="bukti_khs">Bukti KHS</label>
                           <div class="col-sm-8">
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input" id="bukti_khs" name="bukti_khs">
                                   <label class="custom-file-label" for="bukti_khs">Choose file</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label class="col-sm-4 col-form-label" for="bukti_bayar">Bukti Pembayaran</label>
                           <div class="col-sm-8">
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input" id="bukti_bayar" name="bukti_bayar">
                                   <label class="custom-file-label" for="bukti_bayar">Choose file</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-group row">
                           <label class="col-sm-4 col-form-label" for="bukti_surat_perusahaan">Bukti Surat Perusahaan</label>
                           <div class="col-sm-8">
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input" id="bukti_surat_perusahaan" name="bukti_surat_perusahaan">
                                   <label class="custom-file-label" for="bukti_surat_perusahaan">Choose file</label>
                               </div>
                           </div>
                       </div>

                       <div class="form-group row justify-content-end">
                           <div class="col-sm-8">
                               <button type="submit" class="btn btn-primary">Daftar KP</button>
                           </div>
                       </div>
                   </div>
               </div>
               </form>
           </div>
           <!-- /.container-fluid -->

           </div>
           <!-- End of Main Content -->