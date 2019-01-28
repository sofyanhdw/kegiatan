
<p><a href="<?php echo base_url('admin/user/tambah'); ?>" class="btn btn-primary">
<i class="fa fa-plus"></i>Tambah</a>
</p>

<?php
//cetak notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Tahun Lulus</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($tbl_alumni as $data) { ?>
        <tr class="odd gradeX">
            <td><?php echo $i ?></td>
            <td><?php echo $data->npm ?></td>
            <td><?php echo $data->nama_users ?></td>
            <td><?php echo $data->jurusan ?></td>
            <td><?php echo $data->angkatan ?></td>
            <td><?php echo $data->tahun_lulus ?></td>
            <td>
            	<a href="<?php echo base_url('admin/user/edit/'.$data->id_alumni); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
            	<?php 
            		include('delete.php');
            	?>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>