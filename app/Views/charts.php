<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1><?= lang('charts.welcome') ?>, <?= session()->get('nickname') ?></h1>
        </div>
        <div class="col-12 mb-5">
            <?php foreach ($friends as $friend): ?>
                <a href="/chart/friend/<?= $friend->friend_id ?>"><button><?= $friend->friend_name ?></button></a>
            <?php endforeach; ?>
        </div>
            <script>
                window.onload = function () {
                    <?php foreach ($allRoutines as $routine): ?>

                        var chart<?= $routine->id ?> = new CanvasJS.Chart("chartContainer<?= $routine->id ?>", {
                            title: {
                                text: "<?= $routine->name ?>"
                            },
                            axisY: {
                                title: "Ilość"
                            },
                            data: [{
                                type: "line",
                                dataPoints: <?php echo json_encode($routine->data, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart<?= $routine->id ?>.render();
                    <?php endforeach; ?>
                }
            </script>

        <?php foreach ($allRoutines as $routine): ?>

            <?php
                if($routine->progressCount>0)
                    print 'Miesięczny postęp: <b> '.$routine->progress/$routine->progressCount .'</b>';
                else
                    print 'Miesięczny postęp: <b> Za mało danych</b>';
            ?>

            <div id="chartContainer<?= $routine->id ?>" style="height: 370px; width: 100%;"></div>
            <div style="margin: 10px;"></div>
        <?php endforeach; ?>

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </div>
</div>
