<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography\Password;

use Genial\Cryptography\Exception\InvalidArgumentException;
use Genial\Cryptography\Option\Password\AlgoList;
use Genial\Cryptography\Hash;

/**
 * PasswordHash.
 */
class PasswordHash
{
    const ALGO = PASSWORD_BCRYPT;
 
    const COST = 11;
 
    const TIME_COST = PASSWORD_ARGON2_DEFAULT_TIME_COST;
 
    const MEMORY_COST = PASSWORD_ARGON2_DEFAULT_MEMORY_COST;
 
    const THREADS = PASSWORD_ARGON2_DEFAULT_THREADS;
    
    public static function cipher(string $plainTextPassword, $const_algorithm = self::ALGO, $cost = self::COST, $memory_cost = self::MEMORY_COST, $threads = self::THREADS)
    {
        if (!is_int($cost))
        {
            throw new InvalidArgumentException(sprintf(
                '"%s" - "$cost" is not an integer.',
                __METHOD__
            ));
        }
        if (!is_int($memory_cost))
        {
            throw new InvalidArgumentException(sprintf(
                '"%s" - "$memory_cost" is not an integer.',
                __METHOD__
            ));
        }
        if (!is_int($threads))
        {
            throw new InvalidArgumentException(sprintf(
                '"%s" - "$threads" is not an integer.',
                __METHOD__
            ));
        }
        if (defined('PASSWORD_ARGON2I') && $const_algorithm == PASSWORD_ARGON2I)
        {
            $options = [
            ];
            if ($memory_cost != MEMORY_COST)
            {
                $options += [
                    'memory_cost' => $memory_cost;
                ];
            }
            if ($cost != TIME_COST)
            {
                $options += [
                    'time_cost' => $cost;
                ];
            }
            if ($threads != THREADS)
            {
                $options += [
                    'threads' => $cost;
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
        elseif ($const_algorithm = PASSWORD_BCRYPT)
        {
            $options = [
            ];
            if ($cost != COST)
            {
                $options += [
                    'cost' => $cost;
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
    
    public static function verify(string $userInputPassword, string $hash)
    {
        return password_verify($userInputPassword, $hash);
    }
    
}
