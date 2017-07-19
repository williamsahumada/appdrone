<html>
<head>
<title>Inicio</title>
<script type="text/javascript" src="js/jQuery-3.2.1.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript">

  $( document ).ready(function() {
    function validacion(){
      var paquetesManuales = $("#pedidos").value;
      var paquetesAutomaticos = $("#file").value
      if(paquetesAutomaticos == "" && paquetesManuales == ""){
        alert("Debe ingresar almuerzos a enviar");
        return false;
      }
    }
  })
</script>
</head>
<body>

<div>
	<form name="formulario" action="enviarPedidos.php" method="POST">
	<div>
    <label>Pedidos manuales:</label>
  <input type="text" class="form-control" placeholder="inserte Ruta del pedido" id="pedidos" name="pedidos">
  </div>
  <div>
  <label>Pedidos automaticos:</label>
    <input type="text" class="form-control" placeholder="Indique URL de archivo con los pedidos" style="width: 274px;" id="file" name="file">
  <button type="submit" class="btn btn-success">Enviar pedidos</button>
  </div>
	</form>
</div>
</body>
</html>