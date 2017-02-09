<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL SENDING SETTINGS
| -------------------------------------------------------------------
*/

$config['protocol'] = 'smtp';  // 'mail', 'sendmail', or 'smtp'
$config['smtp_crypto'] = 'ssl';
$config['wordwrap'] = TRUE;
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user'] = getenv('EMAIL');
$config['smtp_pass'] = getenv('EMAIL_PASS');
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['mailtype'] = 'html';
$config['validation'] = TRUE;

/* End of file email.php */
/* Location: ./application/config/email.php */
?>