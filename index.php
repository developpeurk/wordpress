<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php 
            if (have_posts()) { //Check if there's a post
                while(have_posts()){ //Loop Throught Posts
                    the_post(); ?>
                    <div class="col-sm-6">
                        <div class="main-post">
                            <h3 class="post-title">
                                 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <span class="post-author"><i class="fa-regular fa-user"></i> <?php  the_author_posts_link(); ?></span>
                            <span class="post-date"><i class="fa-regular fa-calendar"></i> <?php the_time('F jS, Y'); ?></span>
                            <span class="post-comments"><i class="fa-regular fa-comment"></i> <?php comments_popup_link('0 Comments','1 Comment','% Comments','comment-url','Comments Disabled') ?></span>
                            <?php the_post_thumbnail( '', ['class' =>'img-fluid img-thumbnail rounded mx-auto d-block', 'title' => 'post image']); ?>
                            <p class="post-content">
                                <?php the_excerpt(); ?>
                            </p>
                            <hr>
                            <p class="categories">
                                <i class="fa-solid fa-tags"></i>                    
                                        <?php the_category( ', ' ); ?>
                            </p>
                        </div>
                    </div>       
                  <?php        
                } //End While Loop
            } //End If Condition
        ?>
    </div>
</div>

<?php get_footer(); ?>