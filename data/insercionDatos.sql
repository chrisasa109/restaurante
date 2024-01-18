use restaurante;
insert into restaurante values(1, 'restaurante@gmail.com', '123abc', 'Espanha', 'Rua Alameda, 8', '15001');

insert into categoria values(1, 'Bebidas', 'Aguas, refrescos y zumos'),
(2, 'Carne', 'Parte muscular comestible de animales'), 
(3, 'Verduras y hortalizas','Productos frescos de huerto'), 
(4, 'Fruta', 'Productos de plantas y arboles'),
(5, 'Pescado', 'Productos frescos del mar'),
(6, 'Higiene', 'Productos de banho y limpieza'),
(7, 'Congelados', 'Productos conservados a baja temperatura'),
(8, 'Panaderia', 'Panes, postres y reposteria');

-- Productos para la categoria 'Bebidas' (cod_categoria = 1)
INSERT INTO producto VALUES
  (101, 'Agua Mineral', 'Agua mineral natural', 1.5, 100, 1),
  (102, 'Refresco de Cola', 'Refresco de cola carbonatado', 2.0, 80, 1),
  (103, 'Zumo de Naranja', 'Zumo de naranja recien exprimido', 0.75, 50, 1),
  (104, 'Te Verde', 'Te verde antioxidante', 1.0, 60, 1);

-- Productos para la categoria 'Carne' (cod_categoria = 2)
INSERT INTO producto VALUES
  (201, 'Filete de Ternera', 'Filete de ternera magro', 0.3, 30, 2),
  (202, 'Pollo Entero', 'Pollo entero fresco', 1.8, 20, 2),
  (203, 'Chuletas de Cerdo', 'Chuletas de cerdo marinadas', 0.5, 25, 2),
  (204, 'Salchichas de Pollo', 'Salchichas de pollo sin piel', 0.2, 40, 2);

-- Productos para la categoria 'Verduras y hortalizas' (cod_categoria = 3)
INSERT INTO producto VALUES
  (301, 'Lechuga', 'Lechuga fresca para ensaladas', 0.4, 60, 3),
  (302, 'Tomate', 'Tomate rojo y maduro', 0.2, 80, 3),
  (303, 'Zanahorias', 'Zanahorias frescas y crujientes', 0.3, 50, 3),
  (304, 'Calabacin', 'Calabacin verde para cocinar', 0.35, 45, 3);

-- Productos para la categoria 'Fruta' (cod_categoria = 4)
INSERT INTO producto VALUES
  (401, 'Manzanas', 'Manzanas frescas y jugosas', 0.6, 70, 4),
  (402, 'Platanos', 'Platanos maduros y sabrosos', 0.25, 65, 4),
  (403, 'Fresas', 'Fresas rojas y dulces', 0.15, 55, 4),
  (404, 'Pinha', 'Pinha tropical y refrescante', 1.2, 40, 4);

-- Productos para la categoria 'Pescado' (cod_categoria = 5)
INSERT INTO producto VALUES
  (501, 'Salmon Fresco', 'Filete de salmon fresco', 0.8, 30, 5),
  (502, 'Atun en Lata', 'Atun enlatado en aceite', 0.2, 40, 5),
  (503, 'Camarones Pelados', 'Camarones pelados y listos para cocinar', 0.5, 25, 5),
  (504, 'Pulpo Cocido', 'Pulpo cocido y listo para disfrutar', 0.7, 35, 5);

-- Productos para la categoria 'Higiene' (cod_categoria = 6)
INSERT INTO producto VALUES
  (601, 'Jabon de Manos', 'Jabon liquido suave para manos', 0.25, 50, 6),
  (602, 'Bayetas', 'Panho de limpieza ', 0.3, 40, 6),
  (603, 'Papel Higienico', 'Rollo de papel higienico suave', 0.1, 60, 6),
  (604, 'Limpiador Multiusos', 'Limpiador multiusos para el hogar', 0.5, 30, 6);

-- Productos para la categoria 'Congelados' (cod_categoria = 7)
INSERT INTO producto VALUES
  (701, 'Pizza Margarita', 'Pizza con salsa de tomate y mozzarella', 0.9, 20, 7),
  (702, 'Helado de Vainilla', 'Helado de vainilla cremoso', 0.6, 25, 7),
  (703, 'Patatas Fritas', 'Patatas fritas crujientes con sal', 0.4, 35, 7),
  (704, 'Vegetales Congelados', 'Mezcla de vegetales congelados', 0.8, 30, 7);

-- Productos para la categoria 'Panaderia' (cod_categoria = 8)
INSERT INTO producto VALUES
  (801, 'Pan Integral', 'Pan integral de grano entero', 0.35, 40, 8),
  (802, 'Pastel de Chocolate', 'Pastel de chocolate esponjoso', 1.0, 15, 8),
  (803, 'Croissants', 'Croissants recien horneados', 0.2, 50, 8),
  (804, 'Galletas de Avena', 'Galletas de avena con pasas', 0.15, 60, 8);
