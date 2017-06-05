<?php

class Admin
{
			/*
			*function enterSait($post) проверяет есть ли такой пользователь в бд
			*/
	
	public static function enterSait($post)
	{
			
			$db = Db::getDB();
		if($post)
		{
			
			$usName = $post['usName'];
			$email = $post['email'];
			$result = $db->query("SELECT * FROM `user` WHERE `name`='$usName' AND `password`='$email' ");
			
			$i = 0;
			$row = $result->fetch();
			if($row)
			{
				return $row['id'];
				
			}
				
				
			
			return false;
		}
        
		

        
	}
	
			/*
			*function getSession($user) Создат сессию
			*/
	public static function getSession($user)
	{
		
		$_SESSION['user']=$user;
		if($_SESSION['user'])
		{
			//return false;
			return $_SESSION['user'];
		}
		//return true;
	}
	
	
			/*
			*function isSession() сама сессия
			*/
	public static function isSession()
	{
		
		if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
	}
	
	
	
}