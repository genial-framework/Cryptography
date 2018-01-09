<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography\Password;

use \Genial\Cryptography\
{
    Utils,
    Exception\RangeException,
    Exception\LengthException
};

/**
 * Argon2i.
 */
class Argon2i extends AbstractPasswordHash implements PasswordHashInterface
{
    
    /**
     * @var int $cost The memory cost `Argon2i` should use during execution.
     */
    private $memoryCost = \PASSWORD_ARGON2_DEFAULT_MEMORY_COST;
    
    /**
     * @var int $cost The time cost `Argon2i` should use during execution.
     */
    private $timeCost = \PASSWORD_ARGON2_DEFAULT_TIME_COST;
    
    /**
     * @var int $cost The threads `Argon2i` should use during execution.
     */
    private $threads = \PASSWORD_ARGON2_DEFAULT_THREADS;
  
}
