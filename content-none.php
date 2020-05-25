<div class="content-none">
    <?php if( is_404() ) {
        // 404ページの場合
        $site_name = get_bloginfo('name');
        echo 'いつも、',$site_name,'をご覧頂きありがとうございます。アクセスされたページは削除またはURLが変更されています。お手数をおかけいたしますが、以下の方法からもう一度目的のページをお探し下さい。';
    } elseif ( is_search() ){
        // 検索結果ページの場合
        $site_name = get_bloginfo('name');
        $search_name = get_search_query();
        echo 'いつも', $site_name, 'をご覧頂きありがとうございます。「',$search_name,'」で検索しましたがページが見つかりませんでした。お手数をおかけいたしますが、以下の方法からもう一度目的のページをお探し下さい。';
    } ?>

    <h2>1.再検索する</h2>
    <p>検索ボックスにお探しのコンテンツに該当する"<b>キーワード</b>"を入力して下さい。キーワードを含むページ一覧が表示されます。</p>
    <?php get_search_form(); ?>

    <h2>2.カテゴリから探す</h2>
    <p>カテゴリーのトップページからもう一度目的のページをお探しになってみて下さい。</p>
    <?php wp_nav_menu( array(
        'theme_location' => 'error-nav',
        'container' => 'nav',
        'container_class' => 'error-nav',
        'container_id' => 'error-nav',
        'fallback_cb' => ''
    ) ); ?>

    <h2>3.新着記事から探す</h2>
    <?php get_the_ID(); // ループの条件
    $args = array('posts_per_page' => 5, 'ignore_sticky_posts' => 1);
    $my_query = new WP_Query( $args ); ?>
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

    <article <?php post_class( 'kiji-list' ); ?>>
    <a href="<?php the_permalink(); ?>">
    <!--画像を追加-->
    <?php if( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail('medium'); ?>
    <?php endif; ?>
    <div class="text">
        <!--タイトル-->
        <h3><?php the_title(); ?></h3>
        <!--投稿日を表示-->
        <span class="article-date">
            <i class="fa fa-pencil"></i>
            <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
            <?php echo get_the_date(); ?>
            </time>
        </span>
        <!--カテゴリ-->
        <nobr><span class="cat-data">
            <?php if( has_category() ): ?>
                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
            <?php endif; ?>
        </span></nobr>
        <!--抜粋-->
        <?php the_excerpt(); ?>
    </div>
</a>
</article>

<?php wp_reset_postdata(); endwhile; ?>
    <h2>4.記事をリクエストする</h2>
    <p>お探しの記事が無い場合は、リクエストを受け付けております。今後とも、より良いサイトになるよう精進させていただきますのでよろしくお願いいたします。</p>
    <?php echo do_shortcode('contact-form-7のフォームを呼び出すショートコード'); ?>

</div>