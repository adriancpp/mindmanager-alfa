<?php

//function setStoperAt( $actualTime, $mode )
// alert() <-- play song until click OK
<audio id="xyz" src="whatever_you_want.mp3" preload="auto"></audio>

if(x > 10)
{
    document.getElementById('xyz').play();
    alert("Thank you!");
}

    if(isset($_POST['start']))
    {
        $actualTime = 0; // tutaj trzeba przeliczyc

        for( $i=0; $i<8; $i++ )
        {
            //set work time
                //$actualTime + 50 min
                //setStoperAt( $actualTime, WORK );

            //set break time
                //$actualTime + 10 min
                //setStoperAt( $actualTime, BREAK );
        }

        //setStoperAt( $actualTime, END ); //koniec!

    }
?>


<form class="" action="index.php" method="post">
    <input type="date" name="start" value="">
    <button type="submit" class="btn btn-primary">Uruchom timery</button>
</form>


