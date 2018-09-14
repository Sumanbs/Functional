<?php
include "TwoD_Array.php";
$ref = new twoDarray();
echo "Enter 1-integer array, 2 - float array, 3 - string array\n";
fscanf(STDIN,"%d",$n);
while(!filter_var($n, FILTER_VALIDATE_INT) )
{
    echo "Invalid input,Enter again(1,2,3) :";
    fscanf(STDIN,"%d",$n);
}
switch ($n) {
    case '1':
    $ref->intArray();
        break;
    case '2':
        $ref->floatArray();
            break;
    case '3':
        $ref->stringArray();
            break;
    default:
        echo "no match found";
        break;
}

?>