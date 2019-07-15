<?php
/**
 * Created by Visual Studio.
 * @author Muhammad Ashfaq <ashfaqzp@gmail.com>
 * Date: 14/07/2019 
 */

namespace TraficSignal;

interface TraficSignalStateInterface
{
    public function open();
    public function close();
    public function ready();
    public function stop();
}