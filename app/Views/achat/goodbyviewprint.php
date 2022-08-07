<?=view('./includes/header.php')?>
<?=view('./achat/printbymain.php')?>
<a class="btn btn-primary" id="btnprintOneGoodby" href="<?= base_url("documentExit/printgoodby/". $resultgoodby->idGoodby)?>">
<i class="bi bi-printer"></i></a>            
<?=view('./achat/printbyfooter.php')?> 
<?=view('./includes/footer.php')?>

