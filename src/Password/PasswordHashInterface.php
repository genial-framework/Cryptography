<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography\Password;

/**
 * PasswordHashInterface.
 */
interface PasswordHashInterface
{
  
    public function cipher(string $plaintext);
    public function verify(string $plaintext, string $hash);
  
}
