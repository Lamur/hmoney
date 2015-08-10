
	<div class="wrapper">	

        <form method="post" action=""  class="vis enters">
			<table cellspacing="0" border="0">
				<tr>
					<td style="min-width:200px;">
						Введите имя
					</td>
					<td>
						<input type="text" name="name" value=""/>
					</td>
				</tr>	
				<tr>
					<td>
						Введите логин
					</td>
					<td>
						<input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; ?>"/>
					</td>
				</tr>	
				<tr>
					<td>
						Придумайте пароль
					</td>
					<td>
						<input type="password" name="password" value="" />
					</td>
				</tr>	
				<tr>
					<td>
						Введите E-mail
					</td>
					<td>
						<input type="text"  name="email" value="" />
					</td>
				</tr>	
				<tr>
					<td>
						Введите телефон
					</td>
					<td>
						<input type="text" name="phone" value="" />
					</td>
				</tr>	
            

            <input type="hidden" name="confirm" value="1"/>
            <input type="hidden" name="role" value="user"/>
			
				<tr>
					<td>
						<label class="errr"></label>
					</td>
					<td>
						<input type="submit" value="Зарегистрироваться" />
					</td>
				</tr>	
			
        </form>
		
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
	<?php
		foreach($data as $key => $value){

			if($value == 'no valid'){
				echo "$('input[name=".$key."]').addClass('novalid').addClass('shake animated'); \n";
			}
			else{
				echo "$('input[name=".$key."]').addClass('valid'); \n";
			}
		
		}
	?>
		});
	</script>