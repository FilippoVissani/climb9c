<div class="collapse" id="menu">
    <header class="nav bg-dark d-flex justify-content-end">
        <img src="./svg_icons/back_arrow.svg" alt="" width="30" height="30" class="m-3" id="menu-back">
    </header>

    <?php foreach($templateParams["categories"] as $category): ?>
    <ul class="list-group collapse" id="<?php echo $category["id"] ?>-subcategory">
        <?php foreach($templateParams[$category["id"]."-subcategory"] as $subcategory): ?>
        <li class="list-group-item menu-item">
            <a class="text-dark" href="subcategory.php?id=<?php echo $subcategory["id"] ?>">
                <?php echo strtoupper($subcategory["name"]) ?>
                <img src="./svg_icons/arrow.svg" alt="" width="30" height="30" class="d-inline-block float-end">
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>

    <ul class="list-group" id="menu-categories">
        <?php foreach($templateParams["categories"] as $category): ?>
        <li class="list-group-item" id="<?php echo $category["id"] ?>-category">
            <?php echo strtoupper($category["name"]) ?>
            <img src="./svg_icons/arrow.svg" alt="" width="30" height="30" class="d-inline-block float-end">
        </li>
        <?php endforeach; ?>
    </ul>
</div>
