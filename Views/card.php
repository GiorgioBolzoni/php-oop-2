<?php
$sconto = 0;
$discountedPrice = $price;

if ($sconto > 0) {

    $discountedPrice = $price - ($price * $sconto / 100);
}
?>
<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $content ?>
            </p>
            <div class="d-flex flex-column align-items-flex-start">
                <?= $custom ?>
                <div>
                    <?= $genre ?>
                </div>
            </div>
            <div>
                Quantità:
                <?= $quantity ?>
                <?php if ($sconto > 0) { ?>
                    <div>
                        <del style="color: red;">
                            Prezzo originale:
                            <?= $price ?>
                        </del>
                        <div>
                            Prezzo scontato:
                            <?= number_format($discountedPrice, 2) ?>
                        </div>
                        <div>
                            Sconto:
                            <?= $sconto ?>%
                        </div>
                    </div>
                <?php } else { ?>
                    Prezzo:
                    <?= $price ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>