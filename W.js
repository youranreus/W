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

window.onscroll = function(){
    var osTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (osTop >= client_height) {
        gototop.style.opacity = '1';
    }else{
        gototop.style.opacity = '0';
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
  if(hasClass(bar, 'sliderbar-show')){
    removeClass(bar,'sliderbar-show');
    removeClass(main,'main-left');
    removeClass(menu,'menu-left');
  }else{
    addClass(menu,'menu-left');
    addClass(main,'main-left');
    addClass(bar,'sliderbar-show');
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
