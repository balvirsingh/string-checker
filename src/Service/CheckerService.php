<?php

namespace App\Service;

class CheckerService
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters 
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word) : bool
    {
        $status = false;
        if (strrev(strtolower($word)) == strtolower($word)){ 
            
            $status = true;
        } 
        
        return $status;
    }
    
    /**
     * A Pangram for a given alphabet is a sentence using every letter of the 
     * alphabet at least once. 
     * 
     * @param string $phrase
     * @return bool
     */    
    public function isPangram(string $phrase) : bool
    {
        $alphabetArr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        $isPangram = false;
        
        $dataArr = str_split($phrase);
        foreach ($dataArr as $char) {
           
            if (ctype_alpha($char)) {
                
                $char = strtolower($char);
               
                $key = array_search($char, $alphabetArr);
                if ($key !== false) {
                    unset($alphabetArr[$key]);
                }
            }
        }
        
        if (!$alphabetArr) {
            $isPangram = true;
        }
        
        return $isPangram;
    }
    
    /**
     * An anagram is the result of rearranging the letters of a word or phrase 
     * to produce a new word or phrase, using all the original letters 
     * exactly once.
     * 
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(string $word, string $comparison) : bool
    {
        $status = false;
        if (count_chars($word, 1) == count_chars($comparison, 1))  {
        
            return $status = true;
        }
        
        return $status;
    }
}
