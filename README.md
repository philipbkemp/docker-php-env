# docker-php-env
I had some trouble setting up WAMP on a work computer, so I looked into how to make a docker-compose environment that could serve my needs to make updates here and there if I needed.

# Installation
I'm going to assume you already have docker-compose installed
1. Download the files into your root folder
1. Set the right path in the docker-compose.yml file under "Services > website > volumes" (replacing `C:\path\to\php\code`)
1. Set the right path in the Dockerfile file on the COPY line (replacing `code/`)
1. Run docker-compose build
1. Run docker-compose up
1. Open a browser and go to [localhost:8001](http://localhost:8001)
1. Edit the code inside the /code folder

# Included modules/features
 ## mySQL 8.0
 ## PHP 7.4
 Includes mysqli
 ## Apache
 Includes mod_rewrite
