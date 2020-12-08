var client_height = document.documentElement.clientHeight || document.body.clientHeight;
var gototop = document.getElementById('gototop');


if(document.getElementById("articleBody"))
{
  var header = document.getElementById("header");
  var header_f = document.getElementById("header-f");
  var article = document.getElementById("articleBody");
  var num = header.offsetTop;
  var a = header.offsetHeight;
  var articleh = article.offsetTop;
}

window.onload = function(){
  emotion();
  //OwO设置
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
      var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
      if(scrollTop >= num){
          header_f.className = "header-fixed";
      }else{
          header_f.className = "";
      }
    }
};

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

function addClass(el, className) {
    if (hasClass(el, className)) {
        return
    }
    let newClass = el.className.split(' ')
    newClass.push(className)
    el.className = newClass.join(' ')
}

function hasClass(el, className) {
    // \s匹配任何空白字符，包括空格、制表符、换页符等等
    let reg = new RegExp('(^|\\s)' + className + '(\\s|$)')
    return reg.test(el.className)
}
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

function emotion(){
  if(document.getElementsByClassName("comment-content")){
    let comments = document.getElementsByClassName("comment-content");
    let i = 0;
    for(i;i<comments.length;i++){
        comments[i].innerHTML = comments[i].innerHTML.replace(/\@\((.*?)\)/g,'<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.9/G/IMG/bq/$1.png" class="bq">');
        comments[i].innerHTML = comments[i].innerHTML.replace(/\:\:(.*?)\:(.*?)\:\:/g,'<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.8/W/bq/$1/$2.png" class="bq">');
    }
  }
}


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
