//ajax评论
var ajaxcomments = function(){
	var
	   $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
	var
	   comments_order = 'DESC',
	   comment_list   = '.comment-list',
	   comments       = '.noticom',
	   comment_reply  = '.comment-reply-link',
	   comment_form   = '#commentform',
	   respond        = '#comments-ajax',
	   textarea       = '#comment',
	   submit_btn     = '#submit',
	   new_id = '', parent_id = '';

	click_bind();
    /* 开始提交 */
    $(comment_form).submit(function() {
		/* 初始化评论框 */
		$('.comment-respond textarea').css({"border":"2px  solid #DDE6EA"});
		$('.commenttext').css({"border":"2px  solid #DDE6EA"});
		$("#submit").val("提交中...");
		if($('#comment-author-info').length>0){
			/*格式整理*/
			var authorValue = $('#author').val().replace(/(^\s*)|(\s*$)/g, "");
			var mailValue = $('#mail').val().replace(/(^\s*)|(\s*$)/g, "");
			var urlValue = $('#url').val().replace(/(^\s*)|(\s*$)/g, "");
			var textValue = $(comment_form).find(textarea).val().replace(/(^\s*)|(\s*$)/g, "");
			/* 预检 */
			var errorNum = 0;
			if(authorValue == ""){
				errorNum++;
				$('#author').css({"border":"2px dashed #ff6c6c"});
			}
			if(mailValue == ""){
				errorNum++;
				$('#mail').css({"border":"2px dashed #ff6c6c"});
			}
			if(urlValue != ""){
				if(urlValue.indexOf('https://') == -1 && urlValue.indexOf('http://') == -1){
					errorNum++;
					$('#url').css({"border":"2px dashed #ff6c6c"});
			}
			}
			if(textValue == ""){
				errorNum++;
				$('.comment-respond textarea').css({"border":"2px dashed #ff6c6c"});
			}
			if(errorNum != 0){
				$("#comment-author-info").show();
				$("#toggle-comment-info").html("[ 隐藏 ] ↑");
				setTimeout(function(){ $("#submit").val("再次提交"); }, 500);
				return false;
			}
		}
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serializeArray(),async: true,
            error: function(date) {
                $("#submit").val("提交失败");
                let msg = $(".container", date.responseText).prevObject[7].innerHTML.replace(/\s*/g,"");
                $(document).ready(function(){
                    $.alert("提示",msg);
                });
                setTimeout(function(){ $("#submit").val("再次提交"); }, 1000);
                return false;
            },
            success: function(data) { //成功取到数据
                try {
                    new_id = $(comment_list, data).html().match(/id=\"?comment-\d+/g).join().match(/\d+/g).sort(function(a, b) {
                        return a - b
                    }).pop(); // TODO：找新 id，如果在第二页评论的话，找到的ID是有问题的！

                    if ($('.page-navigator .prev').length && parent_id == ""){
                        new_id = '';
						var dd=$(".prev a").attr("href");//获取上页地址
						$(".prev a").attr("href",""); //将地址清空
						dd=dd.replace(/comment-page-(.*?)#comments/, "comment-page-1#comments");//将获取的地址页码改为1
						$(".prev a").attr("href",dd); //将地址放回去
						$('.prev a').get(0).click(); //点击这个超链接
					}//判断当前评论列表是否在第一页,并且只会在母评论时候才会生效

                    //插入评论内容到当前页面
                    if (parent_id) {
                        data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                        if ($('#' + parent_id).find(".children").length <= 0) {
                            $('#' + parent_id).append("<div class='children'><ol class='comment-list'></ol></div>");
                        }
                        if (new_id)//new_id不为空的时候才会插入
                            $('#' + parent_id + " .children .comment-list").prepend(data);
                        parent_id = '';
                    } else {
                        data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                        //console.log('该评论为母评论');
                        if (!$(comment_list).length) //如果一条评论也没有的话
                            $(respond).append('<ol class="comment-list"></ol>'); // 加 ol
                        $(comment_list).prepend(data);
                    }
					setTimeout(function(){ $("#submit").val("提交成功"); }, 2000);
                    $('#li-comment-' + new_id).fadeIn(); // 显示
                    var num;
                    $(comments).length ? (num = parseInt($(comments).text().match(/\d+/)), $(comments).html($(comments).html().replace(num, num + 1))) : 0;
                    // 评论数加一
                    TypechoComment.cancelReply();
                    $(textarea).html('');$(textarea).val('');
                    $(comment_reply + ' #cancel-comment-reply-link').unbind('click');
                    click_bind(); // 新评论绑定
                    if (new_id){
                        $body.animate({scrollTop: $('#li-comment-' + new_id).offset().top - 200}, 900);
                    }else{
                        $body.animate({scrollTop: $('#comments').offset().top - 200}, 900);
                    }
					setTimeout(function(){ $("#submit").val("发表评论"); }, 3000);
                } catch(e) {
                    //alert('评论ajax错误!请截图并联系主题制作者！\n\n' + e);
                    window.location.reload();
                }
            } // end success()
        }); // end ajax()
        return false;
    }); // end $(comment_form).submit()
	
    function click_bind() { // 绑定
        $(comment_reply).click(function() { // 回复
            parent_id = $(this).parent().parent().parent().attr("id");
            $(textarea).focus();
        });
        $('#cancel-comment-reply-link').click(function() { // 取消
            parent_id = '';
        });
    }

 }

//nav show/hidden
$(function(){
	var h1 = 0;
	var h2 = 50;
	var ss = $(document).scrollTop();
	$(window).scroll(function(){
		var s = $(document).scrollTop();

		if(s== h1){
			$('.site-header').removeClass('yya');
		}if(s > h1){
			$('.site-header').addClass('yya');
		}if(s > h2){
			$('.site-header').addClass('gizle');
			if(s > ss){
				$('.site-header').removeClass('sabit');
			}else{
				$('.site-header').addClass('sabit');
			}
			ss = s;
		}

	});
	
});
 
//mo-nav
var mNav = function(){
	$('.iconflat').on('click', function () {
	    $('body').toggleClass('navOpen');
	    $('#main-container,#mo-nav,.openNav').toggleClass('open');
	});
}
var mNav_hide = function(){
	if($('body').hasClass('navOpen')){
   		$('body').toggleClass('navOpen');
	    $('#main-container,#mo-nav,.openNav').toggleClass('open');
   	}
}

/*
 * AJAX Single
*/
var loadSingle = function(){
	$("#pagination a").on("click", function(){
	    $(this).addClass("loading").text("");
	    $.ajax({
		type: "POST",
	        url: $(this).attr("href") + "#main",
	        success: function(data){
	            result = $(data).find("#main .post");
	            nextHref = $(data).find("#pagination a").attr("href");
	            // In the new content
	            $("#main").append(result.fadeIn(300));
	            $("#pagination a").removeClass("loading").text("加载更多");
	            if ( nextHref != undefined ) {
	                $("#pagination a").attr("href", nextHref);
	            } else {
	            // If there is no link, that is the last page, then remove the navigation
	                $("#pagination")[0].innerHTML = '<span class="nextStop">没有了</span>';
	            }
	        }
	    });
	    return false;
	});
}

// 评论分页
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
// 点击分页导航链接时触发分页
$('#comments-navi a').on('click', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(this).attr('href'),
        beforeSend: function(){
            $('#comments-navi').remove();
            $('#comments-ajax').remove();
            $('#loading-comments').slideDown();
            $body.animate({scrollTop: $('#comments-list-title').offset().top - 65}, 800 );
        },
        dataType: "html",
        success: function(out){
            result = $(out).find('#comments-ajax');
            nextlink = $(out).find('#comments-navi');
            $('#loading-comments').slideUp('fast');
            $('#loading-comments').after(result.fadeIn(500));
            $('#comments-ajax').after(nextlink);
        }
    });
});

// 顶部加载条
var loading = function(){
	
//preloading
$(window).preloader({	
		        delay: 500
		    });	
}

/*
 * Click Event  防止一些点击事件因为而pjax失效  代码取自路易
*/
var clickEvent = function(){
	
	ajaxcomments();
//表情js	
  $(".smli-button").click(function(){
    $(".smilies-box").fadeToggle("fast");
  });

//评论者信息 显示/隐藏
$("#toggle-comment-info").click(function click_comment_info(){
    var comment_info = $("#toggle-comment-info");
    var author_info = $("#comment-author-info");
    if(author_info.css("display") == "none"){
        comment_info.html("[ 隐藏 ] ↑");
    }else{
        comment_info.html("[ 修改 ] ↓");
    }
    author_info.slideToggle("slow");
  });

//打赏 8.15
  $(".donate").click(function(){
    $(".donate_inner").fadeToggle("fast");
  });
 
// Archives Page
	$('.archives').hide();
	$('.archives:first').show();
	$('#archives-temp h3').click(function() {
		$(this).next().slideToggle('fast');
		return false;
	});

//lightbox
baguetteBox.run('.entry-content', {
    captions: function(element) {
        return element.getElementsByTagName('img')[0].alt;
    },
    noScrollbars: true,
});
	
//搜索盒子
function removeBox(){
    $('.js-toggle-search').toggleClass('is-active');
    $('.js-search').toggleClass('is-visible');
}
// 搜索按钮
$('.js-toggle-search').on('click', function () { removeBox() });
//第一层父
$(".js-search").click(function(){
    event.stopPropagation();
    removeBox();
});
//第一层子
$(".js-search").children().click(function(){
    event.stopPropagation();
    if($(this)[0].className!="search-form__inner"){ removeBox() }
});
//第二层父
$(".search-div").click(function(){
    event.stopPropagation(); 
    removeBox();
});
//第二层子
$(".search-div").children().click(function(){
    event.stopPropagation(); 
    if($(this)[0].className!="submit"){ removeBox() }
});
	
// Show & hide comments
	$('.comments-hidden').show();
	$('.comments-main').hide();
	$('.comments-hidden').click(function(){
		$('.comments-main').slideDown(500);
		$('.comments-hidden').hide();
	});	
}

/*
 * Click Event end
*/

//gotop		
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 100,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
	//pjax
	if(app.pjax){
	$(document).pjax('a[target!=_top]', '#page', {
        	fragment: '#page', //主容器
        	timeout: 8000, // 8秒限时
	    }).on('pjax:send', function() {
			$('body').append('<div id="preloader"><div id="preloader-inner"></div></div>'); // 加载过度动画
	    }).on('pjax:complete', function() { // 加载完毕				
			clickEvent(); // 一些点击事件
			$('#preloader').remove(); // 删除过度动画
	    });
	}
	if (xl == 1) { //判断
		//自动加载
		var finished = false;
		var winH = $(window).height(); //页面可视区域高度
		var scrollHandler = function () {
			var pageH = $(document.body).height();
			var scrollT = $(window).scrollTop(); //滚动条top 
			var aa = (pageH - winH - scrollT) / winH;
			
			if (!finished && aa < 0.3) { 
				$('#pagination a').click();
				finished = true;
				setTimeout(function(){finished = false;},500);
			}
		}
		$(window).scroll(scrollHandler); //定义鼠标滚动事件
	}
});	

( function( $ ) {
// Load Function
loading();
clickEvent();
loadSingle();
mNav();
} )( jQuery );
//为默认编辑器代码标签添加高亮
var preLigut = document.getElementsByTagName("pre");
for(var i = 0;  i < preLigut.length; i++){
    if(preLigut[i].className==""){
        preLigut[i].classList.add("language-js");
    }
}
//除友链外，自动添加blank nofollow noopener noreferrer标签
$(document).ready(function(){
	$("a[href*='://']:not(a[href^='"+document.location.protocol+"//"+document.location.host+"'],a[href^='javascript:'])").attr({target:"_blank",rel:"nofollow noopener noreferrer"});
	$(".links a[href*='://']").removeAttr("rel");
});
//窗口提示
function Fytx_Tips() {
    var _this = this;
    _this.Fytx_alert = function(obj) {
        if ($("div").is(".fytx_alert_background")) $('.fytx_alert_background').remove();
        var _fytx_alert_background = '<div class="fytx_alert_background"><div class="fytx_alert_box">' + '<div class="fytx_alert_title">' + obj.title + '</div>' + '<div class="fytx_alert_message">' + obj.message + '</div>' + '<span class="fytx_alert_btn">知道了</span>' + '</div></div>';
        $('body').append(_fytx_alert_background);
    }
}
$(document).ready(function() {
    var Fytx = new Fytx_Tips();
    $.alert = function(title, msg) {
        Fytx.Fytx_alert({
            title: title,
            message: msg
        })
    },
    $("body").on("click", ".fytx_alert_btn",
    function() {
        $(".fytx_alert_background").hide();
    });
});
//优化文章中的表格显示效果
let tables = document.getElementsByTagName("table");
if (tables.length != 0) {
        for ( i = 0; i < tables.length; i++ ) {
            // 创建一个div、添加class
            var tableFather = document.createElement('div');
            tableFather.className = 'table-box';
            // 操作Dom
            tableFather.appendChild(tables[i].parentNode.replaceChild(tableFather, tables[i]));
        }
}
// 文章目录滚动
// 获取目录主体
let doc = document.getElementById('toc-container');
if (doc != null) {
  let postbgBox = document.getElementsByClassName('pattern-center');
  // 默认数据
  let uptoTop = 0;
  let fixtoTop = 0;
  // 判断导航栏有没有透明
  if (transparent == 1) {
    // 透明-判断有无文章头图
    if ( postbgBox.length == 0 ) {
      uptoTop = 100;
      fixtoTop = -100;
    } else {
      uptoTop = 600;
      fixtoTop = 400;
    }
  } else {
    // 不透明-判断有无文章头图
    if ( postbgBox.length == 0 ) {
      uptoTop = 160;
      fixtoTop = -40;
    } else {
      // 默认数据
      uptoTop = 660;
      fixtoTop = 460;
    }
   }
  window.onscroll = function () {
    // 获取距离页面顶部的距离
    let toTop = document.documentElement.scrollTop || document.body.scrollTop;
    if ( toTop > uptoTop ) {
      let boxtoTop = toTop - fixtoTop;
      doc.style.cssText = 'top: '+ boxtoTop +'px;';
    } else {
      doc.style.cssText = '';
    }
  }
}
//版本显示
console.log("%cAkina for Typecho 4.1.3","background:#A0DAD0;color:#fff;margin:10px;padding:6px;border-radius:3px;","https://zhebk.cn");
