<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic page needs -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
    <?=$title?>
  </title>
  <base href="http://localhost/shopping1802/">
  <!-- Mobile specific metas  , -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon  -->
  <link rel="shortcut icon" type="image/x-icon" href="public/favicon.ico">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,200,500,600,700,800' rel='stylesheet' type='text/css'>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
  <!-- font-awesome & simple line icons CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="public/css/simple-line-icons.css" media="all">

  <!-- owl.carousel CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="public/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="public/css/owl.transitions.css">

  <!-- animate CSS  -->
  <link rel="stylesheet" type="text/css" href="public/css/animate.css" media="all">

  <!-- flexslider CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/flexslider.css">

  <!-- jquery-ui.min CSS  -->
  <link rel="stylesheet" type="text/css" href="public/css/jquery-ui.css">

  <!-- Revolution Slider CSS -->
  <link href="public/css/revolution-slider.css" rel="stylesheet">

  <!-- style CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/style.css" media="all">

  <!-- jquery js -->
  <script type="text/javascript" src="public/js/jquery.min.js"></script>
</head>

<body class="cms-index-index cms-home-page">
  <div id="page">

    <!-- Header -->
    <header>
      <div class="header-container">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-4 hidden-xs">
                <!-- Default Welcome Message -->
                <div class="welcome-msg ">Welcome to MyStore! </div>
                <span class="phone hidden-sm">Call Us: +123.456.789</span>
              </div>

              <!-- top links -->
              <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                  <div class="myaccount">
                    <a title="My Account" href="account_page.html">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs">My Account</span>
                    </a>
                  </div>

                  <div class="login">
                    <a href="account_page.html">
                      <i class="fa fa-unlock-alt"></i>
                      <span class="hidden-xs">Log In</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
              <!-- Header Logo -->
              <div class="logo">
                <a title="e-commerce" href="index.html">
                  <img alt="responsive theme logo" src="public/images/logo.png">
                </a>
              </div>
              <!-- End Header Logo -->
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
              <!-- Search -->

              <div class="top-search">
                <div id="search">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="search">
                      <button class="btn-search" type="button">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- End Search -->
            </div>
            <!-- top cart -->

            <div class="col-lg-3 col-xs-3 top-cart">
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                    <a href="#">
                      <div class="cart-icon">
                        <i class="fa fa-shopping-cart"></i>
                      </div>
                      <div class="shoppingcart-inner hidden-xs">
                        <span class="cart-title">Shopping Cart</span>
                        <span class="cart-total">4 Item(s): $520.00</span>
                      </div>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
              <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
              </div>
              <span class="mm-label">Categories</span>
            </div>
            <div class="mega-container visible-lg visible-md visible-sm">
              <div class="navleft-container">
                <div class="mega-menu-title">
                  <h3>Categories</h3>
                </div>
                <div class="mega-menu-category">
                  <ul class="nav">
                    <?php foreach($categories as $menu):?>
                    <li class="nosub">
                      <a href="<?=$menu->url?>">
                        <i class="icon fa 
                        <?=$menu->icon?>"></i> <?=$menu->name?></a>
                    </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="index.html">
                      <div class="title title_font">
                        <span class="title-text">Home</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="contact_us.html">
                      <div class="title title_font">
                        <span class="title-text">Contact Us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="about_us.html">
                      <div class="title title_font">
                        <span class="title-text">about us</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="blog_full_width.html">
                      <div class="title title_font">
                        <span class="title-text">Blog</span>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav -->
    <?php 
    require_once "$view.view.php";
    ?>
    
    <!-- Footer -->
    <?php include 'views/footer.view.php';?>
    <a href="#" class="totop"> </a>
    <!-- End Footer -->

  </div>
  <!-- JS -->
  <!-- bootstrap js -->
  <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
  <!-- owl.carousel.min js -->
  <script type="text/javascript" src="public/js/owl.carousel.min.js"></script>
  <!-- bxslider js -->
  <script type="text/javascript" src="public/js/jquery.bxslider.js"></script>
  <!-- Slider Js -->
  <script type="text/javascript" src="public/js/revolution-slider.js"></script>
  <!-- megamenu js -->
  <script type="text/javascript" src="public/js/megamenu.js"></script>
  <script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';
  /* ]]> */
  </script>

  <!-- jquery.mobile-menu js -->
  <script type="text/javascript" src="public/js/mobile-menu.js"></script>

  <!--jquery-ui.min js -->
  <script type="text/javascript" src="public/js/jquery-ui.js"></script>

  <!-- main js -->
  <script type="text/javascript" src="public/js/main.js"></script>

  <!-- countdown js -->
  <script type="text/javascript" src="public/js/countdown.js"></script>

  <!-- Revolution Slider -->
  <script type="text/javascript">
    jQuery(document).ready(function () {
      jQuery('.tp-banner').revolution(
        {
          delay: 9000,
          startwidth: 1170,
          startheight: 530,
          hideThumbs: 10,
          navigationType: "bullet",
          navigationStyle: "preview1",
          hideArrowsOnMobile: "on",
          touchenabled: "on",
          onHoverStop: "on",
          spinner: "spinner4"
        });
    });
  </script>
  <script>
    $('.mega-menu-category').hide()
  </script>
</body>

</html>