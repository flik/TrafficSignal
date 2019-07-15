<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal\State;

class Open extends \TraficSignal\TraficSignalState
{
    public function open()
    {
        return new Open();
    }
    
    public function close()
    {
        return new Close();
    }
}