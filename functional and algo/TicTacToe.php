<?php
class TicTacToe
{
    static $board = array();
    static $xturn=1;
    public function initialize()
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                TicTacToe::$board[$i][$j] = ' ';
            }
        }
        echo "Welcome to tic tac toe.. ";
        echo "If you want to start press 1 else press 0 :";
        fscanf(STDIN, '%d', $n);
        if($n==0)
        TicTacToe :: $xturn=0;

    }
    public function play()
    {
        $game = 1;
        while ($game) {
            TicTacToe::displayboard();
            TicTacToe::displaymenu();

            if (TicTacToe::getMove()) {
                TicTacToe::displayboard();
                if (TicTacToe::$xturn) {
                    echo "You win\n";
                } else {
                    echo "Computer won\n";
                }
                $game = 0;
                break;
            } elseif (TicTacToe::boardFull()) {
                TicTacToe::displayboard();
                echo "draw";
                $game = 0;
                break;
            } else {
                TicTacToe::$xturn = !(TicTacToe::$xturn);
            }
        }
    }
    public function displayboard()
    {
        echo "--------\n";
        TicTacToe::displayrow(0);
        echo "--------\n";
        TicTacToe::displayrow(1);
        echo "--------\n";
        TicTacToe::displayrow(2);
        echo "--------\n";
    }
    public function displayrow($row)
    {
        echo " " . TicTacToe::$board[$row][0] . "|" . TicTacToe::$board[$row][1] .
        "|" . TicTacToe::$board[$row][2]."|";
        echo "\n";
    }

    public function displaymenu()
    {
        if (TicTacToe::$xturn) {
            echo "Your Turn \n";

        } else {
            echo "Computer turn \n";
        }
    }

    public function getMove()
    {
        $invalid = 1;
        $row = 0;
        $col = 0;
        while ($invalid) {
            if (TicTacToe::$xturn) {
                echo "Enter the row(0-2) :";
                fscanf(STDIN, '%d', $row);
                echo "Enter the col(0-2) :";
                fscanf(STDIN, '%d', $col);

                if ($row >= 0 && $row <= 2 && $col >= 0 && $col <= 2) {
                    if (TicTacToe::$board[$row][$col] !== ' ') {
                        echo "That position is already taken";
                    } else {
                        $invalid = 0;
                    }
                } else {
                    echo "Invalid position";
                }
            } else {
                $row = rand(0, 2);
                $col = rand(0, 2);
                if ($row >= 0 && $row <= 2 && $col >= 0 && $col <= 2) {
                    if (TicTacToe::$board[$row][$col] == ' ') {
                        $invalid = 0;
                    }
                }
            }

        }
        if (TicTacToe::$xturn) {
            TicTacToe::$board[$row][$col] = 'X';
        } else {
            TicTacToe::$board[$row][$col] = 'O';
        }
        return TicTacToe::winner($row, $col);
    }

    public function winner($lastrow, $lastcol)
    {
        $win = 0;
        $symbol = TicTacToe::$board[$lastrow][$lastcol];
        $numfound = 0;
        //row
        for ($c = 0; $c < 3; $c++) {
            if (TicTacToe::$board[$lastrow][$c] == $symbol) {
                $numfound++;
            }

        }
        if ($numfound == 3) {
            $win = 1;
        }
        //col
        $numfound = 0;
        for ($i = 0; $i < 3; $i++) {
            if (TicTacToe::$board[$i][$lastcol] == $symbol) {
                $numfound++;
            }
        }
        if ($numfound == 3) {
            $win = 1;
        }
        //diagonal
        if (TicTacToe::$board[0][0] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[2][2] == $symbol) {
            $win = 1;
        }
        //diagonal
        if (TicTacToe::$board[0][2] == $symbol &&
            TicTacToe::$board[1][1] == $symbol &&
            TicTacToe::$board[2][0] == $symbol) {
            $win = 1;
        }

        // $numfound = 0;
        // for ($i = 0; $i < 3; $i++) {
        //     for ($j = 0; $j < 3; $j++) {
        //         if ($i === $j) {
        //             if (TicTacToe::$board[$i][$lastcol] == $symbol) {
        //                 $numfound++;
        //             }
        //         }
        //     }
        // }
        // if ($numfound == 3) {
        //     $win = 1;
        // }

        // $numfound = 0;
        // for ($i = 0; $i < 3; $i++) {
        //     for ($j = 0; $j < 3; $j++) {
        //         if (($i + $j) === 2) {
        //             if (TicTacToe::$board[$i][$lastcol] == $symbol) {
        //                 $numfound++;
        //             }
        //         }
        //     }
        // }
        // if ($numfound == 3) {
        //     $win = 1;
        // }

        return $win;
    }
    public function boardFull()
    {
        $filled = 0;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if (TicTacToe::$board[$i][$j] == 'X' || TicTacToe::$board[$i][$j] == 'O') {
                    $filled++;
                }
            }
        }
        if ($filled == 9) {
            return 1;
        } else {
            return 0;
        }

    }
}
?>
