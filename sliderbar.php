<div id="sliderbar">

  <div class="sliderbar-container">
    <div id="sliderbar-profile" class="sliderbar-content">
      <h2><a href="<?php Helper::options()->siteUrl()?>"><img src="https://cdn.exia.xyz/img/avatar.jpg"/></a></h2>
      <h2><a href="<?php Helper::options()->siteUrl()?>"><?php $this->options->title(); ?></a></h2>
      <p><?php $this->options->description() ?></p>
      <div id="sliderbar-profile-social">
        <a href="https://space.bilibili.com/11255354"><img src="<?php $this->options->themeUrl('ico/bilibili.svg'); ?>"></img></a>
        <a href="https://github.com/youranreus"><img src="<?php $this->options->themeUrl('ico/github.svg'); ?>"></img></a>
        <a href="https://t.me/youranreus"><img src="<?php $this->options->themeUrl('ico/telegram.svg'); ?>"></img></a>
        <a href="https://weibo.com/youranreus/profile"><img src="<?php $this->options->themeUrl('ico/weibo.svg'); ?>"></img></a>
      </div>
      <hr>
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <a href="/" title="<?php $pages->title(); ?>">首页</a>
      <?php while($pages->next()): ?>
        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
      <?php endwhile; ?>
    </div>
    <?php if($this->is('single')): ?>
    <div id="sliderbar-comments" class="sliderbar-content">
      <div class="cm-article" data-key="<?php $this->cid(); ?>"></div>
    </div>
    <?php endif; ?>

  </div>

</div>


<img id="menu" src="<?php $this->options->themeUrl('ico/menu.svg'); ?>" onclick="sliderbar_toggle()" />
