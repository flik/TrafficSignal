# TrafficSignal

## Requirements
** PHP 7.1.10 (cli) 

** phpunit-6.5.14 ( already in repo with name phpunit.phar)

## Run the normal code and check output
```
php index.php
```
## Run Unit test cases to verify conditions
```
./phpunit.phar --bootstrap ./TraficSignal/TraficSignal.php ./TraficSignalTest.php
 
-------- to test Time 06:00 to 23:00 and combination code for condition A :
    [green_light] = 30
    [yellow_light] = 7
    [red_light] = 42
    [output] => (Yellow and red lights are OFF) Green Light is ON

-------- to test Time 06:00 to 23:00 and combination code for condition B :
    [green_light] = 1
    [yellow_light] = 1
    [red_light] = 42
    [output] => (Red light is OFF) Green and yellow lights are ON

-------- to test Time 06:00 to 23:00 and combination code for condition C :
    [green_light] = 1
    [yellow_light] = 1
    [red_light] = 40
    [output] => (Green and Yellow Lights are OFF) Red Light is ON

-------- to test Time 23:00 to 06:00 and combination code for condition A :
    [green_light] = 1
    [yellow_light] = 6
    [red_light] = 40
    [output] => (Yellow Light Blinking and OFF for 2 seconds

-------- to test Time 23:00 to 06:00 and combination code for condition B :
    [green_light] = 1
    [yellow_light] = 5
    [red_light] = 40
    [output] => (Yellow Light Blinking and ON for 1 second

```
