    <?php
        $current_language = get_locale();
        if ($current_language === 'vi' || $current_language === 'vi_VN') {
            include('templates/footer_vi.php');
        } elseif ($current_language === 'ja' || $current_language === 'ja_JP') {
            include('templates/footer_ja.php');
        } else {
            include('templates/footer_ja.php');
        }
    ?>

<!-- end -->
</div>
<?php wp_footer(); ?>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.lang-switcher .bogo-language-name a, .lang-switcher .bogo-language-name').forEach(function(el) {
    const txt = el.textContent.trim();
    if (txt === '日本語') {
      el.firstChild.nodeValue = 'JP';
    } else if (txt === 'Tiếng Việt') {
      el.firstChild.nodeValue = 'VN';
    }
  });
});
</script>