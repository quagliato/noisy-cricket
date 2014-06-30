# noisy-cricket

A simple PHP framework.

**DEVELOPMENT IN PROGRESS**

## Main features
* Persistence
* DAO
* Friendly URLs
* Notifications
* DataBinding
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

### DB
Every column of the table in the DB should have a property using the same name
inside the VO class. The VO class should have a constant with the tablename,
a array "type" which has the datatype for every property of the VO
($type['property\_name'] = 'type'; use 'int', 'str' or 'date'). Some other 
methods should be implemented. Use VO Usuario as example.

### DataBinding
For databinding, set attribute "name" of the inputs using the pattern
"VOName-property". The JS function bindData() will bind all form's inputs (which
it should get as a parameter) and return it as an array.
On server-side, use the method bind(str $classname, $\_POST) from the class
DataBinding which creates a new VO and binds the values on it.

### Examples
Use VO "Usuario" and user subscription as an example.

## Notes
* Created for Apache HTTP Server 2
* PHP >= 5.3
* Tested only in MySQL, but it can work with other SQL DBs
* No classloader YET

### To Implement
* Authenticated email sending
* Dynamic view/form rendering
* Basic color customizing
* Server-side validation
* Reflection on persistence

Want to discuss about it? eduardo@quagliato.me
