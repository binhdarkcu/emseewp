<?php get_header();?>
	<section>
		<article>
			<div class="container">
				<div class="content">
                    <div class="assessment-section">
                        <?php the_title('<h1 class="cnt-title cnt-title--blue align-center">', '</h1>');?>
                        <div class="post-content">
                        <?php
                        while ( have_posts() ) : the_post();

                            the_content();
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                        </div>
                    </div>
                </div>
            </div>
		</article>
	</section>
<?php get_footer();?>
