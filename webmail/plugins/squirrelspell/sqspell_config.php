<?php
/**
 * sqspell_config.php -- SquirrelSpell Configuration file.
 *
 * Copyright (c) 1999-2006 The SquirrelMail Project Team
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 *
 * @version $Id: sqspell_config.php,v 1.14.2.6 2006/02/03 22:27:52 jervfors Exp $
 * @package plugins
 * @subpackage squirrelspell
 */

require_once(SM_PATH . 'functions/prefs.php');

/* Just for poor wretched souls with E_ALL. :) */
global $data_dir;

sqgetGlobalVar('username', $username, SQ_SESSION);

/**
 * Example:
 *
 * $SQSPELL_APP = array( 'English' => 'ispell -a',
 *                     'Spanish' => 'ispell -d spanish -a' );
 * You can replace ispell with aspell keeping the same commandline:
 * $SQSPELL_APP = array( 'English' => 'aspell -a',
 *                     'Spanish' => 'aspell -d spanish -a' );
 */

# Debian: if dictionaries-common >= 2.50 is available, detect the
# installed dictionaries automatically.
if ( is_readable ( '/var/cache/dictionaries-common/ispell-dicts-list.txt' ) ) {
    $dicts = file( '/var/cache/dictionaries-common/ispell-dicts-list.txt' );
    $SQSPELL_APP = array();
    foreach ($dicts as $dict) {
        preg_match('/(\S+)\s+\((.+)\)/', $dict, $dparts);
        $SQSPELL_APP[$dparts[2]] = 'ispell -d ' . $dparts[1] . ' -a';
    }
} else {
    $SQSPELL_APP = array('English' => 'ispell -a',
                 'Spanish' => 'ispell -d spanish -a');
}

# Debian: if dictionaries-common >= 2.50 is available, detect the
# default dictionary automatically.
if ( is_readable ( '/etc/dictionaries-common/ispell-default' ) ) {
    $dictdefault = file ( '/etc/dictionaries-common/ispell-default' );
    preg_match('/(\w+)\s+\((.+)\)/', $dictdefault[0], $dparts);
    $SQSPELL_APP_DEFAULT = $dparts[2];
} else {
    $SQSPELL_APP_DEFAULT = 'English';
}

$SQSPELL_WORDS_FILE = 
   getHashedFile($username, $data_dir, "$username.words");

$SQSPELL_EREG = 'ereg';

?>