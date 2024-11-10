<p align="center"><img src="./documentation/retrostore.png"  alt="Laravel Logo"></p>

Ver Documentación extendida en <a href="./documentation/Gavilanes_Sanchez_JuanRamon_CE_PRA1.pdf">Memoria del proyecto</a>

## Instalación rápida
Necesitas tener instalado Docker y Docker-compose en tu equipo

Nos colocamos desde el raiz del proyecto

Instalar dependencias composer
```sh
docker run --rm -v $(pwd):/app composer install
```

Configura Entorno y conexión a base de datos en fichero ```.env```. 

Si no lo tienes básate en .env.example ```cp .env.example .env```
```
...
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=uoc-store
DB_USERNAME=sail
DB_PASSWORD=password
...
```

Inicia entorno con SAIL
```sh
./vendor/bin/sail up
```

Instala dependencias NPM
```sh
./vendor/bin/sail npm install
```

Inicia VITE para el frontend
```sh
./vendor/bin/sail npm run dev
```

Ejecuta migraciones de bases de datos y crea datos de prueba.
```sh
./vendor/bin/sail artisan migrate --seed
```

# Esquema de datos


![Esquema DB](/documentation/uoc-store-schema.png)
