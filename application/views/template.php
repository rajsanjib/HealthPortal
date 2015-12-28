<?php

/*
 * This template loads header, footer and main content
 * Main content is passed as a parameter from controller
 * Only called through controller
 */

?>

<!-- Load header -->
<?php $this->load->view('includes/header.php')?>

<!-- Load main content or page body -->
<?php $this->load->view($main_content) ?>

<!-- Load footer -->
<?php $this->load->view('includes/footer.php'); ?>
