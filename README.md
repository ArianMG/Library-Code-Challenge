# Library-Code-Challenge

### Documentation

> ### Clone the git repository
```
git clone https://github.com/ArianMG/Library-Code-Challenge.git
```

> ### Move to the project directory

```
cd library
```

> ### Download Project Dependencies

```
composer install
```

> ### Set Environment

```
cp .env.example .env
```

> ### Generate Application Security Key

```
php artisan key:generate
```

> ### Migrate the Database

```
php artisan migrate:fresh --seed
```
