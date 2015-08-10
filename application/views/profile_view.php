	<div class="wrapper">	
		<div class="hello guest">
			<h1>Привет 
			<?php 
				print_r($data['name']);
			?></h1>
			
			<a href="/TEST/profile?is_exit=1" style="position: absolute;  top: 19.9%;  right: 22%;">Выйти</a>
			<br/>
			
			<table cellspacing="0" border="0" width="500px" style="color:white; text-align:left;margin:0 auto;">
				<tr>
					<td width="50%">E-mail</td>
					<td><?php echo $data['email']; ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?php echo $data['phone']; ?></td>
				</tr>
				<tr>
					<td>Дата регистрации</td>
					<td><?php 				
						$date = date_create($data['reg_dt']);
						echo date_format($date, 'd.m.Y');
					?></td>
				</tr>
			</table>
			
			
		</div>
	</div>