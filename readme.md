# Welcome to the Learn Party


[![Build Status](https://scrutinizer-ci.com/g/andela-jkariuki/checkpoint-four-learn-party/badges/build.png?b=staging)](https://scrutinizer-ci.com/g/andela-jkariuki/checkpoint-four-learn-party/build-status/staging)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-jkariuki/checkpoint-four-learn-party/badges/quality-score.png?b=staging)](https://scrutinizer-ci.com/g/andela-jkariuki/checkpoint-four-learn-party/?branch=staging)
[![Coverage Status](https://coveralls.io/repos/github/andela-jkariuki/checkpoint-four-learn-party/badge.svg?branch=staging)](https://coveralls.io/github/andela-jkariuki/checkpoint-four-learn-party?branch=staging)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

**Learn Party** is a learning platform that offers user generated content for studying the latest technologies online (Youtube hosted videos).

## What can I do on Learn Party

**1. Register account**

Create an account using your email, facebook, twitter or github account in under a minute.

Proceed to login here

**2. User profile**

Update your profile details, avatar or simply put up a small bio about yourself that your video fans can read about. 

**3. Video Resources**

Having fun yet?

Create new videos on your profile, edit exisiting details or delete your uploaded videos entirely.

Keep track of all the videos you have uploaded straight from your dashboard.

**4. Favorite, Comment, Engage**

Like what you see?

Engage other learners on the comment section of the videos that capture your attention.

Too many videos?

Favorite the videos you like and revisit them later on your profile.

**5. Trendy Videos**

If you are just looking to see what technologies are the fuss around, Access the most popular videos on your homepage

```
See the most popular videos according to
1. Which videos have the most likes.
2. Which videos have the most comments
3. Which videos have the most views
4. Which users have the most uploads
```

**You do not have to be logged in to view the videos without engagement (Commenting, Favoriting, uploading and editing)**

##Usage

It is recommended that you have the following set up on your local environment before getting started

1. [Composer](https://getcomposer.org)
2. [Laravel] (https://laravel.com)
3. [Vagrant] (https://www.vagrantup.com) 
4. [Postgres](http://www.postgresql.org)
5. [Git] (https://git-scm.com)

Clone the repository into your local environment

```bash
$ git clone git@github.com:andela-jkariuki/checkpoint-four-learn-party.git
```

Change directory into `checkpoint-four-learn-party`

```bash
$ cd checkpoint-four-learn-party
```

Copy the .env file into your project (use the env.example template) and populate it with your environment data

```bash
$ cp env.example .env
```

You can also follow the template for your .env
```bash
APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_URL=

DB_HOST=
DB_PORT=5432
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=
SESSION_DRIVER=
QUEUE_DRIVER=

REDIS_HOST=
REDIS_PASSWORD=
REDIS_PORT=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=

GITHUB_APP_ID=
GITHUB_APP_SECRET=
GITHUB_CALLBACK_URL=

FACEBOOK_APP_ID=
FACEBOOK_APP_SECRET=
FACEBOOK_CALLBACK_URL=

TWITTER_APP_ID=
TWITTER_APP_SECRET=
TWITTER_CALLBACK_URL=

AWS_KEY=
AWS_SECRET=
AWS_REGION=
AWS_BUCKET=

CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_BASE_URL=
CLOUDINARY_SECURE_URL=
CLOUDINARY_API_BASE_URL=
```

Run Composer install to install the vendor packages

```bash
$ composer install
```

Boot up your server and you are ready to go

If you are using vagrant, simply run

```bash
$ vagrant up
```

Otherwise, run

```bash
$ php artisan serve
```


## Tests

if you have phpunit installed globally (recommended), run

```bash
$ phpunit
```

Otherwise, run
```bash
$ vendor/bin/phpunit
```
## Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/andela-jkariuki/checkpoint-three-naija-emoji).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.

## Security

If you discover any security related issues, please email [John Kariuki](john.kariuki@andela.com) or create an issue.

## Credits

[John kariuki](https://github.com/andela-jkariuki)

## License

### The MIT License (MIT)

Copyright (c) 2016 John kariuki <john.kariuki@andela.com>

The Learn Party is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
