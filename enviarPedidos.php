<html>
<head>
<title>Enviar pedidos</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jQuery-3.2.1.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript" src="js/movimientoDrone.js"></script>

</head>
<body>
<?php
$rutas = $_POST;

class Drone {
  private $capacidadDefault = 5;
  private $envios;

  public function __get($atributo) {
    if (property_exists($this, $atributo)) {
      return $this->$atributo;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  } 
  
  public function __construct($capacidad) {
    $this->envios = new Envio();
    $this->envios->ruta = $capacidad;
  }
}

class Envio {
  private $ruta;

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }

  public function __get($atributo) {
    if (property_exists($this, $atributo)) {
      return $this->$atributo;
    }
  }
}


if(!empty($rutas['pedidos'])){
  $nuevo = new Drone($rutas['pedidos']);
  //echo $nuevo->envios->__get("ruta");
} else if(!empty($rutas['file'])){
  $nuevo = new Drone($rutas['file']);

  $file = fopen($rutas['file'], "r") or exit("Unable to open file!");
  $colector = "";
  while(!feof($file))
  {
    $colector = trim(fgets($file)).",".$colector;
  }
  fclose($file);

  $nuevo = new Drone($colector);
  //echo $colector;
}


?>
<script>
	var pedidos = "<?php echo $nuevo->envios->__get("ruta") ?>";
  var derechaActual = "E", izquierdaActual  = "O";
  var topWindow = 0, leftWindow = 0;
	$( document ).ready(function() {
    var totalPedidos = pedidos.split(",");
    if(pedido != ""){
     for(h=0;h<totalPedidos.length;h++){
      var pedido = totalPedidos[h];
      for(i=0;i<pedido.length;i++){
          var sentidoPedido = pedido.substring(i, i+1);
          var valorI = i;
          console.log(sentidoPedido);
          moverDrone(sentidoPedido.toUpperCase(),"entrega"+h);
          i = valorI;
          //alert("LETRA ACT: " + sentidoPedido + " POSICION-> " + pedidos);
      }

      $( ".drone" ).clone().prependTo( "#mapDrone" ).attr("id","entrega"+h);
      $("#entrega"+h).css("top",topWindow).removeClass("drone").addClass("entrega");
      $("#entrega"+h).css("left",leftWindow);
      if(totalPedidos[h].length != 0){
        alert("ENTREGA REALIZADA AL: " + totalPedidos[h]);
      } 
    }
    
    }

    function validarCampos(){
      var paquetesManuales = $("#pedidos").value;
      var paquetesAutomaticos = $("#file").value
      if(paquetesAutomaticos == "" && paquetesManuales == ""){
        alert("Debe ingresar almuerzos a enviar");
        return false;
      }
    }
  });

</script>

<div id="mapDrone" class="divPrincipal" style="background-image: url(images/plano.jpg);">
  <div class="drone"></div>
  <div class="centro"></div>
</div>
</body>
</html>