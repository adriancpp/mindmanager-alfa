<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1>Witaj, <?= session()->get('nickname') ?></h1>
        </div>

        charts


        <?php

                echo '<pre>';
                print_r($allRoutines[2]->data);
                echo '</pre>';

                $dataPoints = $allRoutines[2]->data;

//        $dataPoints = array(
//            array("y" => 25, "label" => "Sunday"),
//            array("y" => 15, "label" => "Monday"),
//            array("y" => 25, "label" => "Tuesday"),
//            array("y" => 5, "label" => "Wednesday"),
//            array("y" => 10, "label" => "Thursday"),
//            array("y" => 0, "label" => "Friday"),
//            array("y" => 20, "label" => "Saturday")
//        );

//        echo '<br>------------<br>';
//
//        echo '<pre>';
//        print_r($dataPoints);
//        echo '</pre>';

        ?>

            <script>
                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        title: {
                            text: "Push-ups Over a Week"
                        },
                        axisY: {
                            title: "Number of Push-ups"
                        },
                        data: [{
                            type: "line",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                }
            </script>

        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    </div>
</div>
