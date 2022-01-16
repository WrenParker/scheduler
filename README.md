
# Event Scheduler
## Local Set Up

- Clone project to apache document root (htdocs on xampp)
- Import DDL script found in /sql/CREATE_EVENTS.sql into MySQL via CLI or phpmyadmin
- Edit credentials and database info in /config/db.php to match local database instance
- Note: Developed for php 7.3

## Development Process

This project was built using a LAMP stack and the MVC architectural pattern. A constraint I put on myself was to use minimal frameworks outside of the languages themselves. I opted to use Bootstrap 4 and Font Awesome for rapid UI development, but everything else was done from scratch.

Languages used: PHP, HTML, CSS, Javascript, MySQL


## Live Example
 
Here's a live version hosted on an EC2 instance:

http://34.224.30.22

## Additional Info 


This project was created as a submission for the [Eventeny](https://www.eventeny.com/) Product Software Engineer application process in January 2022. 
