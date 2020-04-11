<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!--card daftar pengjauan kp-->

    <?php foreach ($userdata as $user) : ?>
        <div class="card border-info mb-1" style="max-width: 80%;">
            <div class="card-header"><?= $user->name ?></div>
            <div class="card-body text-info">
                <table class="table-hover">
                    <tr>
                        <th>NIM</th>
                        <td>: </td>
                        <td><?= $user->nim ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>: </td>
                        <td><?= $user->prodi ?></td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>: </td>
                        <td><?= $user->nama_perusahaan ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>: </td>
                        <td><?= $user->alamat_perusahaan ?></td>
                    </tr>
                </table>

                <a href="<?= base_url('/assets/img/bukti/') . $user->bukti_khs ?>" target=" _blank"" class=" btn btn-outline-info " role=" button" aria-pressed="true">Bukti KHS</a>
                <a href="<?= base_url('/assets/img/bukti/') . $user->bukti_bayar ?>" target=" _blank"" class=" btn btn-outline-info " role=" button" aria-pressed="true">Bukti Bayar</a>
                <a href="<?= base_url('/assets/img/bukti/') . $user->bukti_surat_perusahaan ?>" target=" _blank"" class=" btn btn-outline-info " role=" button" aria-pressed="true">Bukti Surat Perusahaan </a>
                <a href="#" class="btn btn-danger float-right ml-2" role="button" aria-pressed="true">Ditolak</a>
                <a href="#" class="btn btn-success float-right mb-3" role="button" aria-pressed="true">Terima</a>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->