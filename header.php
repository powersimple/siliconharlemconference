<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="shortcut icon" href="<?=get_stylesheet_directory_uri()?>/images/icons/favicon.ico" />

    <!--  
    Document Title
    =============================================
    -->
    <title>Silicon Harlem - 5th Annual Conference, October 26th.</title>
    <!--  
    Favicons
    =============================================
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=get_stylesheet_directory_uri()?>/assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    -->
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <?php 
    wp_head();
    $url = wp_upload_dir();
    global $datasource_table;
    



?>
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
   
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/owl.carousel/dist/<?=get_stylesheet_directory_uri()?>/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/owl.carousel/dist/<?=get_stylesheet_directory_uri()?>/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?=get_stylesheet_directory_uri()?>/assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="<?=get_stylesheet_directory_uri()?>/style.css" rel="stylesheet">
    <link id="color-scheme" href="<?=get_stylesheet_directory_uri()?>/assets/css/colors/default.css" rel="stylesheet">

<script>
    // Wordpress PHP variables to render into JS at outset.
    var active_id = <?=$post->ID?>;
    var active_object = "<?=$post->post_type?>";
    var home_page = <?=get_option( 'page_on_front' )?>;
    var site_title = "<?=get_bloginfo('name')?>";
    var json_path = "<?=get_stylesheet_directory_uri()?>/data/";
    var uploads_path =  "<?=$url['baseurl']?>/";


</script>

  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand header-logo" href="/"><?php dynamic_sidebar( 'header-logo' ); ?></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
            <?php dynamic_sidebar( 'header-menu' ); ?>
            </ul>
          </div>
        </div>
      </nav>
