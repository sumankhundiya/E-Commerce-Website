<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
function total_amount($cart){
  $t = 0; foreach($cart as $item) $t += $item['price'] * $item['qty']; return $t;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h1>Your Cart</h1>
  <?php if (empty($cart)): ?>
    <p>Your cart is empty. <a href="/e-commerce/index.html">Continue shopping</a></p>
  <?php else: ?>
    <form method="post" action="/e-commerce/cart_update.php" class="mb-3">
      <table class="table">
        <thead><tr><th>Product</th><th>Price</th><th>Qty</th><th>Line</th></tr></thead>
        <tbody>
        <?php foreach($cart as $id=>$item): ?>
          <tr>
            <td><?=htmlspecialchars($item['name'])?></td>
            <td><?=number_format($item['price'],2)?></td>
            <td><input type="number" name="qty[<?=htmlspecialchars($id)?>]" value="<?=intval($item['qty'])?>" min="0" class="form-control" style="width:100px"></td>
            <td><?=number_format($item['price'] * $item['qty'],2)?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <p><strong>Total: </strong><?=number_format(total_amount($cart),2)?></p>
      <button type="submit" class="btn btn-primary">Update Cart</button>
      <a href="/e-commerce/cart_clear.php" class="btn btn-danger">Clear Cart</a>
    </form>
  <?php endif; ?>
</body>
</html>
