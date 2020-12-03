<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
  <h3><?php $this->commentsNum('无回复', '一条回复', '%d 条回复'); ?></h3>
  <ul id="comment_list">
      <?php $this->comments()->to($comments); ?>
          <?php while($comments->next()): ?>
  	         <li id="<?php $comments->theId(); ?>">
  	            <div class="comment_data">
                    <strong><?php $comments->author(); ?></strong>
                    <span><?php $comments->date('Y-m-d'); ?></span>
                </div>
  	            <div class="comment_body">
                  <?php
                    $cos = preg_replace('#\@\((.*?)\)#','<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.0.3/G/IMG/bq/$1.png" class="bq">',$comments->content);
                    echo $cos;
                  ?>
                </div>
  	         </li>
  	<?php endwhile; ?>
  </ul>


  <?php if($this->allow('comment')): ?>
    <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" class="clear" role="form" >
      <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
        <?php if(!$this->user->hasLogin()): ?>
	         <input placeholder="昵称" type="text" name="author" class="text" value="<?php $this->remember('author'); ?>" />
	         <input placeholder="邮箱" type="text" name="mail" class="text" value="<?php $this->remember('mail'); ?>" />
	         <input placeholder="网址" type="text" name="url" class="text" value="<?php $this->remember('url'); ?>" />
        <?php endif; ?>
	       <textarea placeholder="说点什么。。" name="text"><?php $this->remember('text'); ?></textarea>
	       <input type="submit" value="发射" class="submit" />
         <?php $security = $this->widget('Widget_Security'); ?>
        <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>">
    </form>
  <?php endif; ?>
</div>
