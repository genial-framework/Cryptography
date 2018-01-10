<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cryptography;

/**
 * Utils.
 */
class Utils extends AbstractRand
{
    
    /**
     * hashEquals().
     *
     * Timing attack safe string comparison.
     *
     * @param string $knownString The string of known length to compare against.
     * @param string $userString  The user-supplied string.
     *
     * @return bool Returns TRUE when the two strings are equal, FALSE otherwise.
     */
    public static function hashEquals(string $knownString, string $userString)
    {
        return (bool) \hash_equals($knownString, $userString);
    }
    
    /**
     * hashAlgos().
     *
     * Return a list of registered hashing algorithms.
     *
     * @return array Returns a numerically indexed array containing the list of supported hashing algorithms.
     */
    public static function hashAlgos()
    {
        return (array) \hash_algos();
    }
    
    /**
     * hashHmacAlgos().
     *
     * Return a list of registered hashing algorithms suitable for hash_hmac.
     *
     * @return array Returns a numerically indexed array containing the list of supported hashing algorithms suitable for hash_hmac().
     */
    public static function hashHmacAlgos()
    {
        if (function_exists('hash_hmac_algos'))
        {
            return (array) \hash_hmac_algos();
        }
        return self::hashAlgos();
    }
    
}
