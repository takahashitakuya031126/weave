<?php get_header(); ?>
<div class="container">
<div class="contents">

<?php if(have_posts()): the_post(); ?>
<article <?php post_class( 'article-content' ); ?>>

<div class="article-info">
    <!--カテゴリ取得-->
    <?php if(has_category() ): ?>
        <span class="cat-data">
            <?php echo get_the_category_list( ' ' ); ?>
        </span>
    <?php endif; ?>
    <!--投稿日を取得-->
    <span class="article-date">
        <i class="far fa-clock"></i>
        <time
        datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
        <?php echo get_the_date(); ?>
        </time>
    </span>
    <!--著者を取得-->
    <span class="article-author">
        <i class="fas fa-user"></i><?php the_author(); ?>
    </span>
</div>

<!--タイトル-->
<h1><?php the_title(); ?></h1>

<!--アイキャッチ取得-->
<div class="article-img">
    <?php if( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail( 'large' ); ?>
    <?php endif; ?>
</div>

<!--本文取得-->
<?php the_content(); ?>

<!--タグ-->
<div class="article-tag">
    <?php the_tags('<ul><li>タグ： </li><li>','</li><li>','</li></ul>'); ?>
</div>

<aside class="related">
    <h4>関連記事</h4>
    <ul>
        <?php if(has_category() ) {
            $cats =get_the_category();
            $catkwds = array();
            foreach($cats as $cat){
                $catkwds[] = $cat->term_id;
            }
        } ?>
        <?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => '4',
            'post__not_in' =>array( $post->ID ),
            'category__in' => $catkwds,
            'orderby' => 'rand'
        );
        $my_query = new WP_Query( $args );?>
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium', array('class' => "ofi")); ?>
            <div class="text">
                <?php the_title(); ?>
            </div>
        </a></li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
</aside>

</article>
<?php endif; ?>

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
