<?php
/**
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Components>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography;

/**
 * Hash.
 */
class Hash
{
 
    /**
     * @const bool|false RAW_OUTPUT.
     */
    const RAW_OUTPUT = \false;
    
    /**
     * @var string|null $cachedAlgo The last supported algorithm used.
     */
    protected static $cachedAlgo = \null;
 
    /**
     * cipher().
     *
     * Generate a hash value (message digest).
     *
     * @param string $hashAlgo      Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..).
     * @param string $data          Message to be hashed.
     * @param bool|false $rawOutput When set to TRUE, outputs raw binary data. FALSE outputs lowercase hexits.
     *
     * @throws UnexpectedValueException If the algorithm is not supported.
     *
     * @return string Returns a string containing the calculated message digest as lowercase hexits unless raw_output is set to true in
     *                which case the raw binary representation of the message digest is returned.
     */
    public static function cipher(string $hashAlgo, string $data, $rawOutput = self::RAW_OUTPUT): string
    {
        if (self::supportedAlgo($hashAlgo))
        {
            self::$cachedAlgo = $hashAlgo;
            return (string) \hash($hashAlgo, $data, \boolval($rawOutput));
        } else
        {
            throw new Exception\UnexpectedValueException(sprintf(
                '`%s` `%s` is not supported.',
                __METHOD__,
                \htmlspecialchars($hashAlgo, \ENT_QUOTES)
            ));
        }
    }
    
    /**
     * getOutputSize().
     *
     * Get the hexits or raw output binary size of the given hash.
     *
     * @param string $data The hash to test.
     *
     * @return bool Returns the output size of the hash.
     */
    public static function getOutputSize(string $hash): int
    {
        return \mb_strlen($hash, '8bit');
    }
    
    /**
     * supportedAlgo().
     *
     * Check to see if the given algorithm is supported.
     *
     * @param string $algo Name of selected hashing algorithm (e.g. "md5", "sha256", "haval160,4", etc..).
     *
     * @return bool Returns TRUE if the algorithm is supported otherwise return FALSE.
     */
    public static function supportedAlgo(string $algo): bool
    {
        if ($algo === self::$cachedAlgo)
        {
            return \true;
        }
        if (\in_array($algo, Utils::hashAlgos(), \true))
        {
            self::$cachedAlgo = $algo;
            return \true;
        }
        return \false;
    }
    
    /**
     * clearCachedAlgo().
     *
     * Clear the supported algorithm cache.
     *
     * @return void.
     */
    public static function clearCachedAlgo()
    {
        self::$cachedAlgo = \null;
    }
 
    /**
     * getCacheAlgo().
     *
     * Get the supported algorithm based on cache.
     *
     * @return string Returns the last algorithm used that is supported.
     */
    public static function getCacheAlgo()
    {
        return self::$cachedAlgo;
    }
    
}
