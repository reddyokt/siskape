<div class="content-wrapper">
    <section class="content">
        <h4><strong>DETAIL BAHAN</strong></h4>

        <table class="table">
            <tr>
                <th>Nama Bahan</th>
                <td><?php echo $detail->nama_bahan ?></td>
            </tr>
            <tr>
                <th>Rumus Kimia Bahan</th>
                <td><?php echo $detail->rumus_kimia_bahan ?></td>
            </tr>
            <tr>
                <th>Jumlah/Satuan</th>
                <td><?php echo $detail->qty ?> <?php echo $detail->satuan ?></td>
            </tr>
            <tr>
                <th>Tempat Penyimpanan</th>
                <td><?php echo $detail->tempat_simpan ?></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" width="200" height="200">
                </td>
                <td></td>
            </tr>
        </table>
        <a href="<?php echo base_url('bahan/index'); ?>" class="btn btn-primary">Kembali</a>
    </section>
</div>