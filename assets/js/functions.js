
function agregarCarrito(id,p){
  var cadena = "id="+id+"&precio="+p;
  $.ajax({
    type:"POST",
    url:"../settings/proceso.php?ac=1&cod=3",
    data: cadena,
    success:function(r){
      if (r==1) {
        alert("No selecciono producto");
      }else if(r==2){
        alert("Inicia Sesion");
      }else{
        alert("Producto agregado");
      }
    }
  });

}

function crearCuenta(n,ap,am,s,e,c,d){
  var cadena = "nombre="+n+"&apellidoP="+ap+"&apellidoM="+am+"&sexo="+s+"&email="+e+"&password="+c+"&direccion="+d;
  $.ajax({
    type:"POST",
    url:"../settings/proceso.php?ac=1&cod=2&registro=1",
    data: cadena,
    success:function(r){
      if (r==1) {
        alert("No ingreso datos");
      }else if(r==2){
        alert("Error. Verifique sus datos");
      }else if(r==3){
        alert("Error al registrar intente de nuevo");
      }else{
        alert("Usted se ha registrado. Inicie sesion para continuar");
      }
    }
  });
}