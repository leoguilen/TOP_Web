<?php
     
    $arq = "assets/index/dadoscnx.txt";

    $fp = fopen($arq,"r");
     
    $linha = fgets($fp,200);

    $host = substr($linha,0,18);
    $db = substr($linha,19,25);
        
    fclose($fp);
     
?>