<?php
require_once 'autoload.php'; 
 
$trafic_signal = new TraficSignal\TraficSignal();
$i = 1; 
$params = $result = array();

while ($i < 90) {
   
    $params['green_light'] = 32;
    $params['yellow_light'] = 7 ;
    $params['red_light'] = 42 ;
    $params['output']  = '';

     // echo " \n".intval(date("h"))." - The time is " . date("h:i:sa");
    if(empty($output)){ 
        $result =  $trafic_signal->open($params); 
        $output = $result['output'];
    }else { 
        $result =  $trafic_signal->open($result); 
    } 

    echo   "\n ".$result['output']." ------------------- ".$i ;
    sleep(1);
    $i++;
    $trafic_signal->close();
}