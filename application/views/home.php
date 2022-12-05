<title>Job-Test</title>
</head>
<body style="background-color:lightgrey">
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark py-3">
            <h3 class="text-white"><b>Home Page</b></h3>
        </div>
        <div class="card-body bg-light">
            <div class="row justify-content-center">
           <!-- Earnings (Monthly) Card Example -->
           <?php 
           $big5 = $this->db->get('big_five');
           $pjf = $this->db->get('person-job-fit');
           $pof = $this->db->get('person-organization-fit');
           $filter = $this->db->where('pelamar',$this->session->userdata('user_id'))->get('jawaban');
           foreach($filter->result() as $f){}
           if(!isset($f->pof)){
            $pof_kosong = "";
           }elseif(isset($f->pof)){
            $pof_kosong = $f->pof;
           }
           if(!isset($f->pjf)){
            $pjf_kosong = "";
           }elseif(isset($f->pjf)){
            $pjf_kosong = $f->pjf;
           }
           if(!isset($f->faktor)){
            $faktor_kosong = "";
           }elseif(isset($f->faktor)){
            $faktor_kosong = $f->faktor;
           }
            if($pof_kosong == ""){?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2">
                        <a href="<?= base_url('person_organization_fit_pelamar')?>" style="text-decoration:none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                        Test Pertama</div>
                                    <div class=" mb-0 font-weight-bold text-gray-800"><?= $pof->num_rows() ?> Pertanyaan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            <?php }else{?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-success shadow h-100 py-2" style="background-color:lightgray">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="hr mb-0 font-weight-bold text-gray-800">Jawaban Telah Disimpan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-white-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
           if($pjf_kosong == ""){?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2">
                        <a href="<?= base_url('person_job_fit_pelamar')?>" style="text-decoration:none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                        Test Kedua</div>
                                    <div class=" mb-0 font-weight-bold text-gray-800"><?= $pjf->num_rows() ?> Pertanyaan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            <?php }else{?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-warning shadow h-100 py-2" style="background-color:lightgray">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="hr mb-0 font-weight-bold text-gray-800">Jawaban Telah Disimpan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-white-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            if($faktor_kosong == ""){?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2">
                        <a href="<?= base_url('big_five')?>" style="text-decoration:none">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                        Test Ketiga</div>
                                    <div class=" mb-0 font-weight-bold text-gray-800"><?= $big5->num_rows() ?> Pertanyaan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            <?php }else{?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-bottom-danger shadow h-100 py-2" style="background-color:lightgray">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="hr mb-0 font-weight-bold text-gray-800">Jawaban Telah Disimpan</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-white-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>