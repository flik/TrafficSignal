<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

require_once 'autoload.php';

use PHPUnit\Framework\TestCase;

class TraficSignalTest extends TestCase {

    public function testCheckDefaultState(){ 
        $elevator = new TraficSignal\TraficSignal(); 
        $this->assertEquals(trim($elevator->getStateStatus()), 'default state is : TraficSignal\State\Stop');
    } 

    public function testTime6To23AndOutputIsEqualConditionA(){
        $trafic_signal = new \TraficSignal\TraficSignal();
        $trafic_signal->setTime(8);
        $i = 0;
        $params = $result = array(); 
        $output = ''; 
        // Param combination for expected output = (Yellow and red lights are OFF) Green Light is ON
        $params['green_light'] = 30;
        $params['yellow_light'] = 7 ;
        $params['red_light'] = 42 ;
        $params['output']  = '--x';
 
        $result =  $trafic_signal->open($params);    
        //print_r( $result) ;  exit;
        $this->assertEquals(trim($result['output']), '(Yellow and red lights are OFF) Green Light is ON');
       
    }

    public function testTime6To23AndOutputIsEqualConditionB(){
        $trafic_signal = new \TraficSignal\TraficSignal();
        $trafic_signal->setTime(8);
        $i = 0;
        $params = $result = array(); 
        $output = ''; 
        // Param combination for expected output = (Red light is OFF) Green and yellow lights are ON
        $params['green_light'] = 1;
        $params['yellow_light'] = 1 ;
        $params['red_light'] = 42 ;
        $params['output']  = '--x';
 
        $result =  $trafic_signal->open($params);    
        //print_r( $result) ;  exit;
        $this->assertEquals(trim($result['output']), '(Red light is OFF) Green and yellow lights are ON');
       
    }

    public function testTime6To23AndOutputIsEqualConditionC(){
        $trafic_signal = new \TraficSignal\TraficSignal();
        $trafic_signal->setTime(8);
        $i = 0;
        $params = $result = array(); 
        $output = ''; 
        // Param combination for expected output = (Green and Yellow Lights are OFF) Red Light is ON
        $params['green_light'] = 1;
        $params['yellow_light'] = 1 ;
        $params['red_light'] = 40 ;
        $params['output']  = '--x';
 
        $result =  $trafic_signal->open($params);    
        //print_r( $result) ;  exit;
        $this->assertEquals(trim($result['output']), '(Green and Yellow Lights are OFF) Red Light is ON');
       
    }

    public function testTime23To6AndOutputIsEqualConditionA(){
        $trafic_signal = new \TraficSignal\TraficSignal();
        $trafic_signal->setTime(4);
        $i = 0;
        $params = $result = array(); 
        $output = ''; 
        // Param combination for expected output = (Yellow Light Blinking and OFF for 2 seconds
        $params['green_light'] = 1;
        $params['yellow_light'] = 6 ;
        $params['red_light'] = 40 ;
        $params['output']  = '--x';
 
        $result =  $trafic_signal->open($params);    
        //print_r( $result) ;  exit;
        $this->assertEquals(trim($result['output']), '(Yellow Light Blinking and OFF for 2 seconds');
       
    }

    public function testTime23To6AndOutputIsEqualConditionB(){
        $trafic_signal = new \TraficSignal\TraficSignal();
        $trafic_signal->setTime(4);
        $i = 0;
        $params = $result = array(); 
        $output = ''; 
        // Param combination for expected output = (Yellow Light Blinking and ON for 1 second 
        $params['green_light'] = 1;
        $params['yellow_light'] = 5 ;
        $params['red_light'] = 40 ;
        $params['output']  = '--x';
 
        $result =  $trafic_signal->open($params);    
        //print_r( $result) ;  exit;
        $this->assertEquals(trim($result['output']), '(Yellow Light Blinking and ON for 1 second');
       
    } 



 

}

