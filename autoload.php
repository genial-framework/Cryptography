<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

//-----------------//
// Prevents Errors //
//-----------------//

if (!defined('PASSWORD_ARGON2I'))
{
    define('PASSWORD_ARGON2_DEFAULT_MEMORY_COST', 1);
    define('PASSWORD_ARGON2_DEFAULT_TIME_COST', 1);
    define('PASSWORD_ARGON2_DEFAULT_THREADS', 1);
}
