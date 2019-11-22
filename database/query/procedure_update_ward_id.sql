//SET SQL_SAFE_UPDATES=0;
DELIMITER $$
CREATE PROCEDURE update_ward_id_for_checkeds()
BEGIN
   DECLARE cursor_List_isdone BOOLEAN DEFAULT FALSE;
   
   DECLARE ward_id INT;
   DECLARE cursor_List_ward_id CURSOR FOR 
      SELECT id
      FROM wards
    ;
   
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET cursor_List_isdone = TRUE;
   
   OPEN cursor_List_ward_id;

   loop_List: LOOP
      FETCH cursor_List_ward_id INTO ward_id;
      
      IF cursor_List_isdone THEN
         LEAVE loop_List;
      END IF;
      
      UPDATE checkeds SET ward_id = ward_id 
      WHERE id IN (
	  SELECT checkeds.id FROM food_safeties INNER JOIN checkeds ON checkeds.food_safety_id = food_safeties.id WHERE food_safeties.ward_id = ward_id);

   END LOOP loop_List;

   CLOSE cursor_List_ward_id;
END

$$

DELIMITER ;

CALL update_ward_id_for_checkeds();