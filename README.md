# docker-php-env
I had some issues setting up WAMP on a new computer, so decided to put my newly found knowledge of Docker to the test. I made my own WAMP server, running Apache, PHP, MySQL, and PHPmyAdmin - and now you can too, if you want to that is.

# Installing
I'm going to assume you already have docker-compose installed and working on your machine.
1. Download the files and put them in your new project folder, let's call it `/my-super-project`
1. If you don't have any other docker containers, you are good to run `docker-compose up` and open up [localhost:8001](http://localhost:8001)

Note that running it out of the box will make a test database (`testschema`) in order to verify the connection to MySQL.

## Installing multiple instances
So what if you already have ports `8001`, `8002`, and `8003` already assigned?
1. Open up the `/my-super-project/docker-compose.yml` file
1. Line 13 is the port for MySQL - `8002` - replace it if needed
1. Line 23 is the port for the website itself - `8001` - replace it if needed
1. Line 32 is the port for PHPmyAdmin - `8003` - replace it if needed

## The code folder
What if you want a more descriptive name than `code` as the folder with your code in?
1. Open up the `/my-super-project/docker-compose.yml` file
1. Line 20 is the volumne `./code:/var/www/html/` - change the `code` bit to a more appropriate name, just leave the bit after the colon - like `./my-super-project:/var/www/html/`
1. Open up the `/my-super-project/Dockerfile` file
1. Line 6 you'll need to change `code` to match your new folder - like `COPY my-suprt-project/ /var/www/html`

## Accessing PHPmyAdmin
If you want to login to PHPmyAdmin, just go to [localhost:8003](http://localhost:8003) using the login credentials in the Stats/MySQL section below.

# Stats
## MySQL
Version 8.0

Login with username `root` and no password. #4 will look at how a password can be used if needed.

## PHP
Version 7.4

Includes mysqli for Database connections

Allows file uploads up to 10MB, as defined in `/my-super-project/uploads.ini`

## Apache
Includes the mod_rewrite module
