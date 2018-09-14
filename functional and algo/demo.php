<?php
class demo
{
    static $a=10;
   public static function display()
   {
       echo demo :: $a;
   }
}
$ref = new demo();
 $ref->display();

?>
