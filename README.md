# Yacrudg
###### Yet Another CRUD Generator
CRUD генератор для Laravel проекта. Курсовая работа.

## Требования
- laravel@8.*
- composer@2.*
- laravel/ui@^3.2
```
composer require laravel/ui
```
## Установка
В composer.json проекта добавить
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/swtysweater/yacrudg.git"
    }
] 
```
Далее
```
composer require swtysweater/yacrudg
php artisan ui:auth
php artisan ui bootstrap
npm i
npm run dev (2 раза если новый проект)
php artisan vendor:publish (выбираем YacrudgServiceProvider)
php artisan migrate
php artisan yacrudg::install
```

## Использование

- CLI
```
php artisan yacrudg:create <название таблицы в camelcase в единственном числе :) > (создание CRUD для указанной таблицы)
php artisan yacrudg:remove <аналогично> (удаление таблицы)
```
- UI по <домен>/yacrudg

## Troubleshooting

- PHP Fatal error:  Allowed memory size of ??? bytes exhausted
```
##php.ini

php_value memory_limit -1
```