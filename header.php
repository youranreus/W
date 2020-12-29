<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css?v=1.991'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/prism.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/typo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/G/CSS/OwO.min.css">
    <link rel="alternate stylesheet" href="<?php $this->options->themeUrl('dark.css?v=1.98'); ?>" type="text/css" title="dark">

    <link rel="icon" type="image/png" href="<?php $this->options->logoUrl(); ?>">
    <link href="/favicon.ico" rel="icon">
    <link rel="apple-touch-icon-precomposed" href="/favicon.ico">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <script>
      <?php echo $this->options->CustomJSh;?>
      if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") == ''){
          if(new Date().getHours() > 22 || new Date().getHours() < 6){
            document.querySelector('link[title="dark"]').disabled = true;
            document.querySelector('link[title="dark"]').disabled = false;
            document.cookie = "night=1;path=/";
            console.log('夜间模式开启');
          }else{
            document.cookie = "night=0;path=/";
            console.log('夜间模式关闭');
          }
      }else{
          var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
          if(night == '0'){
            document.querySelector('link[title="dark"]').disabled = true;
            console.log('夜间模式关闭');
          }else if(night == '1'){
            document.querySelector('link[title="dark"]').disabled = true;
            document.querySelector('link[title="dark"]').disabled = false;
            console.log('夜间模式开启');
          }
      }
    </script>

    <style>
    <?php if ($this->options->enableImgShadow == 0): ?>
      .typo img{
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
      }
    <?php endif; ?>

    <?php if ($this->options->CommentSwitcher == 0): ?>
    #articleInfo{
      margin-bottom: 20px;
    }

    <?php endif; ?>

    <?php echo $this->options->CustomCSS;?>

    </style>

</head>
<body>

<!-- main -->
<div id="main">

  <div id="header">

    <h2>
      <?php if($this->is('post') or $this->is('page')): ?>
        <a href="#" onclick="window.history.go(-1)"><?php $this->title();?><img src="<?php $this->options->themeUrl('ico/home.svg'); ?>"></img></a>
      <?php elseif($this->is('archive')): ?>
        <a href="#" onclick="window.history.go(-1)"><?php $this->archiveTitle(array(
            'category'  =>  _t('「%s」'),
            'search'    =>  _t('「%s」'),
            'tag'       =>  _t('「%s」'),
            'author'    =>  _t('「%s」发布的文章')
        ), '', ''); ?><img src="<?php $this->options->themeUrl('ico/home.svg'); ?>"></img></a>
      <?php else: ?>
        <a href="/" title="<?php Helper::options()->siteUrl()?>"><?php $this->options->title(); ?></a>
      <?php endif; ?>
    </h2>
    <?php if($this->is('post')): ?>
      <span><?php $this->author(); ?> · <?php $this->category(',');?> · <?php $this->date(); ?></span>
    <?php else: ?>
      <span><?php $this->options->description() ?></span>
    <?php endif; ?>
  </div>
  <?php if($this->is('post') or $this->is('page')): ?>
    <div id="header-f">
      <h2><a href="#" onclick="window.history.go(-1)"><?php $this->title();?></a></h2>
    </div>
  <?php endif; ?>
