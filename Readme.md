# Phone Book

Phone book is a system that show all registered users' phones and a button that redirects to whatsapp.

## Installation

clone a repository

```bash
mkdir phonebook
cd phonebook
git clone https://github.com/joao-coimbra/phone-book.git
```

config database sql

```sql
CREATE DATABASE phonebook;

CREATE TABLE `phonebook`.`user` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(200) NOT NULL,
	`email` VARCHAR(200) NOT NULL,
	`phone` INT(11) NOT NULL,
	`password` VARCHAR(32) NOT NULL,
	`date` DATETIME NOT NULL,
	PRIMARY KEY (`user_id`));
```

## Usage

Create a user in sign up page and access your login

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)