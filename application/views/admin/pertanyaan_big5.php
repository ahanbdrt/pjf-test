<title>Pertanyaan Big Five</title>
</head>
<body style="background-color:lightgray">

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h3><b>Tabel Pertanyaan Big Five:</b></h3>
        </div>
        <div class="card-body">
            <button id="toolbar" class="rounded btn btn-primary btn-sm mb-5" data-toggle="modal" data-target="#tambahbig5"><i class="fas fa-sm fa-plus"></i> Tambah Pertanyaan Big Five</button>
    <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Nilai</th>
                <th>Faktor</th>
                <th width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no= 1;
            foreach($big5->result() as $b){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $b->isi_soal?></td>
                <?php if($b->kategori=="+"){?>
                    <td>Positif</td>
                <?php }else{?>
                    <td>Negatif</td>
                <?php } ?>
                <td><?= $b->jenis_faktor?></td>
                <td>
                    <button class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editbig5" onclick="edit('<?= $b->isi_soal ?>','<?=$b->kategori?>','<?= $b->faktor ?>','<?= $b->id_soal?>')"><i class="fas fa-sm fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" data-delete-url="<?= site_url('pertanyaan/hapus_pertanyaan/'.$b->id_soal) ?>" onclick="confirm(this)"><i class="fas fa-sm fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Pertanyaan Big Five</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('pertanyaan/input_pertanyaan_big5')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" class="form-control mb-3" name="pertanyaan" placeholder="Masukkan Pertanyaan..."></textarea>
                        <label>Kategori</label>
                        <Select type="select" class="form-control mb-3" name="kategori">
                            <option value disabled selected>Pilih Kategori</option>
                            <option value="+">Positif</option>
                            <option value="-">Negatif</option>
                        </Select>
                        <label>Faktor</label>
                        <select type="select" class="form-control mb-3" name="faktor">
                            <option value disabled selected>Pilih Faktor</option>
                            <?php foreach($faktor->result() as $f){?>
                                <option value="<?= $f->id_faktor?>"><?= $f->jenis_faktor ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" style="width:75px" onclick="loading()" class="btn btn-primary" type="submit">Submit</button>
                            <button id="loadtambah" style="width:75px" disabled class="btn btn-secondary" hidden><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->
<div class="modal fade" id="editbig5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Pertanyaan Big Five</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('pertanyaan/edit_pertanyaan_big5')?>" method="post">
                <div class="modal-body">
                        <label>Pertanyaan</label>
                        <textarea style="height:200px" type="text" id="isi_soal" class="form-control mb-3" name="pertanyaan" placeholder="Masukkan Pertanyaan..."></textarea>
                        <input type="hidden" name="id_soal" id="id_soal">
                        <label>Kategori</label>
                        <Select id="kategori" type="select" class="form-control mb-3" name="kategori">
                            <option value disabled selected>Pilih Kategori</option>
                            <option value="+">Positif</option>
                            <option value="-">Negatif</option>
                        </Select>
                        <label>Faktor</label>
                        <select id="faktor" type="select" class="form-control mb-3" name="faktor">
                            <option value disabled selected>Pilih Faktor</option>
                            <?php foreach($faktor->result() as $f){?>
                                <option value="<?= $f->id_faktor?>"><?= $f->jenis_faktor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <button id="submitedit" style="width:75px" onclick="loading()" class="btn btn-primary" type="submit">Submit</button>
                        <button id="loadedit" style="width:75px" disabled class="btn btn-secondary" hidden><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden"></span></div></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<script>
     function edit(isi_soal,kategori,faktor,id_soal){
        document.getElementById('isi_soal').value = isi_soal
        document.getElementById('kategori').value = kategori
        document.getElementById('faktor').value = faktor
        document.getElementById('id_soal').value = id_soal
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