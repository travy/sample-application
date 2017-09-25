#  Setup instructions

##  Composer
Run composer install

##  Connect database
1  To install the app open the config/app.php file and search for Datasources.

2  Under the 'default' datasource specify the database configutions such as host name,
username and password.

##  Database Setup (if needed)
1  Next the database can be setup by using the CakePHP migrations assistent
2  Open a terminal and cd into the project directory.
3  Type bin/cake migrations migrate
4  The database should have been installed

##  Dev Server
1  Start a development server by typing the following into a console while in the project directory:  bin/cake server

You should be able to open a webbrowser to the web address listed in the console
to use the app
