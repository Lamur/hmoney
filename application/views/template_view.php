<!doctype html>
<html>
<head>

	<title>Test task</title>
	<meta charset="utf-8" />
	<link href='http://fonts.googleapis.com/css?family=Play:400,700&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/animate.css" />

	
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>

		<div class="sidebar">
		
			<div class="inside">
				<?php
					$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
					foreach($crumbs as $crumb){
						echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
					}
				?>
			</div>
		</div>
		
		
		<?php include 'application/views/'.$content_view;?>
	

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script type="text/javascript">

        /*$(document).ready(function(){
            $('a.enter').click(function(){

                $('form.enters').removeClass('unvis');

            })

            $('.close').click(function(){
                $('.alert').animate({'opacity':0}, 'slow');
                $('.alert').remove();
                $('a.enter').click();

            })
        })*/

    </script>
	<script src="js/jquery.validate.js"></script>
	<script type="text/javascript">
	$().ready(function(){
		$(".enters").validate({
			rules: {
				name: {
					required: true,
				},
				login: {
					required: true,
					minlength: 3
				},
				password: {
					required: true,
					minlength: 5
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					number: true,
					minlength:10
				},
			},
			messages: {
				name: {
					required: "Введите Ваше имя",
				},
				login: {
					required: "Введите логин",
					minlength: "Логин должен быть больше 3 символов"
				},
				password: {
					required: "Введите Ваш пароль",
					minlength: "Пароль должен быть больше 5 символов"
				},
				email: "Укажите E-mail",
				phone: {
					required:"Укажите номер Вашего телефона",
					number:"Номер должен состоять только из цифр",
					minlength: "Номер не может быть короче 10 цифр."
				}
			}
		});
	});	
	</script>
	<!--script type="text/javascript" src="js/check_reg.js"></script-->
	
</body>
</html>
