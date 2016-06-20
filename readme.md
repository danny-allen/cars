# Cars

---

## Contents

* Spec
* Overview
* Installation
* Notes
* Journey
* Issues
* Time
* Going forward

---


## Spec

* PHP 5.6
* MySQL
* Phalcon
* Zurb Foundation
* Composer
* NPM
* Gulp
* SASS

---

## Overview

Just taking the requirements into account, this task is fairly simple. The complexity lies in the Frameworks and Librarys i've not used before.

I’ve probably tried to take on too many new things for this project. My usual approach would be SlimPHP, Custom SASS Framework scaffolded out with Yeoman, including bower and npm. I already have this setup ready to work with and would have allowed me to get to the requirements quicker. That said, I’ve tried to learn Vagrant, Phalcon, Foundation and PHPUnit. Much of the time has been spent setting up and familiarising myself with the FED and BED frameworks.

Since, learning Phalcon and Foundation seemed like a big enough task, I’ve decided to come back to using PHPUnit, should I have the time. I understand TTD and how it really should be done first. However, given the learning curve and time restraints, I feel it necessary to put this to one side for the time being.

Please visit cars.noise-maker.co.uk for the deployed version of this work.

---


## Installation

Clone the repository with the following:

```mkdir cars && git clone https://github.com/danny-allen/cars.git .```

Run npm:

```sh
sudo npm install
```

Now run composer, once this has been done, it will automatically run `bower install`:

```sh
composer install
```

Make a config file in the directory `cars/app/config/config.php` that looks like:

```php
	<?php

	defined('APP_PATH') || define('APP_PATH', realpath('.'));

	return new \Phalcon\Config(array(
	    'database' => array(
	        'adapter'     => 'Mysql',
	        'host'        => 'yourhost',
	        'username'    => 'yourusername',
	        'password'    => 'yourpassword',
	        'dbname'      => 'cars',
	        'charset'     => 'utf8',
	    ),
	    'application' => array(
	        'controllersDir' => APP_PATH . '/app/controllers/',
	        'modelsDir'      => APP_PATH . '/app/models/',
	        'migrationsDir'  => APP_PATH . '/app/migrations/',
	        'viewsDir'       => APP_PATH . '/app/views/',
	        'pluginsDir'     => APP_PATH . '/app/plugins/',
	        'libraryDir'     => APP_PATH . '/app/library/',
	        'cacheDir'       => APP_PATH . '/app/cache/',
	        'baseUri'        => '/',
	    )
	));
	?>
```

Lastly you will need to run the following to create the stylesheet:

```gulp watch```

Usually there would be a build task that would compile, compress and minify all the assets, but I've not got that far with the project structure for this setup.


---


## Notes

* No results message not developed.
* Not dealt with pagination
* Sub pages don’t have an active state yet.
* There is a bug in the nav when altering the screen size between mobile and desktop. A refresh solves this temporarily.
* Forum not implemented.
* Login/register started as attempt to learn Phalcon - not complete/tested.
* Blog create/edit/delete started as attempt to learn Phalcon - not complete/tested.



---


## Journey

A big part of time at the beginning of this assignment was building in npm/bower package managers with wiredep dependencies. I had to ensure I could get SASS compiling and injecting modules in order to allow me to build with a block element modifier approach.

It's important to understand the application structure of how Phalcon and Foundation might be set up together. In order to include components like Foundation with bower, I used wiredep, injecting the application dependencies. For this I use Gulp as a task runner, which is included via npm. *** note: foundation was later replaced by the CDN version because of SASS issues.

I've not used Phalcon before, so I decided to start by looking at the documentation. I followed some tutorials in order to get the blog section up and running. This would be quite a common usage, so the resources were easy to find. From here I was able to learn from what I’d done and dive into the cars(products) section, which would have many similarities.

I've organised the Models and Controllers so that they extend an Abstract Layer that implements an interface. The abstract classes extend the core and contain common methods.


---


## Issues

### Installing Phalcon

I had some issues when installing the Phalcon framework. I looked for the PHP extension, and it was nowhere to be found! The fix was to use the full directory for the extension and then restart the web server. After doing this, looking at the phpinfo, I see information on the Phalcon extension.


### Vagrant/VirtualBox

I've attempted to work in the Phalcon vagrant environment. I hit some complications when running npm commands. The errors proved to be stubborn. Given the time restraints I decided to focus on solving this problem after this assignment. For now, I will work on my local machine where npm is running smoothly.


### Zurb Foundation

There is a known bug regarding jQuery version 3. Foundation uses the `load()` function of jQuery - this has now been removed as of version 3. I needed to revert jQuery to the latest of version 2 to clear the error from the console. Not too time consuming, but enough to make a note.

I hit an issue with the bower version of Founsation whilst trying to compile SASS. It would completely wipe out the CSS file leaving no styles. Eventually I had to turn to the CDN version, which unfortunatly limited the SASS capabilities of the project (using Foundation).

The style of CSS I try to work with is BEM. There were conflicting CSS declarations, which forced me to overwrite them in an undesireable way.


---


## Time

* Friday
	+ 20:00 - 23:30
* Saturday
	+ 10 - 11:00
	+ 12:00 - 18:00
	+ 20:45 - 2:00(am)
* Sunday
	+ 9:30 - 13:00
	+ 13:30 - 20:45
	+ 21:30 - 3:00(am)

TOTAL: Hours 29.30

I hope that my hours and potential to become more skilled in these frameworks is recognised. I’ve been very open about the time spent on this assignment, and I’m more than willing to put this same effort into bringing my skills in line with the rest of the team.


## Going forward

My next phalcon project, will see me paying more attention to checking of data types and ranges. Primarily, what goes into a method and what comes out. This is where PHPUnit comes in useful.

One thing, that would improve on the next project working with these development tools is my workflow. Getting to grips with the frameworks allows me to see the bigger picture before starting. 


