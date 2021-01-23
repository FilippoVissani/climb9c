<?php
$group = array();
foreach ($templateParams["tags"] as $value) {
    $group[$value['chiave']][] = $value;
};
?>
<div class="form-check">
    <input class="form-check-input" type="radio" value="" name="radioFilter" id="Tutti" checked>
    <label class="form-check-label" for="Tutti">
        Senza filtri
    </label>
</div>
<?php foreach ($group as $key => $value) : ?>
    <hr />
    <h4 class=""><?php echo $key; ?></h4>

    <?php foreach ($value as $k => $v) : ?>
        <div class="form-check">
            <input class="form-check-input" value="<?php echo $key; ?>" type="radio" name="radioFilter" id="<?php echo $v["valore"]; ?>">
            <label class="form-check-label" for="<?php echo $v["valore"]; ?>">
                <?php echo $v["valore"]; ?>
            </label>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>