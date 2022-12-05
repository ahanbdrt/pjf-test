<title>Pelamar</title>
</head>
<body>

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h3><b>Daftar Pelamar</b></h3>
        </div>
        <div class="card-body">
    <button id="toolbar" class="rounded btn btn-primary btn-sm mb-5" data-toggle="modal" data-target="#tambahbig5"><i class="fas fa-sm fa-plus"></i> Daftarkan Pelamar</button>
    <div class="table-responsive">
    <table class="table table-bordered" width="100%" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no= 1;
            foreach($pjf->result() as $p){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $p->isi_pjf?></td>
                <td>
                    <button class="btn btn-warning btn-sm ml-1 mr-1" data-toggle="modal" data-target="#editpjf" onclick="edit('<?= $p->isi_pjf?>','<?= $p->id_pjf?>')"><i class="fas fa-sm fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm ml-1" data-delete-url="<?= site_url('person_job_fit/hapus/'.$p->id_pjf) ?>" onclick="confirm(this)"><i class="fas fa-sm fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Person-Job-Fit</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('person_job_fit/input_pjf')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" class="form-control mb-3" name="pertanyaan" placeholder="Masukkan Pertanyaan..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" onclick="loading()" class="btn btn-primary" type="submit">Submit</button>
                            <button id="loadtambah" class="btn btn-secondary" hidden><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div></button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Person-Job-Fit</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('person_job_fit/edit')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" class="form-control mb-3" name="pertanyaan" id="isi_pjf" placeholder="Masukkan Pertanyaan..."></textarea>
                        <input type="hidden" class="form-control mb-3" name="id_pjf" id="id_pjf" placeholder="Masukkan Pertanyaan...">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submitedit" onclick="loading()" class="btn btn-primary" type="submit">Submit</button>
                            <button id="loadedit" class="btn btn-secondary" hidden><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<script>
     function edit(isi,id){
        document.getElementById('isi_pjf').value = isi;
        document.getElementById('id_pjf').value = id;
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