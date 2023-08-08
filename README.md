# Project Name

Short project description here.

## Table of Contents

- [Description](#description)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Running Notifications](#running-notifications)
- [Queue Command](#queue-command)
- [Contributing](#contributing)
- [License](#license)

## Description

Provide a brief description of your project here.

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/rikiahmad2/SampleProjectRiki.git
    ```

2. **Install the dependencies:**
    ```bash
    composer install
    ```

3. **Setup .env file:**
   - Configure your database connection and mailtrap settings in the `.env` file:
     ```env
     # Mailtrap Configuration
     MAIL_MAILER=smtp
     MAIL_HOST=sandbox.smtp.mailtrap.io
     MAIL_PORT=2525
     MAIL_USERNAME=69a7127e645a0e
     MAIL_PASSWORD=5594d443019fd4
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS=user@mailtrap.com
     MAIL_FROM_NAME="${APP_NAME}"

     # Database Configuration
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=sample-db
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Migrate the database:**
    ```bash
    php artisan migrate
    ```

6. **Generate Seeder:**
    ```bash
    php artisan db:seed --class=classnameSeeder
    ```

## Usage

1. Turn on XAMPP and open CMD.
2. Serve on your local using the command:
    ```bash
    php artisan serve
    ```
3. Import Postman collection or generate API docs using the command:
    ```bash
    php artisan l5-swagger:generate
    ```
4. Open the URL for API docs:
   [http://127.0.0.1:8000/docs](http://127.0.0.1:8000/docs)
5. To manually send notifications and check emails sent to Mailtrap:
    ```bash
    php artisan notifications:sendposts
    ```
6. For QUEUE command:
    ```bash
    php artisan queue:command your:custom-command
    ```
7. Replace `your:custom-command` with the actual name of your custom command.

## Contributing

Contributions are welcome! If you find a bug or have an improvement suggestion, feel free to open an issue or create a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
