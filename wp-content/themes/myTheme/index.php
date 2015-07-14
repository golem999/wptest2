
		<?php get_header(); ?>


            <?php  ?>

		<div class="container">
			<div role="tabpanel">
				<!-- Nav tabs -->		
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">home</a>
					</li>
					<li role="presentation">
						<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Windows Phone</a>
					</li>
				</ul>

				<!-- Tab panes -->		
				<div class="tab-content">

					<!-- tab panel start -->		
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="container">
							<div class="row">
								<?php get_template_part('item'); ?></div>
						</div>
						<!-- tab panel ends -->		

					</div>
					<div role="tabpanel" class="tab-pane" id="tab">asd</div>
				</div>
			</div>
		</div>

		<?php get_footer(); ?>		