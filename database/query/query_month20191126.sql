use 2730767_attp;
SELECT wards.name AS ward, categories.name AS category, sub_checkeds.result, sub_checkeds.quarter, COUNT(sub_checkeds.result) as cnt
FROM categories
LEFT JOIN (
	SELECT food_safeties.categoryb2_id AS category_id, checkeds.result, checkeds.year, checkeds.month, food_safeties.ward_id, CEIL(checkeds.month / 3) AS quarter
    FROM checkeds 
    INNER JOIN food_safeties ON food_safeties.id= checkeds.food_safety_id
    INNER JOIN (
		SELECT food_safety_id, MAX(dateChecked) AS dateChecked FROM checkeds GROUP BY food_safety_id
    ) AS checked_max ON checked_max.food_safety_id= checkeds.food_safety_id AND checked_max.dateChecked = checkeds.dateChecked
) AS sub_checkeds ON sub_checkeds.category_id = categories.id
LEFT JOIN wards ON wards.id = sub_checkeds.ward_id
WHERE categories.parent_id = 1 AND sub_checkeds.year = 2019 AND categories.hierarchy = "ward"
GROUP BY wards.name, categories.name, sub_checkeds.result, sub_checkeds.quarter
ORDER BY wards.name, categories.name, sub_checkeds.result, sub_checkeds.quarter;