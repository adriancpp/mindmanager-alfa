<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1><?= lang('dashboard.welcome') ?>, <?= session()->get('nickname') ?>
                <?php if(session()->get('premium') == 1): ?>
                    <img width="40px" src="/assets/icons/premium.png">
                <?php endif; ?>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <?= view_cell('\App\Libraries\Dashboard::routineChecklistTable', [
                                'routines' => $routines['current'],
                                'tableTitle' => lang('dashboard.current'),
                                'submitStatus' => 1
                            ]
                        ) ?>
                    </div>
                    <div class="row">
                        <?= view_cell('\App\Libraries\Dashboard::routineChecklistTable', [
                                'routines' => $routines['next'],
                                'tableTitle' => lang('dashboard.next'),
                                'submitStatus' => 1
                            ]
                        ) ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <?= view_cell('\App\Libraries\Dashboard::routineChecklistTable', [
                            'routines' => $routines['done'],
                            'tableTitle' => lang('dashboard.done'),
                            'submitStatus' => 0
                        ]
                    ) ?>
                </div>
            </div>

        </div>

    </div>
</div>
