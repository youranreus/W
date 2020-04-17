<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <h3 class="archive-title"></h3>
    <div id="article-list">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
        <div class="article-item">
          <h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
          <span><?php $this->author(); ?> · <?php $this->category(' · '); ?> · <?php echo formatTime($this->created);?></span><br/>
          <p><?php $this->excerpt(50);?></p>
        </div>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <div class="clear changePage">
            <?php $this->pageLink('< 返回','prev'); ?>
            <?php $this->pageLink('更多 >','next'); ?>
        </div>
    </div><!-- end #main -->

	<?php $this->need('footer.php'); ?>
