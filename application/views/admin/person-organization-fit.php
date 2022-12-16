<title>Pertanyaan Person-organization-Fit</title>
</head>
<body style="background-color:lightgray">

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h3><b>Tabel Person-Organization-Fit:</b></h3>
        </div>
        <div class="card-body">
            <button id="toolbar" class="rounded btn btn-primary btn-sm mb-5" data-toggle="modal" data-target="#tambahbig5"><i class="fas fa-sm fa-plus"></i> Tambah Person-Organization-Fit</button>
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
            foreach($pof->result() as $p){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $p->isi_pof?></td>
                <td>
                    <button class="btn btn-warning btn-sm ml-1 mr-1" data-toggle="modal" data-target="#editpof" onclick="edit('<?= $p->isi_pof?>','<?= $p->id_pof?>')"><i class="fas fa-sm fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm ml-1" data-delete-url="<?= site_url('person_organization_fit/hapus/'.$p->id_pof) ?>" onclick="confirm(this)"><i class="fas fa-sm fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Person-organization-Fit</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('person_organization_fit/input_pof')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" class="form-control mb-3" name="pertanyaan" placeholder="Masukkan Pertanyaan..." required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" style="width:75px" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->
<div class="modal fade" id="editpof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Person-organization-Fit</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('person_organization_fit/edit')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" class="form-control mb-3" name="pertanyaan" id="isi_pof" placeholder="Masukkan Pertanyaan..." required></textarea>
                        <input type="hidden" class="form-control mb-3" name="id_pof" id="id_pof" placeholder="Masukkan Pertanyaan...">
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
     function edit(isi,id){
        document.getElementById('isi_pof').value = isi;
        document.getElementById('id_pof').value = id;
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