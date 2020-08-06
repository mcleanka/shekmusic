<?php
	function load_header($page, $title){
		return require_once('includes/templates/header.php');
	}

	function load_plugins_header($page, $title){
        if (isset($_GET["key"])) {
            $fullname = $_GET["key"];
            $Query = "SELECT * FROM tbl_video WHERE title LIKE '%$fullname%' LIMIT 5";
            $ExecQuery = mysqli_query($db, $Query);
            $output = '';
            $rows = mysqli_num_rows($ExecQuery);
            if ($rows > 0) {
                while ($row = mysqli_fetch_array($ExecQuery)){

                    $t = strlen($row['title']) > 10 ? substr($row['title'], 0, 30).'...' : $row['title'];
                    $name = $row['artist'].' -- '.$t;
                    $result = strlen($name) > 20 ? substr($name, 0, 30).'...' : $name;
                    $url = '../video-player.php?id='.$row['id'].'&amp;artist='.$row['artist'];
                    $output .= '<li style="width: 100%">
                    <a href="'.$url.'">
                        <strong>
                            '.$result.'
                        </strong>
                    </li>';
                }
            }else{
                echo "No Result Found";
            }

            echo $output;
        }

		$t = isset($title) ? $title.' ·' : '';
    	$url = '#menu-main > ul > li > a[href="../'.$page.'"]';
		$p_header = "
<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset='utf-8'>
    <meta name='keywords' content='shekmusic.com, Entertaining the Nation, download music, music videos, free download, mp3 download, Mp4, Download, Download Mp3, Download Mp4, Video Download, watch videos'/>
    <meta name='description' content='shekmusic.com is the newly born website that enable users to watch, download and upload their the Latest &amp; Best Collections of Music, Music Videos, Albums, Entertainment News, Upcoming Events, all For FREE!' /> 
    <meta name='author' content='Mclean Classic Kasambala'/>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='icon' href='favicon.png' type='../image/favicon.png' />
    <title> $t Shekmusic</title>

    <link rel='stylesheet' href='../assets/font-awesome/css/font-awesome.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='../assets/css/frontend.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='../assets/css/extend-lib.css' type='text/css' media='all'>
    <link rel='stylesheet' href='../assets/css/tn-style.min.css' type='text/css' media='all'>

    <script src='../assets/js/jquery.js'></script>
  <script>
    $(document).ready(function(){
        $('$url').css('background-color','#eeeaf0');
        $('$url').css('color','#006699');
        $('$url').css('border-bottom','3px #006699 solid'); 
    });
</script>

<style type='text/css' media='all'>

    .tn-navbar {
        color: #006699;
    }
    body  {
        font-family:'Times New Roman', Times,serif;text-transform:none;font-size:15px;
    }

    .block-title,.single-style1-title,.single-style2-title,.author-title,.search-submit,.single-nav-title-wrap,
    .review-widget-post-title,.review-widget-score,.single-review-element,.single-review-summary h3,.block-big-slider-title,
    .big-carousel-inner,.logo-404,.single-aside-social-wrap .share-title,.social-count-wrap .num-count,.twitter-widget-title h3,
    .block-feature2-slider-title,#main-content .widget .module5-wrap .col-sm-4 .block4-wrap .block-title, #main-content .single-related-wrap .col-sm-4 .block4-wrap .block-title,
    .page-title-wrap,.title-logo, .woocommerce div.product .product_title, .woocommerce .page-title  {
        font-family:Oswald;font-weight:400;text-transform:capitalize;font-size:19px;line-height:27px; }

    .block6-wrap .block-title, .block11-wrap .block-title, .block8-wrap .block-title, .single-tags-source-wrap,
    .widget_categories ul, .widget_pages ul, .single-social-wrap, .widget_nav_menu ul, .widget_archive ul,
    .block9-wrap .block-title, .module-ticker-wrap .block-title, .big-slider-carousel-title, #menu-main .block-title,
    #main-content .widget .col-sm-4 .block4-wrap .block-title, .page-numbers, .block11-wrap .review-score,
    .block11-score-separation, .woocommerce ul.cart_list .product-title, .woocommerce ul.product_list_widget .product-title,
    .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .cart_item .product-name a {
    font-family:Oswald;font-weight:400;text-transform:capitalize;font-size:14px;line-height:19px; }

    /* meta tags font */
    .post-meta, .sub-cate-wrap, .breadcrumbs-bar-wrap, .author-widget-content, .post-categories,
    .rememberme, .register-links, .meta-thumb-wrap, .review-score {
    font-family:Roboto;font-weight:400;text-transform:none;font-size:10px; }

    /* menu font */
    #menu-main > ul > li > a, .tn-sub-menu-wrap, .menu-nav-top, #main-mobile-menu,
    .module-ticker-wrap .block-title {
    font-family:'Times New Roman', Times,serif;font-weight:700;font-size:14px; }

    /* header title font */
    .widget-title h3, .cate-title, .search-page-title, .archive-page-title,
    .side-dock-title h3, .comment-title h3, .related.products h2 {
    font-family:'Times New Roman', Times,serif;font-weight:700;font-size:14px; }

                /* color text */
    .tn-mega-menu-col > .tn-sub-menu-wrap > ul > li > ul > li > a:hover, .tn-sub-menu li a:hover, .cat-item a:before, .widget_pages .page_item a:before, .widget_meta li:before, .widget_archive li a:before,
    .widget_nav_menu .menu-main-nav-container > ul > li > a:before, .widget_rss ul li a, .about-widget-name span, .title-logo a::first-letter,
    .block11-wrap:before, .logo-404 h1, .post-content-wrap a, .post-content-wrap a:hover, .post-content-wrap a:focus, .comment-form .logged-in-as a, .prev-article, .next-article,
     #close-side-dock:hover, .single-review-score, .post-categories li:hover a, .post-categories li:focus a, #recentcomments a, #footer .post-categories a:hover,#footer .post-categories a:focus,
    #main-mobile-menu .current-menu-item a, #main-mobile-menu li a:hover, .block11-score-separation, .block11-wrap .review-score, .single-review-as, .menu-nav-top .sub-menu li a:hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce .page-wrap .star-rating span {
        color: #006699;
    }
    ::selection {
        background: #006699;
        color: #fff;
    }

    ::-moz-selection {
        background: #006699;
        color: #fff;
    }
    #menu-main > ul > li.current-menu-item > a, #menu-main > ul > li > a:hover, .tn-mega-menu-col > .tn-sub-menu-wrap > ul > li > a,
    .ajax-search-icon:hover, .ajax-search-icon:focus, .menu-nav-top li a:hover, .block-big-slider-cate-tag li, .review-score, .drop-caps,
    #comment-submit, .form-submit #submit, .score-bar, .top-score-bar, #toTop i, .no-thumb, .widget-title h3:before, .close-mobile-menu-wrap,
    .tn-ajax-loadmore:hover, .tn-ajax-loadmore:focus, .page-numbers.current, .page-numbers:hover, .page-numbers:focus, .meta-thumb-element:hover,
    .meta-thumb-element:focus, #mobile-button-nav-open:hover, #mobile-button-nav-open:focus, .widget_product_search input[type='submit']:hover, .widget_product_search input[type='submit']:focus,
    .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
    .related.products h2:before, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
        background: #006699;
    }

    .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
        background: #4f2e51 !important;
    }
    .post-content-wrap blockquote, pre, .cate-title, .search-page-title, .archive-page-title, .post-categories,
    .author-title, .big-carousel-inner, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .tn-share-to-email-popup {
        border-color: #006699;
    }
    .tn-mega-menu, .tn-navbar, .tn-mega-menu-col, .tn-dropdown-menu, #menu-main ul li .tn-dropdown-menu ul li ul.tn-sub-menu, #menu-main ul li div.tn-dropdown-menu ul li ul.tn-sub-menu, .ajax-form {
        border-top-color: #4f2e51;
    }
    .tn-main-container {
        /*max-width: 1090px;*/
        max-width: 100% !important;
        margin: 30px auto;
    }
    #main-mobile-menu {
        margin-top: 30px;
    }
    #full-top .module-slider-widget, #full-bottom .module-slider-widget {
        margin-left: -15px;
        margin-right: -15px;
    }
    #full-top .module-feature-wrap, #full-bottom .module-feature-wrap {
        margin-left: -15px;
        margin-right: -16px;
    }
    #main-nav {
        margin-left: 0;
        margin-right: 0;
    }
    .main-nav-inner {
        margin-left: 0;
        margin-right: 0;
    }
    .module-ticker-inner {
        left: 0;
        right: 0;
    }
    .tn-main-container {
        margin: 0 auto !important;
    }
    .full-width-mode .post-content-wrap {
        max-width: 1100px;
        margin: 0 auto;
    }
</style>
    <style type='text/css' title='dynamic-css' class='options-output'>
        body{background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:center center; background-color: inherit;}
    </style>
</head>
<body class='archive tn-body-class'>
    <div class='tn-main-page-wrap'>
        <div id='main-mobile-menu' class='menu-my-menu-container'>
            <ul id='menu-main-nav' class='menu'>
                <li class='menu-item menu-item-type-custom'><a href='../index.php'>HOME</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../music.php'>MUSIC</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../videos.php'>VIDEOS</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='#'>ALBUMS</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../excusive_events.php'>EXclusive</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../e_news.php'>E! NEWS</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../about.php'>about</a></li>
                <li class='menu-item menu-item-type-post_type'><a href='../contact.php'>CONTACT US</a></li>
            </ul>
        </div>
        <div class='tn-main-container'>
        <header class='clearfix'>
	<div class='tn-container clearfix'>
		<div class='tn-navbar'>
			<div class='tn-navbar-header'>
				<span class='small mr-25'>
					www.shekmusic.com · <i class='muted'>Entertaining the nation</i>
				</span>
			</div>
		</div>
		<div class='row'>
			<div class='header-center'>
				<div class='site-logo' role='banner'>
					<a itemprop='url' href='../index.php'>
						<img data-no-retina='' src='../assets/images/log.png' alt='www.shekmusic.com' height='50'>
					</a>
					<meta itemprop='name' content='shekmusic.com'>
				</div>
			</div>
		</div>
	<div class='tn-navbar'>
		<div class='menu-nav-top'>
			<ul class='menu-main'>
				<div class='mobile-menu-nav'>
						<a href='#' id='mobile-button-nav-open' class='mobile-nav-button'><i class='menu-button fa fa-th'></i></a>
				</div>
				<div id='menu-main' class='menu-my-menu-container text-uppercase'>
					<ul id='menu-my-menu' class='menu'>
						<li class='menu-item menu-item-type-custom'><a href='../index.php'>HOME</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../music.php'>MUSIC</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../videos.php'>VIDEOS</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='#'>ALBUMS</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../excusive_events.php'>EXclusive</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../e_news.php'>E! NEWS</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../about.php'>about</a></li>
                        <li class='menu-item menu-item-type-post_type'><a href='../contact.php'>CONTACT US</a></li>
					</ul>
				</div>
			</ul>
			<div class='ajax-search-wrap pull-right'>
				<a href='#' id='ajax-form-search' class='ajax-search-icon'><i title='Search - artist/song' class='fa fa-search'></i></a>
				<form class='ajax-form' role='search' method='' action=''>
					<input type='text' id='searchbar' name='search' class='search-form-text field search-form form-control' placeholder='Search this site' data-target='#search-form'>
					<a href='#' id='ajax-search-result'></a>
                    <ul class='search-results px-1 search_widget' id='display_results'>
                            
                    </ul>
				</form>
			</div>
		</div>
	</div>
	<!-- <div class='row'>
		<div class='col-sm-12 col-xs-12'>
			<center>
				<a href='#' target='_blank'><img class='banner-xs' src='../assets/images/stepbanner.gif'></a>
			</center>
		</div>
	</div> -->
</div>
<hr>
</header>
<div id='main-wrapper'>";
		echo($p_header);
	}

	function get_share_links(){
		return require_once 'includes/components/social-networks.php';
	}
	function load_footer()
	{
		return require_once('includes/templates/footer.php');
	}
	function load_plugins_footer()
	{
		$p_footer = "</div>
	<nav class='navbar navbar-default footer-navbar clearfix' role='navigation'>
		<div class='clearfix'></div>
			<div class='text-center'>Copyright  &#169 (2017 – <?php echo date('Y') ?>) <a href='index.php'>Shekmusic.com</a> &nbsp; – All Rights Reserved</div>
	</nav>
	<a href='#' id='toTop' style='display: none;'><span id='toTopHover'></span><i class='fa fa-long-arrow-up'></i></a>
	</div>
</div>
	<script src='../assets/js/extend-lib.js'></script>
	<script src='../assets/js/retina.min.js'></script>
	<script src='../assets/js/tn-script.min.js'></script>
	<script>
		var tn_slider_data = {
			'tnslider_5a5db7589e4c7':{
				'time': 4000,
				'speed': 400,
				'carousel': 'carousel',
				'id':'tnslider_5a5db7589e4c7',
				'animation': 'slide'
				}
			};
		var tn_to_top = '1';
		var tn_smooth_display = [''];
		var tn_sticky_navigation = [''];
		var tn_sidebar_sticky_enable = '1';
		var tn_ticker_title = 'TOP 20 CHARTS >>';
		var tn_rtl = [''];
		var tn_smooth_scroll_data = '1';
		var tn_close_mobile_menu_text = 'close';
		var tn_single_image_popup = '1';
	</script>
	<script src='../assets/js/module-ajax.js'></script>
    <script src='../assets/js/search.js'></script>
	<div class='clear-both'></div>
</body>
</html>";
		echo($p_footer);
	}
?>