<?php
$bloghighlightsoneID = get_theme_mod( 'blog_highlights_one','');
$bloghighlightcaptionone = get_theme_mod('highlights_caption_one','');
$bloghighlighttwoID = get_theme_mod( 'blog_highlights_two',''); 
$bloghighlightcaptiontwo = get_theme_mod('highlights_caption_two','');      
$bloghighlightthreeID = get_theme_mod( 'blog_highlights_three','');
$bloghighlightcaptionthree = get_theme_mod('highlights_caption_three','');

$highlight_array = array();
$has_highlight = false;
if( !empty( $bloghighlightsoneID ) ){
	$blog_highlight_one  = wp_get_attachment_image_src( $bloghighlightsoneID,'bosa-420-300');
 	if ( is_array(  $blog_highlight_one ) ){
 		$has_highlight = true;
   	 	$blog_highlight_one = $blog_highlight_one[0];
   	 	$highlight_array['image_one'] = array(
			'ID' => $blog_highlight_one,
			'caption' => $bloghighlightcaptionone,
		);	
  	}
}
if( !empty( $bloghighlighttwoID ) ){
	$blog_highlight_two = wp_get_attachment_image_src( $bloghighlighttwoID,'bosa-420-300');
	if ( is_array(  $blog_highlight_two ) ){
		$has_highlight = true;	
        $blog_highlight_two = $blog_highlight_two[0];
        $highlight_array['image_two'] = array(
			'ID' => $blog_highlight_two,
			'caption' => $bloghighlightcaptiontwo,
		);	
  	}
}
if( !empty( $bloghighlightthreeID ) ){	
	$blog_highlight_three = wp_get_attachment_image_src( $bloghighlightthreeID,'bosa-420-300');
	if ( is_array(  $blog_highlight_three ) ){
		$has_highlight = true;
      	$blog_highlight_three = $blog_highlight_three[0];
      	$highlight_array['image_three'] = array(
			'ID' => $blog_highlight_three,
			'caption' => $bloghighlightcaptionthree,
		);	
  	}
}

if( !get_theme_mod( 'disable_highlights_section', true ) && $has_highlight ){ ?>
	<section class="section-highlights-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $highlight_array as $each_highlight ){ ?>
					<div class="col-md-4">
						<article class="travel-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_highlight['ID'] ); ?>">
							</figure>
							<h3 class="entry-title">
								<?php echo esc_html( $each_highlight['caption']  ); ?>
							</h3>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
