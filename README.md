# Project Name

Short project description here.

## Table of Contents

- [Description](#description)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)
- [License](#license)

## Description

Provide a brief description of your project here.

## Installation

1. Clone the repository:
   ```bash git clone https://github.com/rikiahmad2/SampleProjectRiki.git
2. Install the dependencies
    ```composer install
3. Setup env file, create database and mailtrap connection for disposable email
    change the database config and mail config with mailtrap
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=69a7127e645a0e
    MAIL_PASSWORD=5594d443019fd4
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=user@mailtrap.com
    MAIL_FROM_NAME="${APP_NAME}"

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sample-db
    DB_USERNAME=root
    DB_PASSWORD=
4. Generate application key
    ```php artisan key:generate
5. Migrate the database
    ```php artisan migrate
6. Generate Seeder
    ```php artisan db:seed --class=classnameSeeder

## Usage
1. turn on xampp and open CMD
2. serve on your local using command
```php artisan serve
3. import postman collection or can use command for apid docs.
```php artisan l5-swagger:generate
4. open the url for api docs
```http://127.0.0.1:8000/docs
5. for run the send notifications manually can use and check the email already sent to mailtrap
```php artisan notifications:sendposts
6. for QUEUE command
```php artisan queue:command your:custom-command