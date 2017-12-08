<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography\Password;

use Genial\Cryptography\Exception\InvalidArgumentException;

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
 
    public static function passwordNeedsRehash(string $hash, $algo = self::ALGO, array $options = [])
    {
        if (isset($options['salt'])) {
            throw new DomainException(sprintf(
                '"%s" - The salt option in password_hash() is depercated and is not allowed.',
                __METHOD__
            ));
        }
        password_needs_rehash($hash, $algo, $options);
    }
    
    public static function verify(string $userInputPassword, string $hash)
    {
        $userInputPassword = trim($userInputPassword);
        $hash = trim($hash);
        if (empty($userInputPassword) || $userInputPassword == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$userInputPassword" is empty.'
                __METHOD__
            ));
        }
        if (empty($hash) || $hash == '')
        {
            throw new UnexpectedValueException(sprintf(
                '"%s" - "$hash" is empty.'
                __METHOD__
            ));
        }
        return password_verify($userInputPassword, $hash);
    }
    
}
