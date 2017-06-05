<?php
	/*
	*Клас АдминКонтроллер 
	*/
class AdminController
{
	
	
	public function actionIndex()
	{
		
		if(isset($_POST['sub']))
		{	
			/*
			*Admin::enterSait($post); Вход на сайт
			*/
			$post = $_POST;
			$idRow = Admin::enterSait($post);//если $_POST[sub] то получаем Id($idRow)
			
			$getSession = Admin::getSession($idRow);// создаем Сессию
			
			if($getSession)
			{
				
				header('Location: /');//перенаправления на главную страницу
				
			}
			
		}
		
		include_once(ROOT.'/views/site/regist.php');
		
		return true;
	}
	
	
	
	/*
	*Удаляет сессию 
	*/
	public function actionDeletSession()
	{
		if(isset($_SESSION)){
			
			unset($_SESSION["user"]);
			header("Location: /");
		}
	}
}
?>