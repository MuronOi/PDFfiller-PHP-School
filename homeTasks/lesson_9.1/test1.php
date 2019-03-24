
5muronoi@muronoi-nb:~/PhpstormProjects/PDFfiller-PHP-School/homeTasks/lesson_10$ php test3.php
<?php


function poilindrom($string){

     $string1 = strrev($string);
    return $string === $string1;

 }

echo (poilindrom('12321'));
