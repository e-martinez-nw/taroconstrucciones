!function($){var t={},e={mode:"horizontal",slideSelector:"",infiniteLoop:!0,hideControlOnEnd:!1,speed:500,easing:null,slideMargin:0,startSlide:0,randomStart:!1,captions:!1,ticker:!1,tickerHover:!1,adaptiveHeight:!1,adaptiveHeightSpeed:500,video:!1,useCSS:!0,preloadImages:"visible",responsive:!0,slideZIndex:50,wrapperClass:"bx-wrapper2",touchEnabled:!0,swipeThreshold:50,oneToOneTouch:!0,preventDefaultSwipeX:!0,preventDefaultSwipeY:!1,pager:!0,pagerType:"full",pagerShortSeparator:" / ",pagerSelector:null,buildPager:null,pagerCustom:null,controls:!0,nextText:"Next",prevText:"Prev",nextSelector:null,prevSelector:null,autoControls:!1,startText:"Start",stopText:"Stop",autoControlsCombine:!1,autoControlsSelector:null,auto:!1,pause:4e3,autoStart:!0,autoDirection:"next",autoHover:!1,autoDelay:0,autoSlideForOnePage:!1,minSlides:1,maxSlides:1,moveSlides:0,slideWidth:0,onSliderLoad:function(){},onSlideBefore:function(){},onSlideAfter:function(){},onSlideNext:function(){},onSlidePrev:function(){},onSliderResize:function(){}};$.fn.bxSlider2=function(s){if(0==this.length)return this;if(this.length>1)return this.each(function(){$(this).bxSlider2(s)}),this;var n={},o=this;t.el=this;var r=$(window).width(),a=$(window).height(),l=function(){n.settings=$.extend({},e,s),n.settings.slideWidth=parseInt(n.settings.slideWidth),n.children=o.children(n.settings.slideSelector),n.children.length<n.settings.minSlides&&(n.settings.minSlides=n.children.length),n.children.length<n.settings.maxSlides&&(n.settings.maxSlides=n.children.length),n.settings.randomStart&&(n.settings.startSlide=Math.floor(Math.random()*n.children.length)),n.active={index:n.settings.startSlide},n.carousel=n.settings.minSlides>1||n.settings.maxSlides>1,n.carousel&&(n.settings.preloadImages="all"),n.minThreshold=n.settings.minSlides*n.settings.slideWidth+(n.settings.minSlides-1)*n.settings.slideMargin,n.maxThreshold=n.settings.maxSlides*n.settings.slideWidth+(n.settings.maxSlides-1)*n.settings.slideMargin,n.working=!1,n.controls={},n.interval=null,n.animProp="vertical"==n.settings.mode?"top":"left",n.usingCSS=n.settings.useCSS&&"fade"!=n.settings.mode&&function(){var t=document.createElement("div"),e=["WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var i in e)if(void 0!==t.style[e[i]])return n.cssPrefix=e[i].replace("Perspective","").toLowerCase(),n.animProp="-"+n.cssPrefix+"-transform",!0;return!1}(),"vertical"==n.settings.mode&&(n.settings.maxSlides=n.settings.minSlides),o.data("origStyle",o.attr("style")),o.children(n.settings.slideSelector).each(function(){$(this).data("origStyle",$(this).attr("style"))}),d()},d=function(){o.wrap('<div class="'+n.settings.wrapperClass+'"><div class="bx-viewport"></div></div>'),n.viewport=o.parent(),n.loader=$('<div class="bx-loading" />'),n.viewport.prepend(n.loader),o.css({width:"horizontal"==n.settings.mode?100*n.children.length+215+"%":"auto",position:"relative"}),n.usingCSS&&n.settings.easing?o.css("-"+n.cssPrefix+"-transition-timing-function",n.settings.easing):n.settings.easing||(n.settings.easing="swing");var t=u();n.viewport.css({width:"100%",overflow:"hidden",position:"relative"}),n.viewport.parent().css({maxWidth:p()}),n.settings.pager||n.viewport.parent().css({margin:"0 auto 0px"}),n.children.css({"float":"horizontal"==n.settings.mode?"left":"none",listStyle:"none",position:"relative"}),n.children.css("width",v()),"horizontal"==n.settings.mode&&n.settings.slideMargin>0&&n.children.css("marginRight",n.settings.slideMargin),"vertical"==n.settings.mode&&n.settings.slideMargin>0&&n.children.css("marginBottom",n.settings.slideMargin),"fade"==n.settings.mode&&(n.children.css({position:"absolute",zIndex:0,display:"none"}),n.children.eq(n.settings.startSlide).css({zIndex:n.settings.slideZIndex,display:"block"})),n.controls.el=$('<div class="bx-controls" />'),n.settings.captions&&E(),n.active.last=n.settings.startSlide==f()-1,n.settings.video&&o.fitVids();var e=n.children.eq(n.settings.startSlide);"all"==n.settings.preloadImages&&(e=n.children),n.settings.ticker?n.settings.pager=!1:(n.settings.pager&&w(),n.settings.controls&&T(),n.settings.auto&&n.settings.autoControls&&C(),(n.settings.controls||n.settings.autoControls||n.settings.pager)&&n.viewport.after(n.controls.el)),c(e,g)},c=function(t,e){var i=t.find("img, iframe").length;if(0==i)return void e();var s=0;t.find("img, iframe").each(function(){$(this).one("load",function(){++s==i&&e()}).each(function(){this.complete&&$(this).load()})})},g=function(){if(n.settings.infiniteLoop&&"fade"!=n.settings.mode&&!n.settings.ticker){var t="vertical"==n.settings.mode?n.settings.minSlides:n.settings.maxSlides,e=n.children.slice(0,t).clone().addClass("bx-clone"),i=n.children.slice(-t).clone().addClass("bx-clone");o.append(e).prepend(i)}n.loader.remove(),m(),"vertical"==n.settings.mode&&(n.settings.adaptiveHeight=!0),n.viewport.height(h()),o.redrawSlider(),n.settings.onSliderLoad(n.active.index),n.initialized=!0,n.settings.responsive&&$(window).bind("resize",Y),n.settings.auto&&n.settings.autoStart&&(f()>1||n.settings.autoSlideForOnePage)&&W(),n.settings.ticker&&H(),n.settings.pager&&I(n.settings.startSlide),n.settings.controls&&A(),n.settings.touchEnabled&&!n.settings.ticker&&F()},h=function(){var t=0,e=$();if("vertical"==n.settings.mode||n.settings.adaptiveHeight)if(n.carousel){var s=1==n.settings.moveSlides?n.active.index:n.active.index*x();for(e=n.children.eq(s),i=1;i<=n.settings.maxSlides-1;i++)e=s+i>=n.children.length?e.add(n.children.eq(i-1)):e.add(n.children.eq(s+i))}else e=n.children.eq(n.active.index);else e=n.children;return"vertical"==n.settings.mode?(e.each(function(e){t+=$(this).outerHeight()}),n.settings.slideMargin>0&&(t+=n.settings.slideMargin*(n.settings.minSlides-1))):t=Math.max.apply(Math,e.map(function(){return $(this).outerHeight(!1)}).get()),"border-box"==n.viewport.css("box-sizing")?t+=parseFloat(n.viewport.css("padding-top"))+parseFloat(n.viewport.css("padding-bottom"))+parseFloat(n.viewport.css("border-top-width"))+parseFloat(n.viewport.css("border-bottom-width")):"padding-box"==n.viewport.css("box-sizing")&&(t+=parseFloat(n.viewport.css("padding-top"))+parseFloat(n.viewport.css("padding-bottom"))),t},p=function(){var t="100%";return n.settings.slideWidth>0&&(t="horizontal"==n.settings.mode?n.settings.maxSlides*n.settings.slideWidth+(n.settings.maxSlides-1)*n.settings.slideMargin:n.settings.slideWidth),t},v=function(){var t=n.settings.slideWidth,e=n.viewport.width();return 0==n.settings.slideWidth||n.settings.slideWidth>e&&!n.carousel||"vertical"==n.settings.mode?t=e:n.settings.maxSlides>1&&"horizontal"==n.settings.mode&&(e>n.maxThreshold||e<n.minThreshold&&(t=(e-n.settings.slideMargin*(n.settings.minSlides-1))/n.settings.minSlides)),t},u=function(){var t=1;if("horizontal"==n.settings.mode&&n.settings.slideWidth>0)if(n.viewport.width()<n.minThreshold)t=n.settings.minSlides;else if(n.viewport.width()>n.maxThreshold)t=n.settings.maxSlides;else{var e=n.children.first().width()+n.settings.slideMargin;t=Math.floor((n.viewport.width()+n.settings.slideMargin)/e)}else"vertical"==n.settings.mode&&(t=n.settings.minSlides);return t},f=function(){var t=0;if(n.settings.moveSlides>0)if(n.settings.infiniteLoop)t=Math.ceil(n.children.length/x());else for(var e=0,i=0;e<n.children.length;)++t,e=i+u(),i+=n.settings.moveSlides<=u()?n.settings.moveSlides:u();else t=Math.ceil(n.children.length/u());return t},x=function(){return n.settings.moveSlides>0&&n.settings.moveSlides<=u()?n.settings.moveSlides:u()},m=function(){if(n.children.length>n.settings.maxSlides&&n.active.last&&!n.settings.infiniteLoop){if("horizontal"==n.settings.mode){var t=n.children.last(),e=t.position();S(-(e.left-(n.viewport.width()-t.outerWidth())),"reset",0)}else if("vertical"==n.settings.mode){var i=n.children.length-n.settings.minSlides,e=n.children.eq(i).position();S(-e.top,"reset",0)}}else{var e=n.children.eq(n.active.index*x()).position();n.active.index==f()-1&&(n.active.last=!0),void 0!=e&&("horizontal"==n.settings.mode?S(-e.left,"reset",0):"vertical"==n.settings.mode&&S(-e.top,"reset",0))}},S=function(t,e,i,s){if(n.usingCSS){var r="vertical"==n.settings.mode?"translate3d(0, "+t+"px, 0)":"translate3d("+t+"px, 0, 0)";o.css("-"+n.cssPrefix+"-transition-duration",i/1e3+"s"),"slide"==e?(o.css(n.animProp,r),o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),q()})):"reset"==e?o.css(n.animProp,r):"ticker"==e&&(o.css("-"+n.cssPrefix+"-transition-timing-function","linear"),o.css(n.animProp,r),o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"),S(s.resetValue,"reset",0),L()}))}else{var a={};a[n.animProp]=t,"slide"==e?o.animate(a,i,n.settings.easing,function(){q()}):"reset"==e?o.css(n.animProp,t):"ticker"==e&&o.animate(a,speed,"linear",function(){S(s.resetValue,"reset",0),L()})}},b=function(){for(var t="",e=f(),i=0;e>i;i++){var s="";n.settings.buildPager&&$.isFunction(n.settings.buildPager)?(s=n.settings.buildPager(i),n.pagerEl.addClass("bx-custom-pager")):(s=i+1,n.pagerEl.addClass("bx-default-pager")),t+='<div class="bx-pager-item"><a href="" data-slide-index="'+i+'" class="bx-pager-link">'+s+"</a></div>"}n.pagerEl.html(t)},w=function(){n.settings.pagerCustom?n.pagerEl=$(n.settings.pagerCustom):(n.pagerEl=$('<div class="bx-pager" />'),n.settings.pagerSelector?$(n.settings.pagerSelector).html(n.pagerEl):n.controls.el.addClass("bx-has-pager").append(n.pagerEl),b()),n.pagerEl.on("click","a",k)},T=function(){n.controls.next=$('<a class="bx-next" href="">'+n.settings.nextText+"</a>"),n.controls.prev=$('<a class="bx-prev" href="">'+n.settings.prevText+"</a>"),n.controls.next.bind("click",P),n.controls.prev.bind("click",z),n.settings.nextSelector&&$(n.settings.nextSelector).append(n.controls.next),n.settings.prevSelector&&$(n.settings.prevSelector).append(n.controls.prev),n.settings.nextSelector||n.settings.prevSelector||(n.controls.directionEl=$('<div class="bx-controls-direction" />'),n.controls.directionEl.append(n.controls.prev).append(n.controls.next),n.controls.el.addClass("bx-has-controls-direction").append(n.controls.directionEl))},C=function(){n.controls.start=$('<div class="bx-controls-auto-item"><a class="bx-start" href="">'+n.settings.startText+"</a></div>"),n.controls.stop=$('<div class="bx-controls-auto-item"><a class="bx-stop" href="">'+n.settings.stopText+"</a></div>"),n.controls.autoEl=$('<div class="bx-controls-auto" />'),n.controls.autoEl.on("click",".bx-start",y),n.controls.autoEl.on("click",".bx-stop",M),n.settings.autoControlsCombine?n.controls.autoEl.append(n.controls.start):n.controls.autoEl.append(n.controls.start).append(n.controls.stop),n.settings.autoControlsSelector?$(n.settings.autoControlsSelector).html(n.controls.autoEl):n.controls.el.addClass("bx-has-controls-auto").append(n.controls.autoEl),D(n.settings.autoStart?"stop":"start")},E=function(){n.children.each(function(t){var e=$(this).find("img:first").attr("title");void 0!=e&&(""+e).length&&$(this).append('<div class="bx-caption"><span>'+e+"</span></div>")})},P=function(t){n.settings.auto&&o.stopAuto(),o.goToNextSlide(),t.preventDefault()},z=function(t){n.settings.auto&&o.stopAuto(),o.goToPrevSlide(),t.preventDefault()},y=function(t){o.startAuto(),t.preventDefault()},M=function(t){o.stopAuto(),t.preventDefault()},k=function(t){n.settings.auto&&o.stopAuto();var e=$(t.currentTarget);if(void 0!==e.attr("data-slide-index")){var i=parseInt(e.attr("data-slide-index"));i!=n.active.index&&o.goToSlide(i),t.preventDefault()}},I=function(t){var e=n.children.length;return"short"==n.settings.pagerType?(n.settings.maxSlides>1&&(e=Math.ceil(n.children.length/n.settings.maxSlides)),void n.pagerEl.html(t+1+n.settings.pagerShortSeparator+e)):(n.pagerEl.find("a").removeClass("active"),void n.pagerEl.each(function(e,i){$(i).find("a").eq(t).addClass("active")}))},q=function(){if(n.settings.infiniteLoop){var t="";0==n.active.index?t=n.children.eq(0).position():n.active.index==f()-1&&n.carousel?t=n.children.eq((f()-1)*x()).position():n.active.index==n.children.length-1&&(t=n.children.eq(n.children.length-1).position()),t&&("horizontal"==n.settings.mode?S(-t.left,"reset",0):"vertical"==n.settings.mode&&S(-t.top,"reset",0))}n.working=!1,n.settings.onSlideAfter(n.children.eq(n.active.index),n.oldIndex,n.active.index)},D=function(t){n.settings.autoControlsCombine?n.controls.autoEl.html(n.controls[t]):(n.controls.autoEl.find("a").removeClass("active"),n.controls.autoEl.find("a:not(.bx-"+t+")").addClass("active"))},A=function(){1==f()?(n.controls.prev.addClass("disabled"),n.controls.next.addClass("disabled")):!n.settings.infiniteLoop&&n.settings.hideControlOnEnd&&(0==n.active.index?(n.controls.prev.addClass("disabled"),n.controls.next.removeClass("disabled")):n.active.index==f()-1?(n.controls.next.addClass("disabled"),n.controls.prev.removeClass("disabled")):(n.controls.prev.removeClass("disabled"),n.controls.next.removeClass("disabled")))},W=function(){if(n.settings.autoDelay>0)var t=setTimeout(o.startAuto,n.settings.autoDelay);else o.startAuto();n.settings.autoHover&&o.hover(function(){n.interval&&(o.stopAuto(!0),n.autoPaused=!0)},function(){n.autoPaused&&(o.startAuto(!0),n.autoPaused=null)})},H=function(){var t=0;if("next"==n.settings.autoDirection)o.append(n.children.clone().addClass("bx-clone"));else{o.prepend(n.children.clone().addClass("bx-clone"));var e=n.children.first().position();t="horizontal"==n.settings.mode?-e.left:-e.top}S(t,"reset",0),n.settings.pager=!1,n.settings.controls=!1,n.settings.autoControls=!1,n.settings.tickerHover&&!n.usingCSS&&n.viewport.hover(function(){o.stop()},function(){var t=0;n.children.each(function(e){t+="horizontal"==n.settings.mode?$(this).outerWidth(!0):$(this).outerHeight(!0)});var e=n.settings.speed/t,i="horizontal"==n.settings.mode?"left":"top",s=e*(t-Math.abs(parseInt(o.css(i))));L(s)}),L()},L=function(t){speed=t?t:n.settings.speed;var e={left:0,top:0},i={left:0,top:0};"next"==n.settings.autoDirection?e=o.find(".bx-clone").first().position():i=n.children.first().position();var s="horizontal"==n.settings.mode?-e.left:-e.top,r="horizontal"==n.settings.mode?-i.left:-i.top,a={resetValue:r};S(s,"ticker",speed,a)},F=function(){n.touch={start:{x:0,y:0},end:{x:0,y:0}},n.viewport.bind("touchstart",N)},N=function(t){if(n.working)t.preventDefault();else{n.touch.originalPos=o.position();var e=t.originalEvent;n.touch.start.x=e.changedTouches[0].pageX,n.touch.start.y=e.changedTouches[0].pageY,n.viewport.bind("touchmove",O),n.viewport.bind("touchend",X)}},O=function(t){var e=t.originalEvent,i=Math.abs(e.changedTouches[0].pageX-n.touch.start.x),s=Math.abs(e.changedTouches[0].pageY-n.touch.start.y);if(3*i>s&&n.settings.preventDefaultSwipeX?t.preventDefault():3*s>i&&n.settings.preventDefaultSwipeY&&t.preventDefault(),"fade"!=n.settings.mode&&n.settings.oneToOneTouch){var o=0;if("horizontal"==n.settings.mode){var r=e.changedTouches[0].pageX-n.touch.start.x;o=n.touch.originalPos.left+r}else{var r=e.changedTouches[0].pageY-n.touch.start.y;o=n.touch.originalPos.top+r}S(o,"reset",0)}},X=function(t){n.viewport.unbind("touchmove",O);var e=t.originalEvent,i=0;if(n.touch.end.x=e.changedTouches[0].pageX,n.touch.end.y=e.changedTouches[0].pageY,"fade"==n.settings.mode){var s=Math.abs(n.touch.start.x-n.touch.end.x);s>=n.settings.swipeThreshold&&(n.touch.start.x>n.touch.end.x?o.goToNextSlide():o.goToPrevSlide(),o.stopAuto())}else{var s=0;"horizontal"==n.settings.mode?(s=n.touch.end.x-n.touch.start.x,i=n.touch.originalPos.left):(s=n.touch.end.y-n.touch.start.y,i=n.touch.originalPos.top),!n.settings.infiniteLoop&&(0==n.active.index&&s>0||n.active.last&&0>s)?S(i,"reset",200):Math.abs(s)>=n.settings.swipeThreshold?(0>s?o.goToNextSlide():o.goToPrevSlide(),o.stopAuto()):S(i,"reset",200)}n.viewport.unbind("touchend",X)},Y=function(t){if(n.initialized){var e=$(window).width(),i=$(window).height();(r!=e||a!=i)&&(r=e,a=i,o.redrawSlider(),n.settings.onSliderResize.call(o,n.active.index))}};return o.goToSlide=function(t,e){if(!n.working&&n.active.index!=t)if(n.working=!0,n.oldIndex=n.active.index,0>t?n.active.index=f()-1:t>=f()?n.active.index=0:n.active.index=t,n.settings.onSlideBefore(n.children.eq(n.active.index),n.oldIndex,n.active.index),"next"==e?n.settings.onSlideNext(n.children.eq(n.active.index),n.oldIndex,n.active.index):"prev"==e&&n.settings.onSlidePrev(n.children.eq(n.active.index),n.oldIndex,n.active.index),n.active.last=n.active.index>=f()-1,n.settings.pager&&I(n.active.index),n.settings.controls&&A(),"fade"==n.settings.mode)n.settings.adaptiveHeight&&n.viewport.height()!=h()&&n.viewport.animate({height:h()},n.settings.adaptiveHeightSpeed),n.children.filter(":visible").fadeOut(n.settings.speed).css({zIndex:0}),n.children.eq(n.active.index).css("zIndex",n.settings.slideZIndex+1).fadeIn(n.settings.speed,function(){$(this).css("zIndex",n.settings.slideZIndex),q()});else{n.settings.adaptiveHeight&&n.viewport.height()!=h()&&n.viewport.animate({height:h()},n.settings.adaptiveHeightSpeed);var i=0,s={left:0,top:0};if(!n.settings.infiniteLoop&&n.carousel&&n.active.last)if("horizontal"==n.settings.mode){var r=n.children.eq(n.children.length-1);s=r.position(),i=n.viewport.width()-r.outerWidth()}else{var a=n.children.length-n.settings.minSlides;s=n.children.eq(a).position()}else if(n.carousel&&n.active.last&&"prev"==e){var l=1==n.settings.moveSlides?n.settings.maxSlides-x():(f()-1)*x()-(n.children.length-n.settings.maxSlides),r=o.children(".bx-clone").eq(l);s=r.position()}else if("next"==e&&0==n.active.index)s=o.find("> .bx-clone").eq(n.settings.maxSlides).position(),n.active.last=!1;else if(t>=0){var d=t*x();s=n.children.eq(d).position()}if("undefined"!=typeof s){var c="horizontal"==n.settings.mode?-(s.left-i):-s.top;S(c,"slide",n.settings.speed)}}},o.goToNextSlide=function(){if(n.settings.infiniteLoop||!n.active.last){var t=parseInt(n.active.index)+1;o.goToSlide(t,"next")}},o.goToPrevSlide=function(){if(n.settings.infiniteLoop||0!=n.active.index){var t=parseInt(n.active.index)-1;o.goToSlide(t,"prev")}},o.startAuto=function(t){n.interval||(n.interval=setInterval(function(){"next"==n.settings.autoDirection?o.goToNextSlide():o.goToPrevSlide()},n.settings.pause),n.settings.autoControls&&1!=t&&D("stop"))},o.stopAuto=function(t){n.interval&&(clearInterval(n.interval),n.interval=null,n.settings.autoControls&&1!=t&&D("start"))},o.getCurrentSlide=function(){return n.active.index},o.getCurrentSlideElement=function(){return n.children.eq(n.active.index)},o.getSlideCount=function(){return n.children.length},o.redrawSlider=function(){n.children.add(o.find(".bx-clone")).width(v()),n.viewport.css("height",h()),n.settings.ticker||m(),n.active.last&&(n.active.index=f()-1),n.active.index>=f()&&(n.active.last=!0),n.settings.pager&&!n.settings.pagerCustom&&(b(),I(n.active.index))},o.destroySlider=function(){n.initialized&&(n.initialized=!1,$(".bx-clone",this).remove(),n.children.each(function(){void 0!=$(this).data("origStyle")?$(this).attr("style",$(this).data("origStyle")):$(this).removeAttr("style")}),void 0!=$(this).data("origStyle")?this.attr("style",$(this).data("origStyle")):$(this).removeAttr("style"),$(this).unwrap().unwrap(),n.controls.el&&n.controls.el.remove(),n.controls.next&&n.controls.next.remove(),n.controls.prev&&n.controls.prev.remove(),n.pagerEl&&n.settings.controls&&n.pagerEl.remove(),$(".bx-caption",this).remove(),n.controls.autoEl&&n.controls.autoEl.remove(),clearInterval(n.interval),n.settings.responsive&&$(window).unbind("resize",Y))},o.reloadSlider=function(t){void 0!=t&&(s=t),o.destroySlider(),l()},l(),this}}(jQuery);