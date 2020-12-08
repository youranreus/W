<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
#header,#footer{
  display: none;
}
.h404{
  font-size: 5rem;
  text-align: center;
  margin: 200px 0;
  opacity: 0.3;
}
</style>

<h3 class="h404">えっと，ここは？<h3>

<?php $this->need('footer.php'); ?>
