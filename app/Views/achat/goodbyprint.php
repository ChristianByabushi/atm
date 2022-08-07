<?=view('./includes/header.php')?>
<style>
.card-header {
    color: cornflowerblue;
}

#totalNettopayprint {
    background-color: rgb(158, 154, 154);
    color: #13151a;
}

#tableInvoiceprintgoodbyone,
table.downprintresult {
    margin-top: 20px;
}

#tableInvoiceprintgoodbyone thead th {
    background-color: rgb(35, 71, 125);
    color: seashell
}

#tableInvoiceprintgoodbyone tbody tr td {
    text-align: center;
    background-color: rgb(158, 154, 154);
    border-bottom: inherit 1px rgb(68, 16, 157);
}

.identitygoodby .at3 {
    position: absolute;
    left: 58%;
    top: 80px;
}

.card-footer .Recepteur {
    position: absolute;
    left: 25%;
    bottom: 200px;
}

.card-footer .Signature {
    position: absolute;
    left: 35%;
    bottom: 200px;
}

#body_identitygoodby { 
    padding: 2px 2px 2px 2px;
    margin: 0 auto;
    width: 50%;
    height: 90%;
    background-color:white;  
    background-image: url("<?=base_url()?>/assets/img/card.jpg");  
    background-repeat: no-repeat;
    background-size: cover; 
    background-position: 50% 0;
    border: 1px;
}
#body_identitygoodby{ 
     
    height: 100vh;
    width: 100vw;
    background-color: aliceblue;
}
</style>
<?=view('./achat/printbymain.php')?>
<?=view('./achat/printbyfooter.php')?>
