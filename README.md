# Laravel To Do List Application

## Contents
* [About](#about)
* [Installation](#installation)
* [Heroku](#heroku)
* [Issues](#issues)
* [Next Steps](#steps)
* [Architecture](#architecture)

## About<a name="about"></a>

The Laravel To-Do List application, allows the user to manage tasks by creating to-do list items, sort or search through their list, update tasks, and delete tasks. 

Built on the Laravel Framework 7.0.

## Installation<a name="installation"></a>

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

## Run in Heroku<a name="heroku"></a>
[Run Application In Heroku](https://rocky-dawn-97966.herokuapp.com/)

### Register User
![ezgif com-video-to-gif](https://user-images.githubusercontent.com/55072295/86360589-97dd1a00-bc40-11ea-8101-449c76fcec0a.gif)

### Create Tasks
![ezgif com-video-to-gif (1)](https://user-images.githubusercontent.com/55072295/86360825-eab6d180-bc40-11ea-88da-dd2ec62d3bc9.gif)

### Sort, Update, and Delete Tasks (Coming Soon To Deployed Site)
![ezgif com-video-to-gif (3)](https://user-images.githubusercontent.com/55072295/86361392-c3143900-bc41-11ea-8325-fc1468930fc9.gif)

## Current Issues<a name="issues"></a>

### HTTP Methods In Heroku

#### Issue

When running the application deployed on Heroku, HTTP GET and POST methods work seamlessly. However, though all methods work locally, all actions requiring a PATCH method return an error stating: `The GET method is not supported for this route. Supported methods: PATCH.`

#### Troubleshooting

* Added formmethod with POST to button to reinforce method.
* Added formaction to button to reinforce action.

#### Potential Solution

* Due to the dynamic nature of the update task modal, the action attributes are set dynamically using jQuery. Will try again by defining action inine.
* Some forums have suggested this to be a common framework issue.

## Next Steps <a name="steps"></a>

* User can select multiple priorities
* User can create custom priorities
* Add functionality to "Restore" button in deleted folder
* Add validations for form entries
* User can set reminders

## Architecture <a name="architecture"></a>

### Database
![laravel to do](https://user-images.githubusercontent.com/55072295/86364912-cd850180-bc46-11ea-9576-71af46ed8a31.png)

The database is comprised of three tables: users, tasks, and priorities.

* The Laravel UI is the scaffolding for the users table and all login/register/logout functionality.
* The tasks table uses basic column types to record the id, userID (linked to primary key on users table), task name, task details, completed boolean value, priority id (linked to primary key on priorities table), crested_at and updated_at timestamps, as well as Laravel's softDeletes.
* The priorities table contains a list of priorty types and their associated id. All priorities are created with seeds.
