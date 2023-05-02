<?php
session_start();

if(isset($_SESSION['user_id']))
{
}
else
{
    header('Location: secure.php');
}

$time = time();

$numDay = date('d', $time);
$numMonth = date('m', $time);
$strMonth = date('F', $time);
$numYear = date('Y', $time);
$firstDay = mktime(0,0,0,$numMonth,1,$numYear);
$daysInMonth = cal_days_in_month(0, $numMonth, $numYear);
$dayOfWeek = date('w', $firstDay);

///mont2
$time2 = strtotime("+1 month");

$numDay2 = date('d', $time2);
$numMonth2 = date('m', $time2);
$strMonth2 = date('F', $time2);
$numYear2 = date('Y', $time2);
$firstDay2 = mktime(0,0,0,$numMonth2,1,$numYear2);
$daysInMonth2 = cal_days_in_month(0, $numMonth2, $numYear2);
$dayOfWeek2 = date('w', $firstDay2);



$strMonth = str_replace('January', 'Styczeń', $strMonth);
$strMonth = str_replace('February', 'Luty', $strMonth);
$strMonth = str_replace('March', 'Marzec', $strMonth);
$strMonth = str_replace('April', 'Kwiecień', $strMonth);
$strMonth = str_replace('May', 'Maj', $strMonth);
$strMonth = str_replace('June', 'Czerwiec', $strMonth);
$strMonth = str_replace('July', 'Lipiec', $strMonth);
$strMonth = str_replace('August', 'Sierpień', $strMonth);
$strMonth = str_replace('September', 'Wrzesień', $strMonth);
$strMonth = str_replace('October', 'Październik', $strMonth);
$strMonth = str_replace('November', 'Listopad', $strMonth);
$strMonth = str_replace('December', 'Grudzień', $strMonth);

$strMonth2 = str_replace('January', 'Styczeń', $strMonth2);
$strMonth2 = str_replace('February', 'Luty', $strMonth2);
$strMonth2 = str_replace('March', 'Marzec', $strMonth2);
$strMonth2 = str_replace('April', 'Kwiecień', $strMonth2);
$strMonth2 = str_replace('May', 'Maj', $strMonth2);
$strMonth2 = str_replace('June', 'Czerwiec', $strMonth2);
$strMonth2 = str_replace('July', 'Lipiec', $strMonth2);
$strMonth2 = str_replace('August', 'Sierpień', $strMonth2);
$strMonth2 = str_replace('September', 'Wrzesień', $strMonth2);
$strMonth2 = str_replace('October', 'Październik', $strMonth2);
$strMonth2 = str_replace('November', 'Listopad', $strMonth2);
$strMonth2 = str_replace('December', 'Grudzień', $strMonth2);




$dateStart = new DateTime('first day of this month');
$dateStart->format('d-m-y');

$dateEnd = new DateTime('last day of next month');
$dateStart->format('d-m-y');


require_once 'connection.php';

echo '???:';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = 'SELECT DATE_FORMAT(data, "%d-%m-%y") as `data`, user_id, note  
        FROM dates';
$result = dbSelect($sql);

echo 'ok:';
       echo '<pre>';
                print_r($result);
                echo '</pre>';


$allDates = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $allDates[] = $row;
    }
}

$sql = 'SELECT DATE_FORMAT(data, "%d-%m-%y") as `data`, count(user_id ) as users
        FROM dates GROUP BY `data`';


$result = dbSelect($sql);

$allDatesSummed = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $allDatesSummed[] = $row;
    }
}





echo 'Jesteś zalogowany jako: '.$_SESSION["username"].'';

?>

<head>

    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        <?php

            function convertIdToUser($id)
            {
                if($id == 1) $user = "Adrian";
                else if($id == 2) $user = "Przemek";
                else if($id == 3) $user = "Adam";
                else if($id == 4) $user = "Dawid";
                else if($id == 5) $user = "Bartosz";
                else $user = "other";

                return $user;
            }

            print 'var _allData = [';

            for ($i = 0; $i < count($allDates); $i++)
            {
                print '{';
                    print '"data": "'.$allDates[$i]['data'].'",';
                    print '"user": "'.convertIdToUser($allDates[$i]['user_id']).'",';
                    print '"userId": "'.$allDates[$i]['user_id'].'",';
                    print '"note": "'.$allDates[$i]['note'].'"';
                print '}';

                if($i+1 < count($allDates))
                    print ',';
            }

        print '];';

        ?>
    </script>

</head>

<div  style="float: left; ">

<table>
    <caption><?php echo $strMonth; ?></caption>
    <thead>
    <tr>

        <th abbr="Monday" scope="col" title="Monday">Pon</th>
        <th abbr="Tuesday" scope="col" title="Tuesday">Wt</th>
        <th abbr="Wednesday" scope="col" title="Wednesday">Śr</th>
        <th abbr="Thursday" scope="col" title="Thursday">Czw</th>
        <th abbr="Friday" scope="col" title="Friday">Pt</th>
        <th abbr="Saturday" scope="col" title="Saturday">Sob</th>
        <th abbr="Sunday" scope="col" title="Sunday">Ndz</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php

        $dayOfWeek -=1;

        if(0 != $dayOfWeek) { echo('<td colspan="'.$dayOfWeek.'"> </td>'); }
        for($i=1;$i<=$daysInMonth;$i++) {

            $next = date('w', mktime(0,0,0,$numMonth, $i-1, $numYear));

                echo("<td ");

            $inc = $i-1;
            $datetime = ' +'.$inc.' day';

            $d = new DateTime('first day of this month');
            $d->modify($datetime);
            $dateId = $d->format('d-m-y');

            echo('id="'.$dateId.'" onclick="clickDate(\''.$dateId.'\',\''.$_SESSION['user_id'].'\')" ');

            echo('class="clickableDay ');

            if($next ==5 || $next ==6)
                echo('week ');

            if($i == $numDay)
                echo(' today ');

            foreach( $allDatesSummed as $ad )
            {
                if($ad['data'] == $dateId)
                {
                    print ' counter-'.$ad['users'].' ';
                }
            }
            foreach( $allDates as $ad )
            {
                if($ad['data'] == $dateId && intval($ad['user_id']) == intval($_SESSION['user_id']) )
                {
                    print ' clickedByMe ';
                }
            }


            echo('"');

            echo(">");
            echo($i);
            echo("</td>");

            if($next == 6)
            {
                echo("</tr><tr>");
            }
        }
        ?>
    </tr>
    </tbody>
</table>

<br><br>

<table>
    <caption><?php echo $strMonth2; ?></caption>
    <thead>
    <tr>

        <th abbr="Monday" scope="col" title="Monday">Pon</th>
        <th abbr="Tuesday" scope="col" title="Tuesday">Wt</th>
        <th abbr="Wednesday" scope="col" title="Wednesday">Śr</th>
        <th abbr="Thursday" scope="col" title="Thursday">Czw</th>
        <th abbr="Friday" scope="col" title="Friday">Pt</th>
        <th abbr="Saturday" scope="col" title="Saturday">Sob</th>
        <th abbr="Sunday" scope="col" title="Sunday">Ndz</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php

        $dayOfWeek2 -=1;

        if(0 != $dayOfWeek2) { echo('<td colspan="'.$dayOfWeek2.'"> </td>'); }
        for($i=1;$i<=$daysInMonth2;$i++) {

            $next = date('w', mktime(0,0,0,$numMonth2, $i-1, $numYear2));

                echo("<td ");

            $inc = $i-1;
            $datetime = ' +'.$inc.' day';

            $d = new DateTime('first day of next month');
            $d->modify($datetime);
            $dateId = $d->format('d-m-y');

            echo('id="'.$dateId.'" onclick="clickDate(\''.$dateId.'\',\''.$_SESSION['user_id'].'\')" ');

            echo('class="clickableDay ');

            if($next ==5 || $next ==6)
                echo('week ');

            foreach( $allDatesSummed as $ad )
            {
                if($ad['data'] == $dateId)
                {
                    print ' counter-'.$ad['users'].' ';
                }
            }
            foreach( $allDates as $ad )
            {
                if($ad['data'] == $dateId && intval($ad['user_id']) == intval($_SESSION['user_id']) )
                {
                    print ' clickedByMe ';
                }
            }

            echo('"');

            echo(">");
            echo($i);
            echo("</td>");

            if($next == 6)
            {
                echo("</tr><tr>");
            }
        }
        ?>
    </tr>
    </tbody>
</table>
</div>
<div>
    <button onclick="fastcheck(1)">Fast Check Mode</button>
    <button onclick="fastcheck(0)">Normal Mode (default)</button>
    <hr>
    <div id="dataMoreInfo"></div>
</div>


<script src="index.js"></script>