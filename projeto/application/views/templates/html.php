<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <?php $dat['admin'] = true;?>
    <?php $this->load->view('templates/head',$dat)?>
    <?php $this->load->view('templates/body')?>