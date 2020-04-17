<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="articleBody">

  <div id="articleContent" class="typo">
    <?php
      $content = $this->content;
      emotionContent($content,$this->options->themeUrl);
     ?>
     <hr>
  </div>

  <div id="articleInfo">
    <p class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, '莫得'); ?></p>
    <p>文档最后编辑于<?php echo formatTime($this->modified);?> </p>
  </div>
</div><!-- end #articleBody-->

<?php $this->need('footer.php'); ?>
