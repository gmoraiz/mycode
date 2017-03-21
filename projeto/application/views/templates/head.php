<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/foundation.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css" />
    <script src="<?php echo base_url()?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/foundation.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
    <?php if ($admin){
        echo "<script src=".base_url()."assets/js/admin.js></script>";
    }?>
</head>