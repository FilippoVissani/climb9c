<div class="row mt-3 px-3">
    <div class="col-md-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header fw-bold fs-4">
                Aggiungi coupon
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="coupon-code">Codice sconto</span>
                    <input type="text" class="form-control" aria-describedby="coupon-code">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="coupon-discount">Percentuale sconto</span>
                    <input type="number" class="form-control" aria-describedby="coupon-discount">
                </div>
                <button class="btn btn-primary">Aggiungi</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header fw-bold fs-4">
                Modifica coupon
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="coupon-select">
                        <?php foreach($templateParams["coupons"] as $coupon): ?>
                        <option value="<?php echo $coupon["code"] ?>"><?php echo $coupon["code"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="coupon-discount">Percentuale sconto</span>
                    <input type="number" class="form-control" aria-describedby="coupon-discount" id="discount">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="validityCheck">
                    <label class="form-check-label" for="validityCheck">
                        Valido
                    </label>
                </div>
                <button class="btn btn-primary">Applica modifica</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        function fillInput(){
            let selectedCoupon = $("select").val();
            coupons.forEach(function(item, index, array){
                if($(item).get(0) == selectedCoupon){
                    $("input#discount").val($(item).get(1));
                    $("input#validityCheck").prop("checked", $(item).get(2));
                }
            });
        }
        let coupons = new Array();
        <?php foreach($templateParams["coupons"] as $coupon): ?>coupons.push(new Array("<?php echo $coupon["code"] ?>", <?php echo $coupon["discount"] ?>, <?php echo $coupon["validity"] ?>));<?php endforeach; ?>
        fillInput();
        $("select").change(function(){
            fillInput();
        });
    });
</script>