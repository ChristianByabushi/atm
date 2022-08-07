<body class="body_identitygoodby">
    <div id="body_identitygoodby">
        <div class="card invoice">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <h1 class="mb-0">Bon achat</h1>
                    </div>
                </div>
            </div>
            <div class="identitygoodby">
                <div class="at1">
                    <h3 class="text-dark mb-3 Operator">HumanTM</h3>
                    <div>Kadutu</div>
                    <div>Av Hopital general : 110034</div>
                    <div>Phone: +91 9897 989 989</div>
                    <label>Date d'achat :</label> <?=$resultgoodby->create_at?> <span></span>
                </div>
                <div class="at3">
                    <h3 class="text-dark">Numero du bon : <?=$resultgoodby->idGoodby?> </h3>
                    <h3 class="text-dark mb-3">Saler : <?=$resultgoodby->nameSaler?></h3>
                </div>
            </div>
            <div class="">
                <table class="table" id="tableInvoiceprintgoodbyone">
                    <thead class="thead-light" style="background-color:saddlebrown;">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>TotBrut</th>
                            <th>Reduction</th>
                            <th>PT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {?>
                        <tr>
                            <td> <?=$item->idStock?> </td>
                            <td> <?=$item->title?> </td>
                            <td> <?=$item->description?> </td>
                            <td><?=number_format((float) $item->puby, 3, ' ,', '')?> </td>
                            <td> <?=$item->qteby?> </td>
                            <td><?=number_format((float) $item->totbrutNoReduction, 3, ' ,', '')?> </td>
                            <td> <?=number_format((float) $item->reduction, 3, ' ,', '')?></td>
                            <td><?=number_format((float) $item->pt, 3, ' ,', '')?> </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
            <table class="table table-light downprintresult">
                <tbody>
                    <tr class="left">
                        <td>
                            <strong class="text-dark">Reduction totale Facture :</strong>
                            <strong id="discountTotalFact" class="right">
                                <span class="mount">
                                    <?=number_format((float) $resultgoodby->ReductionBrute, 3, ' ,', '')?> $
                                </span></strong>
                        </td>
                    </tr>
                    <tr class="left">
                        <td>
                            <strong class="text-dark">Total Brut : </strong>
                            <strong id="subTotalFact" class="right">
                                <span class="mount">
                                    <?=number_format((float) $resultgoodby->totNoReduction, 3, ' ,', '')?> $
                                </span></strong>
                        </td>
                    </tr>
                    <tr class="left">
                        <td>
                            <strong>Reduction Hors Facture :</strong>
                            <span class="mount">
                                <?=number_format((float) $resultgoodby->reductionBon, 3, ' ,', '')?> $
                            </span></strong>
                        </td>
                    </tr>
                    <tr class="left">
                        <td id="totalNettopayprint">
                            <strong>Total Net à Payer :</strong>
                            <span class="mount">
                                <?=number_format((float) $resultgoodby->netApayer, 3, ' ,', '')?> $
                            </span></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white">
            <div class="Recepteur">Recepteur</div>
            <div class="Signature">Signature</div>