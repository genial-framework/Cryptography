<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Crypt;

/**
 * AbstractRand.
 */
abstract class AbstractRand
{
 
    /**
     * randomInt().
     *
     * Generates cryptographically secure pseudo-random integers.
     *
     * @param int $min The lowest value to be returned, which must be PHP_INT_MIN or higher.
     * @param int $max The highest value to be returned, which must be less than or equal to PHP_INT_MAX.
     *
     * @return int Returns a cryptographically secure random integer in the range min to max, inclusive.
     */
    public static function randomInt($min, $max)
    {
        return (int) \random_int((int) $min, (int) $max); 
    }
  
    /**
     * randomBytes().
     *
     * Generates cryptographically secure pseudo-random bytes.
     *
     * @param int $length The length of the random string that should be returned in bytes.
     *
     * @return string Returns a string containing the requested number of cryptographically secure random bytes.
     */
    public static function randomBytes($length)
    {
        return (string) \random_bytes((int) $length);
    }
  
}
