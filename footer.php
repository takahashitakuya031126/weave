<footer id="footer" class="footer">
<div class="footer-inner">

<div class="footer-nav-wrap">
<?php wp_nav_menu( array(
    'theme_location' => 'footer-nav',
    'container' => 'nav',
    'container_class' => 'footer-nav',
    'container_id' => 'footer-nav',
    'fallback_cb' => ''
) ); ?>
</div>

<div class="copyright">
  <p>&copy; 2020 <?php bloginfo( 'name' ); ?></p>
</div>

</div>
</footer>
<script>objectFitImages('img.ofi');</script>
<?php wp_footer(); ?>
</body>
</html>
