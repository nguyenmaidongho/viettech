<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" data-load="<?=$menuPage->name?>">
<head>
    <base href="<?=baseUrl?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="upload/<?=$infoPage->logo ?>" />
    <title><?=$title ?></title>
    <meta http-equiv="content-language" content="vi" />
    <meta name="title" content="<?=$title?>"/>
    <meta name="description" content="<?=$des?>" />
    <meta name="keywords" content="<?=$keywords?>" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="revisit-after" content="1 days" />
    <?php if($config->notMobile == 0){ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php }else{ ?>
    <meta name="viewport" content="width=1280, initial-scale=0,maximum-scale=0" />
    <?php } ?>
    <meta property="og:title" content="<?=$title?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:url" content="<?=pageUrl()?>" />
    <meta property="og:image" content="<?=baseUrl.'upload/'.$image?>" />
    <meta property="og:description" content="<?=$des?>" />
    <meta property="fb:app_id" content="174220409684186" />
    <meta name="google-site-verification" content="<?=$infoPage->googleVerification?>" />
    <link rel="canonical" href="<?=pageUrl()?>">
    <script type="text/javascript" src="admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/plugins/font-awesome/css/font-awesome.min.css" />
    
    <link rel="stylesheet" type="text/css" href="admin/plugins/bootstrap/css/bootstrap.min.css" />
    <script defer type="text/javascript" src="admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="admin/plugins/simplyscroll/jquery.simplyscroll.css"/>
    <script defer type="text/javascript" src="admin/plugins/simplyscroll/jquery.simplyscroll.js"></script> -->

    <!-- <link rel="stylesheet" type="text/css" media="screen" href="admin/plugins/fancybox/jquery.fancybox.css"/>
    <script defer type="text/javascript" src="admin/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script defer type="text/javascript" src="admin/plugins/fancybox/jquery.mousewheel-3.0.6.pack.js"></script> -->

    <!-- <link rel="stylesheet" type="text/css" href="admin/plugins/bxslider/jquery.bxslider.css"/>
    <script defer type="text/javascript" src="admin/plugins/bxslider/jquery.bxslider.min.js"></script> -->
    <script defer type="text/javascript" src="admin/plugins/nprogress/nprogress.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/plugins/nprogress/nprogress.css"/>
    
    <link rel="stylesheet" type="text/css" href="admin/plugins/bootstrap-dropdown/css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="admin/plugins/bootstrap-dropdown/css/bootstrap-dropdownhover.min.css"/>
    <script defer type="text/javascript" src="admin/plugins/bootstrap-dropdown/js/bootstrap-dropdownhover.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="admin/plugins/wow/animate.min.css" /> -->
    <script defer type="text/javascript" src="admin/plugins/wow/wow.min.js"></script>

    <script defer type="text/javascript" src="admin/assets/js/custom.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "admin/assets/js/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
