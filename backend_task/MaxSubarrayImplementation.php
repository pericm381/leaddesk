<?php

require_once 'MaxSubarray.php';

class MaxSubarrayImplementation implements MaxSubarray
{
    function contiguous(array $array): int
    {
        $maxSum = PHP_INT_MIN;
        $currentSum = 0;

        foreach ($array as $value) {
            if (is_numeric($value)) {
                $value = (int)$value;
                $currentSum = max($value, $currentSum + $value);
                $maxSum = max($maxSum, $currentSum);
            } else {
                $currentSum = 0;
            }
        }

        echo($maxSum);

        return $maxSum;
    }
}