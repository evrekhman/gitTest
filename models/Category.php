<?

class Category
{
	public static function getCategoryItemID($id)
	{
		
		$g = "getCategoryItemID".$id;
		return $g;
	}
	
	public static function getCategoryList()
	{
			
			$db = Db::getDB();
		

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM cat_films '
                . 'ORDER BY id ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
	}
	
	public static function insertForm()
	{
			
			$db = Db::getDB();
			
			$name = $_POST['usName'];
			$email = $_POST['email'];
			$iText = $_POST['iText'];
			$fileName = $_FILES['userfile']['name'];
			if($name!='' && $email!='' && $iText!='' && $fileName!='')
			{
			$result = $db->query("INSERT INTO `test` (`id`, `name`, `title`, `description`, `photo`) VALUES (NULL, '$name', '$email', '$iText', '$fileName')");
			}
        if(isset($result))
		{
			$getRes= "Успешно отправленно";
		}
		else 
		{
			$getRes= "Ошибка";
		}
		return $getRes;
	}
	
	
	public static function selectData()
	{
			
			$db = Db::getDB();
			
			$array = array();
			$result = $db->query("SELECT `name`,`photo`,`description` FROM `test`");

			
			
        while ($row = $result->fetch()) {
            
			array_push($array, $row);
        }

        return $array;
		
		
			
	}
}