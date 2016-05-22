<?php
/**
 * Определяем палиндром
 */

include('palindrom.php');

//GO
$Palindrom = new Palindrom();
echo $Palindrom->doFind('Аргентина манит негра');           // аргентинаманитнегра
echo $Palindrom->doFind('А роза упала на лапу Азора');      // арозаупаланалапуазора
echo $Palindrom->doFind('фывафыв ина манит негра фываргентина маит негрфыва');   // инамани
echo $Palindrom->doFind('палиндром');   // п