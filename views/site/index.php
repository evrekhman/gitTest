<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>HTML Document</title>
		
			  <!-- Latest compiled and minified CSS -->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		  <link rel="stylesheet" href="<?='/template/style.css?'.rand(2000,9999);?>" type="text/css" media="all" />
		  <!-- Optional theme -->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <style>
	  
	  </style>
   </head>
   <body>
   <div class="container-fluid">
   
		<div class="row">
		  <div class="col-md-4 ">
						<form enctype="multipart/form-data" name="addInfo" action="/" method="POST">
		 
		 <table>
						<tr>
						<?php if(Admin::isSession()):?>
						   
						   <td><b>удалить</b></td><td><input type="checkbox"></td>
						   <?php endif;?>
						</tr>
                       <tr>
						   
						   <td>имени пользователя:</td><td><input type="text" id="usName" name="usName"></td> 
                       </tr>
                        <tr>
							<td>е-mail:</td><td><input type="text" id="email" name="email"></td> 
                       </tr>
					   <tr>
							<td>текста задачи:</td><td><input type="text" id="iText" name="iText" ></td> 
                       </tr>
					   <tr>
							<td>картинки:</td><td><input type="file" id="zFile" name="userfile"></td> 
                       </tr>
                       <tr>     
							<td><input  type="submit" id="sub" value="отправить" name="subc"></td> 
                       </tr> 
        </table>
		 
		</form>
		
		
     
	  <div  id="prevv">Предварительный просмотр картинки</div>
	  <div id="interImg"><img id="zImg" src="" style="height:320px;width:240px;"></div>
		  
		  
		  </div>
		  <div class="col-md-4 ">
		  
						   <?php 	
						   /*
							*ПРОВЕРКА ОТПРАВКИ ДАННЫХ В БД
						   */
						   if(isset($www)){
							?>
							<span>
							<?=$www;?>
							</span>
							<?
							
						   }
						   ?>
							
						   
									
					     
						 <?
							/*
							*ВЫВОД  ДАННЫХ ИЗ БД
							*/
						   if(isset($select))
						   {
							   
							   foreach($select as $value)
							   {								 
								   ?>
								   <div class="brix">
										<div class="brixN"><a><?=$value['name'];?></a></div>
										<div class="brixD"><a><?=$value['description'];?></a></div>
										<div class="brixP"><a><?=$value['photo'];?></a></div>
								   </div>
								   <?
								   
							   }
						   }
						 ?>
		  
		  
		  </div>
		  
		  
		  <div class="col-md-4 ">
		  
							<?php 
							
							/*
							*Если есть СЕССИЯ то показывает выход, если нет то показывает вход
							*/
							if(Admin::isSession()):?>              
																		   
							<li><a href="/admin/logout/"><i class="fa fa-unlock"></i> Выйти из кабинета</a></li>
										
							<?php else: ?>
							<li><a href="/admin/"><i class="fa fa-lock"></i> Войти в кабинет</a></li>                                     
							<?php endif;?>
		  </div>
		</div>
   
   
   
   
   
  
									
		
	  
	  
	  </div>
   </body>
   <script>
	var zFile = document.getElementById('zFile');
	var interImg = document.getElementById('interImg');
	var prevv = document.getElementById('prevv');
	var zImg = document.getElementById('zImg');
	zFile.onchange = resultImg;
	//interImg.style.display = "none";
	function resultImg(e)
	{
		
		var file = e.target.files[0];
		console.log(file.name);
		var fileReader = new FileReader();
		fileReader.onload = function (e)
		{
			result = e.target.result;
			zImg.src = result;
		}
		
		fileReader.readAsDataURL(file);
		
	}
	
	
	function showPars(){
			$("#prevv").click(function(){$("#interImg").toggle( "slow", function() {
				//Анимация парсера
			  });});
			}
			showPars();
	
   </script>
</html>