
        <div class="container" >
            <div class="row">


                <div class="panel panel-default widget col-12 col-sm-8">

                    <div class="row p-2">
                        <div class="col-lg-12">
                            <h3 class="one">Znajomi</h3>
                            <form class="" action="/friends/send/invite" method="post">
                                <input type="text" name="login" value="">
                                <button type="submit" class="btn btn-primary">Wyślij zaproszenie</button>
                            </form>

                            <br><br>
                            <h4 class="one"><?= lang('userFriend.received_invitations') ?></h4>
                            <?php foreach ($friends_invite_geted as $friend): ?>
                            <hr>
                                <div>* <?= $friend->friend_name ?></div>
                                <form class="" action="/friends/accept" method="post">
                                    <input type="hidden" name="id" value="<?= $friend->id ?>">
                                    <button type="submit" class="btn btn-success">Akceptuj</button>
                                </form><br>
                            <?php endforeach; ?>

                            <br><br>
                            <h4 class="one"><?= lang('userFriend.invite_list') ?></h4>
                            <?php foreach ($friends_invite_sended as $friend): ?>
                                <div>* <?= $friend->friend_name ?></div><br>
                            <?php endforeach; ?>

                            <br><br>
                            <h4 class="one"><?= lang('userFriend.friends_list') ?></h4>
                            <?php foreach ($friends_confirmed as $friend): ?>
                                <div>* <?= $friend->friend_name ?></div>
                                <form class="" action="/friends/remove" method="post">
                                    <input type="hidden" name="id" value="<?= $friend->id ?>">
                                    <button type="submit" class="btn btn-success">Usuń</button>
                                </form><br>
                            <?php endforeach; ?>

                        </div>
                    </div>



                </div>
            </div>
        </div>
