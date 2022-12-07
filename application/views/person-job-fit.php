<title>Job-Test</title>
    <style>
    /* Creating own radio button to style */
    .rad {
      position: relative;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }
    </style>
</head>
<body style="background-color:lightgrey">
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h3 class="text-white"><b>Pertanyaan:</b></h3>
        </div>
        <div class="card-body bg-light">
            <form action="<?= base_url("jawaban/pjf")?>" method="post">
                <table width="100%" cellspacing="0">
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($soal->result() as $s){?>
                        <tr class="text-capitalize border-bottom border-dark">
                            <td>
                                <h5 class="mb-5 mt-4 text-dark"><b><?=$s->isi_pjf?></b></h5>
                                <div class="row mb-2 ml-4 mr-4 justify-content-center">
                                    <div class="ml-2">
                                        <label class="rounded btn btn-md btn-light" style="width:164px">Sangat tidak setuju<br>
                                            <input type="radio" class="form rad" name="<?= $s->id_pjf?>" value="1" required>
                                        </label>
                                    </div>
                                    <div class="ml-2">
                                    <label class="rounded btn btn-md btn-light" style="width:164px">Tidak setuju<br>
                                        <input type="radio" class="form rad" name="<?= $s->id_pjf?>" value="2" required>
                                        </label>
                                    </div>
                                    <div class="ml-2">
                                    <label class="rounded btn btn-md btn-light" style="width:164px">Netral <br>
                                        <input type="radio" class="form rad" name="<?= $s->id_pjf?>" value="3" required>
                                        </label>
                                    </div>
                                    <div class="ml-3">
                                        <label class="rounded btn btn-md btn-light" style="width:164px">Setuju <br>
                                        <input type="radio" class="form rad" name="<?= $s->id_pjf?>" value="4" required>
                                        </label>
                                    </div>
                                    <div class="ml-3">
                                        <label class="rounded btn btn-md btn-light" style="width:164px">Sangat setuju <br>
                                        <input type="radio" class="form rad" name="<?= $s->id_pjf?>" value="5" required>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                    <input type="hidden" name="pelamar" value="<?= $this->session->userdata('user_id')?>">
                    <input type="hidden" name="tgl_test" value="<?= $this->session->userdata('tgl_test')?>">
                    <div style="display:flex; justify-content:end; margin-top:40px">
                    <button type="submit" class="btn btn-primary" style="width:250px;height:50px">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
