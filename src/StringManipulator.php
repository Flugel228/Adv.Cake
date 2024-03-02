<?php

namespace AdvCake;

class StringManipulator
{
    public static function revertCharacters(string $string): string
    {
        $words = preg_split('/(\s+)/u', $string, -1, PREG_SPLIT_DELIM_CAPTURE);

        if (!is_array($words)) {
            throw new \RuntimeException("Failed to split the string into words.");
        }

        foreach ($words as &$word) {
            if ($word !== ' ') {
                $punctuation = '';
                if (preg_match('/[^a-zA-Zа-яА-ЯёЁ]/u', $word, $matches, PREG_OFFSET_CAPTURE)) {
                    $punctuation = $matches[0][0];
                    $word = substr($word, 0, $matches[0][1]);
                }

                $letters = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

                if (!is_array($letters)) {
                    throw new \RuntimeException("Failed to split the word into letters.");
                }

                $reversedLetters = array_reverse($letters);

                foreach ($letters as $index => $letter) {
                    if (mb_strtoupper($letter, 'UTF-8') === $letter) {
                        $reversedLetters[$index] = mb_strtoupper($reversedLetters[$index], 'UTF-8');
                    } else {
                        $reversedLetters[$index] = mb_strtolower($reversedLetters[$index], 'UTF-8');
                    }
                }

                $word = implode('', $reversedLetters);

                $word .= $punctuation;
            }
        }

        return implode('', $words);
    }
}
