<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
<?php foreach ($result as $key => $item) :?>
    <?php if ($item['QUANTITY_FIRST_BLOCK'] != 0 && $item['COUNT_SECOND_RANK'] !=0 ) :?>
        <div class="col-md-4 block">
            <img src="<?=$item['PIC']?>" alt="Изображение товара">
            <span class="small-font"><?=mb_strimwidth($item['SHTRIHKOD'], 0, 6, ".")?></span>
            <b><?=$item['NAME']?></b> <span><?=$item['ARTICLE']?></span>
            <hr>
            <div class="order">
                <p><?=$item['COUNT_FIRST_RANK']?> / <?=$item['COUNT_THIRD_RANK']?> / <?=$item['COUNT_SECOND_RANK']?></p>
                <p>Мин. заказ: <?=$item['NAME_SECOND_RANK']?></p>
            </div>
            <hr>
            <div class="price">
                <p><?=$item['NAME_FIRST_RANK']?>
                    <span class="price-block">      <?=$item['PRICE_SECOND_BLOCK'] / $item['COUNT_SECOND_RANK']?> р.</span></p>
                <p><b><?=$item['NAME_SECOND_RANK']?> (<?=$item['COUNT_SECOND_RANK'] . ' ' . mb_strimwidth($item['NAME_FIRST_RANK'], 0, 3, ".") ?>)
                    <span class="price-block">     <?=$item['PRICE_SECOND_BLOCK'] ?> р.</span></b></p>
                <p><?=$item['NAME_THIRD_RANK']?> (<?=$item['COUNT_THIRD_RANK']. ' ' . mb_strimwidth($item['NAME_SECOND_RANK'], 0, 3, ".")?>)
                    <span class="price-block">    <?=$item['PRICE_SECOND_BLOCK'] * $item['COUNT_THIRD_RANK']?> p.</span></p>
                <p>
                    <button> - </button> Количество <button> + </button>
                   <span class="quantity">В наличии - <?=intdiv($item['QUANTITY_FIRST_BLOCK'], $item['COUNT_SECOND_RANK']) . ' ' . mb_strimwidth($item['NAME_SECOND_RANK'], 0, 3, ".")?></span>
                </p>
                    <button> Купить </button>
            </div>
        </div>
        <?php endif;?>
<?php endforeach;?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>