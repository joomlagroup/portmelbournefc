<?php
/**
* The template for displaying the footer
*
* Contains footer content and the closing of the #main and #page div elements.
*
* @package WordPress
* @subpackage Twenty_Thirteen
* @since Twenty Thirteen 1.0
 */
?>
	</div>	
            <div class="middleRight"> 		
                <?php dynamic_sidebar('sidebar-1');?>
                <div class="showYourSupport">
                	<a href="http://www.portmelbournefc.com.au/product-category/membership/"><img src="<?php bloginfo('template_url');?>/images/showYour2014.jpg" width="304" height="103"> </a>
                </div>
                <?php
					/*$urlString = plugins_url()."/manage-profiles/images/";
					$sqlSpnr = mysql_query("select * from ".$wpdb->prefix ."manage_profiles WHERE type='4' order by sortingOrder asc");
					$numRowsSpnr = mysql_num_rows($sqlSpnr);
					if($numRowsSpnr>0){
						echo '<div class="sponsorContainer">';
						while($rowSpnr = mysql_fetch_array($sqlSpnr)){
							if($rowSpnr['linkUrl']!=""){
								echo '<span><a href="'.$rowSpnr['linkUrl'].'" target="_blank"><img src="'.$urlString.$rowSpnr['profileImg'].'" title="'.$rowSpnr['name'].'" alt="'.$rowSpnr['name'].'"   /></a></span>';
							}else{
								echo '<span><img src="'.$urlString.$rowSpnr['profileImg'].'" title="'.$rowSpnr['name'].'" alt="'.$rowSpnr['name'].'"   /></span>';
							}
						}
						echo '</div>';
					}else{
						echo '<p>No Data Found.</p>';
					}*/
				?>
            </div>	   
            <div class="shopPortContainer">
               <h1>Borough Shop</h1>
               	<ul id="mycarousel" class="jcarousel-skin-tango">
					<?php
                    $i=1;
                    $news = new WP_Query('post_type=product');
                    while($news->have_posts()){
                    $news->the_post();
                    $thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <li><a href="<?php the_permalink(); ?>" ><img src="<?php echo $thumbnail; ?>" width="120" height="109" alt="" /></a></li>
                    <?php $i++;}  ?>
                </ul>
        	</div>
        </div>
        <div class="footerContainer">
       	  <?php dynamic_sidebar('sidebar-4');?>
        </div>
    </div>
</div>	
</body>
</html>