<?php

namespace App\Controllers;

class Routine extends BaseController
{
    public function index()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('routine', $data);
        echo view('templates/footer', $data);
    }

    public function createNew()
    {
        $data = [];

        $data['types'] = [
            ['YESNO', 'Tak/Nie', true],
            ['TIME', 'Czas', false],
            ['COUNT', 'Ilość', false]
        ];

        $data['prioritys'] = [
            [1, 'Niski', false],
            [2, 'Średni', true],
            [3, 'Wysoki', false]
        ];

        $data['actives'] = [
            [1, 'Aktywny', true],
            [0, 'Dezaktywowany', false]
        ];

        echo view('templates/header', $data);
        echo view('newRoutine', $data);
        echo view('templates/footer', $data);
    }
}
