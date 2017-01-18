<?php

/** Template Name: Players Profiles Page*/

get_header();?>

<div class="cmsContainer">

	<h1><?php the_title(); ?></h1>
	<i>click on image to view larger version<i>

    <div class="cmsDesc profilesInfo">

	<?php
		
		$urlString = plugins_url() . "/manage-profiles/images/";

        $sqlPlyr = mysql_query("select * from ".$wpdb->prefix ."manage_profiles WHERE `type`='1' order by `sortingOrder` asc");
		//**/echo var_dump($sqlPlyr);die;
       $numRows = mysql_num_rows($sqlPlyr);
		
        if($numRows>0){

            while($rowPlyr = mysql_fetch_array($sqlPlyr)){
				
				$imgPth = $urlString.$rowPlyr['profileImg'];
				
                echo '<div class="playerInfo">

                        <a href="'.$imgPth.'" target="_blank"><img src="'.$imgPth.'" alt="'.$rowPlyr['name'].'" width="80" height="85" /></a>

                        <h1>'.$rowPlyr['playerNumber'].'</h1>

                        <h3>'.stripslashes($rowPlyr['name']).'</h3>

                    </div>';

            }

        }else{

            echo '<p>No Data Found.</p>';

        }

    ?>

    </div>

</div>

<?php get_footer(); ?>