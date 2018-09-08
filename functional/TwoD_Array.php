<?php
class twoDarray
{
    public function getInteger()
    {
        fscanf(STDIN, '%d', $n);
        if ($n === 0) {
            return $n;
        } else if (filter_var($n, FILTER_VALIDATE_INT) || is_numeric($n)) {
            return $n;
        } else {
            echo "Invalid Input,Enter Positive integer : ";
            return twoDarray::getInteger();
        }
    }
    public function intArray()
    {
        $arr = array();
        echo "Enter the number of Rows\n";
        $row = twoDarray :: getInteger();
        echo "Enter the number of Columns\n";
        $col = twoDarray :: getInteger();
        echo "Enter the Array Elements\n";
        
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
                fscanf(STDIN,"%d",$arr[$i][$j]);
            }
        }
        echo "Entered Array Elements\n";
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
               echo $arr[$i][$j]." ";
            }
            echo "\n";
        }
    }
    public function floatArray()
    {
        $arr = array();
        echo "Enter the number of Rows\n";
        $row = twoDarray :: getInteger();
        echo "Enter the number of Columns\n";
        $col = twoDarray :: getInteger();
        echo "Enter the Array Elements\n";
        
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
                fscanf(STDIN,"%d",$arr[$i][$j]);
            }
        }
        echo "Entered Array Elements\n";
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
               echo $arr[$i][$j]." ";
            }
            echo "\n";
        }
    }
    public function stringArray()
    {
        $arr = array();
        echo "Enter the number of Rows\n";
        $row = twoDarray :: getInteger();
        echo "Enter the number of Columns\n";
        $col = twoDarray :: getInteger();
        echo "Enter the Array Elements\n";
        
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
                $arr[$i][$j] = readline();
            }
        }
        echo "Entered Array Elements\n";
        for ($i=0; $i < $row; $i++) { 
            for ($j=0; $j < $col; $j++) { 
               echo $arr[$i][$j]." ";
            }
            echo "\n";
        }
    }
    
}
?>