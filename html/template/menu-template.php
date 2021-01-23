<div class="collapse" id="menu">
    <header class="nav bg-dark d-flex justify-content-end">
        <i class="fas fa-arrow-left fs-2 text-light m-3" id="menu-back"></i>
    </header>

    <?php foreach($templateParams["categories"] as $category): ?>
    <ul class="list-group collapse" id="<?php echo $category["id"] ?>-subcategory">
        <?php foreach($templateParams[$category["id"]."-subcategory"] as $subcategory): ?>
            <li class="list-group-item">
                <a class="text-dark fw-bold menu-item" href="subcategory.php?id=<?php echo $subcategory["id"] ?>">
                    <?php echo strtoupper($subcategory["name"]) ?>
                    <i class="fas fa-chevron-right fs-3 d-inline-block float-end"></i>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>

    <ul class="list-group" id="menu-categories">
        <?php foreach($templateParams["categories"] as $category): ?>
        <li class="list-group-item fw-bold" id="<?php echo $category["id"] ?>-category">
            <?php echo strtoupper($category["name"]) ?>
            <i class="fas fa-chevron-right fs-3 d-inline-block float-end"></i>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
