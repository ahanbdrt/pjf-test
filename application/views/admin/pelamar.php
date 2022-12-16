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
                <th>No. Urut</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Test</th>
                <th width=10%>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no= 1;
            foreach($pelamar->result() as $p){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $p->username?></td>
                <td><?= $p->fullname?></td>
                <td><?= $p->email?></td>
                <td><?= $p->mulai.' s/d '.$p->selesai?></td>
                <td>
                    <button class="btn btn-warning btn-sm ml-1 mr-1" data-toggle="modal" data-target="#editbig5" onclick="edit('<?= $p->user_id?>','<?= $p->username?>','<?= $p->fullname?>','<?= $p->tgl_test?>','<?= $p->email?>','<?= $p->password?>')"><i class="fas fa-sm fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm ml-1" data-delete-url="<?= site_url('pelamar/hapus/'.$p->user_id) ?>" onclick="confirm(this)"><i class="fas fa-sm fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Pelamar</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('pelamar/daftar')?>" method="post">
                <div class="modal-body">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control mb-3" name="fullname" placeholder="Nama lengkap" required>
                        <label>Alamat Email</label>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Alamat Email" required>
                        <label>Jadwal test</label>
                        <select type="select" class="form-control mb-3" name="tgl_test" required>
                            <option value disabled selected>Pilih tanggal test</option>
                            <?php foreach($tgl_test->result() as $t){
                                if(strtotime($t->mulai)>strtotime(date("Y-m-d H:i:s"))){?>
                                <option form-control-user" value="<?= $t->id?>"><?= $t->mulai." s/d ".$t->selesai?></option>
                            <?php }} ?>
                        </select>
                        <label>Password</label>
                        <input type="password" class="form-control mb-3" name="passwordr" placeholder="Password" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" class="btn btn-primary" type="submit">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Pelamar</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('pelamar/edit')?>" method="post">
                <div class="modal-body">
                        <label>No. Urut</label>
                        <input type="text" id="username" readonly class="form-control mb-3" name="username" placeholder="Nomor Urut" required>
                        <label>Nama Lengkap</label>
                        <input type="text" id="fullname" class="form-control mb-3" name="fullname" placeholder="Nama lengkap" required>
                        <input type="hidden" id="user_id" class="form-control mb-3" name="user_id" placeholder="Nama lengkap">
                        <label>Alamat Email</label>
                        <input type="email" id="email" class="form-control mb-3" name="email" placeholder="Alamat Email" required>
                        <label>Jadwal test</label>
                        <select type="select" class="form-control mb-3" id="tgl_test" name="tgl_test" required>
                            <option value disabled selected>Pilih tanggal test</option>
                            <?php foreach($tgl_test->result() as $t){
                                if(strtotime($t->mulai)>strtotime(date("Y-m-d H:i:s"))){?>
                                <option form-control-user" value="<?= $t->id?>"><?= $t->mulai." s/d ".$t->selesai?></option>
                            <?php }} ?>
                        </select>
                        <label>Password</label><br>
                        <span class="text-danger">biarkan kosong jika tidak ingin mengganti password!</span>
                        <input type="password" id="password" class="form-control mb-3" name="password" placeholder="Password baru?">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button id="submittambah" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if($this->session->flashdata('berhasil')){?>
    <script>
        Swal.fire({
            title: "Pendaftaran Berhasil",
            icon: "success",
            html: "<?= $this->session->flashdata('berhasil')?>",
            allowOutsideClick: false,
        })
	</script>
    <?php } ?>
<script>
     function edit(user_id,username,fullname,tgl_test,email,password){
        document.getElementById('user_id').value = user_id;
        document.getElementById('username').value = username;
        document.getElementById('fullname').value = fullname;
        document.getElementById('tgl_test').value = tgl_test;
        document.getElementById('email').value = email;
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