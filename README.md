# noisy-cricket

A simple PHP framework.

**DEVELOPMENT IN PROGRESS**

## Main features
* Persistence
* DAO
* Friendly URLs
* Notifications
* User management and subscription
* File management

### Set Up
Clone the source and set up the config.php file and the .htaccess file, both of 
then located on the root dir. You'll need a DB with user and password.
DO NOT forget to set up the constant ADMIN\_EMAIL. The first user to subscribe
using the same e-mail as setted on the config file, will the root user.

### Customize
Add your customized forms, actions, VOs and DAOs inside "custom" directory.
DO NOT forget to add them to you "custom\_app.php" file. It will make them get
loaded by the engine. (forms and actions don't need to be included here.)
Set up your URLs by adding array entries on $custom\_urlpatterns inside 
"custom\_urls.php" file. The key of the entry is the friendly-url and the value
is the file that it should request.

## Notes
* Created for Apache HTTP Server 2
* PHP 5.3 or higher
* It can work with other DB engines, but I've only tested with MySQL
* No classloader YET

Want to discuss about it? eduardo@quagliato.me
