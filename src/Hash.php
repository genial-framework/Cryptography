<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography;

use Genial\Cryptography\Exception\UnexpectedValueException;
use Genial\Cryptography\Option\AlgoList;

/**
 * Hash.
 */
class Hash
{
    const RAW_OUTPUT = false;
    
    protected static $lastAlgorithmSupported = null;
    
    public static function cipher(string $hashAlgorithm, string $data, $rawOutput = static::RAW_OUTPUT)
    {
        if (self::isSupportedAlgo($hashAlgorithm))
        {
            self::$lastAlgorithmSupported($hashAlgorithm);
            return hash($hashAlgorithm, $data, $rawOutput);
        }
        else
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$hashAlgorithm" is not supported.',
                __METHOD__
            ));
        }
    }
    
    public static function getOutputSize(string $algorithm, string $hash, $rawOutput = self::RAW_OUTPUT)
    {
        if (self::isSupportedAlgo($algorithm))
        {
            self::$lastAlgorithmSupported($algorithm);
            return mb_strlen(self::cipher($algorithm, 'data', $output), '8bit');
        }
    }
    
    public static function isSupportedAlgo(string $algorithm)
    {
        if ($algorithm === static::$lastAlgorithmSupported)
        {
            return true;
        }
        if (in_array($algorithm, AlgoList::HashAlgos(), true))
        {
            static::$lastAlgorithmSupported($algorithm);
            return true;
        }
        return false;
    }
    
    public static function clearLastAlgorithmCache()
    {
        static::$lastAlgorithmSupported = null;
    }
 
    public static function getLastSupportedAlgorithm()
    {
        return static::$lastAlgorithmSupported;
    }
    
}
