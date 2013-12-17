<?php
/**
* The template for displaying the footer
* 
* Contains footer content and the closing of the #main and #page div elements.
*
* @package WordPress
* @subpackage NeaLoca
*/
?>

       <footer>
         <div class="separateur"></div>
    <div class="row">
        <div class="small-12 large-12 columns">
            <div class="small-6 large-4 columns">
                <h6 class="subheader"> SiteMap </h6>
                <ul class="side-nav">
                    <?php 
                    $sitemap = get_array_sitemap();
                    for ( $i = 0; $i < count($sitemap) && $i < 4; $i++ )
                    {        
                        $st = $sitemap[$i];
                        echo "<li><a href='".$st['lien']."'>".$st['nom']."</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="small-6 large-4 columns">
                <h6 class="subheader"> SiteMap </h6>
                <ul class="side-nav">
                <?php
                    /* affiche les liens supp, max 8 en tout*/
                    for ( $y = $i; $y < count($sitemap) && $y < 8; $y++ )
                    {
                        $st = $sitemap[$y];
                        echo "<li><a href='".$st['lien']."'>".$st['nom']."</a></li>";
                    }
                ?>
                </ul>
            </div>
            <div class="small-12 large-4 columns">
                <h6 class="subheader"> Contact </h6>  
                <ul class="small-block-grid-2 large-block-grid-1 icon-contact">
                    <li> <i class="fi-telephone"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'><?php echo get_option('tel', '0000000'); ?></a></i></li>
                    <li> <i class="fi-mail"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'><?php echo get_option('mail', 'mail@mail.com');?></a></i></li>
                    <li> <i class="fi-torso-female"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'>Contact</a></i></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="separateur"></div>
    <div class="row">
        <div class="small-9 columns">
            <p id="copyright"> copyright <a href="http://www.agiweb.be" target="_blank">agiweb</a> </p>
        </div>
        <div class="small-3 columns">
            <a href="#" id="scrollToTop">HAUT</a>
        </div>
    </div>
    </footer>
  
    <!-- mit dans le header pour etre utile a zurb et nivo 
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/jquery.js"></script>
    -->

  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation.min.js"></script>
  <!--
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.alerts.js"></script>
  -->  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.clearing.js"></script>
  <!--
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.cookie.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.dropdown.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.forms.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.joyride.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.magellan.js"></script>
  -->  
  <!-- 
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.orbit.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.reveal.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.section.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.tooltips.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.topbar.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.interchange.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.placeholder.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    jQuery(document).foundation();
  </script>
    <!-- js localisation ( pour page de localisation... fatalement!)-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/localisation.js"></script>
    
    <?php wp_footer(); ?>
</body>
</html>
