<?php get_header(); ?>
<div class="container">
    <!---コンテンツエリアスタート--->
    <div class="contents">
        <h1>「<?php the_search_query(); ?>」の検索結果</h1>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <!-- 投稿があった場合の表示 -->
        <article <?php post_class( 'article-list' ); ?>>
        <a href="<?php the_permalink(); ?>">
        <!--画像を追加-->
        <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('medium'); ?>
        <?php endif; ?>

        <div class="text">
            <!--タイトル-->
            <h2><?php the_title(); ?></h2>
            <!--投稿日を表示-->
            <span class="article-date">
                <i class="fa fa-pencil"></i>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                <?php echo get_the_date(); ?>
                </time>
            </span>
            <!--カテゴリ-->
            <span class="cat-data">
                <?php if( has_category() ): ?>
                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                <?php endif; ?>
            </span>
            <!--抜粋-->
            <?php the_excerpt(); ?>
        </div>
    </a>
    </article>

    <?php endwhile; ?>
    <!--検索に該当するページがなかった場合に表示-->
    <?php else: ?>
        <?php get_template_part('content', 'none'); ?>
    <?php endif; ?>

    <div class="pagination">
    <?php echo paginate_links( array(
        'type' => 'list',
        'mid_size' => '1',
        'prev_text' => '«',
        'next_text' => '»'
    ) ); ?>
    </div>
</div>

<div class="sub">
<?php get_sidebar(); ?>
</div>

</div>
<?php get_footer(); ?>
