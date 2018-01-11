<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Crypt\Password;

use \Genial\Crypt\Utils;
use \Genial\Crypt\Exception\RuntimeException;
use \Genial\Crypt\Exception\LengthException;

/**
 * Argon2i.
 */
class Argon2i extends AbstractPasswordHash implements PasswordHashInterface
{
    
    /**
     * @var int $memoryCost|PASSWORD_ARGON2_DEFAULT_MEMORY_COST The memory cost `Argon2i` should use during execution.
     */
    private $memoryCost = \PASSWORD_ARGON2_DEFAULT_MEMORY_COST;
  
    /**
     * @var int $timeCost|PASSWORD_ARGON2_DEFAULT_TIME_COST The time cost `Argon2i` should use during execution.
     */
    private $timeCost = \PASSWORD_ARGON2_DEFAULT_TIME_COST;
  
    /**
     * @var int $threads|PASSWORD_ARGON2_DEFAULT_THREADS The amount of threads `Argon2i` should use during execution.
     */
    private $threads = \PASSWORD_ARGON2_DEFAULT_THREADS;
  
    /**
     * __construct().
     *
     * Set the avaliable options for `Argon2i` hashing.
     *
     * @param int $memoryCost|PASSWORD_ARGON2_DEFAULT_MEMORY_COST The memory cost `Argon2i` should use during execution.
     * @param int $timeCost|PASSWORD_ARGON2_DEFAULT_TIME_COST The time cost `Argon2i` should use during execution.
     * @param int $threads|PASSWORD_ARGON2_DEFAULT_THREADS The amount of threads `Argon2i` should use during execution.
     *
     * @throws RangeException If the avaliable options are too low for password hashing.
     *
     * @return void.
     */
    public function __construct(
        $memoryCost = \PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
        $timeCost = \PASSWORD_ARGON2_DEFAULT_TIME_COST,
        $threads = \PASSWORD_ARGON2_DEFAULT_THREADS)
    {
        if (!defined('PASSWORD_ARGON2I'))
        {
            throw new RuntimeException(\sprintf(
                '`%s` Argon2i is not loaded.',
                __METHOD__
            ));
        }
        if ((int) $memoryCost < 0 || (int) $timeCost < 0 || (int) $threads < 0)
        {
            throw new LengthException(\sprintf(
                '`%s` The avaliable options are too low for password hashing. Passed: memory_cost=`%s`, time_cost=`%s`, threads=`%s`.',
                __METHOD__,
                \htmlspecialchars((int) $memoryCost, \ENT_QUOTES, 'UTF-8'),
                \htmlspecialchars((int) $timeCost, \ENT_QUOTES, 'UTF-8'),
                \htmlspecialchars((int) $threads, \ENT_QUOTES, 'UTF-8')
            ));
        }
        $this->memoryCost = (int) $memoryCost;
        $this->timeCost = (int) $timeCost;
        $this->threads = (int) $threads;
    }
 
    /**
     * cipher().
     *
     * Hash the plaintext using `Argon2i`.
     *
     * @param string $plaintext The plaintext to hash during execution.
     *
     * @return string Returns the plaintext hashed using `Argon2i`.
     */
    public function cipher($plaintext)
    {
        return (string) \password_hash($plaintext, \PASSWORD_ARGON2I,
        [
            'memory_cost' => (int) $this->memoryCost,
            'time_cost' => (int) $this->timeCost,
            'threads' => (int) $this->threads
        ]);
    }
     
    /**
     * verify().
     *
     * @param string $plaintext The plaintext to verify against hash and rehash if needed.
     * @param string $hash      The hash the plaintext should match up to.
     *
     * @return array Returns an array which contains either one or two keys, one is to tell you if the password is correct
     *               and the other one is a new hash that the old one should be replaced with.
     */
    public function verify($plaintext, $hash)
    {
        if (\password_verify((string) $plaintext, (string) $hash))
        {
            $temp = (string) $hash;
            if (\password_needs_rehash((string) $hash, \PASSWORD_ARGON2I,
            [
                'memory_cost' => (int) $this->memoryCost,
                'time_cost' => (int) $this->timeCost,
                'threads' => (int) $this->threads
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
