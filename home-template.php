<?php

/** Template Name: Home Page*/

get_header();

	/*$urlString = plugins_url()."/manage-profiles/images/";

	$sqlSlider = mysql_query("select * from ".$wpdb->prefix ."manage_profiles WHERE type='5' order by sortingOrder asc");

	$numRowsSlider = mysql_num_rows($sqlSlider);

	if($numRowsSlider>0){

		echo '<div class="sliderContainer">

			<div id="slider" class="nivoSlider">';

			while($rowSlider = mysql_fetch_array($sqlSlider)){

				echo '<img src="'.$urlString.$rowSlider['profileImg'].'" alt="Img" />';

			}

			echo '</div>

		</div>';

	}*/

?><div class="sliderContainer" >

	<div class="test"><?php echo do_shortcode( '[advps-slideshow optset="1"]' ); ?></div>

    </div>

    <div class="sliderInfoContainer" style="height:auto; padding:12px 13px; background-color: #31459E; width: 622px;">

		<?php //echo do_shortcode('[hdvideo id=11 playlistid=4 width=625 height=258]') ?>

<script type="text/javascript">

jQuery(document).ready(function(){

	jQuery(".video_emb").hide();

	jQuery(".video_emb#1").show();

	jQuery("ul.video_list li:first-child a").addClass('selected');

	

	jQuery("ul.video_list a").click(function(e) {

        

		jQuery("ul.video_list a").removeClass('selected');

		jQuery(this).addClass('selected');

		

    });

	

});

function show_video(id){

	

	jQuery(".video_emb").hide();

	var target	=	document.getElementById(id);

	target.style.display="block";

	

}

</script>

<style type="text/css">

.video_emb{

	float: left;

}

.video_list{

	float: right;

	width: 200px;

	list-style: none;

	height:235px;

	overflow:scroll;

	overflow-x:hidden;

	overflow-y:scroll;

}

.video_list li a{

	width:170px;

	padding:5px;

	display:block;

	float:none;

	height:50px;

	box-shadow: 5px 5px 8px -4px #000 inset;

	background-color:#FFF;

	margin-bottom:20px;

	overflow:hidden;

	text-decoration:none;

	color:#000;

}

.video_list li img{

	height:50px;

	width:auto;

	border:1px solid #CCC;

	float:left;

	margin-right:5px;

}

.video_list li p{

	font-size:8px;

	width: 95px;

	margin-left: auto;

	margin-top: 2px;

}

.video_list li h3{

	font-weight:700;

	font-size:9px;

	width: 95px;

	margin-left: auto;

}

.video_list li a.selected{

	background-color:#000;

	color:#fff;

}

.video_list li a.selected img{

	border:1px solid #E5E008;

}

.video_list li a.selected p{

	color:#e4e4e4;

}

</style>

<?php

$z	=	1;

$the_query = new WP_Query(

							array(

								'post_type'			=> 'video',

								'posts_per_page'	=> 8

							)

						);

						

if( $the_query->have_posts()){

	while( $the_query->have_posts() ){ 

	$the_query->the_post();

?>		

		

		<?php

			$url		=	get_the_content();

			$video_id	=	substr($url, -11);

		?>

		<div id="<?php echo $z; ?>" class="video_emb">

			<embed width="390" height="235" src="http://www.youtube.com/v/<?php echo $video_id; ?>" type="application/x-shockwave-flash"></embed>

		</div>

		

<?php		

	$z++;

	}

}

?>

							

<?php

$i	=	1;

$the_query = new WP_Query(

							array(

								'post_type'			=> 'video',

								'posts_per_page'	=> 8

							)

						);

						

if( $the_query->have_posts()){

?>

<ul class="video_list">

<?php

	while( $the_query->have_posts() ){ 

	$the_query->the_post();

?>		

	

		<li><a href="javascript:;" onclick="show_video(<?php echo $i; ?>)"><img src="http://img.youtube.com/vi/<?php

		

			$url		=	get_the_content();

			$video_id	=	substr($url, -11);

			echo $video_id;

			

		?>/1.jpg" />

        

<h3>		

<?php

		$data		=	'https://gdata.youtube.com/feeds/api/videos/'.$video_id.'?v=2&alt=jsonc';

		$data		=	file_get_contents($data);

		$data		=	json_decode($data, true);

		

		echo $data['data']['title'];

?>

</h3>

<p><?php

	$data		=	'https://gdata.youtube.com/feeds/api/videos/'.$video_id.'?v=2&alt=jsonc';

	$data		=	file_get_contents($data);

	$data		=	json_decode($data, true);

	

	print_r($data['data']['description']);

?></p>

        

        </a></li>

	

	

		

<?php		

	$i++;

	}

?>

</ul>

<?php

}else{

	echo '<h2>No videos found!</h2>';

}

?>

<span class="clear"></span>

    </div>

    

    <div class="upcomingEvents">

        <h1>UPCOMING EVENTS</h1>

    	<?php

		 global $post;
		
		$myposts = get_posts('numberposts=3&post_status=future&order=ASC&orderby=post_date&category=1');
		//$myposts = get_posts('category=1&numberposts=3&order=ASC&post_status=future&post_status=published');
		//global $wpdb; echo $wpdb->last_query;//lists only single query
		 foreach($myposts as $post) :
//		 echo '<pre>';print_r($post);
			// check for past dates!
			// check for past dates!
//			if (strcmp(date('Y-m-d'), $post->post_date) > 0) continue;
		?>

         <div class="postContainer">

            <div class="postImg">	

                <?php

                if ( has_post_thumbnail()){ ?>

                   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

                   <?php the_post_thumbnail(array(106,64)); ?>

                   </a>

                 <?php }else{  ?>

                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php bloginfo('template_url');?>/images/no-image.jpg" width="106" height="64" ></a>

                 <?php  }

                ?>

                

            </div>

            <div class="postTxt">	

                <h1><?=substr($post->post_title,0,25);?></h1>

                <div class="postDesc">

                <?=substr($post->post_content,0,60);?><a href="<?php the_permalink(); ?>">Read More</a>

                </div>

            </div>

        </div>

    	<?php endforeach; ?>

	

    </div>

    

    <div class="socialInfoContainer">

         <?php dynamic_sidebar('sidebar-3');?>

    </div>

<style type="text/css">

	.jcarousel-skin-tango .jcarousel-container-horizontal{margin:0 0 0 80px!important}

	.jcarousel-skin-tango .jcarousel-prev-horizontal{height:82px !important;top:37px !important;width:38px!important;}

	.jcarousel-skin-tango .jcarousel-next-horizontal{top:37px !important;}

	.shopPortContainer #mycarousel{margin:16px 0 0 !important;}

</style>

<?php get_footer(); ?>
