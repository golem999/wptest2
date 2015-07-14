
		<?php get_header(); ?>	


        <div class="container">
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <?php  foreach($vars as $var){  ?>
                        <li role="presentation" <?php if($var['all']) echo 'class="active"'; ?>>
                            <a href="#<?php echo $var['value']; ?>" aria-controls="#<?php echo $var['value']; ?>" role="tab" data-toggle="tab"><?php echo $var['name']; ?></a>
                        </li>
                    <?php } ?>

			    </ul>
                <!-- Nav tabs end -->


			<!-- Tab panels -->
			<div class="tab-content">

                <?php  foreach($vars as $var){  ?>

                    <div role="tabpanel" class="tab-pane fade<?php if( $var['all'] ) echo ' in active'; ?>" id="<?php echo $var['value']; ?>">
                        <div class="container">
                            <div class="row">
                                <?php
                                $mypost = array( 'post_type' => 'phone' );
                                $loop = new WP_Query( $mypost );

                                ?>
                                <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
                                    <?php if($var['all'] OR $var['name'] == get_post_meta(get_the_ID())['phone_os'][0]){ ?>
                                        <div class="col-md-3 col-sm-6 item" tag="<?php echo get_the_ID(); ?>">
                                            <h3> <strong><?php the_title(); ?></strong>
                                            </h3>
                                            <?php the_post_thumbnail( array( 200, 250 ) );  ?>

                                            <?php  the_content();  ?>
                                            <div class="item_footer">
                                                <span class="price glyphicon glyphicon-usd text-right" aria-label="left Align"><?php echo esc_html( get_post_meta( get_the_ID(), 'phone_price', true ) ); ?></span>
                                            </div>
                                            <button class="btn btn-block btn-info btn-dialog" data-toggle="modal" href='#modal-id' tag="<?php echo get_the_ID(); ?>">Read more</button>
                                            <button class="btn btn-block btn-success buy<?php if(item_was_added(get_the_ID())) echo ' disabled'; ?>">
                                                <?php  if(item_was_added(get_the_ID())) echo 'already in a cart'; else echo 'buy it'; ?>
                                            </button>
                                            <hr class="examplefour">
                                        </div>
                                    <?php } ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
			</div>
                <!-- Tab panels end -->
            </div>
	</div>


        <?php load_template(dirname(__FILE__).'/dialog.php');   ?>
        <?php get_footer(); ?>
