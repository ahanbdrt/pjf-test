<title>Job-App-Register</title>
</head>

<body style="background-image: url('<?= base_url('assets/img/Psychology.jpg')?>');">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-start">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden bg-gradient-light border-0 shadow-lg" style="margin-top:50px">
                    <div class="card-body" style="padding:60px">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                                    </div>
                            <div class="text-center mb-2">
                                <span style="color:red"><?= $this->session->flashdata('error');?></span>
                            </div>
                            <form id="user" class="user" action="<?= base_url('auth/daftar')?>" method="post">
                                <div class="form-group">
                                    <input id="nama" type="text" class="form-control form-control-user" name="fullname"
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user" name="email"
                                        placeholder="Alamat Email" required>
                                </div>
                                <div class="form-group">
                                    <select id="tgl_test" style="font-size: 0.8rem;border-radius: 10rem;height:50px" type="select" class="form-control form-control" name="tgl_test" required>
                                        <option hidden disabled selected value>Tanggal test</option>
                                        <?php foreach($tgl_test->result() as $t){
                                            if(strtotime($t->selesai)>strtotime(date("Y-m-d H:i:s"))){?>
                                        <option form-control-user" value="<?= $t->id?>"><?= $t->mulai." s/d ".$t->selesai?></option>
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="pass" type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6" id="output">
                                        <input id="r_pass" type="password" class="form-control form-control-user"
                                        onchange="validatePass()" name="passwordr" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <input type="hidden" id="old">
                                <hr>
                                <button id="btn" disabled type="submit" class="btn btn-primary btn-user btn-block">
                                Lengkapi data di atas!
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/login')?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
    function validatePass(){
        document.getElementById('old').value = document.getElementById('r_pass').value
        if(document.getElementById('r_pass').value==""){
            document.getElementById('output').innerHTML = '<input id="r_pass" onchange="validatePass()" type="password" class="form-control form-control-user" name="passwordr" placeholder="Repeat Password" required>';
        }else{
        if(document.getElementById('pass').value!=document.getElementById('r_pass').value){
            document.getElementById('output').innerHTML = '<input id="r_pass" onchange="validatePass()" type="password" class="form-control form-control-user is-invalid " name="passwordr" placeholder="Repeat Password" required>';
            document.getElementById('r_pass').value = document.getElementById('old').value;
            document.getElementById('btn').disabled = true;
            document.getElementById('btn').innerHTML = "Lengkapi data di atas!";
        }else{
            document.getElementById('output').innerHTML = '<input id="r_pass" onchange="validatePass()" type="password" class="form-control form-control-user" name="passwordr" placeholder="Repeat Password" required>';
            document.getElementById('r_pass').value = document.getElementById('pass').value
            document.getElementById('btn').disabled = false;
            document.getElementById('btn').innerHTML = "Daftar";
        }
    }
}
if(document.getElementById('nama').value != "" && document.getElementById('email').value != "" &&document.getElementById('tgl_test').value != "" && document.getElementById('pass').value != "" && document.getElementById('r_pass').value != ""){
    document.getElementById('btn').disabled = false;
}
</script>