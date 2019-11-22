DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `export_month_of_ward`(
    IN ward_id INT,
    IN monthCheck VARCHAR(2),
    OUT listResponse varchar(4000)
)
BEGIN
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE category_id INT DEFAULT 0;
    DECLARE pass INT DEFAULT 0;
    DECLARE no_pass INT DEFAULT 0;
    DECLARE no_check INT DEFAULT 0;
    DECLARE total INT DEFAULT 0;
 
    -- declare cursor for employee email
    DEClARE curExportMonth CURSOR FOR 
		SELECT IFNULL(categories.id,0) AS category_id, 
			SUM(CASE WHEN result = "Đạt" THEN 1 ELSE 0 END) AS cnt_pass,
			SUM(CASE WHEN result = "Chưa đạt" THEN 1 ELSE 0 END) AS cnt_no_pass,
			SUM(CASE WHEN IFNULL(result,1) = 1 THEN 1 ELSE 0 END) AS cnt_no_check,
			COUNT(food_safeties.id) AS total
		FROM 2730767_attp.food_safeties LEFT JOIN (SELECT id,name FROM 2730767_attp.categories WHERE hierarchy="ward") AS categories ON categories.id = food_safeties.categoryb2_id
		LEFT JOIN (SELECT id,result,food_safety_id FROM 2730767_attp.checkeds GROUP BY food_safety_id) AS checkedGroup ON checkedGroup.food_safety_id = food_safeties.id
		WHERE food_safeties.ward_id = ward_id GROUP BY categories.name ORDER BY categories.name ASC;
 
    -- declare NOT FOUND handler
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
	SET listResponse = "";
    
    OPEN curExportMonth;
    
    getData: LOOP
        FETCH curExportMonth INTO category_id, pass, no_pass, no_check, total;
        IF finished = 1 THEN 
            LEAVE getData;
        END IF;
        -- build email list
        SET listResponse = CONCAT( category_id, ",", pass, ",", no_pass, ",", no_check, ",", total, ";" , listResponse);
    END LOOP getData;
    CLOSE curExportMonth;
END
$$
DELIMITER ;