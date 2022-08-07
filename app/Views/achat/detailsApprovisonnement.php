<div class="modal fade" id="modalAdd" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center lead">Ajouter un bon d'achat</h3>

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">X</span></button>
            </div> 
            <form method="post" enctype="multipart/form-data" id="" class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm justify-content-center">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="details-item-title">Details item achat</h4>
                                <div class="col-sm-4 itemPurchased">
                                    <div class="card">
                                        <h5 id="titleItem" class="card-title item"><span id="idItemDetails">1</span>)
                                            <span id="titleItm">ItemExample</span>
                                        </h5>
                                        <img class="card-img" id="imgItem" src="<?=base_url()?>/assets/img/card.jpg"
                                            alt="">
                                        <p class="card-text text-info">Dimension <span id="dimensionItem">11cm</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col px-md-5  ">
                                    <div class="details-item-purchased">
                                        <p class="lead mb-4"><span> Description :</span> <textarea class="form-control"
                                                type="text" id="idDescriptionDetails" name=""> </textarea> </p>
                                        <p class="lead"> <span>Pu ($): </span> <input class="form-control" type="number"
                                                id="puDetails" name="pu"></p>
                                        <p class="lead"> <span>Qty (nbPieces):</span> <input class="form-control"
                                                type="number" id="qteDetails" name="qte"> </p>
                                        <p class="lead totPricePara"><span> TotalPrice ($) :</span> <input
                                                class="form-control" id="totalPrice" type="number" name="">
                                        </p>
                                        <p class="lead" id="reduct">
                                            <span>Reduction<input id="idPercentReduct" type="number">(%) : </span>
                                            <input class="form-control" type="number" id="idPercentReductMount">
                                        </p>
                                        <p class="lead mb-4 netPayPara"><span>Net à payer($) ===></span> <label
                                                id="netToPayFact">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 sendInvoice">
                                <div class="card-footer">
                                    <button class="btn btn-primary" id="btnSubmitItem" type="button">Envoyer au bon
                                        d'achat</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button id="btnAddSaveGoodby" type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle icon-16">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg> Enregistrer</button>
            <button type="button info" class="btn btn-info" data-bs-dismiss="modal"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x icon-16">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>Fermer</button>
        </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->