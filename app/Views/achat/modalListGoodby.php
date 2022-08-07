 <!-- Bootstrap modal -->
 <div class="modal fade" id="modalEditFact" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h3 class="modal-title center lead">Modifier le bon d'achat</h3>

                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">X</span></button>
             </div>
             <form method="post" enctype="multipart/form-data" id="form_edit_good_by" class="form-horizontal">
                 <div class="modal-body">

                     <div class="form-group mb-2">
                         <label class="col-md-12 center display-7 lead"> Bon d'achat numero : <span name="idEditgoodby"
                                 id="idEditgoodby"></span>
                     </div>

                     <div class="form-group mb-2">
                         <div class="row mb-2">
                             <label for="date_edit_goodby" class=" col-md-3">Date</label>
                             <div class="col-md-9">
                                 <input type="date" name="date_edit_goodby" id="id_date_edit_goodby"
                                     class="form-control" placeholder="Amount" data-rule-required="1"
                                     data-msg-required="This field is required.">
                             </div>
                         </div>
                     </div>

                     <div class="form-group mb-2">
                         <div class="row">
                             <label for="id_saler_edit" class=" col-md-3">Fournisseur : </label>
                             <div class="col-md-9">
                                 <select class="form-select chooseAllSaler" name="salers" id="salers_for_edit"
                                     aria-label="Floating label select example">
                                     <option value="0" selected>Selectionner</option>
                                 </select>
                             </div>
                         </div>
                     </div>

                     <div class="row mb-2">
                         <label for="edit_reduction_goodby" class=" col-md-3">Reduction :</label>
                         <div class="col-md-9">
                             <input type="number" name="edit_reduction_goodby" value="" id="edit_reduction_goodby"
                                 class="form-control" data-rule-required="1"
                                 data-msg-required="This field is required.">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                         <button id="btnEditSaveGoodby" type="button" class="btn btn-primary"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle icon-16">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>Enregistrer</button>
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
 <div id="loader"></div>
 <script text="script">
function handleDate(date){ 
    var now = new Date(date)
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var mydate = now.getFullYear() + "-" + (month) + "-" + (day); 
    return mydate
}
function hideModel(){
    $('#modalEditFact').hide() 
    console.log("r")
}
function editModalGoodby(id) {
   //  $('#datePicker').val(today);
    $("#idEditgoodby").text(id) 
    $.ajax({
        type: "GET",
        url: "<?=base_url()?>/purchase_good_by/getDataGood_by/" + id,
        dataType: "JSON",
        success: function(data) { 
            var spinner = $('#loader');
            $('#edit_reduction_goodby').val(data.reduction)
            $('#modalEditFact').modal('show')
            $('[name="date_edit_goodby"]').val(handleDate(data.create_at))
            $('#salers_for_edit').val(data.id)
        }
    });
}

function deleteModalGoodby(id) {
   if(confirm("Voulez-vous vraiment supprimé l'item "+id+" ?")){
    $.ajax({
        type: "GET",
        url: "<?=base_url()?>/purchase_good_by/deleStockItem/" + id,
        dataType: "JSON",
        success: function(data) {
            alert("Stockage supprimé avec succès")
        }
    });
   }
}
 </script>