<title>Dashboard</title>
    </head>

    <body>
        <div class="container">
            <div class="card border-0 min-vh-100 shadow p-5">
                <div>
                    <h3 class="mb-5">Dashboard</h3>
                    <div class="d-flex justify-content-start mb-5">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <a href="<?= base_url("pertanyaan/pertanyaan_big5")?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Big Five
                                            </div>
                                            <?php $b5=$this->db->get('big_five');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-file fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-warning shadow h-100 py-2">
                                <a href="<?= base_url("person_job_fit")?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Person-Job-Fit
                                            </div>
                                            <?php $b5=$this->db->get('person-job-fit');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-file fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-danger shadow h-100 py-2">
                                <a href="<?= base_url("person_organization_fit")?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Person-Organization-Fit
                                            </div>
                                            <?php $b5=$this->db->get('person-organization-fit');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-file fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mb-5">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-dark shadow h-100 py-2">
                                <a href="<?= base_url('jawaban')?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Jadwal Test
                                            </div>
                                            <?php $b5=$this->db->get('jadwal_test');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <a href="<?= base_url('jawaban')?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Jawaban
                                            </div>
                                            <?php $b5=$this->db->get('jawaban');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <a href="<?= base_url("pelamar")?>" style="text-decoration:none">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                Pelamar
                                            </div>
                                            <?php $b5=$this->db->where('role','pelamar')->get('user');?>
                                            <div class="text-dark mr-3"><b><?= $b5->num_rows()?></b></div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>