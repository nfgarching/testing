# Sharing Package With Others

> You can use Packagist for that but for a package this dumb, I would not like to litter the platform. Let’s use GitHub for sharing our package for now.

## Use GitHub for sharing

[Optional] cd into the packages/nfgarching/testing directory and execute the following set of commands:

// packages/nfgarching/testing

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

// packages/nfgarching/testing

```
git remote add origin git@github.com:nfgarching/testing.git
git push -u origin --all
git push -u origin --tags
```

This package can now be installed by other in their projects.


## Installing project into a new project

To test out the package installation, you’ll need a new Laravel project. Create a new project somewhere on your computer with the name needs-inspiration.

```
laravel new needs-inspiration

```

By default, Composer pulls in packages from Packagist so you’ll have to make a slight adjustment to your new project composer.json file. Open the file and update include the following array somewhere in the object:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/fhsinchy/inspire"
    }
]

```

The updated composer.json file should look as follows:

```
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    // here you go
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/fhsinchy/inspire"
        }
    ],
    "require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5"
    },
    "require-dev": {
        "facade/ignition": "^2.5",
        "fakerphp/faker": "^1.9.1",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^5.10",
        "phpunit/phpunit": "^9.5.10"
    },
    // ... so on
}
```

Now composer will also look into this repository for any installable package. Execute the following command to install the package:

```
composer require fhsinchy/inspire
```


The output of this command should look as follows:

$ composer require fhsinchy/inspire
Using version ^1.0 for fhsinchy/inspire
./composer.json has been updated
Running composer update fhsinchy/inspire
Loading composer repositories with package information
Updating dependencies                                 
Lock file operations: 1 install, 0 updates, 0 removals
  - Locking fhsinchy/inspire (1.0.0)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Downloading fhsinchy/inspire (1.0.0)
  - Installing fhsinchy/inspire (1.0.0): Extracting archive
Package swiftmailer/swiftmailer is abandoned, you should avoid using it. Use symfony/mailer instead.
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/sail
Discovered Package: laravel/sanctum
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
77 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
> @php artisan vendor:publish --tag=laravel-assets --ansi --force
No publishable resources for tag [laravel-assets].
Publishing complete.
As you can see, the package has been installed successfully. Now, open the config/app.php file and scroll down to the providers array. In that array, there should be a section for the package service providers. Add the following line of code in that section:

/*
 * Package Service Providers...
 */


Fhsinchy\Inspire\Providers\InspirationProvider::class,
This will register the InspirationProvider class as one of the service providers for this project. Start the application using php artisan serve and visit the /inspire route to get inspired. Also, since we’ve put the logic for getting the inspiration quote in a separate class instead of directly in the controller, you can use the Fhsinchy\Inspire\Inspire.php class anywhere in the project. I could’ve turned it into a facade but I don’t like to complicate things unnecessarily. So that’s that.




# Links

https://adevait.com/laravel/how-to-create-a-custom-package-for-laravel

- https://adevait.com/laravel/how-to-create-a-custom-package-for-laravel
- sdcsdcsdc
- dsvsdvdsvsdv

