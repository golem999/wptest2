<nav class="navbar navbar-inverse" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> <i class="glyphicon glyphicon-send"></i></a>
        </div>




        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">

            <?php
                foreach ( get_pages() as $page ) {
             ?>
                <li <?php if(('/' . $page -> post_name . '/') == $_SERVER['PATH_INFO'] ){ echo 'class="active"';} ?>>
                    <a href="<?php echo get_page_link( $page->ID ); ?>"><?php  echo $page->post_title; ?></a>
                </li>
            <?php
                }
            ?>

			</ul>
		</div>
		<!-- /.navbar-collapse -->	
	</nav>

