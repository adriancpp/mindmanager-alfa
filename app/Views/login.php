<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3><?= lang('user.login') ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="/login" method="post">
                    <div class="form-group">
                        <label for="email"><?= lang('user.form_login') ?></label>
                        <input type="text" class="form-control" name="login" id="login" value="<?= set_value('login') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password"><?= lang('user.form_password') ?></label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Zaloguj</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/register">Nie masz jeszcze konta? Zarejestruj się!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>