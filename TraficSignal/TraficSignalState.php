<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal;

class TraficSignalState implements TraficSignalStateInterface
{
    public function close()
    {
        throw new \TraficSignal\Exception\IllegalStateTransitionException();
    }

    public function ready()
    {
        throw new \TraficSignal\Exception\IllegalStateTransitionException();
    }

    public function open()
    {
        throw new \TraficSignal\Exception\IllegalStateTransitionException();
    }
    
    public function stop()
    {
        throw new \TraficSignal\Exception\IllegalStateTransitionException();
    }
}
