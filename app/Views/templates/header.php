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
                            <a class="nav-link" href="/dashboard">Strona główna</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/routine">Rutynowe</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/routine">Streak</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'routine' ? 'active' : null) ?>">
                            <a class="nav-link" href="/routine">Wykresy</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/profile">Profil</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?= base_url('lang/en'); ?>">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?= base_url('lang/pl'); ?>">PL</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Wyloguj</a>
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
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?= base_url('lang/en'); ?>">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?= base_url('lang/pl'); ?>">PL</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>