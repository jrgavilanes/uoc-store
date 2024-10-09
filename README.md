<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## Crear nuevo proyecto Laravel con SAIL ( docker required )
```sh
curl -s "https://laravel.build/my-app" | bash
```

## Levantar entorno
```sh
sail up
sail composer install
sail npm run dev
sail migrate
```

## Instala dependencias
```sh
sail composer require livewire/livewire
sail composer require wireui/wireui
sail composer require barryvdh/laravel-debugbar --dev
```

taildwind
```sh
# ... revisa configuración app.css, etc en la web
# https://tailwindcss.com/docs/guides/laravel
sail npm install -D tailwindcss postcss autoprefixer
sail npx tailwindcss init -p

```


## Desarrollo ( requiere docker instalado )

La primera vez que descargas el proyecto, tienes que instalar dependencias laravel y node.

```bash
docker run --rm \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Ahora ya tenemos composer, deberíamos poder ejecutar sail up

```
sail npm run build
sail artisan db:migrate --seed

```

Inserta usuario admin de pruebas
```bash
sail artisan db:seed
```


## Migraciones

```sh
sail artisan make:model Product -mfc
sail artisan make:model Category -mfc
sail artisan make:model Order -mfc
```
