<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography\Password;

use Genial\Cryptography\Exception\UnexpectedValueException;
use Genial\Cryptography\Exception\InvalidArgumentException;
use Genial\Cryptography\Exception\RangeException;

/**
 * PasswordHash.
 */
class PasswordHash
{
    const ALGO = PASSWORD_BCRYPT;
 
    const COST = 11;
 
    public static function cipher(string $plainTextPassword, $const_algorithm = self::ALGO, $cost = self::COST)
    {
        if (empty($plainTextPassword) || $plainTextPassword == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$plainTextPassword" is empty.',
                __METHOD__
            ));
        }
        if (!is_int($cost))
        {
            throw new InvalidArgumentException(sprintf(
                '"%s" - "$cost" is not an integer.',
                __METHOD__
            ));
        }
        if ($cost < 1)
        {
            throw new RangeException(sprintf(
                '"%s" - "$cost" is below 1.',
                __METHOD__
            ));
        }
        if ($const_algorithm = PASSWORD_BCRYPT)
        {
            $options = [
            ];
            if ($cost != self::COST)
            {
                $options += [
                    'cost' => $cost
                ];
            }
            if (!empty($options))
            {
                return password_hash($plainTextPassword, $const_algorithm, $options);
            }
            else
            {
                return password_hash($plainTextPassword, $const_algorithm);
            }
        }
        elseif ($const_algorithm = PASSWORD_DEFAULT)
        {
            return password_hash($plainTextPassword, $const_algorithm);
        }
        else
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$const_algorithm" is not a valid password hash algorithm.',
                __METHOD__
            ));
        }
    }
 
    public static function rehash(string $hash)
    {
        if (empty($hash) || $hash == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$hash" is empty.',
                __METHOD__
            ));
        }
        $hashInfo = self::getInfo($hash);
        $algo = $hashInfo['algo'];
        $options = $hashInfo['options'];
        password_needs_rehash($hash, $algo, $options);
    }
    
    public static function getInfo(string $hash)
    {
        if (empty($hash) || $hash == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$hash" is empty.',
                __METHOD__
            ));
        }
        return password_get_info($hash);
    }
    
    public static function verify(string $userInputPassword, string $hash)
    {
        $userInputPassword = trim($userInputPassword);
        $hash = trim($hash);
        if (empty($userInputPassword) || $userInputPassword == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$userInputPassword" is empty.',
                __METHOD__
            ));
        }
        if (empty($hash) || $hash == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$hash" is empty.',
                __METHOD__
            ));
        }
        return password_verify($userInputPassword, $hash);
    }
 
}
