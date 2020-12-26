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

<?php if ($this->options->CommentSwitcher == 0): ?>
  <h2 style="font-weight: 600;font-size: 1.5rem;padding-left: 7px;margin-bottom: 20px;border-left: 5px solid black;">评论</h2>
  <?php $this->need('comments.php'); ?>
<?php endif; ?>

<?php $this->need('footer.php'); ?>
