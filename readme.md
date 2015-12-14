## Tribal Syrup Website

This is a website created by Maz Jindeel and Kris Samuelson for the Tribal Syrup Cooperative. 
It uses the laravel php framework. Due to varying levels of experience with Laravel's models in our group,
Models are not widely used in ths application. We instead have used raw sql for most purposes.

## Setup

###Local Machine Setup
For a local machine, it is recommended that you install the Homestead environment so you can have a development environment where everything works. You can learn more about installing Homestead [here](
http://laravel.com/docs/5.0/homestead)

###Setup

You will need to install [composer](https://getcomposer.org/doc/00-intro.md). 

1. Clone this repository and change directory into it
2. Run `composer install`
3. If you are using homestead, set up the homestead configuration file with `homestead edit`, then ssh into the homestead machine with `homestead ssh` and change directory to the project's root. 
4. Run the command `php artisan migrate`
5. log into mysql (on homestead this can be done with `mysql -uroot -psecret`, the  `use homestead`, the `source database/migrations/ddl.sql`
6. You will need to add an initial user to get anything done with the application (see the seeds section)

#### Seeding
To seed the database with test data, log into mysql, use homestead, then type `source database/seeds/seeds.sql`
To create an administrative user, run the command `php artisan tinker`, then run the following
```
$u = new App\User;
$u->name = "NAME";
$u->email = "YOUR EMAIL";
$u->password = Hash::make('PASSWORD');
$u->producer_id = PRODUCER_ID; #only if producer id exists
$u->admin = 1;
$u->save();
```


