
<div class="modal fade" id="info_produit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="id_produit"></h6>
                <h5 class="modal-title" id="infoModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="details_produit">
                </div>
            </div>

            <div class="modal-footer text-center">
                <select name="quantite" id="quantite">
                    <?php
                    for ($i = 1; $i < 21; $i++) {
                        ?>
                        <option id="combien" value="<?php print $i; ?>"><?php print $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-hand-point-right fa-3x"></i>
                <button type="button" class="btn btn-primary dans_panier" id="clic_panier">Dans mon panier</button>
                <div id="ok"></div>
            </div>
        </div>
    </div>
</div>


