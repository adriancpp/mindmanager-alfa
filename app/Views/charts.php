<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1>Witaj, <?= session()->get('nickname') ?></h1>
        </div>
            <script>
                window.onload = function () {
                    <?php foreach ($allRoutines as $routine): ?>
                        var chart<?= $routine->id ?> = new CanvasJS.Chart("chartContainer<?= $routine->id ?>", {
                            title: {
                                text: <?= $routine->id ?>
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
            <div id="chartContainer<?= $routine->id ?>" style="height: 370px; width: 100%;"></div>
            <div style="margin: 10px;"></div>
        <?php endforeach; ?>

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </div>
</div>
