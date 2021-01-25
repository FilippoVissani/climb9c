<div class="collapse" id="category-menu">
    <header class="nav bg-dark d-flex justify-content-end">
        <span class="fas fa-arrow-left fs-2 text-light m-3" id="menu-back"></span>
    </header>

    <div class="accordion" id="accordionCategory">
        <?php foreach($templateParams["categories"] as $category): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="category-<?php echo $category["id"] ?>">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-category-<?php echo $category["id"] ?>" aria-expanded="false" aria-controls="collapse-category-<?php echo $category["id"] ?>">
                    <?php echo strtoupper($category["name"]) ?>
                </button>
            </h2>
            <div id="collapse-category-<?php echo $category["id"] ?>" class="accordion-collapse collapse" aria-labelledby="category-<?php echo $category["id"] ?>" data-bs-parent="#accordionCategory">
                <div class="accordion-body">
                <?php foreach($templateParams[$category["id"]."-subcategory"] as $subcategory): ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="text-dark fw-bold menu-item subcategory-link" href="subcategory.php?id=<?php echo $subcategory["id"]
                            ?>">
                            <?php echo strtoupper($subcategory["name"]) ?>
                            <span class="fas fa-chevron-right fs-3 d-inline-block float-end"></span>
                        </a>
                    </li>
                </ul>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>