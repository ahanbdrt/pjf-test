<title>Jadwal-Test</title>
</head>
<body>

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h3><b>Jadwal</b></h3>
        </div>
        <div class="card-body">
    <button id="toolbar" class="rounded btn btn-primary btn-sm mb-5" data-toggle="modal" data-target="#tambahbig5"><i class="fas fa-sm fa-plus"></i> Tambahkan Jadwal</button>
    <div class="table-responsive">
    <table class="table table-bordered" width="100%" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th width=10%>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no= 1;
            foreach($jadwal->result() as $j){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $j->mulai?></td>
                <td><?= $j->selesai?></td>
                <td>
                    <button class="btn btn-warning btn-sm ml-1 mr-1" data-toggle="modal" data-target="#editpjf" onclick="edit('<?= $j->id?>','<?= $j->mulai?>','<?= $j->selesai?>')"><i class="fas fa-sm fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm ml-1" data-delete-url="<?= site_url('jadwal/hapus/'.$j->id) ?>" onclick="confirm(this)"><i class="fas fa-sm fa-trash"></i></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="tambahbig5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Jadwal</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('jadwal/tambah')?>" method="post">
                <div class="modal-body">
                <label>Tanggal Mulai</label>
                        <input required type="datetime-local" class="form-control mb-3" name="mulai">
                        <label>Tanggal Selesai</label>
                        <input required type="datetime-local" class="form-control mb-3" name="selesai">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" style="width:75px" class="btn btn-primary" type="submit">Submit</button>
                            <button id="loadtambah" style="width:75px" disabled class="btn btn-secondary" hidden><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->
<div class="modal fade" id="editpjf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Jadwal</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('jadwal/edit')?>" method="post">
                <div class="modal-body">
                        <label>Tanggal Mulai</label>
                        <input required type="datetime-local" class="form-control mb-3" name="mulai" id="mulai" required>
                        <input type="hidden" class="form-control mb-3" name="id" id="id" placeholder="Masukkan Pertanyaan...">
                        <label>Tanggal Selesai</label>
                        <input required type="datetime-local" class="form-control mb-3" name="selesai" id="selesai" required>
                    </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submitedit" style="width:75px" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<script>
    if(document.getElementById())
     function edit(id,mulai,selesai){
        document.getElementById('mulai').value = mulai;
        document.getElementById('id').value = id;
        document.getElementById('selesai').value = selesai;
     }
     function loading(){
        document.getElementById('loadedit').hidden = false;
        document.getElementById('submitedit').hidden = true;
        document.getElementById('loadtambah').hidden = false;
        document.getElementById('submittambah').hidden = true;
     }
</script>

<script>
		function confirm(event){
			Swal.fire({
				title: 'Konfirmasi!',
				text: 'Apakah anda yakin ingin menghapus data ini?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'Batal',
				confirmButtonText: 'Ya',
				confirmButtonColor: 'red',
                width:450
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
</script>
