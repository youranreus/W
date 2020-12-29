<?php
/**
 * 文字-WORD
 *
 * @package Typecho Theme W
 * @author 季悠然
 * @version 1.1
 * @link https://季悠然.space
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div id="article-list">
	<?php while($this->next()): ?>
    <div class="article-item">
      <h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
      <span><?php $this->author(); ?> · <?php $this->category(' · '); ?> · <?php echo formatTime($this->created);?></span><br/>
      <p><?php $this->excerpt(50);?></p>
    </div>
	<?php endwhile; ?>

  <div class="clear changePage">
      <?php $this->pageLink('返回','prev'); ?>
      <?php $this->pageLink('更多','next'); ?>
  </div>

</div><!-- end #article-list-->

<?php $this->need('footer.php'); ?>
