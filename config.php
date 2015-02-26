<?php
  // Setup some reasonable defaults
  $vsm_virtdirbase = '/var/virtual/';
//  $vsm_virtdir = $vsm_virtdirbase . ('home' or 'mail') . $domain . $user
  $vsm_defaultdomain = 'visionsystems.tv';
  $vsm_dbtype = 'mysql';
  $vsm_dbserver = 'kosh.visionsystems.tv';
  $vsm_dbname = 'mailauth';
  $vsm_dbuser = 'mail_system';
  $vsm_dbpass = 'vsllc_mail';
  $vsm_usertable = 'users';
  $vsm_virtualtable = 'virtual';
  $vsm_transporttable = 'transport';
  $vsm_utlogin = 'username';
  $vsm_utpass = 'password';
  $vsm_utuid = 'uid';
  $vsm_utgid = 'gid';
  $vsm_uthomedir = 'home';
  $vsm_uthquota = 'homequota';
  $vsm_utname = 'name';
  $vsm_utmaildir = 'maildir';
  $vsm_utmquota = 'mailquota';
  $vsm_utsecretq = 's_question';
  $vsm_utsecreta = 's_answer';
  $vsm_lowestpossibleuid = 10000;
  $vsm_highestpossibleuid = 65533;
  $vsm_domaintable = 'transport';
  $vsm_aliastable = 'alias';
  $vsm_utcreated = '';	// Default:  'timestamp'
?>
