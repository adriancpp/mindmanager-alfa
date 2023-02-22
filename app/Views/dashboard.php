<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Witaj, <?= session()->get('nickname') ?></h1>
        </div>
        <div class="app-container d-flex align-items-center justify-content-center flex-column">
            Rutyna
            <div class="table-wrapper">
                <div class="table-wrapper">
                    <table class="table table-hover table-bordered table-light">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Todo item</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <!--Current-->      <!--Done-->

                        <!--Left / TO do / Next -->


                            <?php foreach ($routines as $routine) : ?>
                            <tr>
                                <td><?= $routine->id ?></td>
                                <td class="{{ task.status ? 'complete' : 'task' }}">
                                    <?= $routine->name ?>
                                </td>
                                <td>
                                <?php
                                    if ($routine->status == 1)
                                        echo 'Completed';
                                    elseif ($routine->status == 0)
                                        echo 'To do';
                                ?>
                                </td>
                                <td>
                                    <button class="btn btn-danger" ng-click="delete($index)">
                                        Anuluj
                                    </button>
                                    <a href="/routine/status/<?= $routine->id ?>/1" class="btn btn-success">
                                        Wykonano
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
