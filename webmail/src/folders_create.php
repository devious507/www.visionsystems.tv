<?php

/**
 * folders_create.php
 *
 * Copyright (c) 1999-2006 The SquirrelMail Project Team
 * Licensed under the GNU GPL. For full terms see the file COPYING.
 *
 * Creates folders on the IMAP server.
 * Called from folders.php
 *
 * @version $Id: folders_create.php,v 1.64.2.7 2006/08/24 20:00:09 kink Exp $
 * @package squirrelmail
 */

/**
 * Path for SquirrelMail required files.
 * @ignore
 */
define('SM_PATH','../');

/* SquirrelMail required files. */
require_once(SM_PATH . 'include/validate.php');
require_once(SM_PATH . 'functions/global.php');
require_once(SM_PATH . 'functions/imap.php');
require_once(SM_PATH . 'functions/display_messages.php');

/* get globals we may need */
sqgetGlobalVar('key',          $key,           SQ_COOKIE);
sqgetGlobalVar('username',     $username,      SQ_SESSION);
sqgetGlobalVar('onetimepad',   $onetimepad,    SQ_SESSION);
sqgetGlobalVar('delimiter',    $delimiter,     SQ_SESSION);
sqgetGlobalVar('folder_name',  $folder_name,   SQ_POST);
sqgetGlobalVar('subfolder',    $subfolder,     SQ_POST);
if (! sqgetGlobalVar('contain_subs', $contain_subs,  SQ_POST)) {
    unset($contain_subs);
}
/* end of get globals */

$folder_name = trim($folder_name);

if (substr_count($folder_name, '"') || substr_count($folder_name, "\\") ||
    substr_count($folder_name, $delimiter) || ($folder_name == '')) {
    displayPageHeader($color, 'None');

    plain_error_message(_("Illegal folder name. Please select a different name.").
        '<br /><a href="../src/folders.php">'._("Click here to go back").'</a>.', $color);

    exit;
}

$folder_name = imap_utf7_encode_local($folder_name);

if (isset($contain_subs) && $contain_subs ) {
    $folder_type = 'noselect';
} else {
    $folder_type = '';
}

if ($folder_prefix && (substr($folder_prefix, -1) != $delimiter)) {
    $folder_prefix = $folder_prefix . $delimiter;
}
if ($folder_prefix && (substr($subfolder, 0, strlen($folder_prefix)) != $folder_prefix)){
    $subfolder_orig = $subfolder;
    $subfolder = $folder_prefix . $subfolder;
} else {
    $subfolder_orig = $subfolder;
}

$imapConnection = sqimap_login($username, $key, $imapServerAddress, $imapPort, 0);

if (trim($subfolder_orig) == '') {
    sqimap_mailbox_create ($imapConnection, $folder_prefix.$folder_name, $folder_type);
} else {
    sqimap_mailbox_create ($imapConnection, $subfolder.$delimiter.$folder_name, $folder_type);
}

sqimap_logout($imapConnection);

$location = get_location();
header ("Location: $location/folders.php?success=create");

?>
