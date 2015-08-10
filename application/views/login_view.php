
	<div class="wrapper">	
		
        <form method="post" action="" class="vis enters">
			
            <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; ?>" placeholder="login"/>
            <br/>
            <input type="password" name="password" value="" placeholder="password"/><br/>
            <input type="hidden" name="load" value="home"/>
            <input type="submit" value="Войти" />
			<label class="errr"><?php print_r($data);?></label>
        </form>
	</div>