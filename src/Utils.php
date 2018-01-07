<?php
/**
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Components>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License.
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
    public static function hashEquals(string $knownString, string $userString): bool
    {
        return (bool) \sodium_compare($knownString, $userString);
    }
    
    /**
     * hashAlgos().
     *
     * Return a list of registered hashing algorithms.
     *
     * @return array Returns a numerically indexed array containing the list of supported hashing algorithms.
     */
    public static function hashAlgos(): array
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
    public static function hashHmacAlgos(): array
    {
        return (array) \hash_hmac_algos();
    }
    
}
