CREATE TABLE T_Articulo(
	TN_Id INT PRIMARY KEY AUTO_INCREMENT,
    TC_Codigo VARCHAR(4) NOT NULL,
    TC_Formato VARCHAR(10) NOT NULL,
    TC_Archivo TEXT NOT NULL,
    TC_Descripcion VARCHAR(400) NOT NULL,
    TF_Precio FLOAT NOT NULL
);

CREATE TABLE T_Categoria(
	TN_Id INT PRIMARY KEY AUTO_INCREMENT,
    TC_Nombre VARCHAR(20) NOT NULL
);

CREATE TABLE T_Oferta(
	TN_Id INT PRIMARY KEY AUTO_INCREMENT,
    TD_Fecha_Inicio DATE NOT NULL,
    TD_Fecha_Fin DATE NOT NULL,
    TN_Descuento INT NOT NULL
);

CREATE TABLE T_Articulo_Oferta(
	TN_Id_Articulo INT,
    TN_Id_Oferta INT,
    FOREIGN KEY (TN_Id_Articulo) REFERENCES T_Articulo(TN_Id),
    FOREIGN KEY (TN_Id_Oferta) REFERENCES T_Oferta(TN_Id)
);

CREATE TABLE T_Articulo_Categoria(
	TN_Id_Articulo INT,
    TN_Id_Categoria INT,
    FOREIGN KEY (TN_Id_Articulo) REFERENCES T_Articulo(TN_Id),
    FOREIGN KEY (TN_Id_Categoria) REFERENCES T_Categoria(TN_Id)
);

CREATE TABLE T_Articulos_Vistos(
	TN_Id INT AUTO_INCREMENT,
    TN_Id_Articulo INT,
    TN_Veces_Visto INT,
    PRIMARY KEY (TN_Id),
    FOREIGN KEY (TN_Id_Articulo) REFERENCES T_Articulo(TN_Id)
);


-- PROCEDIMIENTOS ALMACENADOS
CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_get_articulos`()
BEGIN

	SELECT TN_Id, TC_Codigo, TC_Formato, TC_Archivo, TC_Descripcion, TF_Precio
    FROM t_articulo;

END

CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_create_new_articulo`(
	Formato VARCHAR(10), Archivo TEXT,
    Descripcion VARCHAR(400), Precio FLOAT, Categoria INT
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
        SET @errorNum = 0;
		SELECT @errorNum;
	END;
    
    SET @codeArt = '000';
    SET @countArt = (SELECT COUNT(TN_Id) FROM t_articulo) + 1;
    IF (@countArt > 0 AND @countArt < 10) THEN
		SET @codeArt = CONCAT('000', @countArt);
	ELSE
		IF (@countArt >= 10 AND @countArt < 100) THEN
			SET @codeArt = CONCAT('00', @countArt);
		ELSE
			IF (@countArt >= 100 AND @countArt < 1000) THEN
				SET @codeArt = CONCAT('0', @countArt);
			ELSE
				IF (@countArt >= 1000 AND @countArt < 10000) THEN
					SET @codeArt = CONCAT(@countArt);
                END IF;
            END IF;
        END IF;
	END IF;
    
    INSERT INTO t_articulo(
		TC_Codigo, TC_Formato, TC_Archivo, TC_Descripcion, TF_Precio
    ) VALUES (
		@codeArt, Formato, Archivo, Descripcion, Precio
    );
    
    INSERT INTO t_articulo_categoria(
		TN_Id_Articulo, TN_Id_Categoria
    ) VALUES (
		@countArt, Categoria
    );
    
    SELECT 1;

END

CREATE DEFINER=`laboratorios`@`%` PROCEDURE `sp_get_articulo_by_id`(
	ID_ART INT
)
BEGIN

	SELECT TN_Id, TC_Codigo, TC_Formato, TC_Archivo, TC_Descripcion, TF_Precio
    FROM t_articulo
    WHERE TN_Id = ID_ART;

END
