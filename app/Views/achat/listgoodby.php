<!-- Table with stripped rows -->
<div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">

    </form>
</div><!-- End Search Bar -->
<div class="listgoodby">
    <div class="col-12">
        <div class="card overflow-auto">
            <div class="card-body">
                <div class="search-form d-inline-flex  align-items-center">
                    <input id="dateListOfgoodby" class="form-control" name="dateListgoodBy" type="date">


                </div>


                <table class="table table-borderless datatable " id="tablePrintListgood">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">DateCreation</th>
                            <th scope="col">Fournisseur</th>
                            <th scope="col">TotolBrut</th>
                            <th scope="col">Reduction</th>
                            <th scope="col">NetApayer</th>
                            <th scope="col"> <i class="bi bi-plus-circle"></i></th>
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
        <div>Total Brut : <span id="totalGoodbyPrint"></span></div>
        <div>Reduction : <span id="reductionGoodbyPrint"></span></div>
        <div>Total Net : <span id="totalNetGoodbyPrint"></span></div>
    </div>
    <div class="card-footer printallgoodby">
        <a class="btn btn-primary " id="btnprintListGoodby" href="<?=base_url("documentExit/ListOfgoodby/")?>"><i
                class="bi bi-printer"></i></a>
    </div>
</div>
<?=view('achat/modalListGoodby')?>