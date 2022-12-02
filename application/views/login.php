    <title>pjf-Login</title>
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
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div class="text-center">
                                        <?= $this->session->flashdata("pesan");?>
                                    </div>
                                    <form class="user" action="<?= base_url('auth/login')?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                 name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register')?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>