<title>Hasil Test</title>
</head>
<body style="background-color:lightgray">

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header bg-light py-3">
            <h3><b>Hasil Test:</b></h3>
        </div>
        <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" width="100%" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelamar</th>
                <th>Big Five</th>
                <th>Person-Job-Fit</th>
                <th>Person-Organization-Fit</th>
                <th>Tanggal Test</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no= 1;
            foreach($jawaban->result() as $p){?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $p->fullname?></td>
                <td><?= $p->jenis_faktor?></td>
                <td><?= $p->pjf?></td>
                <td><?= $p->pof?></td>
                <td><?= $p->tgl?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
</div>