CREATE DATABASE IF NOT EXISTS serviciosTecnicos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE serviciosTecnicos;

-- tabla clientes
CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  telefono VARCHAR(50),
  email VARCHAR(150),
  direccion VARCHAR(255),
  documento VARCHAR(100),
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla tecnicos
CREATE TABLE tecnicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(150) NOT NULL,
  email VARCHAR(150),
  telefono VARCHAR(50),
  activo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla marcas
CREATE TABLE marcas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla equipos
CREATE TABLE equipos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  marca_id INT NOT NULL,
  serial VARCHAR(120),
  modelo VARCHAR(150),
  tipo VARCHAR(50), 
  observacion TEXT,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (marca_id) REFERENCES marcas(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla servicio_estados 
CREATE TABLE servicio_estados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  clave VARCHAR(50) NOT NULL, 
  nombre VARCHAR(100) NOT NULL,
  orden INT DEFAULT 0,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla servicios
CREATE TABLE servicios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  folio VARCHAR(50) NOT NULL UNIQUE, 
  cliente_id INT NOT NULL,
  equipo_id INT NOT NULL,
  tecnico_id INT DEFAULT NULL,
  estado_actual_id INT NOT NULL,
  fecha_recibido DATETIME NOT NULL,
  fecha_entrega DATETIME DEFAULT NULL,
  problema_informado TEXT NOT NULL,
  diagnostico TEXT DEFAULT NULL,
  trabajo_realizado TEXT DEFAULT NULL,
  precio_estimado DECIMAL(10,2) DEFAULT NULL,
  total DECIMAL(10,2) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (equipo_id) REFERENCES equipos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (tecnico_id) REFERENCES tecnicos(id) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (estado_actual_id) REFERENCES servicio_estados(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- tabla historial de estados 
CREATE TABLE servicio_estado_hist (
  id INT AUTO_INCREMENT PRIMARY KEY,
  servicio_id INT NOT NULL,
  estado_id INT NOT NULL,
  cambiado_por_tecnico_id INT DEFAULT NULL,
  fecha_cambio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  nota TEXT,
  FOREIGN KEY (servicio_id) REFERENCES servicios(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (estado_id) REFERENCES servicio_estados(id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (cambiado_por_tecnico_id) REFERENCES tecnicos(id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- datos iniciales de estados
INSERT INTO servicio_estados (clave, nombre, orden) VALUES
('recibido','Recibido',1),
('reparando','En reparación',2),
('pendiente_repuestos','Pendiente repuestos',3),
('finalizado','Finalizado',4),
('entregado','Entregado',5);
