# Hardlight Academy

This project uses Laravel and TailwindCSS (with DaisyUI), and thus requires an extra set of hands with the NPM commands. Please keep in mind that this project is entirely personal, and should not be used for any commercial purposes.

Keep in mind that you need NodeJS and Composer (that includes PHP) as a prerequisites to installation for this project.

Do these commands separately to prevent any problems:
```
    composer install
```

```
    npm install
```

Configure the ENV to your needs:
```
    cp .env.example .env
```
And feel free to edit it witin the scope of the configuration.  If that is done, then you only need to set up the database and do these commands:

```
    php artisan migrate:fresh
```

```
    php artisan serve
```