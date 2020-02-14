SELECT 
  * 
FROM 
  hoteldb.hotels 
WHERE 
  pref LIKE '%東京%' 
    OR 
  city LIKE '%新宿%' 
    OR 
  address LIKE '%新宿%' 
ORDER BY 
  id ASC 
;