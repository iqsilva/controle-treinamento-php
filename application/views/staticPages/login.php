<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Azul Controle de Treinamentos</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
    @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
	@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
  </style>
</head>
<body>
	<div class="body"></div>
	<div class="grad"></div>
	<div class="header">
		<div><span>Azul Controle<br />Treinamentos</span></div>
	</div>
	<br>
	<div class="login">
		<form action="<?php echo base_url('home')?>" method="post">
			<input type="text" placeholder="usuário" name="username"><br>
			<input type="password" placeholder="senha" name="password"><br>
			<?php
				if(!empty($this->session->flashdata('loginError'))){
			?>
				<div style="padding: 1em;">
					<span style="color: #ffffff;font-size: 18px;">Usuário ou senha incorretos!</span>
				</div>
			<?php
				}
			?>
			<input type="submit" value="Entrar">
		</form>
	</div>
</body>
</html>