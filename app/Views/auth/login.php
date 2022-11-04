<?= $this->extend('auth/templates/main') ?>

<?= $this->section('content'); ?>

<div class="card-header text-center">
    <h2 class="font-weight-bold">Form <?= lang('Auth.loginTitle') ?></h2>
</div>
<div class="card-body">
    <?= view('Myth\Auth\Views\_message_block') ?>
    <form action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <?php if ($config->validFields === ['email']) : ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php else : ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                <?= session('errors.password') ?>
            </div>
        </div>
        <div class="row">
            <?php if ($config->allowRemembering) : ?>
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label for="remember">
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                </div>
            <?php else : ?>
                <div class="col-4 offset-4">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                </div>
            <?php endif; ?>
            <!-- /.col -->
            <!-- /.col -->
        </div>
    </form>

    <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div> -->
    <!-- /.social-auth-links -->

    <?php if ($config->allowRegistration) : ?>
        <p class="mb-1"><a href="<?= base_url('register'); ?>"><?= lang('Auth.needAnAccount') ?></a></p>
    <?php endif; ?>
    <?php if ($config->activeResetter) : ?>
        <p class="mb-0"><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
    <?php endif; ?>
</div>
<!-- /.card-body -->

<?= $this->endSection(); ?>