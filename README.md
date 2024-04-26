
# Microservicio festivos/feriados

Éste microservicio te permite obtener los días festivos de acuerdo al ID de un país

rama: https://github.com/ancorzize0250/holidaysmicroservice

funcionalidades:

funcion para obtener los días festivos registros en base: /holidaysmantum/public/api/list 
función para obtener los días festivos de un país específico: /holidaysmantum/public/api/search 
    ejemplo data:  {"idcountry": 82}

Función para guardar los días festivos de un array:/holidaysmantum/public/api/save 
    Ejemplo data: 
    [ {"id": 103, "name": "Festivo prueba2", "idcountry": 103,   "date": "2023-01-10", "fixed": false }]

Función para actualizar la información de un día festivo:  /holidaysmantum/public/api/update 
    Ejemplo data: 
    { "id": 103,        "name": "Festivo prueba222",        "idcountry": 103,        "date": "2023-01-10",        "fixed": false}

Función para eliminar un día festivo: /holidaysmantum/public/api/destroy 
    Ejemplo data: 
    {"id": 103}



### Instalación de dependecias PHP
composer install


### Conexión base de datos
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=festivo
DB_USERNAME=postgres
DB_PASSWORD=gatostem123

### Requerimientos

- [PHP >= 7.4]
- [Laravel >= 8.83]

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
