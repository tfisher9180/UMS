***Project still in development***

# User Management System

A full featured UMS (User Management System) built with CodeIgniter (PHP) 
and Ion Auth (a user authentication library for CodeIgniter). Features
include login, registration, password resets, and both client and server
side validation.

## Getting Started

* Clone this repo and run the SQL files located in the root directory.

* Run `composer install` to install:
	* [jQuery] (https://github.com/jquery/jquery)
	* [Font Awesome] (https://github.com/FortAwesome/Font-Awesome)
	* [Bootstrap] (https://github.com/twbs/bootstrap)

* Make sure to configure your database settings in [application/config/database.php](application/config/database.php). I use the httpd-vhosts.conf file for Apache to set environment variables with `SetEnv`.

```
 $db['default'] = array(
	'hostname' => getenv('DB_HOST'), // your db host
	'username' => getenv('DB_USERNAME'), // your db username
	'password' => getenv('DB_PASSWORD'), // your db password
```

* Also make sure to set the correct `base_url()` path in the [application/config/config.php](application/config/config.php) file.

```
$config['base_url'] = // your root directory path
```

* Lastly, configure your email settings for password resets etc in [application/config/email.php](application/config/email.php). 
	
	You can either change these settings to match yours, or use some other method. If using some other email method, be sure to let Ion Auth know what it should use in [application/config/ion_auth.php](application/config/ion_auth.php):
	
```
$config['use_ci_email] = TRUE;
$config['email_config'] = 'file' // set to 'file' if using email.php settings

$config['site_title'] = // title that will be shown on emails
$config['admin_email'] = // email that will show up in "from" field
```

## From CodeIgniter readme.rst

*PHP version 5.6 or newer is recommended.

*It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

## Built With

* [CodeIgniter] (https://codeigniter.com) - The PHP framework used
* [Ion Auth] (https://github.com/benedmunds/CodeIgniter-Ion-Auth) - User authentication library