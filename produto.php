
<?php require "pages/header.php"; ?>

<?php require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$an = new Anuncios();
$us = new Usuarios();

if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = addslashes($_GET['id']);
}else{
	?>
	<script type="text/javascript">window.location.href="index.php"</script>
	<?php
}

$info = $an->getAnuncio($id);
?>



<div class="container-fluid">


	<div class="row">
		<div class="col-sm-4">

			<div class="carousel slide" data-ride="carousel" id="meuCarousel">
				<div class="carousel-inner" role="listbox">
					<?php foreach ($info['fotos'] as $chave => $foto):?>
						<div class="item <?php echo ($chave == 0)?'active':'' ?>">
							<img src="assets/images/anuncios/<?php echo $foto['url']; ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<a href="#meuCarousel" class="left carousel-control" role="button" data-slide="prev"><span><</span></a>

				<a href="#meuCarousel" class="right carousel-control" role="button" data-slide="next"><span>></span></a>
			</div>
		</div>

		<div class="col-sm-8">
			<div class="page-header">
				<h1 class="text-center"><?php echo $info['titulo']; ?></h1>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<a href="#"><button class="btn btn-success active btn-block">Comprar</button></a>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-sm-6">
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Descrição:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text"><?php echo $info['descricao']; ?></h4>
						</li>
					</div>
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Preço:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text">R$ <?php echo number_format($info['valor'], 2); ?></h4>
						</li>
					</div>
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Nome do vendedor:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text"><?php echo $info['nomeDoVendedor'];?></h4>
						</li>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Categoria:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text"><?php echo $info['categoria']; ?></h4>
						</li>
					</div>
					
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Estado de conservação:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text">
								<?php switch ($info['estado']) {
									case '4':
									echo "Ruim";
									break;
									case '1':
									echo "Bom";
									break;
									case '2':
									echo "Ótimo";
									break;
									default:
									echo "Nunca usado";
									break;
								} ?>
							</h4>
						</li>
					</div>
					<div class="list-group">
						<li class="list-group-item active">
							<h4 class="list-group-item-heading">Telefone:</h4>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-text"><?php echo $info['telefone'];?></h4>
						</li>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php require "pages/footer.php"; ?>
