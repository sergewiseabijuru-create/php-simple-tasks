<?php
for($i=0;$i<=99;$i++){
    $num = str_pad($i,2, "0", STR_PAD_LEFT);

    if($i<99){
        echo $num . ", ";
    }else{
        echo $num;
    }
}
?>