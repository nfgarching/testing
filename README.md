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

