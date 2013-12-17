<?php
/**
 * The template for displaying Acceuil
 * 
 * Template Name: appartements
 * @package WordPress
 * @subpackage NeaLoca
 */

get_header( );
?>

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <div class="row">
                <ul class="small-block-grid-3 large-block-grid-3">
<?php
                    $appartement = get_post_by_slug( '' );
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

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
