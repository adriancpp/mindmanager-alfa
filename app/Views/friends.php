
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
                            <h4 class="one">Otrzymane zaproszenia</h4>
                            <?php foreach ($friends_invite_geted as $friend): ?>
                            <hr>
                                <div>* <?= $friend->friend_name ?></div>
                                <form class="" action="/friends/accept" method="post">
                                    <input type="hidden" name="id" value="<?= $friend->id ?>">
                                    <button type="submit" class="btn btn-success">Akceptuj</button>
                                </form><br>
                            <?php endforeach; ?>

                            <br><br>
                            <h4 class="one">Lista zaproszonych</h4>
                            <?php foreach ($friends_invite_sended as $friend): ?>
                                <div>* <?= $friend->friend_name ?></div><br>
                            <?php endforeach; ?>

                            <br><br>
                            <h4 class="one">Lista znajomych</h4>
                            <?php foreach ($friends_confirmed as $friend): ?>
                                <div>* <?= $friend->friend_name ?></div><br>
                            <?php endforeach; ?>

                        </div>
                    </div>



                </div>
            </div>
        </div>
