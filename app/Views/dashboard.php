<div class="container">
    <div class="row">
        <div class="col-6 mb-5">
            <h1><?= lang('dashboard.welcome') ?>, <?= session()->get('nickname') ?>
                <?php if(session()->get('premium') == 1): ?>
                    <img width="40px" src="/assets/icons/premium.png">
                <?php endif; ?>
            </h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <h1>
                    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
                    <!-- Button trigger modal -->
                    <a href="#" data-toggle="collapse" data-target="#viewdetails" style="color: inherit;">
                        <h3>
                        <span class="bi bi-question-circle" ></span>
                        </h3>
                    </a>
                </h1>
            </div>
        </div>

        <div class="col-12 collapse-grou collapse" id="viewdetails">

        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="alert alert-dark" role="alert">

                                <h5>Dzisiejsze aktywności</h5><br>
                                Poniżej znajduje się lista twoich codziennych aktywności.
                                Aby dodac nowa aktyuwnosc otworz sekcje z listy lub klinij TUTAJ
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <b><a>[FULL]</a>Ostatnie aktywnosci sportowe    |    Sugerowane dzisiaj:</b>
                        <div class="container bg-light p-3">
                            <div class="row">
                                <div class="col-sm border-right border-dark">
                                    4 dni temu
                                </div>
                                <div class="col-sm border-right border-dark">
                                    3 dni temu
                                </div>
                                <div class="col-sm border-right border-dark">
                                    przedwczoraj
                                </div>
                                <div class="col-sm border-right border-dark">
                                    wczoraj
                                </div>
                                <div class="col-sm">
                                    if nie zrobiono - generateSugestia() show().,
                                    else show zrobione dzisiaj
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row mt-4">
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
