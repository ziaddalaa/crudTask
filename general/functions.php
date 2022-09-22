<?php
function testMessage($connection,$message){
    if($connection){
        echo "<div class='alert alert-success mx-auto w-50'>
        $message True Proccess
        </div>";
    }
    else {
        echo "<div class='alert alert-danger mx-auto w-50'>
        $message False Proccess
        </div>";
    }
}

function path($go)
{
    echo "<script>
    location.replace('/crudTask/$go')
    </script>";
}
 ?>