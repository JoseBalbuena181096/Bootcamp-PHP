# Base de datos

Una base de datos es una colección de datos que se almacenan en un ordenador o en una red de ordenadores.

## SQL

SQL (Structured Query Language) es un lenguaje de programación que se utiliza para gestionar y manipular bases de datos.

## MySQL

MySQL es un sistema de gestión de base de datos relacional (RDBMS) que utiliza el lenguaje SQL para gestionar y manipular las bases de datos.

## Schema

Un schema es una colección de tablas que se almacenan en una base de datos.

## Tablas

Una tabla es una colección de datos que se almacenan en una base de datos. Cada tabla consta de filas y columnas.

## Columnas

Una columna es una colección de datos que se almacenan en una tabla. Cada columna consta de filas y columnas.

## Filas

Una fila es una colección de datos que se almacenan en una tabla. Cada fila consta de filas y columnas.

## Tipos de datos

VARCHAR
INT
FLOAT
DATE

## Crear nuestro primer schema

```sql
CREATE SCHEMA `pub`;
```

## Crear nuestra primera tabla

```SQL
CREATE TABLE beer(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    alcohol DECIMAL(3, 1) NOT NULL
);
```

## Insertar datos

```SQL
INSERT INTO beer (name, alcohol) VALUES ('Stout', 6.7);
```

## Insertar varios datos

```SQL
INSERT INTO beer (name, alcohol) VALUES
('Poter', 5.8),
('Blonde Ale', 4.3),
('Blonde Ale 2', 4.3);
```

## Consultar datos

```SQL
SELECT * FROM beer;
```

## Consultar datos de algunas columnas

```SQL
SELECT name, alcohol FROM beer;
```

## Consultar datos de una columna con un alias

```SQL
SELECT name AS nombre, alcohol AS alcohol FROM beer;
```

## Consultar con una multiplicación

```SQL
SELECT name, alcohol * 0.9 as 'rebaja alcohol' FROM beer;
```

## Instrucciión where

Un solo registro por id

```SQL
SELECT * FROM beer WHERE id = 1;
```

Varios registros por ids

```SQL
SELECT * FROM beer WHERE id IN (1, 2, 3);
```

con un alcohol definido

```SQL
SELECT * FROM beer WHERE alcohol = 4.3;
```

con un alcohol mayor a 4.3

```SQL
SELECT * FROM beer WHERE alcohol > 4.3;
```

por nombre que comienza con 'Blon'

```SQL
SELECT * FROM beer WHERE name LIKE 'Blon%';
```

las que terminan con 'a'

```SQL
SELECT * FROM beer WHERE name LIKE '%a';
```

que contienen 'ale'

```SQL
SELECT * FROM beer WHERE name LIKE 'B%E';
```

## ORDER BY

ordenar elementos por un campo de forma descendente

```SQL
SELECT * FROM beer
ORDER BY name DESC;
```

ordenar por alcohol y en caso de empate ordenar por nombre por defecto es ascendente

```SQL
SELECT * FROM beer
ORDER BY alcohol, name;
```

## group by

Agrupar información y funciones de agregación, una funcion de agregación es una funcion que opera sobre un conjunto de valores y devuelve un solo valor.

```SQL
SELECT alcohol, COUNT(*) FROM beer
GROUP BY alcohol;
```

Sumar alcohol por nombre

```SQL
SELECT name, SUM(alcohol) FROM beer
GROUP BY name;
```

Cerveza con alcohol maximo

```SQL
SELECT name, MAX(alcohol) FROM beer
GROUP BY name;
```

Cerveza con alcohol minimo

```SQL
SELECT name, MIN(alcohol) FROM beer
GROUP BY name;
```

## HAVING

```SQL
SELECT alcohol, COUNT(*) FROM beer
GROUP BY alcohol
HAVING COUNT(*) > 1;
```

## UPDATE

Modificar un registro

Modificar el alcohol de la cerveza con id 1

```SQL
UPDATE beer
SET alcohol = 7.7
WHERE id = 1;
```

Modificar a varios registros

```SQL
UPDATE beer
SET alcohol = alcohol + 1.1
WHERE id IN (1, 2, 3);
```

Actualizar varios campos

```SQL
UPDATE beer
SET alcohol = 11,
    name = 'Imperial Stout'
WHERE id = 4;
```

## DELETE

Eliminar un registro

```SQL
DELETE FROM beer WHERE id = 5;
```

Eliminar varios registros

```SQL
DELETE FROM beer WHERE
name = 'IPA';
```

## FOREIGN KEY

Son llaves que se conectan con otra tabla

Creamos otra tabla brand

```SQL
CREATE TABLE brand(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL
);
```

Insertamos dos marcas de cerveza Minerva y Fuller

```SQL
INSERT INTO brand (name) VALUES ('Minerva'), ('Fuller');
```

Modificamos la tabla beer para agregar la foreign key

```SQL
ALTER TABLE beer
ADD idBrand INT;
```

Especificar que sera una llave foranea

```SQL
ALTER TABLE beer
ADD CONSTRAINT fk_brand
FOREIGN KEY (idBrand) REFERENCES brand(id);
```

Para que todas las cervezas tengan una marca

```SQL
UPDATE beer
SET idBrand = 1;
```

Actualizamos la cerveza con id 4 a la marca Fuller

```SQL
UPDATE beer
SET idBrand = 2
WHERE id = 4;
```

## JOIN

Unir tablas, es una operación que une dos tablas en una sola tabla.

```SQL

SELECT br.name, br.alcohol, b.name AS 'Marca'
FROM beer AS br
JOIN brand AS b ON br.idBrand = b.id;
```

Solo las de id 1

```SQL
SELECT br.name, br.alcohol, b.name AS 'Marca'
FROM beer AS br
JOIN brand AS b ON br.idBrand = b.id
WHERE br.id = 1;
```

Y ordenamos por nombre

```SQL
SELECT br.name, br.alcohol, b.name AS 'Marca'
FROM beer AS br
JOIN brand AS b ON br.idBrand = b.id
WHERE br.id = 1
ORDER BY br.name;
```

Insertamos una cervesa sin marca

```SQL
INSERT INTO beer (name, alcohol) VALUES ('Stout', 6.7);
```

Y traemos todos los registros

```SQL
SELECT br.name, br.alcohol, b.name AS 'Marca'
FROM beer AS br
LEFT JOIN  brand AS b ON br.idBrand = b.id;
```
