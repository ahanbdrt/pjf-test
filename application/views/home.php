    <title>Home</title>
    <style>
    /* Creating own radio button to style */
    .rad {
      position: absolute;
      top: 0;
      left: 0;
      height: 24px;
      width: 24px;
      background-color: #eee;
      border-radius: 50%;
    }
    </style>
</head>
<body>
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary py-3">
            <h3 class="text-white"><b>Pertanyaan:</b></h3>
        </div>
        <div class="card-body bg-gradient-light">
            <form action="<?= base_url("jawaban/big_five")?>" method="post">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($soal->result() as $s){?>
                        <tr>
                            <td>
                                <h4 class="mb-5 mt-4 text-dark"><b><?= $no++.'. '.$s->isi_soal?></b></h4>
                                <?php if($s->kategori == "+"){?>
                                <div class="row mb-4" style="margin-left:200px">
                                    <div class="col-md-2">
                                        <label class="ml-3 mr-2">Sangat tidak setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>1" required>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="ml-3 mr-2">Tidak setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>2" required>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="ml-3 mr-2">Netral
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>3" required>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="ml-3 mr-2">Setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>4" required>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="ml-3 mr-2">Sangat setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>5" required>
                                        </label>
                                    </div>
                                </div>
                                <?php }else{?>
                                <div class="row mb-4" style="margin-left:200px">
                                    <div class="col-md-2">
                                    <label class="ml-3 mr-2">Sangat tidak setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>5" required>
                                    </label>
                                    </div>
                                    <div class="col-md-2">
                                    <label class="ml-3 mr-2">Tidak setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>4" required>
                                    </label>
                                    </div>
                                    <div class="col-md-2">
                                    <label class="ml-3 mr-2">Netral
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>3" required>
                                    </label>
                                    </div>
                                    <div class="col-md-2">
                                    <label class="ml-3 mr-2">Setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>2" required>
                                    </label>
                                    </div>
                                    <div class="col-md-2">              
                                    <label class="ml-3 mr-2">Sangat setuju
                                        <input type="radio" class="form rad" name="<?= $s->id_soal?>" value="<?= $s->faktor?>1" required>
                                    </label>
                                </div>             
                                <?php }?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                    <input type="hidden" name="pelamar" value="<?= $this->session->userdata('user_id')?>">
                    <div style="display:flex; justify-content:center; margin-top:40px">
                    <button type="submit" class="btn btn-primary" style="width:250px;height:50px">Submit</button>
            </form>
        </div>
    </div>
</div>

    <button><a href="<?= base_url("auth/logout")?>">Logout</a></button>

    <script>

    </script>