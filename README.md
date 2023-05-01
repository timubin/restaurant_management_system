
#restaurant_management_system


## Description

This project is a restaurant point of sale (POS) system that allows restaurant staff to manage orders, customers, and menu items. The system has a user-friendly interface that makes it easy to navigate and use. It also provides various features such as order customization, menu item categorization, and customer management.

## Setup

To run this project on your local machine, follow these steps:

1. Clone this repository to your local machine.
2. Install the required dependencies using `composer install`.
3. Create a new `.env` file by copying the `.env.example` file.
4. Generate a new application key using `php artisan key:generate`.
5. Set up your database by configuring the `DB_` variables in your `.env` file.
6. Run the database migrations using `php artisan migrate`.
7. Seed the database with initial data using `php artisan db:seed`.
8. Serve the application using `php artisan serve`.

Now, you should be able to access your application on http://localhost:8000. Use the following login credentials to access the dashboard:

- Username: admin@gmail.com
- Password: Password

