<?php
class Utility
{
    public function getNumber()
    {

        $n = readline();
        if (filter_var($n, FILTER_VALIDATE_INT)) {
            return $n;
        } else {
            echo "Invalid Input,Enter Positive integer : ";
            return Utility::getNumber();
        }
    }
    public function getInteger()
    {
        //fscanf(STDIN, '%d', $n);
        $n = readline();
        if ($n === 0) {
            return $n;
        }else if(is_float($n)){
            echo "Invalid Input,Enter Positive integer : ";
            return Utility::getInteger();
        }
         else if (filter_var($n, FILTER_VALIDATE_INT))  {
            return $n;
        } else {
            echo "Invalid Input,Enter Positive integer : ";
            return Utility::getInteger();
        }
    }

    public function entername()
    {
        $flag = 1;
        while ($flag) {
            echo "Enter your name\n";
            $name = readline();
            if (strlen($name) <= 3 || (preg_match('/[0-9]/', $name))) {
                echo "Invalid name enter valid name \n";

            } else {
                echo "Hello " . $name . ",How are you.\n";
                $flag = 0;
            }
        }
    }

    public function flipCoin()
    {
        echo "Enter the total Number of flips - ";
        $flips = $temp = Utility::getNumber();
        $head = 0;
        $tail = 0;

        while ($temp) {
            $var = rand(0, 1);
            if ($var == 0) {
                $tail++;
            } else {
                $head++;
            }
            $temp--;
        }
        echo "Head percentage =" . ($head / $flips) * 100 . "\n";
        echo "Tail percentage =" . ($tail / $flips) * 100;
    }

    public function leapYear()
    {
        $flag = 1;
        while ($flag) {
            $year = readline("Enter the year =");

            if (strlen($year) == 4 && is_numeric($year)) {
                if ((($year % 4 == 0) && ($year % 100 != 0) || ($year % 400 == 0))) {
                    echo "Year " . $year . " is a leap year\n";
                } else {
                    echo "Year " . $year . " is not a leap year\n";
                }
                $flag = 0;
            } else {
                echo "Entered invalid input,Enter 4 digit year\n";
            }
        }

    }
    public function powerOfTwo()
    {
        echo "Enter the value of N :";
        $n = Utility::getNumber();
        $i = 0;

        while ($i <= $n) {
            if ($i == 0) {
                $pow = 1;
            } else {
                $pow = $pow * 2;
            }
            echo "2^" . $i . "=" . $pow . "\n";
            $i++;
        }
    }
    public function harmonicNumber()
    {
        echo "Enter the value of N :";
        $n = Utility::getNumber();
        $i = 2;
        $sum = 1;
        echo "(1/1)";
        while ($i <= $n) {
            echo "+(1/" . $i . ")";
            $sum = $sum + 1 / $i;
            $i++;
        }
        echo "= " . $sum . "\n";
    }

    public function primeFactors()
    {
        echo "Enter the value of N :";
        $n = Utility::getNumber();
        while ($n % 2 == 0) {
            echo 2, " ";
            $n = $n / 2;
        }

        for ($i = 3; $i <= $n; $i = $i + 2) {

            while ($n % $i == 0) {
                echo $i, " ";
                $n = $n / $i;
            }
        }
        if ($n > 2) {
            echo $n, " ";
        }
    }

    public function gambler()
    {
        echo "Enter the initial amount(Stake) :";
        $stake = Utility::getNumber();
        echo "Enter the goal amount : ";
        $goal = Utility::getNumber();
        echo "Enter the trials : ";
        $trials = Utility::getNumber();

        $win = 0;
        $lose = 0;
        for ($i = 0; $i < $trials; $i++) {
            $amt = $stake;
            while ($amt > 0 && $amt < $goal) {
                if (rand(0, 1) == 1) {
                    $amt++;
                } else {
                    $amt--;
                }

            }
            if ($amt == $goal) {
                $win++;
            } else {
                $lose++;
            }
        }
        echo "\nNumber of wins = " .$win."\n";
        echo "Number of lose = " .$lose."\n";
        echo "Percentage of wins = " . (($win/$trials)*100) ."\n";
        echo "Percentage of lose = " . (($lose/$trials)*100) ."\n";
    }

    public function coupon()
    {
        echo "Enter the total number of coupon : ";
        $n = Utility::getNumber();
        $temp_array = array();
        $count=0;
        $l1 = count($temp_array);
        while($l1<$n)
        {
            $var = (rand(1,$n));
            $count++;
            $temp_array = Utility::checkarray($temp_array,$var); 
            $l1 = count($temp_array);
        }  
        echo "Number of trials taken to get distinct coupon = ".$count."\n";
    } 

    public function checkarray($temp_array,$var)
    {
        $flag = 1; 
        for($i=0;$i<count($temp_array);$i++)
        {
            if($temp_array[$i] == $var)
            {
                $flag=0;
                break;
            }
        }
        if($flag==1)
        {
            $temp_array[count($temp_array)]=$var;
        }
        return $temp_array;
    }
    public function binarytoDecimal()
    {
        echo "Enter decimal number>0 : ";
        $n = Utility::getNumber();

        $num =$n;
        $rem = 0;
        $base=1;
        $binary=0;
        while($num >= 1)
        {
            $rem = $num%2;
            $binary = $binary + $rem * $base;
            $num = $num/2;
            $base = $base*10;
        }
        echo "Binary value = " . $binary."\n";
    }
    public function swapNibbles()
    {
        echo "enter the non negative number \n";
        $n = Utility::getNumber();
        $first_nibble = (($swapnum & 0x0F) << 4);
        $second_nibble = (($swapnum & 0xF0) >> 4);
        $result = $first_nibble | $second_nibble;
        if (($result & ($result - 1)) == 0 && $swapnum != 0) {

            echo "the swapped number is = " . $result . " is power of 2 \n";
        } else {
            echo "the swapped number is = " . $result . " is not power of 2 \n";
        }
    }
    public function stopWatch()
    {
        echo "To start the stopwatch enter 1 :";
        $n = Utility::readone();
        $starttime = microtime(true);
        while($n){
            $starttime = microtime(true);
            echo "To stop the watch press 1:";
            $valid =Utility:: readone();
            if($valid = 1){
                $n=0;
                echo "Start time = ". $starttime. "seconds \n";
                $stoptime =microtime(true) ;
                echo "Stop time = ". $stoptime. "seconds \n";
                $counter= $stoptime-$starttime;
                echo "Time spent = ".$counter. "seconds \n";
               
            }
        } 
    }
    public function readone()
    {
        fscanf(STDIN,"%d",$n);
        if($n==1){
            return $n;
            
        }else
        {
            echo "Invalid input.Enter onceagain :";
            return Utility::readone();
        }
    }
}   
    


       
