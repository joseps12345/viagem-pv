<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Organização</title>
		<meta charset="utf-8">
        
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>




<br /><br /><br />
<!-- Contact Form - START -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Cadastro de Viagem</legend>

                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></i></span>
                            <div class="col-md-8">
                                <label for="organizadores">Organizadores:</label>
                                <input type="text" class="form-control" id="organizadores" name="organizadores" placeholder="Nome dos Organizadores" required="required">
                                </div>
                        	</div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></i></span>
                            <div class="col-md-8">
                                <label for="data_ida">Data de Ida:</label>
                                <input type="text" id="data_ida" name="data_ida" class="form-control" placeholder="Data de Ida" required="required">
                                </div>
                       		 </div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <label for="data_volta">Data de Volta:</label>
                                <input type="text" id="data_volta" name="data_volta" class="form-control" placeholder="Data de Volta" required="required">
                                </div>
                        </div>   
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <label for="ponto_saida">Ponto de Saida:</label>
                                <input type="text" class="form-control" id="ponto_saida" name="ponto_saida" placeholder="Ponto de Saida" required="required">
                                </div>
                        </div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-1 text-center"></span>
                            <div class="col-md-8">
                                <label for="horario_disponivel">Horario Disponivel:</label>
                                <input type="text" class="form-control" id="horario_disponivel" name="horario_disponivel" placeholder="Horario disponivel" required="required">
                               </div>
                        </div>  
												
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit" class="btn btn-success btn-lg">Cadastrar</button>
                            </div>
                        </div>
                       
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

</style>

<!-- Contact Form - END -->


</body>
<script>
$(function() {
    $("#data_ida").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']});
});
$(function() {
    $("#data_volta").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']});
});
</script>


</html>

<?php
	include 'config.php';
	if(isset($_POST['submit']))
	{
		$parts = explode('/', $_POST['data_ida']);
		$data_ida = "$parts[2]-$parts[1]-$parts[0]";
		$parts = explode('/', $_POST['data_volta']);
		$data_volta = "$parts[2]-$parts[1]-$parts[0]";
		$dados = array(
						"organizadores" 		=> $_POST['organizadores'], 
						"data_ida" 				=> $data_ida, 
						"data_volta" 			=> $data_volta, 
						"ponto_saida" 			=> $_POST['ponto_saida'], 
						"horario_disponivel" 	=> $_POST['horario_disponivel']
						);
		$crud->insereViagem($dados);						
	}

?>
