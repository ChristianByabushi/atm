<?=view('./includes/header.php')?>
<style>
#bodyListgoodbyprint{
    background-color: white; 
    margin: 0 auto;
    height: 90%;
}
.card-header {
    height: 10%;
    text-decoration: underline cornflowerblue;
    margin-bottom: 2rem;
}

#tableInvoiceprintgoodbyone thead th {
    width: 90%;
    background-color: rgb(35, 71, 125);
    color: seashell   
}
#printAllGoodbySelected{
    width: 70%;
}
#printAllGoodbySelected tbody tr td {
    text-align: center;
    background-color:rgb(156, 156, 156);
    border-bottom: inherit 1px rgb(68, 16, 157);
}
#printAllGoodbySelected thead tr th,
#printAllGoodbySelected tbody tr td{ 
    border: 1px solid rgb(68, 16, 157); 
    border-collapse:collapse;
    text-align: center;
    background-color:rgb(156, 156, 156);
    text-align: center; 
    color: black;
}
#printAllGoodbySelected thead tr{ 
    color: white;
    height: 10px;
}
.downprintresultlist tbody tr td{
    text-align: left;
}
.identityCie {
    margin-top: 10px;
    margin-bottom: 10px;
}
#printAllGoodbySelected{
    margin-bottom: 15px;
}
.Operator, .card-header{
    color: rgb(35, 71, 125);
    margin-bottom: 3px;
}
</style>
<div id="bodyListgoodbyprint">
    <div class="card-header">
        <h1 class="mb-0">Liste des factures</h1>
    </div>
    <div class="identityCie">
            <h3 class="text-dark Operator">HumanTM</h3>
            <div>Kadutu</div>
            <div>Av Hopital general : 110034</div>
            <div>Phone: +91 9897 989 989</div>
            <label>Date du rapport : </label> <span> <?=$dateRapport?></span>
    </div>
    <div class="">
        <table class="table" id="printAllGoodbySelected">
        <thead class="thead-light" style="background-color:saddlebrown;">
        <h3 class="text-dark Operator">Factures</h3>
                
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="last_name">DateAchat</th>
                    <th scope="col" class="gender">TotolBrut</th>
                    <th scope="col" class="gender">Reduction</th>
                    <th scope="col" class="gender">NetApayer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listGoodby as $item) {?>
                        <tr>
                            <td> <?=$item->idGoodby?> </td>
                            <td> <?=$item->create_at?> </td>
                            <td> <?=number_format((float) $item->TotalApayer, 3, '. ', '')?></td>
                            <td><?=number_format((float) $item->reduction, 3, '. ', '')?> </td>
                            <td><?=number_format((float) $item->netApayer, 3, '. ', '')?> </td>
                        </tr>
                        <?php }?>
            </tbody>
        </table>
    </div>

    <table class="table table-light downprintresultlist">
        <tbody>
            <tr class="left">
                <td>
                    <strong class="text-dark Operator">Reduction totale Facture :</strong>
                    <strong class="right"><?=number_format((float) $resultListGoodby->reductionTotgoodby, 3, '. ', '')?> $</strong>
                </td>
            </tr>
            <tr class="left">
                <td>
                    <strong class="text-dark Operator">Total Brut : </strong>
                    <strong class="right"><?=number_format((float) $resultListGoodby->TotalApayer, 3, '. ', '')?> $</strong>
                </td>
            </tr>

            <tr class="left">
                <td id="totalNettopayprint">
                    <strong class="text-dark Operator">Total net payer:  </strong>
                    <strong class="right"><?=number_format((float) $resultListGoodby->netApayer, 3, '. ', '')?>$</strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?=view('./includes/footer.php')?>