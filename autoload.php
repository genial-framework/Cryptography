<?php


//-----------------//
// Prevents Errors //
//-----------------//

if (!defined('PASSWORD_ARGON2I'))
{
    define('PASSWORD_ARGON2_DEFAULT_MEMORY_COST', 1);
    define('PASSWORD_ARGON2_DEFAULT_TIME_COST', 1);
    define('PASSWORD_ARGON2_DEFAULT_THREADS', 1);
}
