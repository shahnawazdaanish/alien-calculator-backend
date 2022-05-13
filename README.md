<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Alien Calculator
This project is a solution for the problem statement given by MarkID. 
I have made a calculator where operator will be some Unicode characters 
and there will be some input boxes to take the inputs.
Based on the inputs and operator selected, result will be 
published after calculating at the server end.

### Environment
    - PHP ^7.4
    - Laravel ^8.0.0
    - Composer ^2.0.0
    - Node (NPM) ^8.0.0
    

### Run Steps

#### Backend Server
    - Install PHP
    - Install Composer
    - Install Node
    - Go to backend directory in terminal
    - Run > composer install
    - Wait for the packages to be installed
    - Run > php artisan serve
    - Keep the server URL to be used in frontend configuration
    - Backend Server is ready to serve.

#### Frontend
    - Go to frontend directory in terminal
    - Run > npm install
    - Wait for the packages to be installed
    - Set backend server URL in .env file (REACT_APP_SERVER_URL)
    - Run > npm start
    - Open the frontend service URL to use the application.


### Configuration
    - A configuration file named "operations.php" is available under config directory of backend files.
    - We can add or modify operations there. 
    - Format is:
        '<operation_name>' => [
            'alias' => '<an_alias>',
            'unicode_codepoint' => 'U+1F47D',
            'inputs' => <how_many_inputs_it_will_require>
        ]
    - For each operation name there will be exact same named class with First Letter uppercase
        in the App\Classes\Operation Folder. Like a new operation will be Square,
        then configuration will have new node with 'square' and a class name Square.php.
    

### Testing
    - Run > php artisan test
    - It will run precoded test cases.


### APIs

#### 1. Get All Operations
Method: **GET** \
Path: `<basepath>/operations` \
Error Codes: **Standard HTTP Error Codes** \
Request: [] \
Response:
    `[
        {
            "alias": "Alien",
            "unicode_codepoint": "U+1F47D",
            "inputs": 2
        }
    ]`

#### 2. Calculate an Operation
Method: **POST** \
Path: `<basepath>/calculate` \
Error Codes: **Standard HTTP Error Codes** \
Request: `{"operation": "<alias>", "inputs" : "[<array of numbers>]"}` \
Response:
`{
    "result" : "<output>"
}`

