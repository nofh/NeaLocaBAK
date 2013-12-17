<?php
/**
 * The template for displaying Acceuil
 * 
 * Template Name: localisation
 * @package WordPress
 * @subpackage NeaLoca
 */

get_header( );
?>
<?php 
                // recuperation du custom post type nlLocalisation coorespondant a la langue active 
            $localisation = new WP_query(array(
                'post_type' => 'nlLocalisation',
                'posts_per_page' => 1
            ));

            if ( $localisation->have_posts() )
            {
                while ( $localisation->have_posts() ) 
                {
                    /* recup la langue
                        si langue == langue courante 
                        utilise le post 
                        sinon passe au suivant ( si rien ne coorespon??? )
                     */
                    $localisation->the_post(); 
                    $id_post = get_the_ID();
                    $langue = get_post_meta( $id_post, '_langue', true ); 
                    $titre_emplacement = get_post_meta( $id_post, '_titre_emplacement', true );
                    $texte_emplacement = get_post_meta( $id_post, '_texte_emplacement', true );
                    $texte_acces = get_post_meta( $id_post, '_texte_acces', true );
                    $titre_region = get_post_meta( $id_post, '_titre_region', true );
                    $texte_region = get_post_meta( $id_post, '_texte_region', true );
                    $titre_ville  = get_post_meta( $id_post, '_titre_ville', true );
                    $texte_ville  = get_post_meta( $id_post, '_texte_ville', true );
                    global $wpdb;  // db via la vue ?! bien ou pas bien ?!?    
                    $table = $wpdb->prefix . 'centresInteret';
                    $categories = array('centre', 'resto', 'port', 'epicerie', 'boulangerie', 'essence');
                    foreach( $categories as $categorie )
                    {
                        $tmp = $wpdb->get_results("SELECT * FROM $table WHERE id_post = $id_post AND categorie = '".$categorie."';", ARRAY_A);
                        if ( !empty( $tmp ) )
                        {
                            $centresInteret[] = $tmp;
                        }
                    }
                    $cis_json = json_encode($centresInteret);
                        
                    echo $titre_emplacement;
                    echo " id " . $id_post;
                    var_dump($cis_json);
                }
            }
            wp_reset_query();
?>

<!-- MAP -->
<div class="row">
    <div class="large-12 columns">
        <div class="panel top">
            <div id="map-canvas"> </div>
        </div>
    </div>
</div>

<!-- CONTROLES -->
<div class="row">
    <div class="large-12 columns">
        <div class="section-container vertical-tabs" data-section="vertical-tabs">
            <section class="active">
            <p class="title" data-section-title><a href="#panel2" onclick="initNearoda();">Emplacement</a></p>
            <div class="content" data-section-content>
                <h3><?php echo $titre_emplacement; ?></h3>
                <p><?php echo $texte_emplacement; ?></p>
            </div>
            </section>
            <section>
            <p class="title" data-section-title><a href="#panel1" onclick="initAcces();">Acces</a></p>
            <div class="content" data-section-content>
                <!-- CONTENU ACCES -->
                <div class="row">
                    <div class="large-12 columns">
                        <ul class="inline-list">
                            <li><a href="#map-canvas" class="button" onclick="calcRoute('Thessalonique, Greece')">Thessaloniki, Greece</a></li>
                            <li><a href="#map-canvas" class="button" onclick="calcRoute('Nea Moudania, Chalkidiki, Greece')">Nea Moudania, Greece</a></li>
                            <li><a href="#map-canvas" class="button" onclick="calcRoute('Serres, Greece')">Serres, Greece</a></li>
                            <li><a href="#map-canvas" class="button" onclick="calcRoute('Brussels, Belgium')">Brussels, Belgium</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <table>
                            <thead>
                                <tr>
                                    <th width="30%">Départ</th>
                                    <th width="40%">Arrivée</th>
                                    <th width="10%">Km</th>
                                    <th width="20%">Durée</th>
                                </tr>
                            </thead>
                            <tbody id="distances">
                                <tr>
                                    <td class="depart"></td>
                                    <td class="arrivee"></td>
                                    <td class="km"></td>
                                    <td class="duree"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel callout radius">
                    <h3> <?php echo $texte_acces; ?> </h3>
                </div>
            </div>
            </section>
            <section>
            <p class="title" data-section-title><a href="#panel2" onclick="initRegion();">Region</a></p>
            <div class="content" data-section-content>
            <h3><?php echo $titre_region;?></h3> 
                <p><?php echo $texte_region;?></p>
                <h3 onmouseover="afficheVillesVoisine();"> Proche de </h3>
                <p><?php echo $texte_ville ?></p>
            </div>
            </section>
            <section>
            <?php 
            echo "<p class='title' data-section-title><a href='#panel2' onclick='initVillage(".$cis_json.")'>Village</a></p>";
?>
            <div class="content" data-section-content>
<ul class="small-block-grid-2">
<?php 
            foreach( $centresInteret as $ci )
            {
                $categorie = $ci[0]['categorie'];
                $urlicon = $ci[0]['urlicon'];
                echo '<li><img src="'.$urlicon.'"><a href="#" onclick="affichageCentreInterets('.$categorie.');">'.$categorie.'</a></li>';
            }
?>
</ul>
            </div>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>
