<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Bahan
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Bahan</li>
        </ol>
    </section>
    <section class="content">
        <?php echo $this->session->flashdata('message'); ?>
        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Bahan</button>
        <a class="btn btn-primary" href="<?php echo base_url('bahan/print') ?>" target="_blank"><i class="fa fa-print"></i> Print</a>
        <div class="dropdown inline">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-download"></i> Export
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo base_url('bahan/pdf') ?>"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                <li><a href="<?php echo base_url('bahan/excel') ?>"><i class="fa fa-file-excel-o"></i> EXCEL</a></li>
            </ul>
        </div>
        <div class="navbar-form navbar-right">
            <?php echo form_open('bahan/search') ?>
            <input type="text" name="keyword" class="form-control" placeholder="Search">
            <button type="submit" class="btn btn-success">Cari</button>
            <?php echo form_close() ?>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Bahan</th>
                <th>Rumus Kimia</th>
                <th>Jumlah/Satuan</th>
                <th>Tempat Penyimpanan</th>
                <th colspan="3" style="text-align:center;">Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($bahan as $bhn) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $bhn->nama_bahan ?></td>
                    <td><?php echo $bhn->rumus_kimia_bahan ?></td>
                    <td><?php echo $bhn->qty ?> <?php echo $bhn->satuan ?></td>
                    <td><?php echo $bhn->tempat_simpan ?></td>
                    <td style="width:20px;"><?php echo anchor(
                                                'bahan/detail/' . $bhn->id_bahan,
                                                '<div class="btn btn-success btn-sm"><i class="fa fa-fw fa-search-plus"></i></div>'
                                            ); ?>
                    </td>
                    <td style="width:20px;" onclick="javascript: return confirm('Yakin Hapus???')">
                        <?php echo anchor('bahan/hapus_data/' . $bhn->id_bahan, '<div class="btn btn-danger">
              <i class="fa fa-fw fa-trash"></i></div>'); ?>
                    </td>
                    <td style="width:20px;"><?php echo anchor(
                                                'bahan/edit/' . $bhn->id_bahan,
                                                '<div class="btn btn-warning"><i class="fa fa-fw fa-edit"></i></div>'
                                            ); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Form Tambah Data Bahan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('bahan/tambah_aksi'); ?>

                    <div class="form-group">
                        <label>Nama Bahan</label>
                        <input type="text" name="nama_bahan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rumus Kimia Bahan</label>
                        <input type="text" name="rumus_kimia_bahan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select name="satuan" class="form-control">
                            <option>gr</option>
                            <option>ml</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat Penyimpanan</label>
                        <input type="text" name="tempat_simpan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-success">Simpan</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>