<?php
/**
 * The template for displaying Acceuil
 * 
 * Template Name: acceuil
 * @package WordPress
 * @subpackage NeaLoca
 */

get_header( );
?>

 <div class="row" id="slider">
        <div class="large-12 columns panel radius">
            <?php  echo do_shortcode('[metaslider id=59]'); ?>
        </div>
    </div>

    <!-- DESCRIPTION -->
    <div class="row">
        <div class="small-12 large-8 columns">
        <h2><?php the_title(); ?></h2>
            <div class="panel">
                <p>
                    <!-- loop affichage du texte de la page -->
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </p>
            </div>

            <!-- GALLERIE -->
            <div class="row">
                <div class="large-12 columns">
                    <ul class="small-block-grid-2 large-block-grid-3">
                <?php
                    $images = get_post_meta( get_the_ID(), 'images' );
                    if ( !empty($images) )
                    {
                        for ( $i = 0; $i < count($images); $i++ )
                        {
                            echo "<li><a class='gallerie' href='". $images[$i] ."'data-lightbox-gallery='gallery1''> <img src='". $images[$i]."'/> </a> </li>";
                        }
                    }
                ?>
                    </ul>
                </div>
            </div> <!-- /gallerie -->
        </div> <!-- /columns  gauche-->

        <div class="small-12 large-4 columns">
            <?php 
            // description 2
            $desc2= get_post_by_slug('desc2');
            if ( !empty($desc2) )
            {
                if ( !empty($desc2->post_title) )
                    echo "<h4 class='subheader'>$desc2->post_title</h4>";

                if ( !empty($desc2->post_content) )
                {
                    echo "<div class='panel'> <p>$desc2->post_content</p> </div>";
                }
            }
                
            // description 3
            $desc3= get_post_by_slug('desc3');
            if ( !empty($desc3) )
            {
                echo "<div class='hide-for-small'>";
                if ( !empty($desc3->post_title) )
                    echo "<h5 class='subheader'>$desc3->post_title</h5>";

                if ( !empty($desc3->post_content) )
                {
                    echo "<div class='panel'> <p>$desc3->post_content</p> </div>";
                }
                echo "</div>"; // /hide-for-small
            }
?> 
        </div><!-- /columns droite-->
    </div><!-- /row -->

	<!-- commentaire bas de page -->
	<?php 
	$comm = get_post_by_slug('accueilcommentaire');
	if ( !empty($comm) && !empty($comm->post_content) )
	{
       		echo "<div class='row'>";
        	echo "<div class='small-12 large-10 large-centered columns'>";
            	echo "<div class='panel callout radius'>";
                echo "<h3> $comm->post_content </h3>"; 
            	echo "</div></div></div>";
	}
	?>
<?php get_footer(); ?>
