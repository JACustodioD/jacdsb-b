CREATE DATABASE Tienda;

USE Tienda;

CREATE TABLE Usuario(
	email varchar (50) primary key,
	nombre varchar (80),
	apellidoP varchar (20),
	apellidoM varchar (20),
	genero varchar (10),
	direccion text
)ENGINE=InnoDB;

INSERT INTO Usuario VALUES ('jacustodiod@hotmail.com','Jose Alberto','Custodio','Diego','Masculino','ni idea pero bueno');
INSERT INTO Usuario VALUES ('jacustodiod@gmail.com','Jose Alberto','Custodio','Diego','Masculino','ni idea pero bueno');

CREATE TABLE Login(
	usuario varchar (50) primary key,
	password varchar (30),
	tipo_usuario varchar(15),
	estado_usuario boolean,
	CONSTRAINT Login FOREIGN KEY (usuario) REFERENCES Usuario (email) 
)ENGINE=InnoDB;

INSERT INTO Login VALUES ('jacustodiod@hotmail.com','DARK','administrador','1');
INSERT INTO Login VALUES ('jacustodiod@gmail.com','DARK','usuario','1');


CREATE TABLE Producto(
	idProducto int auto_increment primary key,
	descripcion text,
	precio double,
	tipoProducto varchar (10),
	imagen varchar (100),
	nombre varchar (200)
)ENGINE=InnoDB;



INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Bolsa rosa de channel','200','Bolsa','rosa1.jpg','Channel Pink');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Mochila de color negro con 5 bolsas y tela resistente','400','Mochila','mochila1.jpg','Mochila Fornite');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Bolsa color fiusha de tamaño pequeño y piel','400','Bolsa','rosa2.jpg','Small Fushia');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Mochila clasica de mezclilla color azul con 3 bolsas','240','Mochila','mochila2.jpg','Casual blue');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Bolsa tipica color negro','240','Bolsa','bolsa3.jpg','Normal Black');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Mochila con solo una bolsa y divertidas caras','150','Mochila','mochila3.jpg','Funny Face');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Bolsa purpura amplia con espacio para todo','400','Bolsa','bolsa4.jpeg','Purple bag');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Mochila pequeña con 4 bolsas y llavero de oso','300','Mochila','mochila4.jpg','Black Sensation');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Bolsa con colores extravagantes, elegante y casual','150','Bolsa','bolsa5.jpg','Stren Bag');
INSERT INTO Producto (descripcion,precio,tipoProducto,imagen,nombre) VALUES ('Mochila color espacio con lapizera incluida','200','Mochila','mochila5.jpeg','Space return');


CREATE TABLE Carrito(
	idCarrito int primary key auto_increment,
	usuario varchar (50),
	producto int,
	cantidad int,
	total double,
	CONSTRAINT Carrito FOREIGN KEY (producto) REFERENCES Producto (idProducto)
)ENGINE=InnoDB;



SELECT P.imagen, P.nombre, C.cantidad, P.precio, C.total FROM Producto P inner join Carrito C ON P.idProducto = C.producto WHERE C.usuario = 'jacustodiod@gmail.com';