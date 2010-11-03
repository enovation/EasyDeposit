<?php $this->load->helper('url'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">
        <title>NDLR Easy Deposit - <?php echo $page_title; ?></title>
	<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url();?>css/ndlr-style.css' />
        <!--<link rel='stylesheet' type='text/css' media='all' href='http://www.ndlr.ie/theme/raw/static/style/style.css' />-->
	<link rel="SHORTCUT ICON" href="favicon.ico">
        <?php if (!empty($javascript)) { foreach ($javascript as $js): ?>
	<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url(); ?>css/jquery.mcdropdown.min.css' />
 	
       <script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $js; ?>"></script>
        <?php endforeach; } ?>


    </head>
    <body>
	<img src="<?php echo base_url(); ?>images/ndlr-site-logo.png"/>
        <div id="header"><h1>NDLR Easy Deposit - <?php echo $page_title; ?></h1></div>
