
<?php
$mypost = array( 'post_type' => 'phone' );
$loop = new WP_Query( $mypost );

?>
<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
<div class="col-md-3 col-sm-6 item">
	<h3> <strong><?php the_title(); ?></strong>
	</h3><!--
	<img src="img/phone1.jpg" width="200" alt="">  -->
    <?php the_post_thumbnail( array( 200, 250 ) ); ?>

	<?php  the_content();  ?>
	<div class="item_footer">
		<span class="price glyphicon glyphicon-usd text-right" aria-label="left Align"><?php echo esc_html( get_post_meta( get_the_ID(), 'phone_price', true ) ); ?></span>
	</div>
	<button class="btn btn-block btn-info">Read more</button>
	<button class="btn btn-block btn-success">buy it</button>
	<hr class="examplefour">
</div>
<?php endwhile; ?>