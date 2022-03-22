       Follow these steps to install the application.
    1) Clone the Repository
           git clone https://github.com/seaklong/redirection.git
    2) Go to project directory
           cd  redirection
    3) Install packages with composer
           composer install
    4) Install npm packages with 
           npm install; npm run dev
    5) Create your database
    6) Rename .env.example to .env Or Copy it and paste at project root directory and name the file .env.You can also use this command.
           Cp .env.example ./.env
    7) Generate app key with this command
           php artisan key:generate
    8) Set Database connection to your databases in the .env file.
           DB_CONNECTION=mysql
           DB_HOST = 127.0.0.1
           DB_PORT=3306
           DB_DATABASE=db-name
           DB_USERNAME=ROOT
           DB_PASSWORD=password
    9) Run migrations use this command to run migrations
           php artisan migrate
           php artisan migrate --seed
    10)  Start the local server and browser to your app. This command will start the development server  
           php artisan serve
    11)  Open the address in the terminal in your browser.
           http://127.0.0.1:8000
    12) Admin login credentials
           email: admin@admin.com
           password: 123456
