# Laravel To Do List Application

## About

The Laravel To-Do List application, allows the user to manage tasks by creating to-do list items, sort or search through their list, update tasks, and delete tasks. 

Built on the Laravel Framework 7.0.

## Installation

### Built With

* [Laravel](https://laravel.com/)
* [Laravel UI](https://github.com/laravel/ui)
* [Composer](https://getcomposer.org/)
* [PHP](https://www.php.net/)
* [Bootstrap](https://getbootstrap.com/)
* [jQuery](https://jquery.com/)
* [MySQL](https://www.mysql.com/)

### Running Locally

* Clone the repository

<img width="154" alt="Screen Shot 2020-04-04 at 12 18 55 AM" src="https://user-images.githubusercontent.com/55072295/78418421-e2330880-7609-11ea-9598-8374f02146af.png">

Run the following command in your command line interface:

```
git clone <clone link here>
```

cd into the folder with this command-
```
cd laravel-todo
```

Install Composer
```
composer install
```

And install dependencies by running:

```
npm install
```

You should create an environment file using this command-
```
cp .env.example .env
```

Be sure to edit `.env` file with your database server credentials. Edit these parameters(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todolist` and run a database migration using this command-
```
php artisan migrate
```

You should also seed your database with the following command:
```
php artisan db:seed
```

Change permission of storage folder using this command-
```
(sudo) chmod 777 -R storage
```

Deploying to Heroku requires a few small changes in the code. Navigate to the `app.blade.php` file, uncomment the two links labeled "Local Script Link" and "Local Style Link" and comment out the corresponding lines.
<br/><br/><img width="847" alt="Screen Shot 2020-07-02 at 8 05 17 AM" src="https://user-images.githubusercontent.com/55072295/86358033-c658f600-bc3c-11ea-9af2-d7835a6673ce.png">
<br/><br/><img width="599" alt="Screen Shot 2020-07-02 at 8 05 22 AM" src="https://user-images.githubusercontent.com/55072295/86358040-c822b980-bc3c-11ea-8e89-196e96235f5a.png">

Additionally, navigate to the `home.blade.php` file, uncomment the options labeled "Local Options" and comment out the corresponding lines.
<br/><br/><img width="400" alt="Screen Shot 2020-07-02 at 8 21 13 AM" src="https://user-images.githubusercontent.com/55072295/86358238-26e83300-bc3d-11ea-9ad2-6f8d5104abfe.png">

Finally, generate your application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

Run server using this command-
```
php artisan serve
```

The application should be running on `http://localhost:8000`.

## Run in Heroku

### Register User
![ezgif com-video-to-gif](https://user-images.githubusercontent.com/55072295/86360589-97dd1a00-bc40-11ea-8101-449c76fcec0a.gif)

### Create Tasks
![ezgif com-video-to-gif (1)](https://user-images.githubusercontent.com/55072295/86360825-eab6d180-bc40-11ea-88da-dd2ec62d3bc9.gif)

### Sort, Update, and Delete Tasks (Coming Soon To Deployed Site)
![ezgif com-video-to-gif (2)](https://user-images.githubusercontent.com/55072295/86360946-1a65d980-bc41-11ea-97f0-8c5079c80127.gif)

## Next Steps/Current Issues
## Architecture
