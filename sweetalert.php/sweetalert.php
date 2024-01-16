<?php
$cerrarSesion = '<script>
let timerInterval;
Swal.fire({
  title: "Cerrando Sesión",
  html: "Se cerrará en <b></b> milisegundos.",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
    // Aquí redirige a la página que desees
    window.location.href = "../login/login.html";
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("Fui cerrado por el temporizador");
  }
});
</script>';

$registrarProductos = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/productos.php';});
  </script>";

$registrarMarcas = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/marcas.php';});
  </script>";

$registrarVentas = "<script>Swal.fire({
  icon: 'success',
  title: 'Felicitaciones',
  text: 'Los datos se registraron correctamente'
}).then(function() {
  window.location.href = '../index/index.php';});
</script>";

$registrarEmpleados = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/empleados.php';});
  </script>";

$registroCarrito = "<script>Swal.fire({
  icon: 'success',
  title: 'Felicitaciones',
  text: 'Los datos se registraron correctamente'
}).then(function() {
  window.location.href = '../index/index.php';});
</script>";

$registrarClientes = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../login/login.html';});
  </script>";

$registrarProveedores = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/proveedores.php';});
  </script>";

$registrarStocks = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se registraron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/stocks.php';});
  </script>";

$actualizarClientes = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/clientes.php';});
  </script>";

$actualizarEmpleados = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/empleados.php';});
  </script>";

$actualizarMarcas = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/marcas.php';});
  </script>";

$actualizarProductos = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/productos.php';});
  </script>";

$actualizarProveedores = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/proveedores.php';});
  </script>";

$actualizarStocks = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se actualizaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/stocks.php';});
  </script>";

$eliminarClientes = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se eliminaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/clientes.php';});
  </script>";

$eliminarEmpleados = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se eliminaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/empleados.php';});
  </script>";

$eliminarMarcas = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se eliminaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/marcas.php';});
  </script>";

$eliminarProductos = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se eliminaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/productos.php';});
  </script>";

$eliminarStocks = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Los datos se eliminaron correctamente'
  }).then(function() {
    window.location.href = '../mostrar/stocks.php';});
  </script>";

  $Notificacion_correo = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Se te acabo de enviar a tu correo un link para que actualizes tu contraseña'
  }).then(function() {
    window.location.href = '../login/login.html';});
  </script>";

  $Notificacion_contraseña = "<script>Swal.fire({
    icon: 'success',
    title: 'Felicitaciones',
    text: 'Su contraseña fue actualizada'
  }).then(function() {
    window.location.href = '../login/login.html';});
  </script>";