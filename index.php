<?php
	include 'admin/config.php';


	$ultimaviagem = $crud->idUltimaViagem();
	$dadosUltimaViagem = $crud->dadosViagem($ultimaviagem);
	$participante = $crud->participantesUltimaViagem($ultimaviagem);
	
	if(isset($_POST['submit']))
	{

		//$_POST['opcao'] = (isset($_POST['opcao'])) ? 1:0; 
		//$_POST['ida'] 	= (isset($_POST['ida'])) ? 1:0; 
		$_POST['qualquer'] 	= (isset($_POST['qualquer'])) ? 1:0; 
		
		$dados = array(
						'nome' => $_POST['nome'],
						'opcao' => $_POST['opcao'],
				//		'volta' => $_POST['volta'],
						'id_viagem' => $ultimaviagem,
						'hora' => $_POST['hora'],
						'qualquer' => $_POST['qualquer'],
						'local_saida' => $_POST['local_saida']						
					   );
		$crud->addParticipante($dados);
	}
	
	if(isset($_POST['submit_sugestao'])){
		
		$sug = array(
					  'sugestao' => $_POST['sugestao']
					);
		$crud->addsugestao($sug);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Viagem PV</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="icon" href="paginas/gilli/images/favicon.ico">

		<!--
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" media="screen"
     	href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://raw.githubusercontent.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.js"></script>
		<script src="paginas/gilli/js/jquery-1.5.2.min.js"></script>
		<script src="paginas/gilli/js/jquery.maskedinput-1.3.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="jumbotron">
				<h2><b>Viagem PV</b></h2>
				<p>Viagem do dia <?php echo $dadosUltimaViagem['data_ida'];?></p>
				<p>Organizada por: <?php echo $dadosUltimaViagem['organizadores'];?></p>
				<!--<p>Saindo da <?php echo $dadosUltimaViagem['ponto_saida'];?> às <?php echo $dadosUltimaViagem['horario_disponivel'];?></p>-->
			</div>
			
			<div class="row">
			<div class="col-md-3"></div>
				<div class="col-sm-6 ">
					<!-- tabela confirmação -->
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#confirmacao">Confirmação</a></li>
						<li><a data-toggle="tab" href="#lista">Lista dos confirmados</a></li>
						<li><a data-toggle="tab" href="#sugestao">Sugestões</a></li>
					</ul>
					<div class="tab-content">
						<div id="confirmacao" class="tab-pane fade in active">
							<div class="form-group">
                            <br>
								<!-- onsubmit="document.forms[0].nome.value=''"-->
								<form class="form-horizontal" method="post">
								<fieldset>
									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
											<label for="organizadores">Nome:</label>
											<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required="required">
										</div>
									</div>
									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
											<br>
											<label>Ida/Volta:</label>
											<!--<div class="checkbox">
												<label><input type="checkbox" id="ida" name="ida" value="1"> Ida</label>
												<label><input type="checkbox" id="volta" name="volta" value="1"> Volta</label>
											</div>-->
											<div class="radio">
												<label><input type="radio" id="ida" name="opcao" value="1" checked="checked">Somente Ida</label><br>
												<label><input type="radio" id="volta" name="opcao" value="2">Somente Volta</label><br>
												<label><input type="radio" id="ida_volta" name="opcao" value="3">Ida e Volta</label>
											</div>
											<!--<script type="text/javascript">
											    function fcnConfirma() {
											        if ((!document.getElementById('ida').checked)&&(!document.getElementById('volta').checked)&&(!document.getElementById('ida_volta').checked)){
											            alert("Marque se \u00e9 ida e/ou volta");
											            return;
											        }
											    }
											</script>-->
										</div>
									</div>   
									
									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
											<br>
											<label for="organizadores">Horário Disponível:</label>
											<input type="text" class="form-control" id="hora" name="hora" value="23:00" required="required">

											<!--<label for="organizadores">Horário Disponível:</label>
										  	<div id="datetimepicker3" class="input-append">
										    	<input data-format="hh:mm:ss" type="text" value="23:00" id="hora" name="hora" required="required"></input>
										    	<span class="add-on">
										    		<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
										    	</span>
										  	</div>
											<script type="text/javascript"
										     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
										    </script>
										    <script type="text/javascript"
										     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
										    </script>
										    <script type="text/javascript"
										     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
										    </script>
										    <script type="text/javascript"
										     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
										    </script>
										    <script type="text/javascript">
									  			$(function() {
									    			$('#datetimepicker3').datetimepicker({
									      				format: 'hh:mm',
									      				pickDate: false,
									      				pickSeconds: false    
													});
									  			});
											</script>-->
										</div>
									</div>									

									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
											<div class="checkbox">
												<label><input type="checkbox" name="qualquer" value="1" > Qualquer hora</label>
											</div>
										</div>
									</div>   									
									
								
									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
										<br>
										<label for="local_saida">Ponto de saída:</label>
										<select id="local_saida" name="local_saida">
											<option value="UFS">UFS</option>
											<option value="PIO X">PIO X</option>
											<option value="DIA">DIA</option>
										</select>
										</div>
									</div>									
									<div class="form-group">
										<div class="col-md-12 text-center">
											<button type="submit" name="submit" class="btn btn-success btn-lg" <!--onclick="fcnConfirma()";-->>Enviar</button>
										</div>
									</div>
								</fieldset>
								</form>									
							</div>
						</div>
						<div id="lista" class="tab-pane fade">
							<div class="form-group">
								<br>
								<label for="q">Lista viagem do dia <?php echo $dadosUltimaViagem['data_ida'];?> organizada por: <?php echo $dadosUltimaViagem['organizadores'];?></label>
							</div>
							<table class="table table-hover">
                            <thead> <tr> <th>Nº</th> <th>Nome</th> <th>Vai ou Volta</th> <th>Horario</th>  <th>Local de Saida</th> </thead>
                            <tbody>
                            <?php
                            	$count = 0;
                            	foreach($participante as $part){
                            		$count = $count + 1;
							?>
                              <tr>
                              	<td><?php echo $count; ?></td>
							    <td><?php echo $part['nome']; ?></td>
							    <td><?php 
								/*if($part['ida'] == 0 && $part['volta'] == 0){echo 'Error';}
								elseif($part['ida'] == 0 && $part['volta'] == 1){echo 'Volta';}
								elseif($part['ida'] == 1 && $part['volta'] == 0){echo 'Ida';}
								elseif($part['ida'] == 1 && $part['volta'] == 1){echo 'Ida e Volta';}*/
								if($part['opcao'] == 1){echo 'Ida';}
								elseif($part['opcao'] == 2){echo 'Volta';}
								elseif($part['opcao'] == 3){echo 'Ida e Volta';}
								?></td>
								<td><?php echo ($part['qualquer'] == 1)? 'Qualquer Horário': $part['hora']; ?></td> </td>
								<td> <?php echo $part['local_saida']; ?></td></td>								
						      </tr>
							<?php									
								}
							?>
                            <tbody>
							</table>
                        </div>	
						
					
						<div id="sugestao" class="tab-pane fade">
							<div class="form-group">
                            <br>
								<form class="form-horizontal" method="post">
								<fieldset>
									<div class="form-group">
										<span class="col-md-1 col-md-offset-1 text-center"></i></span>
										<div class="col-md-8">
											<label for="organizadores">Sugestões:</label><br>
											<textarea name="sugestao" rows="10" cols="40" placeholder="Escreva sua sugestão..."></textarea> 
										</div>
									</div>				
									<div class="form-group">
										<div class="col-md-12 text-center">
											<button type="submit" name="submit_sugestao" class="btn btn-success btn-lg">Enviar</button>
										</div>
									</div>
								</fieldset>
								</form>									
							</div>
						</div>
					
						
					</div>
				</div>
			</div>	
		</div>
	    <script>
			jQuery(function($){
   				$("#hora").mask("99:99");
			});
    	</script>
	</body>
</html>

