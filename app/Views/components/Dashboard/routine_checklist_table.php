<div class="app-container d-flex align-items-center justify-content-center flex-column ps-5" style="width: 100%">
    <h4>test name</h4>
    <div class="table-wrapper" style="width: 100%">
        <div class="table-wrapper">
            <table class="table table-hover table-bordered table-light">
                <thead>
                <tr>
                    <th style="width: 10% !important;"><?= lang('dashboard.table_priority') ?></th>
                    <th style="width: 70% !important;"><?= lang('dashboard.table_name') ?></th>
                    <th style="width: 10% !important;"><?= lang('dashboard.table_status') ?></th>
                    <th style="width: 10% !important;"><?= lang('dashboard.table_actions') ?></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($routines as $routine) : ?>
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
                            <?php if($routine->type == "COUNT"): ?>
                                <form class="" action="/routine/status/<?= $routine->id ?>/1" method="post">
                                    <div class="form-group" id="amount">
                                        <label for="amount">Ilość</label>
                                        <input type="number" step="0.01" class="form-control" name="amount"
                                               id="amount" value="<?= $routine->amount ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Wykonano</button>
                                </form>
                            <?php else: ?>
                                <a href="/routine/status/<?= $routine->id ?>/1" class="btn btn-success">
                                    Wykonano
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>