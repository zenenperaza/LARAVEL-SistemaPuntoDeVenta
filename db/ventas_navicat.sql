/*
 Navicat Premium Data Transfer

 Source Server         : ventas
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : ventas

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 01/08/2023 01:26:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `estatus` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_ingreso
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ingreso`;
CREATE TABLE `detalle_ingreso`  (
  `id_detalle_ingreso` int NOT NULL AUTO_INCREMENT,
  `id_ingreso` int NULL DEFAULT NULL,
  `id_producto` int NULL DEFAULT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `precio_compra` decimal(11, 2) NULL DEFAULT NULL,
  `precio_venta` decimal(11, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_ingreso`) USING BTREE,
  INDEX `fk_detalle_ingreso`(`id_ingreso` ASC) USING BTREE,
  INDEX `fk_detalle_producto`(`id_producto` ASC) USING BTREE,
  CONSTRAINT `fk_detalle_ingreso` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_ingreso
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_venta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE `detalle_venta`  (
  `id_detalle_venta` int NOT NULL AUTO_INCREMENT,
  `id_venta` int NULL DEFAULT NULL,
  `id_producto` int NULL DEFAULT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `precio_venta` decimal(11, 2) NULL DEFAULT NULL,
  `descuento` decimal(11, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_venta`) USING BTREE,
  INDEX `fk_venta_producto`(`id_producto` ASC) USING BTREE,
  INDEX `fk_detalle_venta`(`id_venta` ASC) USING BTREE,
  CONSTRAINT `fk_detalle_venta` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_venta_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_venta
-- ----------------------------

-- ----------------------------
-- Table structure for ingreso
-- ----------------------------
DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE `ingreso`  (
  `id_ingreso` int NOT NULL AUTO_INCREMENT,
  `id_proveedor` int NULL DEFAULT NULL,
  `tipo_comprobante` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `num_comprobante` varchar(10) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `fecha_hora` datetime NULL DEFAULT NULL,
  `impuesto` decimal(10, 2) NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ingreso
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `tipo_persona` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `tipo_documento` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `num_documento` varchar(70) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(70) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(15) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persona
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `codigo` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `stock` int NULL DEFAULT NULL,
  `descripcion` varchar(512) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `image` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `estatus` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE,
  INDEX `fk_categoria_producto`(`id_categoria` ASC) USING BTREE,
  CONSTRAINT `fk_categoria_producto` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NULL DEFAULT NULL,
  `tipo_comprobante` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `num_comprobante` varchar(10) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  `fecha_hora` datetime NULL DEFAULT NULL,
  `impuesto` decimal(4, 2) NULL DEFAULT NULL,
  `total_venta` decimal(11, 2) NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_venta`) USING BTREE,
  INDEX `fk_venta_cliente`(`id_cliente` ASC) USING BTREE,
  CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = armscii8 COLLATE = armscii8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of venta
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
