<?php
require __DIR__ . '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-6471873676652437-102702-683797de59d5d9bad70351eda6127a17-1606181904');
$preference = new MercadoPago\Preference();
$preference->back_urls = array('success' => 'pagoExitoso.html', 'failure' => 'pagoFallido.html', 'pending' => 'pagoPendiente.html');


$item = new MercadoPago\Item();
$item->title = 1;
$item->title = 'Cartulina';
$item->description = 'Descripcion del producto';
$item->quantity = 1;
$item->unit_price = 50.00;
$item->currency_id = 'mxn';
$preference->items = array($item);
$preference->save();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Pago </title>
</head>
<body>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<body>
<script>
  const mp = new MercadoPago('TEST-ffb65021-d1ec-4906-9954-5b9e73633f12', {
    locale: 'es-MX'
  });
  const checkout = mp.checkout({
    preference: { 
        id: '<?php echo $preference->id; ?>'
  },
  render: {
    container: '.btbPagar', // Indica el nombre de la clase donde se mostrará el botón de pago
    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
  }
});
    </script>
    <a href="<?php echo $preference->init_point; ?>">Pagar</a>