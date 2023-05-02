<?php

$dateorygin = $_POST['dateId'];
$dateId = $_POST['dateId'];
$note = $_POST['note'];
//$dateId = '2022-07-13';
$newDate = explode( "-" , $dateId);

$dt = DateTime::createFromFormat('y', $newDate[2]);
$das = $dt->format('Y'); // output: 2013

$dateId = $das.'-'.$newDate[1].'-'.$newDate[0];

$userId = $_POST['userId'];

require_once 'connection.php';

$sql = '
    SELECT id
    FROM dates
    WHERE user_id = '.$userId.' 
    AND data = \''.$dateId.'\' 
    ';
$result = dbSelect($sql);

if($note == null)
    $note = '';
else
    $note = preg_replace('/[^a-z0-9 :-]/i', '_', $note);

if($result)
if ($result->num_rows == 0) {
    $sql = 'INSERT INTO dates (user_id, `data`, note) VALUES (\''.$userId.'\', \''.$dateId.'\', \''.$note.'\')';

    $result = dbSelect($sql);
    $returned = 'added';
}
else
{
    $sql = '
        DELETE FROM dates
        WHERE user_id = \''.$userId.'\' AND
        `data` = \''.$dateId.'\'
    ';

    $result = dbSelect($sql);
    $returned = 'removed';
}

echo json_encode($returned);