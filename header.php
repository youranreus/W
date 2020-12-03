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
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css?v=2'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/prism.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.0/W/typo.css">

    <link rel="icon" type="image/png" href="/favicon.ico">
    <link href="/favicon.ico" rel="icon">
    <link rel="apple-touch-icon-precomposed" href="/favicon.ico">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>

<!-- main -->
<div id="main">

  <div id="header">

    <h2>
      <?php if($this->is('post') or $this->is('page')): ?>
        <a href="<?php Helper::options()->siteUrl()?>"><?php $this->title();?><img src="<?php $this->options->themeUrl('ico/home.svg'); ?>"></img></a>
      <?php elseif($this->is('archive')): ?>
        <a href="<?php Helper::options()->siteUrl()?>"><?php $this->archiveTitle(array(
            'category'  =>  _t('「%s」'),
            'search'    =>  _t('「%s」'),
            'tag'       =>  _t('「%s」'),
            'author'    =>  _t('「%s」发布的文章')
        ), '', ''); ?><img src="<?php $this->options->themeUrl('ico/home.svg'); ?>"></img></a>
      <?php else: ?>
        <?php $this->options->title(); ?>
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
      <h2><a href="<?php Helper::options()->siteUrl()?>"><?php $this->title();?></a></h2>
    </div>
  <?php endif; ?>
