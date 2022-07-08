
# Restaurant

Un reconocido restaurante ha decidido tener una jornada de donación de comida a los residentes de la región con la única condición de que el plato que obtendrán los comensales será aleatorio. El administrador del restaurante requiere con urgencia un sistema que permita pedir platos a la cocina.

¿En qué consiste?
El gerente del restaurante debe poder indicarle a la cocina que se debe preparar un plato, la cocina selecciona aleatoriamente el plato a preparar y pide a la bodega de alimentos los ingredientes requeridos, si la bodega tiene disponibilidad entrega los ingredientes a la cocina, si no debe comprarlos en la plaza de mercado. Cuando la cocina recibe los ingredientes, prepara el plato y entrega el plato preparado.

¿Cómo funciona?

Un reconocido restaurante ha decidido tener una jornada de donación de comida a los residentes de la región con la única condición de que el plato que obtendrán los comensales será aleatorio. El administrador del restaurante requiere con urgencia un sistema que permita pedir platos a la cocina.


¿En qué consiste?
El gerente del restaurante debe poder indicarle a la cocina que se debe preparar un plato, la cocina selecciona aleatoriamente el plato a preparar y pide a la bodega de alimentos los ingredientes requeridos, si la bodega tiene disponibilidad entrega los ingredientes a la cocina, si no debe comprarlos en la plaza de mercado. Cuando la cocina recibe los ingredientes, prepara el plato y entrega el plato preparado.


¿Cómo funciona?

El gerente del restaurante presiona un botón que envía una orden a la cocina para preparar un nuevo plato. 

La cocina cuenta con una lista de 6 recetas disponibles (creados a criterio del candidato), los cuales deben usar únicamente los ingredientes disponibles (ver lista de ingredientes en la parte final del texto), todos los ingredientes deben ser usados en mínimo una receta. Cada receta contiene los ingredientes que la componen y la cantidad requerida de cada uno.

Cuando la cocina recibe un pedido de un plato debe seleccionar aleatoriamente de la lista de recetas disponibles el plato a preparar.

La cocina debe pedir a la bodega de alimentos los ingredientes para preparar el plato seleccionado. Debe esperar que los ingredientes sean entregados para continuar con la preparación del plato.

La bodega de alimentos inicia con una cantidad de 5 unidades por ingrediente. Cuando recibe un pedido de ingredientes debe verificar si los tiene disponibles, si no debe comprar los ingredientes restantes en la plaza de mercado, la cual puede tener o no disponibles los ingredientes.  Si no se tienen disponibles los ingredientes en la plaza, la bodega de alimentos debe esperar hasta que estén disponibles.

La plaza de mercado se encuentra ubicado en la dirección https://recruitment.alegra.com/api/farmers-market/buy . Recibe en el parámetro ingredient el nombre del ingrediente que se desea comprar, las opciones válidas para este se indican en la lista de ingredientes al final del texto.  Retorna en JSON un atributo con las cantidades vendidas (quanitySold) del ingrediente en la plaza, hay posibilidades de que el ingrediente no esté disponible, (se retorna quantitySold en 0). Se considera una compra exitosa cuando la respuesta de la plaza de mercado sea un número entero diferente de cero que indica las cantidades compradas.

La cocina puede entregar el plato únicamente cuando todos los ingredientes se encuentran disponibles, al prepararse el plato los ingredientes utilizados se disminuyen de la bodega de alimentos.


La interfaz para el usuario debe contener mínimo los siguientes elementos:

Botón para pedir un plato. Tener en cuenta que como es una jornada de donación de platos gratis, se debe disponer el sistema para que reciba pedidos masivos de platos.

Se debe poder observar las órdenes en preparación en la cocina.

Debe mostrarse los ingredientes y sus cantidades disponibles en la bodega de alimentos y el historial de compras a la plaza de alimentos.

Se debe poder observar el historial de pedidos realizados a la cocina.

Las recetas con ingredientes y cantidades deben poder observar en la pantalla.


El gerente de la empresa le gusta mantenerse a la moda por lo tanto ha exigido que el desarrollo debe montarse en una arquitectura de microservicios que corren con docker.


Ingredientes disponibles para las recetas:


tomato
lemon
potato
rice
ketchup
lettuce
onion
cheese
meat
chicken

## Instalación

Requisitos:
```
composer
docker
docker-compose
```

Estructura del proyecto:

- apps (apps folder)
    - ms-kitchen (lumen app)
    - ms-market (lumen app)
    - ms-warehouse (lumen app)
    - restaurant (laravel app)
- docker (config files)

Instalar dependencias en los poroyectos:
```
composer install
```

Crear archivo de ambiente (.env copia de .env.example) para todos los proyectos

En la app 'restaurant' generar app key:

```
php artisan key:gen
```

En la app 'ms-kitchen', 'ms-market', 'ms-warehouse' editar .env con los datos de conexión a mysql (ver config de docker para datos de conexión):

Agregar a (.env) en 'ms-market'
```
SERVICE_BASE_URL=https://recruitment.alegra.com
```
Agregar a (.env) en 'ms-warehouse'
```
SERVICE_BASE_URL=http://market.restaurant.local
```
Agregar a (.env) en 'ms-kitchen'
```
SERVICE_BASE_URL=http://warehouse.restaurant.local
```
Agregar a (.env) en 'restaurant'
```
WAREHOUSE_SERVICE_BASE_URL=http://warehouse.restaurant.local
KITCHEN_SERVICE_BASE_URL=http://kitchen.restaurant.local
MARKET_SERVICE_BASE_URL=http://market.restaurant.local
```

Editar archivo hosts del equipo y agregar:

```
127.0.0.1 restaurant.local
127.0.0.1 warehouse.restaurant.local
127.0.0.1 kitchen.restaurant.local
127.0.0.1 market.restaurant.local
```

Compilar e iniciar docker:
```
docker-compose build && docker-compose up -d 
```

Correr migraciones y/o seeders en los poroyectos:
```
php artisan migrate
php artisan db:seed 
```

Abrir en el navegador: http://restaurant.local


## Demo Online

https://restaurant.nsrichard.com/

ms
https://kitchen.nsrichard.com/
https://warehouse.nsrichard.com/
https://market.nsrichard.com/


## About

Demo realizado por:
Richard Cuizara
nsrichard@outlook.com
