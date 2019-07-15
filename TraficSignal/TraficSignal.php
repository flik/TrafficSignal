<?php 
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal;

class TraficSignal
{
    private $state;
    private $hour; 
    
    function getState()
    {
        return $this->state;
    }

    function getStateStatus()
    {
        return "default state is : " . get_class($this->state);
    }

    function setState(TraficSignalStateInterface $state)
    {
        $this->state = $state; 
    }
    
    public function __construct()
    {
        $this->setState(new  \TraficSignal\State\Stop());
    }
    
    public function isOpen()
    {
        return $this->state instanceof \TraficSignal\State\Open;
    }
    
    public function setTime($hour = '')
    {
        if (empty($hour)) {
            $hour = intval(date("h"));
        }
        $this->ensureIsValidInteger($hour); 
        $this->hour = $hour;
    }
    
    /*
    * Function for validate integer
    * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
    * Dated: 07-15-2019
    */
    private function ensureIsValidInteger( $intValue)
    {
        if (!filter_var($intValue, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid integer hour',
                    $intValue
                )
            );
        }
    }


    public function open($params = array())
    {
        $this->setState($this->state->open());
        
        $green_light = $params['green_light'];
        $yellow_light = $params['yellow_light'];
        $red_light = $params['red_light'];
        $output = $params['output'];
 
        /*
            From 06:00-23:00:
            green light for 30 seconds
            green and yellow light for 5 seconds
            red for 40 seconds
            back to green
        */
        if( $this->hour >= 6 && $this->hour <= 23){
            
            if(   $yellow_light == 7 && $red_light == 42 && $green_light >=1) {
                $output = "(Yellow and red lights are OFF) Green Light is ON"; 
                $green_light--;
            }
            
            if( $green_light == 1 && $red_light == 42 && $yellow_light >= 1){
                $output = "(Red light is OFF) Green and yellow lights are ON" ;
                $yellow_light--;
            }
                
            if($green_light == 1 &&  $yellow_light == 1 && $red_light >= 1 ){
                $output = "(Green and Yellow Lights are OFF) Red Light is ON";
                $red_light--;
            }
  
            //Resetting 
            if($red_light == 1)  {
                $green_light =  32;
                $yellow_light = 7;
                 $red_light = 42; 
            }  
        }
        
        // From 23:00-06:00 a yellow light blinking (2 second off/1 sec on)
        if( $this->hour <= 6){
                
            if($yellow_light >= 6){
                $output = "(Yellow Light Blinking and OFF for 2 seconds";  
            }


            if($yellow_light == 5){
                $output = "(Yellow Light Blinking and ON for 1 second" ;
            }
            
            $yellow_light--;

            //Resetting 
            if($yellow_light < 5 )  { 
                $yellow_light = 7; 
            }  

        }

        $params['green_light'] = $green_light;
        $params['yellow_light'] = $yellow_light ;
        $params['red_light'] = $red_light ;
        $params['output']  = $output;
        $this->setState($this->state->close());
        return $params;
    }
    
    public function close()
    {
        $this->setState($this->state->close());
    }
    
    public function ready()
    { 
        $this->setState($this->state->ready());
        
    }
    
    public function stop()
    {
        $this->setState($this->state->stop());
         
    }

    /*
    * Function for execute shell command
    * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
    * Dated: 07-15-2019
    */
    private function terminal($command)
    {
        //system
        if(function_exists('system'))
        {
            $output =  system($command , $return_var);
        }
        //passthru
        else if(function_exists('passthru'))
        {
            
            $output =  passthru($command , $return_var);
            
        }
        
        //exec
        else if(function_exists('exec'))
        {
            exec($command , $output , $return_var);
            $output = implode(" " , $output);
        }
        
        // (on a system with the "iamexecfunction" executable in the path) 
        //shell_exec
        else if(function_exists('shell_exec'))
        {
             $output = shell_exec($command) ;
        }
        
        else
        {
            $output = 'Command execution not possible on this system';
            $return_var = 1;
        }
        
        return array('output' => $output , 'status' => $return_var);
    }

}
