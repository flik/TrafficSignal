<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal\State;

class Stop extends \TraficSignal\TraficSignalState
{
    public function open()
    {
        return new Open();
    }
    
    public function close()
    {
        return new Close();
    }
    
    public function ready()
    {
        return new Ready();
    }
    
    public function stop()
    {
        return new Stop();
    }
}
