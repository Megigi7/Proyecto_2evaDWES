
CREATE TABLE tarea (
    id INT PRIMARY KEY,
    cif VARCHAR(20) NOT NULL,
    cliente VARCHAR(100) NOT NULL,
    tel_contacto VARCHAR(15),
    descripcion VARCHAR(500),
    direccion VARCHAR(200),
    poblacion VARCHAR(100),
    codigo_postal VARCHAR(10),
    provincia VARCHAR(100),
    estado VARCHAR(50),
    empleado VARCHAR(100),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_realizacion DATE,
    anotaciones_anteriores VARCHAR(500),
    anotaciones_posteriores VARCHAR(500),
    ficheros VARCHAR(500)
);

-- Crear la tabla "cliente"
CREATE TABLE cliente (
    id INT PRIMARY KEY,
    cif VARCHAR(20),
    nombre VARCHAR(100),
    telefono VARCHAR(15),
    correo VARCHAR(100),
    cuenta_corriente VARCHAR(34),
    pais VARCHAR(100),
    moneda VARCHAR(10),
    importe_cuota_mensual DECIMAL(10, 2)
);
INSERT INTO cliente (id, cif, nombre, telefono, correo, cuenta_corriente, pais, moneda, importe_cuota_mensual)
VALUES 
(1, 'B12345678', 'ACME Corp', '+34911223344', 'info@acmecorp.com', 'ES9820385778983000760236', 'España', 'EUR', 250.50),
(2, 'A98765432', 'Globex Ltd', '+447700900123', 'contact@globex.com', 'GB29NWBK60161331926819', 'Reino Unido', 'GBP', 150.75);

INSERT INTO tarea (id, cif, cliente, tel_contacto, descripcion, direccion, poblacion, codigo_postal, provincia, estado, empleado, fecha_realizacion, anotaciones_anteriores, anotaciones_posteriores, ficheros)
VALUES 
(1, 'B12345678', 'ACME Corp', '+34911223344', 'Instalación de software', 'Calle Mayor 123', 'Madrid', '28013', 'Madrid', 'Pendiente', 'Juan Pérez', '2025-01-20', 'Cliente solicitó instalación urgente', NULL, 'manual_instalacion.pdf'),
(2, 'A98765432', 'Globex Ltd', '+447700900123', 'Revisión de hardware', '10 Downing Street', 'Londres', 'SW1A 2AA', 'Londres', 'Completado', 'Ana García', '2025-01-10', 'Equipo presentó fallo en disco duro', 'Se solucionó con reemplazo de disco', 'reporte_revision.pdf');
