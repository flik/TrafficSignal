<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal\State;

class Ready extends \TraficSignal\TraficSignalState
{
    public function ready()
    {
        return new Ready();
    }
    
    public function stop()
    {
        return new Stop();
    }
}