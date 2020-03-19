           <!-- Begin Page Content -->
           <div class="container-fluid">

               <!-- Page Heading -->
               <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
               <form>
                   <div class="form-group">
                       <label>Nama Perusahaan</label>
                       <input type="text" class="form-control" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                       <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                   </div>
                   <div class="form-group">
                       <label>Alamat Perusahaan</label>
                       <input type="text" class="form-control" id="alamat_perusahaan" placeholder="Masukkan Alamat Perusahaan">
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text">Upload Bukti KHS</span>
                       </div>
                       <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file (harus dalam format pdf/jpg/png)</label>
                       </div>
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text">Upload Bukti Bayar</span>
                       </div>
                       <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file (harus dalam format pdf/jpg/png)</label>
                       </div>
                   </div>
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text">Upload Bukti Lainnya</span>
                       </div>
                       <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file (harus dalam format pdf/jpg/png)</label>
                       </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form>

           </div>
           <!-- /.container-fluid -->

           </div>
           <!-- End of Main Content -->