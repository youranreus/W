<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div><!-- end main -->

<div id="footer" class="clear">
  <p class="left">Made with ❤️ by <a href="https://季悠然.space">季悠然</a> | <?php getBuildTime($this->options->createDate); ?></p>
  <p class="right"><a href="http://beian.miit.gov.cn/"><?php $this->options->ICP(); ?></a></p>
</div><!-- end #footer -->
<?php $this->need('sliderbar.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.0/dist/lazyload.min.js"></script>
</body>
<img id="gototop" src="<?php $this->options->themeUrl('ico/top.svg'); ?>"></img>
<script data-no-instant src="<?php $this->options->themeUrl('W.js?v=1.50'); ?>"></script>
<script>
  lazyloadReady();
  var lazyLoadInstance = new LazyLoad();
</script>
<?php if ($this->options->enableInstantclick == 1): ?>
<script src="https://cdn.bootcdn.net/ajax/libs/instantclick/3.1.0/instantclick.js"></script>

<script data-no-instant>
  InstantClick.on('change', function(isInitialLoad) {
    if (isInitialLoad === false) {
      autoRun();
      gototop.addEventListener('click', scrollTop, false);
      if(typeof(meting_api) !== 'undefined'){
        loadMeting();
      }
    }
  });
  InstantClick.init();
</script>
<?php endif;?>
<script src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/prism.js"></script>
<script>
  <?php echo $this->options->CustomJSf;?>
</script>
<?php $this->footer(); ?>
</html>
