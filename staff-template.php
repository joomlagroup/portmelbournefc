<?php
/** Template Name: Staff Profiles Page*/
get_header();?>
<div class="cmsContainer">
	<h1><?php the_title(); ?></h1>
	<i>click on image to view larger version<i>
    <div class="cmsDesc profilesInfo">
    	<?php
			$urlString = plugins_url() . "/manage-profiles/images/";
			$sqlPlyr = mysql_query("select * from ".$wpdb->prefix ."manage_profiles WHERE type='2' order by sortingOrder asc");
			
			$numRows = mysql_num_rows($sqlPlyr);
			if($numRows>0){
				while($rowPlyr = mysql_fetch_array($sqlPlyr)){
					echo '<div class="playerInfo">
						<a href="'.$urlString.$rowPlyr['profileImg'].'" target="_blank"><img src="'.$urlString.$rowPlyr['profileImg'].'" alt="'.$rowPlyr['name'].'" width="80" height="85" /></a>
							<h2>'.stripslashes($rowPlyr['name']).'</h2>
						</div>';
				}
			}else{
				echo '<p>No Data Found.</p>';
			}
		?>
    </div>
</div>
<?php get_footer(); ?>