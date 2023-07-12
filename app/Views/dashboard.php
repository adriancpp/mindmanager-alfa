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
            <div class="col-12 mb-5">
                <div class="container">
                    <div class="alert alert-dark" role="alert">
                        <div class="row">
                            <div class="col-12 collapse-group">
                                <h5>Dzisiejsze aktywności</h5><br>
                                Poniżej znajduje się lista twoich codziennych aktywności.
                                <p class="collapse" id="viewdetails">Aby dodac nowa aktyuwnosc otworz sekcje z listy lub klinij TUTAJ</p>
                                <p><a class="btn" data-toggle="collapse" data-target="#viewdetails">Rozwiń &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
