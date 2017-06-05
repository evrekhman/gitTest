<?

class CategoryController
{
	public function actionIndex()
	{
		if(isset($_POST['subc']))
		{
			
			$www = Category::insertForm();//записывает данные в БД
		}
		$categories = Category::getCategoryList();
		$select = Category::selectData();
		
		include_once(ROOT.'/views/site/index.php');
		return true;
	}
	
	public function actionView($id)
	{
		if ($id) {
			$newsList = Category::getCategoryItemID($id);
			
		}
		
		return true;
	}
	
	
}