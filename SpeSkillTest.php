<?php

/**
 * SPE Skill Test class.
 */
class SpeSkillTest
{
    /**
     * A narcissistic number is a number which return the sum of its own digits, each raised to the
     * power of the number of digits in a given base. (Assume there won’t be any decimal)
     *
     * Challenge:
     * Create a function which return true or false depending on given number in the parameter is
     * Narcissistic or not.
     *
     * @param integer $input
     * @return bool
     */
    public static function narcissistic(int $input)
    {
        $narcissistic = 0;
        $powNumber = strlen($input);
        $numbers = str_split($input);

        foreach ($numbers as $number) {
            $narcissistic += pow($number, $powNumber);
        }

        return $narcissistic === $input;
    }

    /**
     * Given an array of integers (minimum length of 3), the array is either entirely contains whole of
     * odd integers with 1 outlier even integer or whole of even integers with 1 outiler odd integer.
     *
     * Challenge
     * Write a method that takes an array as an argument and returns the outlier.
     *
     * @param array $input
     * @return string
     */
    public static function parityOutlier(array $input)
    {
        $odds = [];
        $evens = [];

        foreach ($input as $number) {
            if (($number % 2) === 0) {
                $evens[] = $number;
            } else {
                $odds[] = $number;
            }
        }

        $oddCount = count($odds);
        $evenCount = count($evens);

        if ($oddCount === 0 || $evenCount === 0) {
            $resultNumber = 'false';
            $type = $oddCount === 0 ? 'odd' : 'even';
            $message = "all $type integer, no outliner";
        } else {
            if ($oddCount < $evenCount) {
                $type = 'odd';
                $resultNumber = $odds[0];
            } else {
                $type = 'even';
                $resultNumber = $evens[0];
            }
            $message = "the only $type number";
        }

        return sprintf('%s (%s)', $resultNumber, $message);
    }

    /**
     * Write a function which takes 2 arguments the first one takes an array of string (as a haystack)
     * and the second one is single string (as the needle). This function should return the index of
     * needle’s position.
     *
     * Challenge
     * Using array_search() function in PHP is prohibited
     *
     * @param array $haystack
     * @param mixed $needle
     * @return integer
     */
    public static function findNeedle(array $haystack, $needle)
    {
        $keyIndex = 0;
        foreach ($haystack as $key => $value) {
            if ($value === $needle) {
                $keyIndex = $key;
                break;
            }
        }

        return $keyIndex;
    }

    /**
     * Blue Ocean Strategy is very famous in marketing strategy, it try the business to differ from
     * other competitor with new product / business model. In this case we’ll try the reverse of it!
     *
     * Challenge
     * Create a function which takes 2 arguments and both should be array of integers. This function
     * should substracts one list to another and returns the result. It should remove all values from
     * the first list which are present in the second list.
     *
     * @param array $oceans
     * @param array $wave
     * @return array
     */
    public static function blueOcean(array $oceans, array $wave)
    {
        $blueSea = [];
        foreach ($oceans as $ocean) {
            if (!in_array($ocean, $wave)) {
                $blueSea[] = $ocean;
            }
        }

        return $blueSea;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPE Skill Test</title>
    </head>
    <body>
        <h1>NARCISSISTIC NUMBER</h1>
        <div>
            narcissisticNumber(153) = <?php var_dump(SpeSkillTest::narcissistic(153)); ?>
        </div>
        <div>
            narcissisticNumber(111) = <?php var_dump(SpeSkillTest::narcissistic(111)); ?>
        </div>
        <h1>PARITY OUTLIER</h1>
        <div>
            [2, 4, 0, 100, 4, 11, 2602, 36] = <?= SpeSkillTest::parityOutlier([2, 4, 0, 100, 4, 11, 2602, 36]); ?>
        </div>
        <div>
            [160, 3, 1719, 19, 11, 13, -21] = <?= SpeSkillTest::parityOutlier([160, 3, 1719, 19, 11, 13, -21]); ?>
        </div>
        <div>
            [11, 13, 15, 19, 9, 13, -21] = <?= SpeSkillTest::parityOutlier([11, 13, 15, 19, 9, 13, -21]); ?>
        </div>
        <h1>NEEDLE IN THE HAYSTACK</h1>
        <div>
            findNeedle(["red", "blue", "yellow", "black", "grey"], "blue") = <?= SpeSkillTest::findNeedle(["red", "blue", "yellow", "black", "grey"], "blue"); ?>
        </div>
        <h1>THE BLUE OCEAN REVERSE</h1>
        <div>
            blueOcean([1,2,3,4,6,10], [1]) = [<?= implode(',', SpeSkillTest::blueOcean([1,2,3,4,6,10], [1])) ?>]
        </div>
        <div>
            blueOcean([1,5,5,5,5,3], [5]) = [<?= implode(',', SpeSkillTest::blueOcean([1,5,5,5,5,3], [5])) ?>]
        </div>
    </body>
</html>