<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# About the project
This project is a meetup web application that is writing using Laravel framework and mysql database.


## Features of the app
This web app has the features:
- Authentification system
- User can add new events:
    -Write title
    -Write description
    -add image
    -set time of the event
- User can search for evenets by name, place, date
- Reminde the user of close event


# Run the app
Edit first the DB config in .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Then run the next command to make the tables created automaticly:

```
php artisan migrate
```
You can run the app using the command :
```
php artisan serve
```

You can access to the site using localhost:8000