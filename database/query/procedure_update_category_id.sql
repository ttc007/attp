SET SQL_SAFE_UPDATES=0;
DELIMITER $$
CREATE PROCEDURE update_category_id_for_checkeds()
BEGIN
   DECLARE cursor_List_isdone BOOLEAN DEFAULT FALSE;
   
   DECLARE category_id INT;
   DECLARE cursor_List_category_id CURSOR FOR 
      SELECT id
      FROM categories WHERE hierarchy IN ("ward", "hql")
    ;
   
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET cursor_List_isdone = TRUE;
   
   OPEN cursor_List_category_id;

   loop_List: LOOP
      FETCH cursor_List_category_id INTO category_id;
      
      IF cursor_List_isdone THEN
         LEAVE loop_List;
      END IF;
      
      UPDATE checkeds SET category_id = category_id 
      WHERE id IN (
	  SELECT checkeds.id FROM food_safeties INNER JOIN checkeds ON checkeds.food_safety_id = food_safeties.id WHERE food_safeties.categoryb2_id = category_id);

   END LOOP loop_List;

   CLOSE cursor_List_category_id;
END

$$

DELIMITER ;

CALL update_category_id_for_checkeds();