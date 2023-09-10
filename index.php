<!DOCTYPE html>custom-blue 
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="assets/images/icon.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
	<link rel="stylesheet" href="assets/styles/loader.css">
	<style>
    .super_containers {
        background-image: url('assets/images/fondo.jpg'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-attachment: fixed; 
    }
</style>
	<style>
    .custom-blue-button {
        background-color: #00BFFF;
        color: white; 
    }
</style>
<style>
    .custom-blue {
        background-color: 	#87CEEB;
        color: white; 
    }
</style>
<style>
    .precio-numero {
        color: black; 
    }
</style>

	<title>WEB SHOP</title>
</head>

<body>
	<div class="page-loading active">
		<div class="page-loading-inner">
			<div class="page-spinner"></div>
			<span>cargando...</span>
		</div>
	</div>
	<?php
	include('funciones/funciones_tienda.php');
	include('header.php');
	?>
<div class="super_containers">
	<div class="super_container" >
		<div class="container mt-5 pt-5">
			<div class="row align-items-center">
		
				<div class="col-lg-12 text-center">
					<div class="section_title">
						
					</div>
				</div>
			</div>
			<div class="col-lg-8 text-center">
                <div class="section_title">
                    <p class="h2">WEB SHOP</p>
                </div>
            </div>
			<img class="img-fluid" src="assets/images/giphy.gif" alt="perros_y_gatos"  width="200" height="200">
			<div class="row align-items-center">
				<div class="col-lg-12 text-center mt-5">
					
				</div>
			</div>
			<?php
			$resultadoProductos = getProductData($con);
			?>

			<div class="row align-items-center">
				<?php
				while ($dataProduct = mysqli_fetch_array($resultadoProductos)) { ?>
					
					<div class="col-6 col-md-3 mt-5 text-center Products">
				
						<div class="card" style="max-height: 400px !important; min-height: 400px !important;">
							<div>
								<img class="card-img-top" src="<?php echo $dataProduct["foto1"]; ?>" alt="<?php echo $dataProduct['nameProd']; ?>" style="max-width: 200px;">
							</div>
							<div class=" card-body text-center">
								<h5 class="card-title card_title"><?php echo $dataProduct['nameProd']; ?></h5>
								<?php
								$isEven = $dataProduct["prodId"] % 2 == 0;

								for ($i = 1; $i <= 5; $i++) {
									echo '<span><i class="bi bi-star-fill" style="padding: 0px 2px; color:' . ($isEven ? '#ffb90c' : ($i <= 3 ? '#ffb90c' : '')) . ';"></i></span>';
								}
								?>
								<hr>
								<p class="card-text p_puntos custom-blue ">
								$ <span class="precio-numero"><?php echo number_format($dataProduct['precio'], 0, '', '.'); ?></span>
								</p>
							</div>
							<a href="detallesArticulo.php?idProd=<?php echo $dataProduct["prodId"]; ?>" class="red_button btn_puntos btn_puntos bg-primary" title="Ver <?php echo $dataProduct['nameProd']; ?>">
								Ver Producto
								<i class="bi bi-arrow-right-circle"></i>
							</a>
						</div>
					</div>

				<?php } ?>
			</div>

		</div>

		<?php include('includes/footer.html'); ?>
	</div>
	</div>
	<?php include('includes/js.html'); ?>

</body>

</html>