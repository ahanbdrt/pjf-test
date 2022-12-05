<title>Job-App-Register</title>
</head>

<body style="background-image: url('<?= base_url('assets/img/psychology.jpg')?>');">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-start">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden bg-gradient-light border-0 shadow-lg" style="margin-top:100px">
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
                            <?php if($this->uri->segment(3)=='admin'){?>
                            <form class="user" action="<?= base_url('auth/daftar')?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="fullname"
                                        placeholder="fullname" required>
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
                                <button id="btn" type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <?php }else{?>
                                <form class="user" action="<?= base_url('auth/daftar')?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="fullname"
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="no_telp"
                                        placeholder="No. Telp" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <?php } ?>
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
            document.getElementById('btn').disabled = false;
        }else{
        if(document.getElementById('pass').value!=document.getElementById('r_pass').value){
            document.getElementById('output').innerHTML = '<input id="r_pass" onchange="validatePass()" type="password" class="form-control is-invalid form-control-user" name="passwordr" placeholder="Repeat Password" required>';
            document.getElementById('r_pass').value = document.getElementById('old').value;
            document.getElementById('btn').disabled = true;
        }else{
            document.getElementById('output').innerHTML = '<input id="r_pass" onchange="validatePass()" type="password" class="form-control form-control-user" name="passwordr" placeholder="Repeat Password" required>';
            document.getElementById('r_pass').value = document.getElementById('pass').value
            document.getElementById('btn').disabled = false;
        }
    }
}
</script>