<?php echo view("includes/header"); ?>
<div class="container p-4">
                <?php if (1): ?>
                <div class="alert-info text-center">
                    <?php
               var_dump($user_info)
               // var_dump($_SESSION['use_connected']->id)
?>
                </div>
                <?php endif;?>
            </div>
<?php echo view("includes/footer"); ?>
