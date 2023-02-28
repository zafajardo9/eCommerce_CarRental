
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

**Client:** Vanilla JS, JQuery, SCSS, PHP

**Database:** Microsoft SQL Server

**Server:** Apache


## Roadmap

- Additional browser support

- Add more integrations


## Screenshots


![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/1.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/2.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/3.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/4.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/5.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/6.jpg)
![App Screenshot](https://raw.githubusercontent.com/zafajardo9/eCommerce_CarRental/main/documentation/7.jpg)


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

```php

function createUser($conn, $name, $userName, $email, $phoneNumber, $pwd) {

    $tsql= "INSERT INTO Customer (UserName, FullName, Email, PhoneNumber, [Password]) VALUES (?,?,?,?,?);";
    //hashing of password
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    $params = array(&$userName, &$name, &$email, &$phoneNumber, &$hashedpwd);
    $getResults = sqlsrv_query($conn, $tsql, $params);
    $rowsAffected = sqlsrv_rows_affected($getResults);
    //Checker
    if ($getResults == FALSE or $rowsAffected == FALSE) {
    //header
        die(FormatErrors(sqlsrv_errors()));
    }
    header("location: ../signup.php?error=none");
    exit();
}
```

```sql

--JOINING TABLE BOOKING AND BILLING
SELECT *
FROM Booking
INNER JOIN Billing ON Booking.[BookingID] = Billing.[BookingID];

--CREATING STORED PROCEDURE FOR INSERTING CAR
CREATE PROCEDURE SP_INSERT_CAR
	@p_Registration_Number AS BIGINT
	,@p_Model AS VARCHAR(255)
	,@p_Brand AS VARCHAR(255)
	,@p_TransmissionType AS VARCHAR(255)
	,@p_RentPrice AS DECIMAL(10,2)
	,@p_CarImage AS VARCHAR(255)
AS
INSERT INTO Car
	(Registration_Number, Model, Brand, TransmissionType, RentPrice, CarImage)
VALUES
	(@p_Registration_Number, @p_Model, @p_Brand, @p_TransmissionType, @p_RentPrice, @p_CarImage)
```



## Authors

- [@zafajardo9](https://github.com/zafajardo9)

