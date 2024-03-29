<div class="container">

    <a href="/friends"><button type="button" class="btn btn-secondary">Znajomi</button></a>


    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3><?= $user['nickname']; ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="/profile" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Nick</label>
                                <input type="text" class="form-control" name="nickname" id="nickname" value="<?= set_value('nickname', $user['nickname']) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Nowe hasło</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Powtórz nowe hasło</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                            </div>
                        </div>

                        <?php if(isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Zmień</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>