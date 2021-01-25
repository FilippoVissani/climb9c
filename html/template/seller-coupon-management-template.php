<div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2">Operazione andata a buon fine</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-text" class="fs-3"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3 px-3">
    <div class="col-md-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header fw-bold fs-4">
                Aggiungi coupon
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="coupon-code-label">Codice sconto</span>
                    <input type="text" class="form-control" aria-describedby="coupon-code-label" id="add-coupon-code">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="coupon-discount-label">Percentuale sconto</span>
                    <input type="number" class="form-control" aria-describedby="coupon-discount-label" id="add-coupon-discount">
                </div>
                <button class="btn btn-primary" id="add-coupon">Aggiungi</button>
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
                    <input type="number" class="form-control" aria-describedby="coupon-discount" id="edit-coupon-discount">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="edit-coupon-validity">
                    <label class="form-check-label" for="edit-coupon-validity">
                        Valido
                    </label>
                </div>
                <button class="btn btn-primary" id="edit-coupon">Applica modifica</button>
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
                    $("input#edit-coupon-discount").val($(item).get(1));
                    $("input#edit-coupon-validity").prop("checked", $(item).get(2));
                }
            });
        }
        let coupons = new Array();
        <?php foreach($templateParams["coupons"] as $coupon): ?>coupons.push(new Array("<?php echo $coupon["code"] ?>", <?php echo $coupon["discount"] ?>, <?php echo $coupon["validity"] ?>));<?php endforeach; ?>
        fillInput();
        $("select").change(function(){
            fillInput();
        });

        $("button#add-coupon").click(function(){
            let code = $("input#add-coupon-code").val();
            let discount = $("input#add-coupon-discount").val();
            $.ajax({
                url: "./AJAX-manage-coupon.php",
                method: "POST",
                data: {
                  code: code,
                  discount: discount
                }
            });
            $("p#modal-text").text("Coupon inserito con successo!");
            $("div#modal").modal("show");
        });

        $("button#edit-coupon").click(function(){
            let validity = $("input#edit-coupon-validity").prop('checked');
            let discount = $("input#edit-coupon-discount").val();
            let selectedCoupon = $("select").val();
            $.ajax({
                url: "./AJAX-manage-coupon.php",
                method: "POST",
                data: {
                  code: selectedCoupon,
                  discount: discount,
                  validity: validity ? 1 : 0
                }
            });
            $("p#modal-text").text("Coupon modificato con successo!");
            $("div#modal").modal("show");
        });
    });
</script>