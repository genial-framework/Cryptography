<?php
/**
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Components>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cryptography;

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
    public static function randomInt(int $min, int $max): int
    {
        return (int) \random_int($min, $max); 
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
    public static function randomBytes(int $length): string
    {
        return (string) \random_bytes($length);
    }
  
  
}
