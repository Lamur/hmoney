
	<div class="wrapper">	

	<?php 
		if ($data['reg'] == 1){
			
			echo "<h1>Привет ".$data['name']."</h1><br/> Ты успешно зарегистрировался, для продолжения работы <a class='enter' href='http://yozhlife.com/TEST/login'>войди</a>";
			
		}
		else{
			echo "<h1>Привет ".$data['name']."</h1><br/>Во время регистрации, что-то пошло не так, попробуй  <a class='enter' href='http://yozhlife.com/TEST/registration'>зарегистрироваться</a> еще раз";
		}
	
	?>
	</div>
	
