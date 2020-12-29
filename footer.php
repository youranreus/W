<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div><!-- end main -->

<div id="footer" class="clear">
  <p class="left">Made with ❤️ by <a href="https://季悠然.space">季悠然</a></p>
  <p class="right"><a href="http://beian.miit.gov.cn/"><?php $this->options->ICP(); ?></a></p>
</div><!-- end #footer -->
<?php $this->need('sliderbar.php'); ?>
</body>
<img id="gototop" src="<?php $this->options->themeUrl('ico/top.svg'); ?>"></img>
<script src="https://cdn.bootcdn.net/ajax/libs/instantclick/3.1.0/instantclick.js"></script>
<script data-no-instant src="<?php $this->options->themeUrl('W.js?v=1.47'); ?>"></script>
<script data-no-instant>
  InstantClick.on('change', function(isInitialLoad) {
    if (isInitialLoad === false) {
      emotion();
      nightModeBtn();
      scrollTopListener();
      gototop.addEventListener('click', scrollTop, false);
      if(typeof(meting_api) !== 'undefined'){
        loadMeting();
      }
    }
  });
  InstantClick.init();
</script>
<script src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/prism.js"></script>
<script>
  <?php echo $this->options->CustomJSf;?>
</script>
<?php $this->footer(); ?>
</html>
