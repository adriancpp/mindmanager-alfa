<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1>Witaj, <?= session()->get('nickname') ?></h1>
        </div>

        <div class="row">
        <div class="app-container d-flex align-items-center justify-content-center flex-column ps-5">
            <h4>Aktualne</h4>
            <div class="table-wrapper">
                <div class="table-wrapper">
                    <table class="table table-hover table-bordered table-light">
                        <thead>
                        <tr>
                            <th>Priorytet</th>
                            <th>Nazwa</th>
                            <th>Status</th>
                            <th>Akcje</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($routines['current'] as $routine) : ?>
                            <tr>
                                <td style="background-color: <?= $routine->color ?>;">
                                    <?= $routine->priorityName ?>
                                </td>
                                <td class="{{ task.status ? 'complete' : 'task' }}">
                                    <?= $routine->name ?>
                                </td>
                                <td>
                                    <?php
                                    echo $routine->status;
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

        <div class="p-10 m-5">
        </div>

        <div class="app-container d-flex align-items-center justify-content-center flex-column ps-5">
            <h4>Następne</h4>
            <div class="table-wrapper">
                <div class="table-wrapper">
                    <table class="table table-hover table-bordered table-light">
                        <thead>
                        <tr>
                            <th>Priorytet</th>
                            <th>Nazwa</th>
                            <th>Status</th>
                            <th>Akcje</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($routines['next'] as $routine) : ?>
                            <tr>
                                <td style="background-color: <?= $routine->color ?>;">
                                    <?= $routine->priorityName ?>
                                </td>
                                <td class="{{ task.status ? 'complete' : 'task' }}">
                                    <?= $routine->name ?>
                                </td>
                                <td>
                                <?php
                                    echo $routine->status;
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

        <div class="app-container d-flex align-items-center justify-content-center flex-column ps-5">
            <h4>Zrobione</h4>
            <div class="table-wrapper">
                <div class="table-wrapper">
                    <table class="table table-hover table-bordered table-light">
                        <thead>
                        <tr>
                            <th>Priorytet</th>
                            <th>Nazwa</th>
                            <th>Status</th>
                            <th>Akcje</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($routines['done'] as $routine) : ?>
                            <tr>
                                <td style="background-color: <?= $routine->color ?>;">
                                    <?= $routine->priorityName ?>
                                </td>
                                <td class="{{ task.status ? 'complete' : 'task' }}">
                                    <?= $routine->name ?>
                                </td>
                                <td>
                                    <?php
                                    echo $routine->status;
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
