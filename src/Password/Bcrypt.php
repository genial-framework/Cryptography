<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Crypt\Password;

use \Genial\Crypt\Utils;
use \Genial\Crypt\Exception\LengthException;

/**
 * Bcrypt.
 */
class Bcrypt extends AbstractPasswordHash implements PasswordHashInterface
{
    
    /**
     * @var int $cost|10 The cost `Bcrypt` should use during execution.
     */
    private $cost = 10;
  
    /**
     * __construct().
     *
     * Set the avaliable options for `Bcrypt` hashing.
     *
     * @param int $cost The cost `Bcrypt` should use during execution.
     *
     * @throws RangeException If the cost is too low.
     *
     * @return void.
     */
    public function __construct($cost)
    {
        if ($cost < 2)
        {
            throw new LengthException(\sprintf(
                '`%s` The cost passed is too low. Passed: `%s`.',
                __METHOD__,
                \htmlspecialchars((int) $cost, \ENT_QUOTES, 'UTF-8')
            ));
        }
        $this->cost = (int) $cost;
    }
 
    /**
     * cipher().
     *
     * Hash the plaintext using `Bcrypt`.
     *
     * @param string $plaintext The plaintext to hash during execution.
     *
     * @throws LengthException if the password is longer than 72 characters.
     *
     * @return string Returns the plaintext hashed using `Bcrypt`.
     */
    public function cipher($plaintext)
    {
        if (\mb_strlen((string) $plaintext) > 72)
        {
            throw new LengthException(\sprintf(
                '`%s` The password is longer than 72 characters. Password length: `%s`.',
                __METHOD__,
                \htmlspecialchars(\mb_strlen((string) $plaintext), \ENT_QUOTES, 'UTF-8')
            ));
        }
        return (string) \password_hash((string) $plaintext, \PASSWORD_BCRYPT,
        [
            'cost' => $this->cost,
        ]);
    }
    
    /**
     * verify().
     *
     * @param string $plaintext The plaintext to verify against hash and rehash if needed.
     * @param string $hash      The hash the plaintext should mtch up to.
     *
     * @throws LengthException if the password is longer than 72 characters.
     *
     * @return array Returns an array which contains either one or two keys, one is to tell you if the password is correct
     *               and the other one is a new hash that the old one should be replaced with.
     */
    public function verify($plaintext, $hash)
    {
        if (\mb_strlen((string) $plaintext) > 72)
        {
            throw new LengthException(\sprintf(
                '`%s` The password is longer than 72 characters. Password length: `%s`.',
                __METHOD__,
                \htmlspecialchars(\mb_strlen((string) $plaintext), \ENT_QUOTES, 'UTF-8')
            ));
        }
        if (\password_verify((string) $plaintext, (string) $hash))
        {
            $temp = (string) $hash;
            if (\password_needs_rehash((string) $hash, \PASSWORD_BCRYPT,
            [
                'cost' => $this->cost,
            ])) {
                $hash = $this->cipher((string) $plaintext);
            }
            if (!Utils::hashEquals((string) $temp, (string) $hash))
            {
                return (array) [
                    'password_verified' => (bool) \true,
                    'new_hash' => (string) $hash
                ];
            }
            return (array) [
                'password_verified' => (bool) \true
            ];
        }
        return (array) [
            'password_verified' => (bool) \false
        ];
    }
    
}
