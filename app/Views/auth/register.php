<?= $this->extend('auth/templates/main'); ?>

<?= $this->section('content'); ?>

<div class="card-header text-center">
    <h2 class="font-weight-bold">Form <?= lang('Auth.register') ?></h2>
</div>
<div class="card-body">
    <form action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <div class="input-group mb-3">
            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><?= lang('Auth.register') ?></button>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
        </a>
    </div>

    <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= url_to('login') ?>" class="lass="text-center""><?=lang('Auth.signIn')?></a></p>
</div>

<?= $this->endSection(); ?>