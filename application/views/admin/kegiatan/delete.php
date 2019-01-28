 <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data->id_kegiatan; ?>" title="delete">
    <i class="fa fa-trash-o"></i>
</button>
    <div class="modal fade" id="myModal <?php echo $data->id_kegiatan; ?>"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"/>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                </div>
                <div class="modal-body">
                   yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?php echo base_url('admin/kegiatan/delete/'.$data->id_kegiatan); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i>Hapus data ini</a>
                </div>
            </div>
        </div>
    </div>