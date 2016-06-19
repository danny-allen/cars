<div class="container container--white container--border-side">
    <div class="page-header">
        <h1>Our Cars</h1>
    </div>
</div>

<div class="container container--wide">
    <div class="row container">
        <?php foreach ($page->items as $car): ?>
          <div class="small-12 large-4 columns">
            <a class="card" href="/products/<?php echo $car->id ?>">
                <img src="/images/car1.jpg" alt="<?php echo $car->make ?>" />
                <div class="card__text">
                    <h2 class="card__title"><?php echo $car->make ?> <?php echo $car->model ?></h2>
                    <hr />
                    <?php echo $car->price ?>
                </div>
            </a>
          </div>

        <?php endforeach; ?>
    </div>

</div>