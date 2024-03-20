CREATE DEFINER= `root`@`localhost` PROCEDURE `sp_listar_noticias_filtro`(
IN param_campo VARCHAR (255),
IN param_valor VARCHAR (265)
)

BEGIN 

	SET @s = CONCAT ("SELECT id, titulo, texto ,categoria, fecha, imagen 
    FROM noticias WHERE",param_campo," LIKE CONCAT ('%", param_valor ,"%')");
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    
END;