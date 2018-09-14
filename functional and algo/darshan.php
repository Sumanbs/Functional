<?php
class Utility
{
    public function getInt()
    {
        fscanf(STDIN, '%d', $num);
        if (filter_var($num, FILTER_VALIDATE_INT)) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    public function findNum()
    {
        echo "enter the number \n";
        $number = Utility::getInt();

        $start = 0;
        $final = pow(2, $number) - 1;
        $end = pow(2, $number);
        echo "chosse the number btw " . 0 . " and " . $final . "\n";
        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);
            echo "press 1 if your num is =" . $mid . "\n";
            echo "press 2 if your num is <" . $mid . "\n";
            echo "press 3 if your num is >" . $mid . "\n";
            $your = Utility::getInt();
            if ($your == 2) {
                $end = $mid - 1;
            } elseif ($your == 3) {
                $start = $mid + 1;
            } else {
                echo "your num = " . $mid . "\n";
                break;
            }
        }
    }
    public function currencyNotes()
    {
        echo "eneter the amount \n";
        $amount = Utility::getInt();
        $notes = array(1000, 500, 200, 100,
            50, 20, 10, 5, 1);
        $noteCounter = array(0, 0, 0, 0, 0,
            0, 0, 0, 0, 0);

        for ($i = 0; $i < 9; $i++) {
            if ($amount >= $notes[$i]) {
                $noteCounter[$i] = intval($amount / $notes[$i]);
                $amount = $amount - $noteCounter[$i] * $notes[$i];
            }
        }
        echo ("Currency notes :" . "\n");
        for ($i = 0; $i < 9; $i++) {
            if ($noteCounter[$i] != 0) {
                echo ($notes[$i] . " : " .
                    $noteCounter[$i] . "\n");
            }
        }
    }
    public function date()
    {
        echo "enter the date \n";
        fscanf(STDIN, '%d', $d);
        echo "enter the month \n";
        fscanf(STDIN, '%d', $m);
        echo "enter the year \n";
        fscanf(STDIN, '%d', $y);
        $yo = $y - (14 - $m) / 12;
        $x = $yo + $yo / 4 - $yo / 100 + $yo / 400;
        $mo = $m + 12 * ((14 - $m) / 12) - 2;
        $do = ($d + $x + 31 * $mo / 12) % 7;
        $weekdays = array("sunday", "monday", "tuesday", "wednesday",
            "thursday", "friday", "saturday");

        echo "the given day = " . $weekdays[$do] . "\n";
    }
    public function date2()
    {
        echo "enter the date \n";
        fscanf(STDIN, '%d', $d);
        echo "enter the month \n";
        fscanf(STDIN, '%d', $m);
        echo "enter the year \n";
        fscanf(STDIN, '%d', $y);
        static $t = array(0, 3, 2, 5, 0, 3,
            5, 1, 4, 6, 2, 4);
        $y = $y - $m < 3;
        $do = ($y + $y / 4 - $y / 100 + $y / 400 + $t[$m - 1] + $d) % 7;
        $weekdays = array("sunday", "monday", "tuesday", "wednesday",
            "thursday", "friday", "saturday");

        echo "the given day = " . $weekdays[$do] . "\n";

    }
    public function temperature()
    {
        echo "enter 1 get (Celsius to fahrenheit) \n";
        echo "enter 2 get (fahrenheit to Celsius) \n";
        $coverion = Utility::getInt();
        switch ($coverion) {
            case 1:
                echo "enter temp in Celsius \n";
                fscanf(STDIN, '%f', $c);
                $f = ($c * 9 / 5) + 32;
                echo "temp in fahrenheit =" . $f . "'C\n";
                break;
            case 2:
                echo "enter temp in fahrenheit \n";
                fscanf(STDIN, '%f', $f);
                $c = ($f - 32) * 5 / 9;
                echo "temp in fahrenheit =" . $c . "'F\n";
                break;
            default:
                echo "invalid input \n";
                Utility::temperature();
                break;
        }
    }
    public function monthpay()
    {
        echo "enter the principle \n";
        fscanf(STDIN, '%d', $P);
        echo "enter the year \n";
        fscanf(STDIN, '%d', $Y);
        echo "enter the rate \n";
        fscanf(STDIN, '%d', $R);
        $r = $R / (12 * 100);
        $n = 12 * $Y;
        $payment = $P * $r / (1 - pow((1 + $r), -$n));
        echo "the payment need pay is = " . $payment . "\n";
    }
    public function sqrt()
    {
        echo "enter the non negative number \n";
        fscanf(STDIN, '%d', $value);
        if ($value >= 0) {
            $epsilon = 1e-15;
            $t = $value;
            while (abs($t - $value / $t) > $epsilon * $t) {
                $t = ($value / $t + $t) / 2;
            }
            echo "sqrt of " . $value . " is " . $t . "\n";

        } else {
            echo "invalid num \n";
            Utility::sqrt();
        }
    }
    public function toBinary()
    {

        echo "Enter +ve decimal  number \n";
        $number = Utility::getInt();
        $temp=$number;
        $reminder= 0;
        $multiplier= 1;
        $binary = 0;
        while ($number >= 1) {
            $reminder = $number % 2;
            $binary = $binary + $reminder * $multiplier;
            $number = $number / 2;
            $multiplier = $multiplier * 10;
        }
        echo "Binary value of " . $temp . " is " . $binary . "\n";
    }

    public function swap()
    {
        echo "enter the non negative number \n";
        fscanf(STDIN, '%d', $swapnum);
        $result = (($swapnum & 0x0F) << 4 | ($swapnum & 0xF0) >> 4);
        if (($result & ($result - 1)) == 0 && $swapnum != 0) {

            echo "the swapped number is = " . $result . " is power of 2 \n";
        } else {
            echo "the swapped number is = " . $result . " is not power of 2 \n";
        }
    }
}