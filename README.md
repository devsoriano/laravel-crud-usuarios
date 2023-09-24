## Rafael Soriano Ramírez

## Challenge Laravel, CRUD de usuarios y roles de usuarios.

El proyecto es un CRUD de laravel con MYSQL para gestión de usuarios con distintos roles, esta aplicación corre sobre Docker, una vez descargado el proyecto asegurese de tener encendido docker y trabajar e ingresar los comandos sobre la raíz del proyecto. 

### Paso 1

En la consola de tu preferencia, donde tengas instalado docker, ingresa el comando:

```
docker-compose build       
```

Esto hará que se construya el contenedor con los elementos necesarios para cubrir MySQL y Laravel, tu consola debe parecerse a esto en respuesta:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/05cd4665-e19f-42cc-bb61-4114e137149c)


### Paso 2

Ahora debes de inicializar la imagen generada por docker con el comando:

```
docker-compose up -d       
```
En consola se mostrará:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/8f3cd377-1cb4-468b-926e-7fa9158d553d)

Así mismo en la UI de docker:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/03bb9a32-f22d-464c-9cff-a7f25f9a79bd)


### Paso 3

Migrar la base de datos con el comando:

```
docker-compose exec web php artisan migrate     
```

y mostrando en consola: 

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/a19c8f53-3964-4c71-a79b-f2c0e77c5c48)

Las migraciones que nos interesa que se hayan migrado correctamente son:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/524de713-2250-4c3f-b1ff-820fb1e06e7f)

Ya que son las pertenecientes al proyecto, las demás son pertenecientes al mock de prueba de laravel.


Ahora prblaremos la data para roles con el comando:

```
docker-compose exec web php artisan db:seed --class=RolesTableSeeder --verbose
```

Nos aseguramos que se haya poblado correctamente la data:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/76f708ea-0207-4675-93ff-e33be3a60203)


### Paso 5

Inicializamos el proyecto con el comando en consola:

```
docker-compose exec web php artisan serve --host=0.0.0.0 --port=80
```

De esta manera estamos listos para ver el proyecto de nuestra aplicación en el path:

```
http://localhost:8000/usuarios
```

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/70de5353-b848-4b54-b73a-ee4d8a575dcf)

### Paso 6

Probamos la aplicación creando un usuario:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/ec0cd404-4ef8-4350-853d-7c06f133fc4c)

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/c5916009-f0d4-4770-b964-7431d3449845)

Podemos también editarlo:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/472fc6cb-6493-4b55-945d-7f35e2d62583)
![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/4304435d-e837-426f-a286-bbee9af2db2a)

Y eliminar:

![image](https://github.com/devsoriano/laravel-crud-usuarios/assets/22625671/804a15ff-462d-4759-9ad3-bd79e370f0ef)


## Notas
Los formularios cuentan con validaciones y el código es escalable a más funcionalidades.










