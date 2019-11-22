USE db_test;
SELECT IFNULL(categories.name, "Không có nhóm") AS name, 
SUM(CASE WHEN result = "Đạt" THEN 1 ELSE 0 END) AS cnt_pass,
SUM(CASE WHEN result = "Chưa đạt" THEN 1 ELSE 0 END) AS cnt_no_pass,
SUM(CASE WHEN IFNULL(result,1) = 1 THEN 1 ELSE 0 END) AS cnt_no_check,
COUNT(food_safeties.id) AS total
FROM food_safeties LEFT JOIN (SELECT id,name FROM categories WHERE hierarchy="ward") AS categories ON categories.id = food_safeties.categoryb2_id
LEFT JOIN (SELECT id,result,food_safety_id FROM checkeds GROUP BY food_safety_id) AS checkedGroup ON checkedGroup.food_safety_id = food_safeties.id
WHERE food_safeties.ward_id = 1 GROUP BY categories.name ORDER BY categories.name ASC;