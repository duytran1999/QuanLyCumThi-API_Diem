<?php
    include_once('connect.php');
    function dd($value){
        echo "<pre>",print_r($value,true),"</pre>";
        die();
    }
?>