<div class="offset-xl-212 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card invoice">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <h3 class="mb-0">Bon achat</h3>
                </div>
            </div>
        </div>
        <div class="row mb-4 p-2">
            <div class="col-sm-6">
                <h3 class="text-dark mb-3 Operator">HumanTM</h3>
                <div>Kadutu</div>
                <div>Av Hopital general110034</div>
                <div>Phone: +91 9897 989 989</div>
            </div>
            <div class="col-sm-6">
                <h3 class="text-dark">Numero du bon</h3>
                <input id="numeroGoodby" class="form-control mb-3" type="number" name="">
                <h3 class="text-dark mb-3">Saler</h3>
                <p>
                    <select class="form-select" name="salers" id="chooseAllSaler"
                        aria-label="Floating label select example">
                        <option value="0" selected>Selectionner</option>
                    </select>
                </p>
            </div>
            <div class="col-sm-6 mt-3">
                <label>Date d'achat :</label> <input class="" id="dateGoodby" name="dateFacture" type="date">
            </div>

        </div>

        <div class="table-responsive-sm invoice">
            <table class="table" id="tableInvoice">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>PT</th>
                        <th>Reduction</th>
                        <th> Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 ml-auto mt-4">
                <table class="table table-clear " id="tableAmountPurchase">
                    <tbody>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Reduction totale des biens : </strong>
                            </td>
                            <td id="discountTotalFact" class="right">$ <span class="mount"></span></td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Total Brut : </strong>
                            </td>
                            <td id="subTotalFact" class="right">$ <span class="mount"></span> </td>
                        </tr>
                        <tr>
                            <td class="left">
                                <p class="lead">
                                    <span class="idChangeReductAuto">Reduction le bon d'achat<input
                                            id="idChangeReductAuto" type="number">(%) : </span>
                                    <input class="form-control" type="number" id="idChangeReductManu">
                                </p>
                            </td>
                            <td class="right">$</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Total Net à Payer :</strong>
                            </td>
                            <td id="totalNetTopay" class="right">
                                <strong class="text-dark">$ <span class="mount"></span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white">
        <button class="btn btn-primary" id="btnValidFact" type="button">Valider</button>
    </div>
</div>