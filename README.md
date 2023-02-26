
![Logo](https://github.com/zafajardo9/eCommerce_CarRental/blob/main/img/logo/LOGO1.png?raw=true)


# Car Rental System

A single car renting or reservation company needs to keep track of records of their cars and also of the people that will be renting the car. Our world has become a place where there is a lot of technological development. Every single thing done physically has been transformed into computerized form. Here goes the Car Renting System, with the use of the latest technologies used to develop a system, this system will be fast and reliable for the company. Car renting or reservation is very important for every people who are planning to travel across their city because of different occasions. Therefore, it is proposed to have a system that can be used to provide booking and management to make easier for both of them.


## NOTE

The code is not suited for production and was developed as a personal and college assignment in a week


## Documentation

- [Database Report](https://github.com/zafajardo9/eCommerce_CarRental/raw/main/documentation/DATABASE%20REPORT.pdf)
- [UI/UX Report](https://github.com/zafajardo9/eCommerce_CarRental/raw/main/documentation/UIUX%20Design.pdf)


## Contributing

Contributions are always welcome!

Please adhere to this project's `code of conduct`.


## You can Contact us

#### Email 1

zafajardo9@gmail.com

#### Email 2

zafajardo9.programming@gmail.com

## Badges

Add badges from somewhere like: [shields.io](https://shields.io/)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://img.shields.io/github/license/zafajardo9/eCommerce_CarRental)

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)

[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## Tech Stack

**Client:** React, Redux, TailwindCSS

**Server:** Apache


## Roadmap

- Additional browser support

- Add more integrations


## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)


## Usage/Examples

```php

<?php
//should be changed depends on the sql server you have
//ZACK\SQLEXPRESS
$serverName = "ZACK\SQLEXPRESS";
$connectionOptions = [
    "Database"=>"RentCar2",
    "Uid"=>"",
    "PWD"=>""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn == false){
    die(print_r(sqlsrv_errors(), true));
}
?>
```


## Authors

- [@zafajardo9](https://github.com/zafajardo9)

