<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
error_reporting(0);

function themeConfig($form) {
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.5/G/CSS/S.css'/>";
    echo "<h2>W主题设置</h2>";

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('侧栏头像地址'), _t('填入一个你的头像 URL 地址, 留空则使用gravatar头像'));
    $form->addInput($avatarUrl);

    $bilibiliUrl = new Typecho_Widget_Helper_Form_Element_Text('bilibiliUrl', NULL, NULL, _t('侧栏B站地址'), _t('留空则不显示图标'));
    $form->addInput($bilibiliUrl);

    $weiboUrl = new Typecho_Widget_Helper_Form_Element_Text('weiboUrl', NULL, NULL, _t('侧栏微博地址'), _t('留空则不显示图标'));
    $form->addInput($weiboUrl);

    $TGUrl = new Typecho_Widget_Helper_Form_Element_Text('TGUrl', NULL, NULL, _t('侧栏Telegram地址'), _t('留空则不显示图标'));
    $form->addInput($TGUrl);

    $GHUrl = new Typecho_Widget_Helper_Form_Element_Text('GHUrl', NULL, NULL, _t('侧栏Github地址'), _t('留空则不显示图标'));
    $form->addInput($GHUrl);

    $ICP = new Typecho_Widget_Helper_Form_Element_Text('ICP', NULL, NULL, _t('ICP备案号'), _t('你的备案号是什么🦆'));
    $form->addInput($ICP);

    $enableImgShadow = new Typecho_Widget_Helper_Form_Element_Radio('enableImgShadow', array(
        '1' => _t('是') ,
        '0' => _t('否')
    ) , '1', _t('给你的图片加上阴影') , _t('默认为开启'));
    $form->addInput($enableImgShadow);

    $CommentSwitcher = new Typecho_Widget_Helper_Form_Element_Radio('CommentSwitcher', array(
        '1' => _t('侧边栏') ,
        '0' => _t('文章末')
    ) , '1', _t('评论框位置') , _t('默认为侧边栏'));
    $form->addInput($CommentSwitcher);

    $CustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea('CustomCSS', NULL, NULL, _t('自定义CSS'), _t('#logo{...}'));
    $form->addInput($CustomCSS);
    $CustomJSh = new Typecho_Widget_Helper_Form_Element_Textarea('CustomJSh', NULL, NULL, _t('自定义JS(head前)'), _t('var...'));
    $form->addInput($CustomJSh);
    $CustomJSf = new Typecho_Widget_Helper_Form_Element_Textarea('CustomJSf', NULL, NULL, _t('自定义JS(footer后，主题含JQ)'), _t('var...'));
    $form->addInput($CustomJSf);

    $db = Typecho_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:W'));
    $ysj = $sjdq['value'];
    if(isset($_POST['type']))
    {
    if($_POST["type"]=="备份模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Wbf'))){
    $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:Wbf');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    if($ysj){
         $insert = $db->insert('table.options')->rows(array('name' => 'theme:Wbf','user' => '0','value' => $ysj));
         $insertId = $db->query($insert);
    echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }
    }
            }
    if($_POST["type"]=="还原模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Wbf'))){
    $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Wbf'));
    $bsj = $sjdub['value'];
    $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:W');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
    }else{
    echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
    }
    }
    if($_POST["type"]=="删除备份数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Wbf'))){
    $delete = $db->delete('table.options')->where ('name = ?', 'theme:Wbf');
    $deletedRows = $db->query($delete);
    echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
    }
    }
    }
    echo '<div id="backup"><form class="protected Data-backup" action="?Wbf" method="post"><h4>数据备份</h4>
    <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form></div>';
}


//感谢泽泽大佬的代码
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('Wx', 'addButton');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('Wx', 'addButton');

class Wx {

    public static function addButton()
    {
      echo '  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.7/G/CSS/OwO.min.css?v=2" rel="stylesheet" />';

        echo '
        <style>
          .wmd-button-row{
            height:auto;
          }
          .wmd-button{
            color:#999;
          }
          .OwO{
            background:#fff;
          }
          #g-shortcode{
            line-height: 30px;
            background:#fff;
          }
          #g-shortcode a{
            cursor: pointer;
            font-weight:bold;
            font-size:14px;
            text-decoration:none;
            color: #999 !important;
            margin:5px;
            display:inline-block;
          }
        </style>
        ';
        echo '<script src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.2.1/W/editor.js?v=1"></script>';

    }

}



/**
* 时间友好化
*
* @access public
* @param mixed
* @return
*/
function formatTime($time)
{
    $text = '';
    $time = intval($time);
    $ctime = time();
    $t = $ctime - $time; //时间差
    if ($t < 0) {
        return date('Y-m-d', $time);
    }
    ;
    $y = date('Y', $ctime) - date('Y', $time);//是否跨年
    switch ($t) {
        case $t == 0:
            $text = '刚刚';
            break;
        case $t < 60://一分钟内
            $text = $t . '秒前';
            break;
        case $t < 3600://一小时内
            $text = floor($t / 60) . '分钟前';
            break;
        case $t < 86400://一天内
            $text = floor($t / 3600) . '小时前'; // 一天内
            break;
        case $t < 2592000://30天内
            if($time > strtotime(date('Ymd',strtotime("-1 day")))) {
                $text = '昨天';
            } elseif($time > strtotime(date('Ymd',strtotime("-2 days")))) {
                $text = '前天';
            } else {
                $text = floor($t / 86400) . '天前';
            }
            break;
        case $t < 31536000 && $y == 0://一年内 不跨年
            $m = date('m', $ctime) - date('m', $time) -1;

            if($m == 0) {
                $text = floor($t / 86400) . '天前';
            } else {
                $text = $m . '个月前';
            }
            break;
        case $t < 31536000 && $y > 0://一年内 跨年
            $text = (11 - date('m', $time) + date('m', $ctime)) . '个月前';
            break;
        default:
            $text = (date('Y', $ctime) - date('Y', $time)) . '年前';
            break;
    }

    return $text;
}

/**
* 文章内容解析（短代码，表情）
*
* @access public
* @param mixed
* @return
*/
function emotionContent($content,$url)
{
    //表情解析
    $fcontent = preg_replace('#\@\((.*?)\)#','<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.0.3/G/IMG/bq/$1.png" class="bq">',$content);
    //输出最终结果
    echo $fcontent;
}
