<?php

function stripstring($string){
    $string = explode('.',$string);
    return (count($string) > 1) ? [$string[0],(strlen($string[1]) < 2) ? $string[1].'0' : '00'] : [$string[0],'00'];
};
?>
