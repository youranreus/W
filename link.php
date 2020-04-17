<?php
/**
* 友情链接
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this -> need('header.php');
?>

<div id="articleBody">

  <div id="articleContent" class="typo">
    <?php
      $content = $this->content;
      emotionContent($content,$this->options->themeUrl);
     ?>
  </div>

  <div class="friends">
    <h3>大佬们</h3>
   <?php Links_Plugin::output("
   <li class='clear'>
     <a href='{url}' target='_blank'></a>
     <img src='{image}' alt='{name}'/>
     <div class='link-item-content'>
       <h3>{name}</h3>
       <span>{sort}</span>
       <p>{description}</p>
     </div>
   </li>
   ", 0, "大佬"); ?>

   <h3>基友</h3>

   <?php Links_Plugin::output("
   <li class='clear'>
     <a href='{url}' target='_blank'></a>
     <img src='{image}' alt='{name}'/>
     <div class='link-item-content'>
       <h3>{name}</h3>
       <span>{sort}</span>
       <p>{description}</p>
     </div>
   </li>
   ", 0, "基友"); ?>

   <h3>胖友们</h3>

   <?php Links_Plugin::output("
   <li class='clear'>
     <a href='{url}' target='_blank'></a>
     <img src='{image}' alt='{name}'/>
     <div class='link-item-content'>
       <h3>{name}</h3>
       <span>{sort}</span>
       <p>{description}</p>
     </div>
   </li>
   ", 0, "好朋友"); ?>
  </div>

  <h3>项目</h3>

  <?php Links_Plugin::output("
  <li class='clear'>
    <a href='{url}' target='_blank'></a>
    <img src='{image}' alt='{name}'/>
    <div class='link-item-content'>
      <h3>{name}</h3>
      <span>{sort}</span>
      <p>{description}</p>
    </div>
  </li>
  ", 0, "项目"); ?>
 </div>

  <div id="articleInfo">
    <p>文档最后编辑于<?php echo formatTime($this->modified);?> </p>
  </div>
</div><!-- end #articleBody-->


<?php $this->need('footer.php'); ?>
