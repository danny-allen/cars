# Cars

## Installation

To set up the project run the following. I've not got npm set up properly, so I run it with sudo, but ideally run the following: 
```npm install```

Now run composer, once this has been done, it will automatically run `bower install`.

```composer install```


## Spec
* PHP 5.6
* MySQL
* Phalcon
* Zurb Foundation
* PHP Unit
*




## Journey

I've not used Phalcon before, so what better place to start than the documentation. Most of what is in the first basic tutorial can be used for this assigment, then from there, I will be able to extend to the specific needs of the task.

It's important to understand the application structure of how Phalcon and Foundation might be set up together. In order to include components like Foundation with bower, I'll need to use wiredep to inject the application dependencies. For this I use Gulp as a task runner, which is included via npm.

## Routes



## Issues

### Installing Phalcon

I had some issues when installing the Phalcon framework. I looked for the PHP extension, and it was nowhere to be found! The fix was to use the full directory for the extension and then restart the web server. Looking at the phpinfo, I can now see information on the Phalcon extension.

Silly typo when adding phalcon-tools to Path in bash_profile.



### Development Environment

I've attempted to work in the environment advised, but hit some complications when running node commands. I recieved errors, that proved to be stubborn. Given the time restraints I will focus on solving this problem after this assignment. For now, I will work on my local machine where npm is running smoothly.


### Zurb Foundation

There is a known bug regarding jQuery version 3. Foundation uses the `load()` function of jQuery - this has now been removed as of version 3. I needed to revert jQuery to the latest of version 2 to clear the error from the console.


## Front end considerations

Page Speed
Browser Compatability



## TIME

* Friday
	+ 20:00 - 23:30
* Saturday
	+ 10 - 11:00
	+ 12:00 - 18:00
	+ 20:45 - 2:00