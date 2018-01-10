<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography\Password;

/**
 * AbstractPasswordHash.
 */
abstract class AbstractPasswordHash
{
 
    /**
     * getHashInfo().
     *
     * Get the hashing information used.
     *
     * @param string $hash The hash that will be tested.
     *
     * @return array Returns an array containing the hashing information used.
     *               It will not return the actual plaintext.
     */
    public function getHashInfo(string $hash)
    {
        return (array) \password_get_info($hash);
    }
  
}
