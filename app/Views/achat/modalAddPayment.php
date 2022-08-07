<div class="modal fade" id="modalEditPayment" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center lead">Editer les infos sur le payement : <span name="idEditpaymentby"
                        id="idEditpaymentby"></span></h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">X</span></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="form_edit_payment" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <div class="row">
                            <label for="id_saler_edit" class=" col-md-3 ">Bon d'achat</label>
                            <div class="col-md-9">
                                <select class="form-select classGoodby" name="salers" id="id-goodby-saler-payment"
                                    aria-label="Floating label select example">
                                    <option value="0" selected>Selectionner</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <div class="row mb-2">
                            <label for="date_edit_goodby" class=" col-md-3">Date de Payement : </label>
                            <div class="col-md-9">
                                <input type="date" name="date_edit_goodby" id="id_date_edit_payment"
                                    class="form-control" placeholder="Amount" data-rule-required="1"
                                    data-msg-required="This field is required.">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="edit_amountPayed" class=" col-md-3">Montant Payé : </label>
                        <div class="col-md-9">
                            <input type="number" name="edit_amountPayed" value="" id="edit_amountPayed"
                                class="form-control" data-rule-required="1" data-msg-required="This field is required.">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnEditPaymentby" type="button" class="btn btn-primary"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle icon-16">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg> Valider les modifications</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal"><svg
                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x icon-16">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>