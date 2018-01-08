<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography\Password;

use \Genial\Cryptography\
{
    Utils
    Exception\RangeException
};

/**
 * Bcrypt.
 */
class Bcrypt extends AbstractPasswordHash implements PasswordHashInterface, BcryptInterface
{
    
    /**
     * @var int $cost The cost `Bcrypt` should use during execution.
     */
    private $cost = 10;
  
    /**
     * __construct().
     *
     * Set the avaliable options for `Bcrypt` hashing.
     *
     * The salt option has been deprecated as of PHP 7.0.0.
     *
     * @param int $cost The cost `Bcrypt` should use during execution.
     *
     * @return void.
     */
    function __construct(int $cost): void
    {
        if ($cost < 2)
        {
            throw new RangeException(\sprintf(
                '`%s` The cost passed is too low. Passed: `%s`.',
                \__METHOD__,
                \htmlspecialchars($cost, \ENT_QUOTES, 'UTF-8');
            ));
        }
        $this->cost = $cost;
    }
    
    /**
     * hash().
     *
     * Hash the plaintext using `Bcrypt`.
     *
     * @param string $plaintext The plaintext to hash during execution.
     *
     * @return string Returns the plaintext hashed using `Bcrypt`.
     */
    public function hash(string $plaintext): string
    {
        return (string) \password_hash($plaintext, \PASSWORD_BCRYPT,
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
     * @return array Returns an array wich contains either one or two keys, one is to tell you if the password is correct
     *               and the other one is a new hash that the old one should be replaced with.
     */
    public function verify(string $plaintext, string $hash): array
    {
        if (\password_verify($plaintext, $hash))
        {
            $temp = $hash;
            if (\password_needs_rehash($hash, \PASSWORD_BCRYPT,
            [
                'cost' => $this->cost,
            ])) {
                $hash = $this->hash($plaintext);
            }
            if (!Utils::hashEquals($temp, $hash))
            {
                return (array) [
                    'password_verified' => \true,
                    'new_hash' => $hash
                ];
            }
            return (array) [
                'password_verified' => \true
            ];
        }
        return (array) [
            'password_verified' => \false
        ];
    }
    
    /**
     * getHashInfo().
     *
     * @param string $hash The hash that will be tested.
     *
     * @return array Returns an array containing the hashing information used.
     *               It will not return the actual plaintext.
     */
    public function getHashInfo(string $hash): array
    {
        return (array) \password_get_info($hash)
    }
    
}
