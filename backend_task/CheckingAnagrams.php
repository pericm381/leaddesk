<?php

require_once 'Anagram.php';

class CheckingAnagrams implements Anagram
{
    public function isAnagram(string $word1, string $word2): bool
    {
        if (count_chars($word1, 1) == count_chars($word2, 1))
            return true;
        else
            return false;
    }

    public function anagram(string $word1, string $word2): bool
    {
        if (strlen($word1) != strlen($word2)) {
            return false;
        }

        for ($i = 0; $i < strlen($word1); $i++) {
            $pos = strpos($word2, $word1[$i]);
            if ($pos !== false) {
                $word2 = substr_replace($word2, '', $pos, 1);
            } else {
                return false;
            }
        }

        return true;
    }
}

$anagramChecker = new CheckingAnagrams();

$word1 = readline('Enter the first word: ');
$word2 = readline('Enter the second word: ');

$areAnagrams = $anagramChecker->anagram($word1, $word2) ? 'are' : 'are not';
echo "'$word1' and '$word2' $areAnagrams anagrams of each other.\n";
