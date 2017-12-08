<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography\Password;

use Genial\Cryptography\Option\Password\AlgoList;
use Genial\Cryptography\Hash;

/**
 * PasswordHash.
 */
class PasswordHash
{
    const COST = 11;
    
    const ALGO = \PASSWORD_BCRYPT;
    
    public static function cipher(string $plainTestPassword, $const_algorithm = self::ALGO, $cost = self::COST)
    {
        
    }
    
    public static function verify(string $userInputPassword, string $hash)
    {
        return password_verify($userInputPassword, $hash);
    }
    
}
