-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
-- -----------------------------------------------------
-- Schema sublimade_fashion_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `sublimade_fashion_db` ;

-- -----------------------------------------------------
-- Schema sublimade_fashion_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sublimade_fashion_db` DEFAULT CHARACTER SET latin1 ;
USE `sublimade_fashion_db` ;

-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`personas` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`personas` (
  `id_persona` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` CHAR(30) NOT NULL,
  `apellido` CHAR(50) NOT NULL,
  `tel_casa` VARCHAR(24) NULL DEFAULT NULL,
  `tel_celular` VARCHAR(24) NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `cp` INT NULL DEFAULT NULL,
  `f_nacimiento` DATETIME NULL DEFAULT NULL,
  `sexo` CHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  INDEX `nombre` (`nombre` ASC),
  INDEX `apellido` (`apellido` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`usuarios` (
  `id_persona` INT(11) NOT NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  `tipo_usuario` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE INDEX `nom_usuario_UNIQUE` (`e-mail` ASC),
  INDEX `fk_usuarios_personas1_idx` (`id_persona` ASC),
  CONSTRAINT `fk_usuarios_personas1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `sublimade_fashion_db`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`carritos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`carritos` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`carritos` (
  `id_carrito` INT(11) NOT NULL,
  `sub_total` DOUBLE NULL,
  PRIMARY KEY (`id_carrito`),
  CONSTRAINT `fk_carritos_usuarios1`
    FOREIGN KEY (`id_carrito`)
    REFERENCES `sublimade_fashion_db`.`usuarios` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`materiales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`materiales` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`materiales` (
  `id_material` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
  `color` VARCHAR(25) NOT NULL,
  `detalles` VARCHAR(100) NULL DEFAULT '---',
  PRIMARY KEY (`id_material`),
  INDEX `nombre` (`nombre` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`inventario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`inventario` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`inventario` (
  `id_material` INT(11) NOT NULL,
  `unidad_medida` CHAR(11) NOT NULL,
  `cantidad` DOUBLE NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_material`),
  INDEX `id_material` (`id_material` ASC),
  CONSTRAINT `inventario_ibfk_1`
    FOREIGN KEY (`id_material`)
    REFERENCES `sublimade_fashion_db`.`materiales` (`id_material`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`proveedores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`proveedores` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`proveedores` (
  `id_proveedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(35) NOT NULL,
  `tel` VARCHAR(25) NOT NULL,
  `direccion` VARCHAR(60) NOT NULL,
  `rfc` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`),
  INDEX `nombre` (`nombre` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`entradas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`entradas` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`entradas` (
  `id_entrada` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidad` DOUBLE NOT NULL DEFAULT '0',
  `id_material` INT(11) NOT NULL,
  `proveedores_id_proveedor` INT(11) NOT NULL,
  PRIMARY KEY (`id_entrada`),
  INDEX `fk_ENTRADAS_inventario_idx` (`id_material` ASC),
  INDEX `fk_entradas_proveedores1_idx` (`proveedores_id_proveedor` ASC),
  CONSTRAINT `fk_ENTRADAS_inventario`
    FOREIGN KEY (`id_material`)
    REFERENCES `sublimade_fashion_db`.`inventario` (`id_material`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entradas_proveedores1`
    FOREIGN KEY (`proveedores_id_proveedor`)
    REFERENCES `sublimade_fashion_db`.`proveedores` (`id_proveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`reportes_entradas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`reportes_entradas` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`reportes_entradas` (
  `id_reporte` INT NOT NULL,
  `entradas_id_entrada` INT(11) NOT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`id_reporte`),
  INDEX `fk_reportes_entradas_entradas1_idx` (`entradas_id_entrada` ASC),
  CONSTRAINT `fk_reportes_entradas_entradas1`
    FOREIGN KEY (`entradas_id_entrada`)
    REFERENCES `sublimade_fashion_db`.`entradas` (`id_entrada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`categorias` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`categorias` (
  `categoria` CHAR(20) NOT NULL,
  PRIMARY KEY (`categoria`),
  UNIQUE INDEX `categoria` (`categoria` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`disenos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`disenos` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`disenos` (
  `id_diseno` INT(11) NOT NULL AUTO_INCREMENT,
  `categoria` CHAR(20) NOT NULL,
  `nombre` CHAR(20) NOT NULL,
  `diseno` LONGBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`id_diseno`),
  INDEX `diseno_categoria` (`categoria` ASC),
  INDEX `nombre` (`nombre` ASC),
  CONSTRAINT `diseno_categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `sublimade_fashion_db`.`categorias` (`categoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`tipos_producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`tipos_producto` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`tipos_producto` (
  `id_tipo_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` CHAR(25) NOT NULL,
  PRIMARY KEY (`id_tipo_producto`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`productos` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`productos` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NULL DEFAULT NULL,
  `costo_unitario` DOUBLE NOT NULL DEFAULT '0',
  `id_diseno` INT(11) NOT NULL,
  `id_tipo_producto` INT(11) NOT NULL,
  `tamano` VARCHAR(45) NULL DEFAULT NULL,
  `sexo` CHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  INDEX `producto_diseno` (`id_diseno` ASC),
  INDEX `producto_tipo_producto` (`id_tipo_producto` ASC),
  INDEX `nombre` (`nombre` ASC),
  CONSTRAINT `producto_diseno`
    FOREIGN KEY (`id_diseno`)
    REFERENCES `sublimade_fashion_db`.`disenos` (`id_diseno`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `producto_tipo_producto`
    FOREIGN KEY (`id_tipo_producto`)
    REFERENCES `sublimade_fashion_db`.`tipos_producto` (`id_tipo_producto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`carritos_has_productos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`carritos_has_productos` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`carritos_has_productos` (
  `id_carrito` INT(11) NOT NULL,
  `id_producto` INT(11) NOT NULL,
  `cantidad` SMALLINT NULL,
  `total` DOUBLE NULL,
  `talla` CHAR(10) NULL,
  PRIMARY KEY (`id_carrito`, `id_producto`),
  INDEX `fk_carritos_has_productos_productos1_idx` (`id_producto` ASC),
  INDEX `fk_carritos_has_productos_carritos1_idx` (`id_carrito` ASC),
  CONSTRAINT `fk_carritos_has_productos_carritos1`
    FOREIGN KEY (`id_carrito`)
    REFERENCES `sublimade_fashion_db`.`carritos` (`id_carrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carritos_has_productos_productos1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sublimade_fashion_db`.`productos` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `sublimade_fashion_db` ;

-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`clientes` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`clientes` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `cliente_persona` (`id_persona` ASC),
  CONSTRAINT `cliente_persona`
    FOREIGN KEY (`id_persona`)
    REFERENCES `sublimade_fashion_db`.`personas` (`id_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`pedidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`pedidos` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`pedidos` (
  `reg_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NOT NULL,
  `fecha_pedido` DATE NOT NULL,
  `fecha_entrega` DATE NULL,
  `detalles` TEXT NULL DEFAULT NULL,
  `estado` CHAR(20) NOT NULL DEFAULT 'PENDIENTE',
  `fecha_real_entrega` DATE NULL DEFAULT '1111-11-11',
  PRIMARY KEY (`reg_pedido`),
  INDEX `pedido_cliente` (`id_cliente` ASC),
  CONSTRAINT `pedido_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `sublimade_fashion_db`.`clientes` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`detalles_pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`detalles_pedido` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`detalles_pedido` (
  `reg_pedido` INT(11) NOT NULL,
  `id_producto` INT(11) NOT NULL,
  `talla` CHAR(10) NULL,
  `cantidad` SMALLINT(6) NOT NULL DEFAULT '0',
  `total` DOUBLE NOT NULL DEFAULT '0',
  `descuento` DOUBLE NULL DEFAULT '0',
  INDEX `fk_detalles_pedido_productos1_idx` (`id_producto` ASC),
  INDEX `fk_detalles_pedido_pedidos1` (`reg_pedido` ASC),
  CONSTRAINT `fk_detalles_pedido_pedidos1`
    FOREIGN KEY (`reg_pedido`)
    REFERENCES `sublimade_fashion_db`.`pedidos` (`reg_pedido`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_detalles_pedido_productos1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `sublimade_fashion_db`.`productos` (`id_producto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`disenos_clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`disenos_clientes` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`disenos_clientes` (
  `reg` INT(11) NOT NULL AUTO_INCREMENT,
  `id_diseno` INT(11) NOT NULL,
  `id_cliente` INT(11) NOT NULL,
  PRIMARY KEY (`reg`, `id_diseno`, `id_cliente`),
  INDEX `fk_disenos_clientes_diseños1_idx` (`id_diseno` ASC),
  INDEX `fk_disenos_clientes_clientes1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_disenos_clientes_clientes1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `sublimade_fashion_db`.`clientes` (`id_cliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_disenos_clientes_disenos1`
    FOREIGN KEY (`id_diseno`)
    REFERENCES `sublimade_fashion_db`.`disenos` (`id_diseno`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`empleados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`empleados` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`empleados` (
  `id_empleado` INT(11) NOT NULL AUTO_INCREMENT,
  `id_persona` INT(11) NOT NULL,
  `nss` VARCHAR(20) NULL DEFAULT NULL,
  `puesto` VARCHAR(45) NOT NULL,
  `rfc` VARCHAR(45) NULL,
  PRIMARY KEY (`id_empleado`),
  INDEX `empleado_persona` (`id_persona` ASC),
  CONSTRAINT `empleado_persona`
    FOREIGN KEY (`id_persona`)
    REFERENCES `sublimade_fashion_db`.`personas` (`id_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`proveedor_material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`proveedor_material` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`proveedor_material` (
  `reg` INT(11) NOT NULL AUTO_INCREMENT,
  `id_material` INT(11) NOT NULL,
  `id_proveedor` INT(11) NOT NULL,
  `costo` DOUBLE NULL DEFAULT '0',
  PRIMARY KEY (`reg`),
  INDEX `id_material` (`id_material` ASC),
  INDEX `id_proveedor` (`id_proveedor` ASC),
  CONSTRAINT `proveedor_material_ibfk_1`
    FOREIGN KEY (`id_material`)
    REFERENCES `sublimade_fashion_db`.`materiales` (`id_material`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `proveedor_material_ibfk_2`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `sublimade_fashion_db`.`proveedores` (`id_proveedor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `sublimade_fashion_db`.`salidas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sublimade_fashion_db`.`salidas` ;

CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`salidas` (
  `id_salida` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `cantidad` DOUBLE NOT NULL,
  `pedidos_reg_pedido` INT(11) NOT NULL,
  `inventario_id_material` INT(11) NOT NULL,
  PRIMARY KEY (`id_salida`),
  INDEX `fk_salidas_pedidos1_idx` (`pedidos_reg_pedido` ASC),
  INDEX `fk_salidas_inventario1_idx` (`inventario_id_material` ASC),
  CONSTRAINT `fk_salidas_pedidos1`
    FOREIGN KEY (`pedidos_reg_pedido`)
    REFERENCES `sublimade_fashion_db`.`pedidos` (`reg_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_salidas_inventario1`
    FOREIGN KEY (`inventario_id_material`)
    REFERENCES `sublimade_fashion_db`.`inventario` (`id_material`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `sublimade_fashion_db` ;

-- -----------------------------------------------------
-- Placeholder table for view `sublimade_fashion_db`.`usuario_pass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sublimade_fashion_db`.`usuario_pass` (`nom_usuario` INT, `pass` INT);

-- -----------------------------------------------------
-- View `sublimade_fashion_db`.`usuario_pass`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `sublimade_fashion_db`.`usuario_pass` ;
DROP TABLE IF EXISTS `sublimade_fashion_db`.`usuario_pass`;
USE `sublimade_fashion_db`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sublimade_fashion_db`.`usuario_pass` AS select `sublimade_fashion_db`.`usuarios`.`nom_usuario` AS `nom_usuario`,`sublimade_fashion_db`.`usuarios`.`pass` AS `pass` from `sublimade_fashion_db`.`usuarios`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
