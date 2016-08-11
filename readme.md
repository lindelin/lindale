#Lindalë Project

[![Build Status](https://travis-ci.org/kudouyoichi/lindale.svg?branch=master)](https://travis-ci.org/kudouyoichi/lindale)
[![StyleCI](https://styleci.io/repos/63577917/shield)](https://styleci.io/repos/63577917)

##About Lindalë
####...is a word from J.R.R. Tolkien's elvish language named Quenya and means "to sing" or "to make music."


##About this Project
It will be a simple blog system.

##Requirements
Since Lindalë is built on Laravel 5.2.*, there are a few system requirements:

- PHP >= 5.6
- OpenSSL PHP Extension
- PDO PHP Extension
- PDO compliant database (SQL, MySQL, PostgreSQL, SQLite)
- Mbstring PHP Extension
- Tokenizer PHP Extension


##Download&Install
step.1 Download

`git clone https://github.com/kudouyoichi/lindale.git`

step.2 Install

`composer install`

step.3 Application Configuration

`$ sudo cp .env.example .env`

step.4 Set the application key

`php artisan key:generate`

step.5 set up the basic configuration

`$ sudo vim .env`

step.6 set database

`php artisan migrate`

step.7 make test data

`php artisan db:seed`

##License
Lindalë is open-sourced software licensed under the [MIT license](https://github.com/kudouyoichi/lindale/blob/master/LICENSE)

Fourmix inc. - http://www.fourmix.co.jp
