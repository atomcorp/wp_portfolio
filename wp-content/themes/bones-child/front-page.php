<?php
/*
 Template Name: Front Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>
			<!-- this is front-page.php -->

			<!-- text i can manipulate with jQuery function -->
			<div class="logo-wrap">
				<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
			</div>

			<div id="content">

				<div id="inner-content" class="wrap cf">
						
						<main id="main" class="m-4 t-8 d-12 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<section class="hero-text m-4 t-8 d-12">
								<div class="brief m-4 t-3 d-4">I am a front-end developer focused on HTML5, CSS3, JAVASCRIPT and JQUERY</div>
								<div class="introduction m-4 t-5 d-8">
									Thank you for viewing my portfolio! I love producing easy to use, standards-compliant web sites and strive to remain up-to date with emerging features and techniques. I am currently seeking a role that will utilise and further develop my skills. 
								</div>
							</section>
							
							<?php 	/* some php in functions.php is only letting categories with id 10 (front-page) through the loop*/
							 		/* might come in handy http://codex.wordpress.org/The_Loop#Style_Posts_From_Some_Category_Differently*/ 
							 ?>

							<!-- start of posts -->
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							

								<header class="article-header">

									<h1 class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									
									<!-- ADDED CUSTOM FIELDS - such as the year and img see: http://codex.wordpress.org/Custom_Fields -->
									<?php the_meta(); ?>

									<!-- this is author, date posted etc -->
									<!-- <p class="byline vcard">
										<?php printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p> -->


								</header>

								<section class="entry-content cf" itemprop="articleBody">
									
									<?php 	
										// the content (pretty self explanatory huh)
										echo "<div class=\"post-text\">";
										the_content();
										echo "</div>";
									?>
									
								
								
									<?php		
										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>
								
								<!-- using thumbnails to add an img, can use functions.php to do crops etc, 
										 use conditinals to only download size appropriate for screen size -->
									
								<?php
									// http://codex.wordpress.org/Post_Thumbnails
									if ( has_post_thumbnail() ) {
										echo "<div class=\"thumb-img\">";
										echo "<a href=\"";
										the_permalink();
										echo "\">";
										the_post_thumbnail('full');
										echo "</a>";
										echo "</div>";
									} 
								?>

								<footer class="article-footer">

									<?php printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>
				                  	<?php 

				                  	// the_tags( '<p class="tags">' . __( '', 'bonestheme' ) . '', ' ', '</p>' ); 
				                  	// removed default which spews a hrefs
				                  	// http://wordpress.stackexchange.com/questions/41507/wordpress-remove-link-in-the-tags
				                  	echo '<p class="tags">';
				                  	$posttags = get_the_tags();
				                  	if ($posttags) {
				                  	  foreach($posttags as $tag) {
				                  	    echo '<span class="tag-item">';
				                  	    echo $tag->name . ' '; 
				                  	    echo '</span>';
				                  	  }
				                  	}
				                  	echo '</p>';
				                  	?>
									
									

								</footer>

								<?php comments_template(); ?>

							</article>

							

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>
						
						<?php /*get_sidebar();*/ ?> <!-- hidden sidebar -->

				</div>

			</div>

<?php get_footer(); ?>
