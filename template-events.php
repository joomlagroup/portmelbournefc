<?php



/*



Template Name: Events Page Template 



*/



get_header(); ?>



	<div class="cmsContainer">



			<?php /* The loop */ ?>



				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">

						<h1 class="entry-title"><?php the_title(); ?></h1>

					</header><!-- .entry-header -->



					<div class="entry-content">



<?php

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



$args = array( 'numberposts' => 9999999999, 'category' => 1, 'posts_per_page' => 4, 'paged' => $paged, 'post_status'=>'future','orderby'=>'post_date','order'=>'ASC',);



$rwp_query = new WP_Query( $args );



while( $rwp_query->have_posts() ): $rwp_query->the_post(); ?>

                    

            	<li class="post">
				
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, $size, $attr ); ?></a>
                       

                        

                        <p><?php the_content(); ?></p>

                </li>

                

<?php endwhile; ?>

                        

					</div><!-- .entry-content -->



				</article><!-- #post -->





	</div>

    

<div class="pagination">

<?php 



global $rwp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(

	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

	'format' => '?paged=%#%',

	'current' => max( 1, get_query_var('paged') ),

	'total' => $rwp_query->max_num_pages

) );



?>  



</div>

    

    <!-- #content -->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>