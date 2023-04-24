<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title></title>
</head>
<body>
    <?php
    $uri = service('uri');
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Mind Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if(session()->get('isLoggedIn')): ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                            <a class="nav-link" href="/dashboard"><?= lang('main.nav_mainPage') ?></a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/routine"><?= lang('main.nav_routines') ?></a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/routine"><?= lang('main.nav_streak') ?></a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/charts"><?= lang('main.nav_charts') ?></a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/profile"><?= lang('main.nav_profile') ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('lang/en'); ?>"><?= lang('main.nav_lang_en') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('lang/pl'); ?>"><?= lang('main.nav_lang_pl') ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><?= lang('main.nav_logout') ?></a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                            <a class="nav-link" href="/login">Logowanie</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
                            <a class="nav-link" href="/register">Rejestracja</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">

                            <style>
                                .vl {
                                    border-left: 2px solid dimgray;
                                    height: 40px;
                                }
                            </style>

                        <div class="vl"></div>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'changelog' ? 'active' : null) ?>">
                            <a class="nav-link" href="/changelog">Changelog</a>
                        </li>
                        <div class="vl"></div>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('lang/en'); ?>"><?= lang('main.nav_lang_en') ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('lang/pl'); ?>"><?= lang('main.nav_lang_pl') ?></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>