<?php

namespace App\Support\Lang;

use Exception;

class Translator
{
    /**
     * Dictionary of the translator
     *
     * @var array
     */
    const DICTIONARY = [
        'college' => [
            'i' => [
                's' => 'колледж',
                'p' => 'колледжи',
            ],

            'r' => [
                's' => 'колледжа',
                'p' => 'колледжей',
            ],

            'd' => [
                's' => 'колледжу',
                'p' => 'колледжам',
            ],

            'v' => [
                's' => 'колледж',
                'p' => 'колледжи',
            ],

            't' => [
                's' => 'колледжом',
                'p' => 'колледжами',
            ],

            'p' => [
                's' => 'колледже',
                'p' => 'колледжах',
            ],
        ],

        'university' => [
            'i' => [
                's' => 'университет',
                'p' => 'университеты',
            ],

            'r' => [
                's' => 'университета',
                'p' => 'университетов',
            ],

            'd' => [
                's' => 'университету',
                'p' => 'университетам',
            ],

            'v' => [
                's' => 'университет',
                'p' => 'университеты',
            ],

            't' => [
                's' => 'университетом',
                'p' => 'университетами',
            ],

            'p' => [
                's' => 'университете',
                'p' => 'университетах',
            ],
        ],

        'full-time' => [
            'i' => [
                's' => 'очная',
                'p' => 'очные',
            ],

            'r' => [
                's' => 'очной',
                'p' => 'очных',
            ],

            'd' => [
                's' => 'очной',
                'p' => 'очным',
            ],

            'v' => [
                's' => 'очную',
                'p' => 'очные',
            ],

            't' => [
                's' => 'очной',
                'p' => 'очными',
            ],

            'p' => [
                's' => 'очной',
                'p' => 'очных',
            ],
        ],

        'extramural' => [
            'i' => [
                's' => 'заочная',
                'p' => 'заочные',
            ],

            'r' => [
                's' => 'заочной',
                'p' => 'заочных',
            ],

            'd' => [
                's' => 'заочной',
                'p' => 'заочным',
            ],

            'v' => [
                's' => 'заочную',
                'p' => 'заочные',
            ],

            't' => [
                's' => 'заочной',
                'p' => 'заочными',
            ],

            'p' => [
                's' => 'заочной',
                'p' => 'заочных',
            ],
        ],

        'distant' => [
            'i' => [
                's' => 'дистанционная',
                'p' => 'дистанционные',
            ],

            'r' => [
                's' => 'дистанционной',
                'p' => 'дистанционных',
            ],

            'd' => [
                's' => 'дистанционной',
                'p' => 'дистанционным',
            ],

            'v' => [
                's' => 'дистанционную',
                'p' => 'дистанционные',
            ],

            't' => [
                's' => 'дистанционной',
                'p' => 'дистанционными',
            ],

            'p' => [
                's' => 'дистанционной',
                'p' => 'дистанционных',
            ],
        ],

        'specialty' => [
            'i' => [
                's' => 'специальность',
                'p' => 'специальности',
            ],

            'r' => [
                's' => 'специальности',
                'p' => 'специальностей',
            ],

            'd' => [
                's' => 'специальности',
                'p' => 'специальностям',
            ],

            'v' => [
                's' => 'специальность',
                'p' => 'специальности',
            ],

            't' => [
                's' => 'специальностью',
                'p' => 'специальностями',
            ],

            'p' => [
                's' => 'специальности',
                'p' => 'специальностях',
            ],
        ],

        'qualification' => [
            'i' => [
                's' => 'квалификация',
                'p' => 'квалификации',
            ],

            'r' => [
                's' => 'квалификации',
                'p' => 'квалификаций',
            ],

            'd' => [
                's' => 'квалификации',
                'p' => 'квалификациям',
            ],

            'v' => [
                's' => 'квалификация',
                'p' => 'квалификации',
            ],

            't' => [
                's' => 'квалификацией',
                'p' => 'квалификациями',
            ],

            'p' => [
                's' => 'квалификации',
                'p' => 'квалификациях',
            ],
        ],

    ];

    /**
     * Primary method
     * translates given word into Russian
     * with conjugation and required number
     *
     * @param  string  $word
     * @param  char    $conjugation
     * @param  char    $number
     * @param  boolean $ucFirst
     * @return string
     */
    public static function get($word, $conjugation = 'i', $number = 's', $ucFirst = false)
    {
        $word = static::normalize($word);

        static::validate($word, $conjugation, $number);

        $translated = self::DICTIONARY[$word][$conjugation][$number];

        return $ucFirst ? static::mbUcfirst($translated) : $translated;
    }

    /**
     * Throw an exception if
     * * word is not in dictionary
     * * wrong conjugation rule
     * * wrong number rule
     *
     * @param  string $word
     * @param  char   $conjugation
     * @param  char   $number
     * @return mixed
     */
    protected static function validate($word, $conjugation, $number)
    {
        if (! isset(self::DICTIONARY[$word])) {
            throw new Exception('Word ' . $word . ' is not present in dictionary');
        }

        if (! isset(self::DICTIONARY[$word][$conjugation])) {
            throw new Exception('Wrong conjugation rule ' . $conjugation);
        }

        if (! isset(self::DICTIONARY[$word][$conjugation][$number])) {
            throw new Exception('Wrong number rule ' . $number);
        }
    }

    /**
     * uc_first function for utf-8 strings
     * @param  string $string
     * @param  string $encoding
     * @return string
     */
    protected static function mbUcfirst($string, $encoding = 'UTF-8')
    {
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    /**
     * Returns word in lower case and sungularized
     *
     * @param  string $word
     * @return string
     */
    protected static function normalize($word)
    {
        return strtolower(str_singular($word));
    }
}
