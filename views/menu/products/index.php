<?php
/** @var Product[] $products */

use app\models\Product;

$this->title = 'Товары';
?>

<?php
if (!empty($products)): ?>
    <table>
        <?php
        foreach ($products as $product): ?>
            <tr>
                <td><?= $product->title; ?></td>
                <td><?= $product->description; ?></td>
                <td><?= $product->price; ?></td>
                <td><img src="<?= $product->image; ?>" alt=""> </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
<?php
else: ?>
<p>Нет товаров</p>
<?php
endif; ?>
