<?php

//---------------------------------------//
//    PREVENTS ERRORS DURING RUNTIME     //
//---------------------------------------//

defined('PASSWORD_ARGON2I', 2) || define('PASSWORD_ARGON2I', 2);

defined('PASSWORD_ARGON2_DEFAULT_TIME_COST') || define('PASSWORD_ARGON2_DEFAULT_TIME_COST', 2);
defined('PASSWORD_ARGON2_DEFAULT_MEMORY_COST') || define('PASSWORD_ARGON2_DEFAULT_MEMORY_COST', 2);
defined('PASSWORD_ARGON2_DEFAULT_THREADS') || define('PASSWORD_ARGON2_DEFAULT_THREADS', 2);
