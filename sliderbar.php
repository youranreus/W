<div id="sliderbar">

  <div class="sliderbar-container">
    <div id="sliderbar-profile" class="sliderbar-content">

      <?php if($this->options->avatarUrl != ''): ?>
        <h2><a href="<?php Helper::options()->siteUrl()?>"><img src="<?php echo $this->options->avatarUrl; ?>"/></a></h2>
      <?php else: ?>
        <h2><a href="<?php Helper::options()->siteUrl()?>"><img src="https://sdn.geekzu.org/avatar/<?php echo md5($this->author->mail); ?>"/></a></h2>
      <?php endif; ?>
      <h2><a href="<?php Helper::options()->siteUrl()?>"><?php $this->options->title(); ?></a></h2>
      <p><?php $this->options->description() ?></p>
      <div id="sliderbar-profile-social">
        <?php if($this->options->bilibiliUrl != ''): ?>
          <a href="<?php echo $this->options->bilibiliUrl; ?>"><img src="<?php $this->options->themeUrl('ico/bilibili.svg'); ?>"></img></a>
        <?php endif; ?>

        <?php if($this->options->GHUrl != ''): ?>
          <a href="<?php echo $this->options->GHUrl; ?>"><img src="<?php $this->options->themeUrl('ico/github.svg'); ?>"></img></a>
        <?php endif; ?>

        <?php if($this->options->TGUrl != ''): ?>
          <a href="<?php echo $this->options->TGUrl; ?>"><img src="<?php $this->options->themeUrl('ico/telegram.svg'); ?>"></img></a>
        <?php endif; ?>

        <?php if($this->options->weiboUrl != ''): ?>
          <a href="<?php echo $this->options->weiboUrl; ?>"><img src="<?php $this->options->themeUrl('ico/weibo.svg'); ?>"></img></a>
        <?php endif; ?>
      </div>
      <hr>

    </div>

    <div class="sliderbar-content" id="sliderbar-menu">
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <a href="/" title="<?php $pages->title(); ?>">首页</a>
      <?php while($pages->next()): ?>
        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
      <?php endwhile; ?>
    </div>

    <?php if($this->is('single')): ?>
    <div id="sliderbar-comments" class="sliderbar-content">
      <?php $this->need('comments.php'); ?>
    </div>
    <?php endif; ?>

    <div class="sliderbar-content" id="sliderbar-hitokoto hitokoto">
      <a href="#" id="hitokoto_text">:D 获取中...</a>
      <script>
        fetch('https://v1.hitokoto.cn/?c=b')
          .then(response => response.json())
          .then(data => {
            const hitokoto = document.getElementById('hitokoto_text')
            hitokoto.href = 'https://hitokoto.cn/?uuid=' + data.uuid
            hitokoto.innerText = data.hitokoto + '——' + data.from
          })
          .catch(console.error)
      </script>
    </div>

  </div>

</div>

<div id="menu-wrap" onclick="sliderbar_toggle()"></div>
<img id="menu" src="<?php $this->options->themeUrl('ico/menu.svg'); ?>" onclick="sliderbar_toggle()" />
