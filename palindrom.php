<?php

/*
 * Palindrom - определяет является ли строка текста палиндромом
 *
 * Дана строка текста.
 * Написать программу на php, которая определяет является ли строка текста палиндромом (читается с обеих сторон одинаково)
 * и осуществляет вывод строки следующим способом:
 *      а) если строка является палиндромом, то она выводится полностью;
 *      б) если строка не является палиндромом - выводится самый длинный подпалиндром этой строки, т.е. самая длинная часть строки, являющаяся палиндромом;
 *      в) если подпалиндромы отсутствуют в строке - выводится первый символ строки.
 *
 * Примеры палиндромов:
 *      - Аргентина манит негра
 *      - Sum summus mus
*/

class Palindrom 
{

    public function doFind($word)
    {
        $word = mb_strtolower(str_replace(' ', '', $word), 'utf8');
        if (mb_strlen($word, 'utf8') < 2) {
            return $word;
        }
        if ($this->isPalindrom($word)) {
            //вся строка палиндром
            return $word;
        }
        for ($i = 1; $i < mb_strlen($word, 'utf8')-1; $i++) {
            for ($j = mb_strlen($word,'utf8')-$i; $j > 1; $j--) {
                $subStr = mb_substr($word, $i, $j, 'utf8');
                if ($this->isPalindrom($subStr)) {
                    $subPalindroms[] = $subStr;
                }
            }
        }
        if (empty($subPalindroms)) {
            //палиндромов в стоке не обнаружено
            return mb_substr($word, 0, 1, 'utf8');
        }
        $max = 0;
        $result = '';
        foreach ($subPalindroms as $k => $v) {
            if ($max > mb_strlen($v, 'utf8')) continue;
            $max = mb_strlen($v,'utf8');
            $result = $v;
        }
        //самый длинный подпалиндром этой строки (если несколько одной длины, то последний)
        return $result;
    }

    protected function isPalindrom($word)
    {
        return $word == $this->reverseStr($word);
    }

    protected function reverseStr($word)
    {
        preg_match_all('/./us', $word, $ar);
        return join('', array_reverse($ar[0]));
    }
}


//GO
$Palindrom = new Palindrom();
echo $Palindrom->doFind('Аргентина манит негра');           // аргентинаманитнегра
echo $Palindrom->doFind('А роза упала на лапу Азора');      // арозаупаланалапуазора
echo $Palindrom->doFind('фывафыв ина манит негра фываргентина маит негрфыва');   // инамани
echo $Palindrom->doFind('палиндром');   // п
