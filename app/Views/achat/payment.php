<div class="col-12">
    <div class="card overflow-auto">
        <div class="card-body">
            <div class="search-bar mt-3 mb-2 justify-end">
                <form class="search-form d-inline d-md-flex" method="POST" action="#">
               <input id="idSearchPaymentBySaler" class="form-control w-auto" placeholder="Rechercher" type="text" require>
                    <input id="dateLoadModalPaymentby" class="form-control w-auto" title="rechercher par date" type="date" placeholder="Search">
                    <button class="btn btn-outline-primary" id="btnLoadModalPaymentby" onclick="viewAddPaymentby()" type="button"><i class="bi bi-plus-circle">
                            Ajouter payement</i></button>
                    <select class="form-select w-auto" id="kindShowPayment" aria-label="Floating label select example">
                        <option value="0" selected>Details</option>
                        <option value="1" >Sans Details</option>
                    </select>
                    </div>
                </form>
            </div> 
            <table class="table table-borderless datatable" id="tablePaymentGoodby">
                <thead>
                    <tr>
                        <th scope="col">BonAchat</th>
                        <th scope="col" class="last_name">Date</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">TotalBrut</th>
                        <th scope="col">Reduction</th>
                        <th scope="col">NetApayer</th>
                        <th scope="col">MontantPaye</th>
                        <th scope="col">Dette</th>
                        <th scope="col" class="update"> <i class="bi bi-plus-circle"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<p class="center not-found-good"></p>
<div class="card-footer tablePrintListgood">
    <div>Total : <span id="totalBrutPayment"></span></div>
    <div>Reduction : <span id="reductionPayment"></span></div>
    <div>Montant payé : <span id="netToPay"></span></div>
    <div>Dette : <span id="dettePayment"></span></div>
</div>
<div class="card-footer printallgoodby">
    <a class="btn btn-primary " id="btnprintListGoodby" href="<?= base_url("documentExit/ListOfPaymentgoodby/") ?>"><i class="bi bi-printer"></i></a>
</div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modalEditPayment" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center lead">Editer les infos sur le payement : </h3> <span id="idEditpaymentby" hidden></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="form_edit_payment" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group mb-2">

                        <div class="row">
                            <label for="id_saler_edit" class=" col-md-3 ">Bon d'achat</label>
                            <div class="col-md-9">
                                <select class="form-select id-goodby-saler-payment" name="salers" id="id-goodby-saler-payment" aria-label="Floating label select example">
                                    <option value="0" selected>Selectionner</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <div class="row mb-2">
                            <label for="date_edit_goodby" class=" col-md-3">Date de Payement : </label>
                            <div class="col-md-9">
                                <input type="date" name="date_edit_goodby" id="id_date_edit_payment" class="form-control" placeholder="Amount" data-rule-required="1" data-msg-required="This field is required.">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="edit_amountPayed" class=" col-md-3">Montant Payé : </label>
                        <div class="col-md-9">
                            <input type="number" name="edit_amountPayed" value="" id="edit_amountPayed" class="form-control" data-rule-required="1" data-msg-required="This field is required.">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btnEditPaymentby" type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle icon-16">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>Valider</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x icon-16">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>Annuler</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modalAddPayment" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title center lead">Ajouter un bon de payement</h3><span id="addEdit" hidden></span>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <form method="post" enctype="multipart/form-data" id="form_edit_payment" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <div class="row">
                            <label for="id_saler_edit" class=" col-md-3 ">Bon d'achat</label>
                            <div class="col-md-9">
                                <select class="form-select id-goodby-saler-payment" name="salers" id="id-goodby-add-saler-payment" aria-label="Floating label select example">
                                    <option value="0" selected>Selectionner</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <div class="row mb-2">
                            <label for="date_edit_goodby" class=" col-md-3">Date de Payement : </label>
                            <div class="col-md-9">
                                <input type="date" name="id_date_Addpayment" id="id_date_Addpayment" class="form-control" placeholder="Amount" data-rule-required="1" data-msg-required="This field is required.">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="edit_amountPayed" class=" col-md-3">Montant Payé : </label>
                        <div class="col-md-9">
                            <input type="number" name="add_amountPayed" value="" id="add_amountAddPayed" class="form-control" data-rule-required="1" data-msg-required="This field is required.">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="btnAddPaymentby" type="button" class="btn btn-primary"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle icon-16">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg> Ajouter</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x icon-16">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>Annuler</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script text="script">
    function handleDate(date) {
        var now = new Date(date)
        if (date == '') {
            now = new Date()
        }
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var mydate = now.getFullYear() + "-" + (month) + "-" + (day)
        return mydate
    }

    function viewAddPaymentby() {
        myDate = new Date();
        $('#modalEditPayment #idEditpaymentby').text("addPayment") // span hidden
        $('#modalEditPayment .modal-title.center.lead').text("Ajouter un bon de payement")
        $('[name="edit_amountPayed"]').val('')
        $('#id_date_edit_payment').val(handleDate(''))
        $('#id-goodby-saler-payment').val('')
        $('#modalEditPayment').modal('show')
        //console.log(Intl.DateTimeFormat('fr').format(myDate))
    }

    function editModalPayment(id) {
        $("#idEditpaymentby").text(id)
        $('#modalEditPayment .modal-title.center.lead').text("Editer un bon de payement")
        $('#modalEditPayment #idEditpaymentby').text(id)
        $.ajax({
            type: "GET",
            url: "<?= base_url() ?>/payment_good_by/getElementPayment/" + id,
            dataType: "JSON",
            success: function(data) {
                $('#modalEditPayment').modal('show')
                $('[name="edit_amountPayed"]').val(data.amount)
                $('#id_date_edit_payment').val(handleDate(data.datePayement))
                $('#id-goodby-saler-payment').val(data.idGoodby)
            }
        });

    }
</script>