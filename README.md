# Sharing Package With Others

> You can use Packagist for that but for a package this dumb, I would not like to litter the platform. Let’s use GitHub for sharing our package for now.

## Use GitHub for sharing

cd into the packages/nfgarching/testing directory and execute the following set of commands:

```
echo "/vendor/" > .gitignore
git init
git checkout -b master
git add .
git commit -m "Initial commit"
git tag 1.0.0
```

This will turn the package directory into a git repository, add all the files, create an initial commit and tag the source code as version 1.0.0. Now head over to GitHub and create a new repository.

The repository I’m going to use is the nfgarching/testing repository. The following commands do the job of releasing the package to the repository:

```
git remote add origin git@github.com:nfgarching/testing.git
git push -u origin --all
git push -u origin --tags
```

This package can now be installed by other in their projects.

## Installing package into a new project

To test out the package installation, you’ll need a new Laravel project. Create a new project somewhere on your computer with the name example-app.

```
composer create-project laravel/laravel example-app
```

By default, Composer pulls in packages from Packagist so you’ll have to make a slight adjustment to your new project composer.json file. Open the file and update include the following array somewhere in the object:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/nfgarching/testing"
    }
]
```

Execute the following command to install the package:

```
composer require nfgarching/testing
```

Now, open the bootstrap/cache/services.php file and scroll down to the providers array. In that array, there should be a section for the package service providers. You will find following:

> 'Nfgarching\\Testing\\Providers\\TestProvider',

This will register the InspirationProvider class as one of the service providers for this project. Start the application using php artisan serve and visit the /testpackage route to get testpackage. Also, since we’ve put the logic for getting the inspiration quote in a separate class instead of directly in the controller, you can use the Fhsinchy\Inspire\Inspire.php class anywhere in the project. I could’ve turned it into a facade but I don’t like to complicate things unnecessarily. So that’s that.

## Links

- https://adevait.com/laravel/how-to-create-a-custom-package-for-laravel
- sdcsdcsdc
- dsvsdvdsvsdv






# Laravel Package Template
[![Latest Version on Packagist](https://img.shields.io/packagist/v/michael-rubel/laravel-package-template.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-package-template)
[![Total Downloads](https://img.shields.io/packagist/dt/michael-rubel/laravel-package-template.svg?style=flat-square&logo=packagist)](https://packagist.org/packages/michael-rubel/laravel-package-template)
[![Code Quality](https://img.shields.io/scrutinizer/quality/g/michael-rubel/laravel-package-template.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-package-template/?branch=main)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/michael-rubel/laravel-package-template.svg?style=flat-square&logo=scrutinizer)](https://scrutinizer-ci.com/g/michael-rubel/laravel-package-template/?branch=main)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/michael-rubel/laravel-package-template/run-tests/main?style=flat-square&label=tests&logo=github)](https://github.com/michael-rubel/laravel-package-template/actions)
[![PHPStan](https://img.shields.io/github/workflow/status/michael-rubel/laravel-package-template/phpstan/main?style=flat-square&label=larastan&logo=laravel)](https://github.com/michael-rubel/laravel-package-template/actions)

It is a ready template for Laravel packages.

### What's inside
- Basic skeleton with Service Provider and configuration file;
- Laravel Package Tools by Spatie for easier package management;
- PHPStan/larastan & CodeSniffer code quality checks;
- Ready-to-use GitHub Action scripts for testing;

Fill or change it the way you like.

---

The package requires PHP `^8.x` and Laravel `^8.71` or `^9.0`.

## #StandWithUkraine
[![SWUbanner](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner2-direct.svg)](https://github.com/vshymanskyy/StandWithUkraine/blob/main/docs/README.md)

## Installation
Install the package using composer:
```bash
composer require michael-rubel/laravel-package-template
```

## Usage
```php
// Your description.
```

Publish the config:
```bash
php artisan vendor:publish --tag="package-template-config"
```

## Testing
```bash
composer test
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
