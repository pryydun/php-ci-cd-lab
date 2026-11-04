
# PHP CI/CD Laboratory Work

![PHP CI](https://github.com/pryydun/php-ci-cd-lab/actions/workflows/php-ci.yml/badge.svg?branch=main)

## Project Description

A simple PHP calculator application for learning Git, GitHub, and GitHub Actions.

Laboratory Work No. 1: Version Control and CI/CD Pipeline Configuration.

## Technologies

- PHP 8.2
- Git and GitHub
- GitHub Actions
- Composer
- PHPUnit
- Laravel Pint

## Features

- Addition of two numbers
- Subtraction of two numbers
- Automated unit testing with PHPUnit
- Automated code style checking with Laravel Pint
- Secure handling of GitHub Secrets

## Running Tests

Install dependencies:

```bash
composer install
```

Check code formatting:

```bash
./vendor/bin/pint --test
```

Run unit tests:

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/Unit
```

## CI/CD Pipeline

GitHub Actions automatically checks the project when changes are pushed to the main branch or a Pull Request is created.

The pipeline includes:
- PHP 8.2 setup
- Composer dependency installation
- Code style validation
- Unit testing
- GitHub Secrets demonstration
