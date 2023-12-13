<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image "></div>
                <div class="col-lg-7 p-5">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php if(isset($validation)):?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif;?>
                        <form class="user" action="<?php echo base_url('/signup/store'); ?>" method="post">
                            <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                           placeholder="Nombre" value="<?= set_value('name') ?>">
                            </div>
                            <div class="form-group ">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                       placeholder="Correo" value="<?= set_value('email') ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password"
                                           id="password" placeholder="Contraseña" >
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="confirmpassword"
                                           id="confirmPassword" placeholder="Confirmar Contraseña">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Registrar Cuenta</button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('/') ?>">Ya tengo Cuenta Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>