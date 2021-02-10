window.onload = function(){
  autoRun();

  //评论表情定位
  Smilies = {
      dom: function(id) {
          return document.getElementById(id);
      },
      grin: function(tag) {
          tag = ' ' + tag + ' ';
          myField = this.dom("textarea");
          document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
      },
      insertTag: function(tag) {
          myField = Smilies.dom("textarea");
          myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
      }
  }

}

//加载运行函数
function autoRun(){
  emotion();
  fixComment();
  nightModeBtn();
  scrollTopListener();
}

//文章页滚动头部
function scrollTopListener(){
  var client_height = document.documentElement.clientHeight || document.body.clientHeight;
  var gototop = document.getElementById('gototop');
  window.onscroll = function(){
      var osTop = document.documentElement.scrollTop || document.body.scrollTop;
      if (osTop >= client_height) {
          gototop.style.display = 'block';
          gototop.style.opacity = '1';
      }else{
          gototop.style.display = 'none';
      }
      if(document.getElementById("articleBody"))
      {
        var header = document.getElementById("header");
        var header_f = document.getElementById("header-f");
        var article = document.getElementById("articleBody");
        var num = header.offsetTop;
        var a = header.offsetHeight;
        var articleh = article.offsetTop;
        var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
        if(scrollTop >= num){
            header_f.className = "header-fixed";
        }else{
            header_f.className = "";
        }
      }
  };
}


//滚动至顶部
var timer = null;
function scrollTop(){
	cancelAnimationFrame(timer);
	timer = requestAnimationFrame(function sTop(){
		var top = document.body.scrollTop || document.documentElement.scrollTop;
		if(top > 0){
			document.body.scrollTop = document.documentElement.scrollTop = top - 60;
			timer = requestAnimationFrame(sTop);
		}else{
			cancelAnimationFrame(timer);
		}
	});
}
gototop.addEventListener('click', scrollTop, false);

//侧栏开关
function sliderbar_toggle(){
  var bar = document.getElementById("sliderbar");
  var main = document.getElementById("main");
  var menu = document.getElementById("menu");
  var menu_wrap = document.getElementById("menu-wrap");
  if(hasClass(bar, 'sliderbar-show')){
    removeClass(bar,'sliderbar-show');
    removeClass(main,'main-left');
    removeClass(menu,'menu-left');
    removeClass(menu_wrap,'menu-wrap-show')
  }else{
    addClass(menu,'menu-left');
    addClass(main,'main-left');
    addClass(bar,'sliderbar-show');
    addClass(menu_wrap,'menu-wrap-show')
  }

}

//给元素添加Class
function addClass(el, className) {
    if (hasClass(el, className)) {
        return
    }
    let newClass = el.className.split(' ')
    newClass.push(className)
    el.className = newClass.join(' ')
}
//判断元素是否有Class
function hasClass(el, className) {
    let reg = new RegExp('(^|\\s)' + className + '(\\s|$)')
    return reg.test(el.className)
}
//给元素去除Class
function removeClass(el, className){
    if (!hasClass(el, className)) {
        return
    }
    let newClass = el.className.split(' ')
    newClass.forEach(function(val, index, newClass){
        if(val === className){
            newClass.splice(index,1);
        }
    })
    el.className = newClass.join(' ')
}

//评论表情解析
function emotion(){
  if(document.getElementsByClassName("comment-content")){
    let comments = document.getElementsByClassName("comment-content");
    let i = 0;
    for(i;i<comments.length;i++){
        var hex = '';
        comments[i].innerHTML = comments[i].innerHTML.replace(/\@\((.*?)\)/g,'<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.9/G/IMG/bq/$1.png" class="bq">');
        comments[i].innerHTML = comments[i].innerHTML.replace(/\#\((.*?)\)/g,function(){
          hex = encodeURI(arguments[1]);
          return '#('+hex+')';
        });
        comments[i].innerHTML = comments[i].innerHTML.replace(/\#\((.*?)\)/g,function(){
          return '<img src="https://cdn.jsdelivr.net/gh/youranreus/R@.1.2.2/W/bq/aru/'+arguments[1].replace(/%/g,"")+'.png" class="bq">';
        });
        comments[i].innerHTML = comments[i].innerHTML.replace(/\:\:(.*?)\:(.*?)\:\:/g,'<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.8/W/bq/$1/$2.png" class="bq">');
    }
  }
}

//字符串转HEX
function getAruFile(str) {
  return str.replace(/%/g,"");
}

//lazyload准备
function lazyloadReady(){
  if(document.getElementsByClassName("typo")){
    let typo = document.getElementsByClassName("typo");
    let imgs =  document.getElementsByTagName("img");
    let i = 0;
    for(i;i<imgs.length;i++){
        if(isParent(imgs[i],typo[0]) == true && !hasClass(imgs[i],"bq"))
        {
          imgs[i].setAttribute("data-src",imgs[i].src);
          imgs[i].src = "https://www.tuchuangs.com/view.php/acfdba86b385cfb5b630c91587df5af8.gif";
          addClass(imgs[i],'lazy');
        }
    }
  }
}

//判断是否为父元素
function isParent (obj,parentObj){
    while (obj != undefined && obj != null && obj.tagName.toUpperCase() != 'BODY'){
        if (obj == parentObj){
            return true;
        }
        obj = obj.parentNode;
    }
    return false;
}


//instantclick评论定位修复
function fixComment(){
  if(document.getElementsByClassName("comment-reply")){
    let comments = document.getElementsByClassName("comment-reply");
    let i = 0;
    for(i;i<comments.length;i++){
        comments[i].innerHTML = comments[i].innerHTML.replace('<a','<a data-no-instant');
    }
  }

  if(document.getElementsByClassName("cancel-comment-reply")){
    let comments = document.getElementsByClassName("cancel-comment-reply");
    let i = 0;
    for(i;i<comments.length;i++){
        comments[i].innerHTML = comments[i].innerHTML.replace('<a','<a data-no-instant');
    }
  }
}

//表情面板开关
function OwO_show(){
   let OwOPanel = document.getElementById("OwO-container");
   if(hasClass(OwOPanel, 'display-none')){
     removeClass(OwOPanel, 'display-none');
     OwOPanel.setAttribute("style", "max-height:300px;");
   }else{
     addClass(OwOPanel, 'display-none');
     OwOPanel.setAttribute("style", "max-height:0px;");
   }
}

//夜间模式开关
function switchNightMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    var night_btn = document.getElementById("night-mode");
    if(night == '0'){
        document.querySelector('link[title="dark"]').disabled = true;
        document.querySelector('link[title="dark"]').disabled = false;
        document.cookie = "night=1;path=/";
        addClass(night_btn, 'night-mode-on');
        console.log('夜间模式开启');
    }else{
        document.querySelector('link[title="dark"]').disabled = true;
        document.cookie = "night=0;path=/";
        removeClass(night_btn, 'night-mode-on');
        console.log('夜间模式关闭');
    }
}

//夜间模式按钮控制
function nightModeBtn(){
  if(document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") == ''){
      if(new Date().getHours() > 22 || new Date().getHours() < 6){
        document.getElementById("night-mode").classList.add("night-mode-on");
      }
  }else{
      var night = document.cookie.replace(/(?:(?:^|.*;\s*)night\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
      if(night == '1'){
        document.getElementById("night-mode").classList.add("night-mode-on");
      }
  }
}
