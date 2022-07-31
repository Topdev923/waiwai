<?php $count = 1;
$query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);

if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query($query_args); ?>

<?php if($query->have_posts()): ?>

<!--Advisor Section Two-->
<div class="advisor-section-two">
	<div class="auto-container">
		<div class="row clearfix">
			<!--Title Column-->
			<div class="title-column col-md-3 col-sm-12 col-xs-12">
				<div class="sec-title">
					<h2><?php echo wp_kses_post($title); ?></h2>
				</div>
				<div class="text"><?php echo wp_kses_post($text); ?></div>
			</div>
			<!--Blocks Column-->
			<div class="blocks-column col-md-9 col-sm-12 col-xs-12">
				<div class="row clearfix">
					<?php while($query->have_posts()): $query->the_post();
					global $post;
					$team_meta = _WSH()->get_meta(); ?>
					<!--Team Block-->
					<div class="team-block col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="inner-box hvr-float-shadow">
							<div class="image">
								<?php the_post_thumbnail('consultox_270x286'); ?>
								<div class="overlay-box">
									<div class="content">
										<h3><?php the_title(); ?></h3>
                                        <div class="designation"><?php echo wp_kses_post(consultox_set($team_meta, 'designation')); ?></div>
                                        <?php if($socials = consultox_set($team_meta, 'bunch_team_social')): ?>
                                        <ul class="social-icon-three">
                                            <?php foreach($socials as $key => $value):?>
                                            <li><a href="<?php echo esc_url(consultox_set($value, 'social_link')); ?>" target="_blank"><span class="fa <?php echo esc_attr(consultox_set($value, 'social_icon')); ?>"></span></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
									</div>
								</div>
							</div>
							<div class="lower-box">
								<h3><a href="<?php echo esc_url(consultox_set($team_meta, 'team_link')); ?>"><?php the_title(); ?></a></h3>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Advisor Section Two-->

<?php endif; wp_reset_postdata(); ?>