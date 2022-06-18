<?php

// @TODO no.1 replace following functions with only one more general function.
// have you heard about DRY principal? DRY stands for don't repeat yourself
// if you don't know the syntax for modulo operator, you can check it at https://www.php.net/manual/en/language.operators.arithmetic.php

function isMultipleOf3(int $number): bool
{
    return ($number % 3) === 0;
}

function isMultipleOf5(int $number): bool
{
    return ($number % 5) === 0;
}

function isMultipleOf8(int $number): bool
{
    return ($number % 8) === 0;
}

function isMultipleOf15(int $number): bool
{
    return ($number % 15) === 0;
}


function isMultipleOfN(int $number, int $n): bool
{
    return ($number % $n) === 0;
}


$myNumber = 15;

// $myNumberIsMultipleOf3 = isMultipleOf3($myNumber);
// $myNumberIsMultipleOf5 = isMultipleOf5($myNumber);
// $myNumberIsMultipleOf8 = isMultipleOf8($myNumber);
// $myNumberIsMultipleOf15 = isMultipleOf15($myNumber);


$myNumberIsMultipleOf3 = isMultipleOfN($myNumber, 3);
$myNumberIsMultipleOf5 = isMultipleOfN($myNumber, 5);
$myNumberIsMultipleOf8 = isMultipleOfN($myNumber, 8);
$myNumberIsMultipleOf15 = isMultipleOfN($myNumber, 15);

// var_dump($myNumberIsMultipleOf3);
// var_dump($myNumberIsMultipleOf5);
// var_dump($myNumberIsMultipleOf8);
// var_dump($myNumberIsMultipleOf15);




function greatestDivisor(int $number): ?int
{
    // @TODO no.2 implement this function which will give you the greatest divisor for any positive number.
    // Do not return 1 or the number itself. if the number is prime number, return null.
    for($i = intval($number / 2); $i > 1; $i--){
        if (isMultipleOfN($number, $i)) {
            return $i;
        }
    }

    return null;
    


}

echo(greatestDivisor(3) ?? 'prime number');
echo ('<br />');
echo(greatestDivisor(8) ?? 'prime number');
echo ('<br />');
echo(greatestDivisor(15) ?? 'prime number');
echo ('<br />');
echo(greatestDivisor(99) ?? 'prime number');
echo ('<br />');
echo(greatestDivisor(100) ?? 'prime number');
echo ('<br />');
echo ('<br />');






// @TODO no.3 Fix the bug! Try to make code as good and as readable as possible, formatting is up to you, but please clean up this mess.
// Here is dynamically generated two dimensional array representing chess board.
// Values of nested array should be 0 or 1 representing white or black.

$board=[];

for($i = 0; $i < 8; $i++) {
    $row = [];
    
    for ($j = 0; $j <= 8; $j++) {
        $row[] = (($j + $i) % 2 ) === 0 ? 1 : 0;
    }

    $board[]= $row;

}

// @TODO no.4 You can use html template with some css to display good looking chessboard. Use grid, flex or any other approach.
foreach ($board as $row) {
    echo ('<div>');

    foreach ($row as $square) {
        echo ('<span>' . $square . '</span>');

    }

    echo ('<div>');
}
