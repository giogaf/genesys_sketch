<?php

require_once '../../vendors/adodb5/adodb.inc.php';
require_once '../../vendors/adodb5/adodb-active-record.inc.php';

date_default_timezone_set("America/Bogota");

 
$db = NewADOConnection('mysql://gg:gg@localhost/genesys');
 

/*
* Enlace Active Record - Mysql
*/
ADOdb_Active_Record::SetDatabaseAdapter($db);
 
 
/*
* tabla empleados
*/
$db->Execute("CREATE TABLE `genesys`.`empleados` ( 
            `id` INT(4) NOT NULL AUTO_INCREMENT COMMENT 'id de empleado' ,
            `cedula` VARCHAR(12) NOT NULL COMMENT 'cédula empleado' , 
            `nombres` VARCHAR(60) NOT NULL COMMENT 'nombre de empleado' , 
            `apellidos` VARCHAR(60) NOT NULL COMMENT 'apellidos de empleado' ,
            `cargo` VARCHAR(60) NOT NULL COMMENT 'cargo de empleado' , 
            `id_dependencia` INT(3) NOT NULL COMMENT 'id dependencia de empleado' ,           
            `tipo` VARCHAR(60) NOT NULL COMMENT 'tipo  de empleado (misional,admin,visitante)' ,            
            `sexo` VARCHAR(1) NOT NULL COMMENT 'genero de empleado' , 
            PRIMARY KEY (`id`)) ENGINE = InnoDB;
           ");

$db->Execute("CREATE TABLE `genesys`.`turnos` ( 
            `id` INT(8) NOT NULL AUTO_INCREMENT COMMENT 'id registro jornada' ,
            `id_empleado` INT(4) NOT NULL COMMENT 'id empleado con novedad' , 
            `dia` DATE NULL COMMENT 'fecha novedad empleado' , 
            `tipo_turno` VARCHAR(1) NULL COMMENT 'entrada (e) / salida (s) ? de empleado' , 
            `hora` TIME  NULL COMMENT 'hora novedad empleado' ,
            PRIMARY KEY (`id`)) ENGINE = InnoDB;
           ");
$db->Execute("CREATE TABLE `genesys`.`dependencias` (
            `id` INT(3) NOT NULL AUTO_INCREMENT COMMENT 'id dependencia' ,
            `nombre` VARCHAR(60) NULL COMMENT 'nombre dependencia ' , 
			PRIMARY KEY (`id`)) ENGINE = InnoDB;
           ");