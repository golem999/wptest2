
<?php get_header();?>

<?php  $user = wp_get_current_user(); ?>

<div class="container">
    <div class="row">
        <?php $items = get_user_meta($user->ID, 'wanted'); ?>
        <?php if($items){
            $summ = 0; $tmpArr = [];
            foreach($items as $item){
                if(in_array($item, $tmpArr)) continue;
                array_push($tmpArr, $item);  //защита от спама
                $post = get_post($item);
                $summ += (int) get_post_meta($post->ID, 'phone_price')[0];//считаем суму
                ?>

                <div class="cart_item row" id="row<?php echo $post->ID; ?>">
                    <div class="img col-md-2 col-sm-2 col-xs-3"><?php echo get_the_post_thumbnail($post -> ID, array(100,100)) ?></div>

                    <div class="item_content col-md-8 col-sm-8  col-xs-5">
                        <h5><?php echo $post -> post_title; ?></h5>
                        <p><?php echo $post -> post_content; ?></p>
                    </div>

                    <div class="item_price col-md-1 col-sm-1 col-xs-2">
                        <span><?php echo get_post_meta($post->ID, 'phone_price')[0]; ?></span>
                    </div>

                    <div class="item_close col-md-1 col-sm-1 col-xs-2">
                        <i class="fa fa-times" tag="<?php echo $post -> ID; ?>"></i>
                    </div>

                </div>


           <?php
            }

        }
        ?>


        <?php load_template(dirname(__FILE__) . '/payment_dialog.php');   ?>


        </div>
</div>
<?php  if($summ){?>
<div class="cart_summ container">
    <div class="row">
        <div class="col-md-5 col-sm-4 col-xs-3"></div>
        <div class="col-md-2 col-sm-4 col-xs-6">
            <button class="btn btn-block btn-success btn-payment" data-toggle="modal" href='#modal-id'><i class="glyphicon glyphicon-shopping-cart"></i>Оплатить</button>
        </div>

        <div class="col-md-5 col-sm-4 col-xs-3"></div>
    </div>
</div>



<?php } ?>
<?php get_footer(); ?>