<?php

/* personaliser les infos de contact ( mail, tel ) via l'intreface admin */
require('infosContact.php');

/* recuperer un id de post via le slug */
/*
function get_post_by_slug($slug)
{
    $post = false;
    $query = new WP_Query( "name=$slug" );
    if ( $query->have_posts() )
    {
        $post = $query->the_post();
        wp_reset_postdata();
    }

    return $post;
}
 */

function get_post_by_slug($slug)
{
    $post = false;
    $args=array(
        'name' => $slug,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $my_posts = get_posts( $args );
    if( $my_posts ) 
    {
        //echo 'ID on the first post found ' . $my_posts[0]->ID;
        $post = $my_posts[0];
    }

    return $post;
}
/* transforme le site map ( generer par google xml sitemap ds le repertoire root) en un tableau lien et nom pour chaque url */ 
function get_array_sitemap()
{
    $sitemap = array();
    $fichier  = realpath( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'sitemap.xml');
    if (file_exists($fichier)) 
    {
        $xml = simplexml_load_file($fichier);
        foreach ($xml->url as $url) 
        {
            $liens =  (string)$url->loc;
            $nom   = ucfirst(basename($url->loc));
            //echo "liens $liens, nom $nom";
            $sitemap[] = array('lien' => $liens, 'nom' => $nom);
        }
    } 
    else
    {
        $sitemap = false;
    }

    return $sitemap;
}
?>
