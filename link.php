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
   ", 0, 0); ?>
  </div>


 </div>

  <div id="articleInfo">
    <p>文档最后编辑于<?php echo formatTime($this->modified);?> </p>
  </div>
</div><!-- end #articleBody-->


<?php $this->need('footer.php'); ?>
