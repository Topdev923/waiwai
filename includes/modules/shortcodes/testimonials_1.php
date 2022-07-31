<?php $count = 1;
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Testimonial Section-->
<section class="testimonial-section" style="background-image:url(<?php echo esc_url($bg_img); ?>)">
	<div class="auto-container">
		<div class="single-item-carousel owl-carousel owl-theme">
			<?php while($query->have_posts()): $query->the_post();
			global $post;
			$testimonials_meta = _WSH()->get_meta(); ?>
			<div class="testimonial-block">
				<div class="inner-box">
					<div class="image-box">
						<div class="image"><?php the_post_thumbnail('consultox_94x94'); ?></div>
					</div>
					<div class="text"><?php echo wp_kses_post(consultox_trim(get_the_content(), $text_limit)); ?></div>
					<div class="author"><?php the_title(); ?></div>
					<div class="designation"><?php echo wp_kses_post(consultox_set($testimonials_meta, 'designation')); ?></div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<!--End Testimonial Section-->

<?php endif; wp_reset_postdata(); ?>
