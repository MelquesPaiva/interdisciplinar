<?php if(isset($usuAutenticado) && !empty($usuAutenticado)):?>				
	<script type="text/javascript">window.location.href="<?php echo BASE_URL;?>home";</script>
<?php endif?>

<div class="container mt-2">
	<div class="d-flex justify-content-center">
		<div class="login p-4 shadow">
			<form method="POST" action="<?php BASE_URL?>login">
				<div class="form-group">
					<label for="login">Login</label>
					<input type="text" name="login" class="form-control" placeholder="Digite o seu login..."/>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="passowrd" name="senha" class="form-control" placeholder=".............."/>
				</div>
				<div class="form-group">
					<input type="submit" name="enviar" value="Logar" class="btn btn-primary btn-block"/>
				</div>
			</form>		
			<?php if(isset($usuAutenticado) && !empty($usuAutenticado)):?>				
			<script type="text/javascript">window.location.href="<?php echo BASE_URL;?>home";</script>
			<?php else:?>	
			<div class="alert alert-danger text-center">
				Usuário e/ou senha incorretos
			</div>
			<?php endif;?>			
		</div>
	</div>
</div>

	