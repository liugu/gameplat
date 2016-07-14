(function(window, $, undefined){

	var XT = function(){

	}

	XT.tool = {
		//带限制范围的拖拽
		'limitDrag':function(_this,ev){
			var ev = ev || window.event;
			var oTarget = ev.target || ev.scrElement || null;
			//console.log(ev);
			if(true){
				_this.setCapture && _this.setCapture();

				var disX = ev.clientX - _this.offsetLeft;
				var disY = ev.clientY - _this.offsetTop;

				document.onmousemove = function(ev){
					var ev = ev || window.event;
					var iMoveX = ev.clientX - disX;
					var iMoveY = ev.clientY - disY;

					if(iMoveX <=20){
						iMoveX =20;
					}else if(iMoveX > _this.parentNode.clientWidth - _this.offsetWidth-20){
						iMoveX = _this.parentNode.clientWidth - _this.offsetWidth-20;
					}

					if(iMoveY<=20){
						iMoveY =20;
					}else if(iMoveY > _this.parentNode.clientHeight - _this.offsetHeight - 20){
						iMoveY = _this.parentNode.clientHeight - _this.offsetHeight - 20;
					}

					//获得选中的文字
					//document.selection.createRange().text; //IE
					//window.getSelection().toString(); //标准

					//清除移动时选中的文字
					window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();

					_this.style.left = iMoveX + 'px';
					_this.style.top = iMoveY + 'px';
				}
				document.onmouseup = function(){
					document.onmousemove = null;
					document.onmouseup = null;
					_this.releaseCapture && _this.releaseCapture();
				}


				return false;

			}
		},
		'popup':function(tit, msg){
			var sPopupStr  = '<div class="common-mask"></div>'
							+ '<div class="common-popup">'
							+	'<h3 class="tit"><span>'+ tit +'</span><a class="close" href="javascript:;">×</a></h3>'
							+	'<p class="content">'+ msg +'</p>'
							+	'<p class="btn-ctrl"><a class="confirm" href="javascript:;">确定</a></p>'
							+ '</div>';
			$('body').append(sPopupStr);

			var _this = $('.common-popup');

			_this.css({
				'left':$(window).width()/2 - _this.width()/2,
				'top':$(window).height()/2 - _this.height()/2
			}).hide().stop().fadeIn();
			$('.common-popup .close,.common-popup .confirm').click(function(){
				$('.common-mask').remove();
				_this.stop().fadeOut(function(){
					$(this).remove();
				});
			})

		},
		'saveDesk':function(){
			XT.tool.popup('温馨提示','暂未开放，敬请期待！');

		},
		'addFavorite':function(title, url){
		    try {
		        window.external.addFavorite(url, title);
		    }catch(e){
		        try {
		            window.sidebar.addPanel(title, url, "");
		        }catch(e) {
		            XT.tool.popup("温馨提示","抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
		        }
		    }

		},
		'refreshCode':function(_this){
			//刷新验证码
			_this.src = sDomin + '/Public/verify?v=' + Math.random(0,9999);

		},
		'seepact':function(){
			window.open('http://www.0058.com/about/serve_rules.html','null','height=240,width=420,top=0,left=0,channelmode=no,directories=no,alwaysRaised=yes,depended=yes,toolbar=no,menubar=no,scrollbars=yes,resizable=no,location=no,status=no');
		},
		'msgcountdown':function(iSec){

			var iTime = parseInt(iSec);

			return function(){
				return iTime--;
			}

		},
		'countdowncall':function(_this,iSec){

			var msgCountDown = XT.tool.msgcountdown(iSec);

			var timer = null;
			timer = setInterval(function(){
				var iCurrent = msgCountDown();
				$(_this).text(iCurrent + 's后重新发送');
				if(iCurrent<=0){
					iCurrent=0;
					clearInterval(timer);
					$(_this).removeClass('get-code-gray').text('重新发送').attr("onclick","XT.tool.getcode('register_form',this)");
				}

				
			},1000);

		},
		'getcode':function(form_id,_this){

			var oForm = document.getElementById(form_id);
			//获取手机号码
			var iTel = oForm.user_name.value;

			var $tips = $(oForm).prev();

			if(!XT.noticeTips.regularList.mobile.test(iTel)){
				$tips.text(XT.noticeTips.errorMsg.mobile);
				return false;
			}
			//ajax请求验证码
			$.post(sDomin + '/Public/send_msg',{'phone_num':iTel},function(re){
				if(re.s==1){
					$tips.text(re.msg).addClass('green');
					$(_this).addClass('get-code-gray').removeAttr('onclick').text('60s后重新发送');
					XT.tool.countdowncall(_this,59);
				}else{
					$tips.text(re.msg).removeClass('green');
				}

			},'json');

		}



	}
	XT.noticeTips = {
		'regularList' : {
			"loginName" : /^[a-zA-Z][0-9a-zA-Z]{5,19}$/, //用户名由字母开头的6-20个字母与数字组成
			"notEmpty" : /^.+$/,// 合法字符
			"passWord" : /^[0-9A-Za-z]{6,18}$/,// 密码应由6-18个字母、数字、字符组成
			"rePassWord" : /^[0-9A-Za-z]{6,18}$/,
			"mobile" : /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/,// 手机号
			"yzm":/^[0-9a-zA-Z]{4}$/, //4位
			"dxyz":/^[0-9a-zA-Z]{6}$/ //6位
		},
		'errorMsg' : {
			"loginName" : "用户名由字母开头的6-20个字母与数字组成",
			"notEmpty" : "输入不能为空",
			"passWord" : "密码由6-18个字母、数字、字符组成",
			"rePassWord" : "两次密码不一致",
			"mobile" : "请输入正确的手机号",
			"yzm":"验证码不正确",
			"repeatname":"用户名已存在",
			"dxyz":"短信验证码不正确"
		}
	}
	//登录相关操作
	XT.login = {
		'param':{
			'loginAlert':null,
			'regAlert':null,
			'hasLoaded':0,
			'loginOrReg':0,
			'ctrlStatus':0,
			'phoneOrUsername':'phone',
			'phoneStr':'<label class="tips-txt">手机号码</label><input name="user_name" class="enter-input" type="text" value="" placeholder="请输入手机号码"  /><input type="hidden" name="type" value="2" />',
			'userNameStr':'<label class="tips-txt">用<i class="code-dot"></i>户<i class="code-dot"></i>名</label><input name="user_name" class="enter-input" type="text" value="" placeholder="请输入用户名"  /><input type="hidden" name="type" value="1" />',
			'msgCodeJson':{
				'className':'normal-block code-block clearfix',
				'html':'<label class="tips-txt">短信验证</label><input name="approve_code" class="enter-input" type="text" value="" placeholder="请输入验证码" maxlength="6"  /><a class="get-code" href="javascript:;" onclick="XT.tool.getcode(\'register_form\',this);">获取验证码</a>'
			},
			'proveCodeJson':{
				'className':'normal-block code-block clearfix',
				'html':'<label class="tips-txt">验<i class="code-dot"></i>证<i class="code-dot"></i>码</label><input name="approve_code" class="enter-input" type="text" value="" placeholder="请输入验证码" maxlength="4"  /><img class="prove-code fl" src="/Public/verify/" onclick="XT.tool.refreshCode(this);"  />'
			}
		},
		'statusToggle':function(type){
			if(type==1){
				$('#login_loading').stop().show();
				$('.login-inp').stop().hide();
			}else if(type==2){
				$('#login_loading').stop().hide();
				$('.login-inp').stop().show();
			}


		},
		'enter':function(id,type){


			var LoginForm = document.getElementById(id);
			var user_name = LoginForm.user_name.value;
			var user_pwd = LoginForm.user_pwd.value;
			var user_verify = LoginForm.user_verify.value;
			var approveImg = $(LoginForm).find('.approve-img');
			var $tips = $(LoginForm).siblings('.error-tips');
			$tips.text('');

			//正则验证输入的合法性
			if(user_name.length <=0 ){
				$tips.text('请输入用户名');
				return false;
			}else if(!XT.noticeTips.regularList.loginName.test(user_name)){
				$tips.text(XT.noticeTips.errorMsg.loginName);
				return false;
			}else if(user_pwd.length <=0 ){
				$tips.text('请输入密码');
				return false;
			}else if(!XT.noticeTips.regularList.passWord.test(user_pwd)){
				$tips.text(XT.noticeTips.errorMsg.passWord);
				return false;
			}else if(user_verify.length<=0){
				$tips.text('请输入验证码');
				return false;
			}else if(!XT.noticeTips.regularList.yzm.test(user_verify)){
				$tips.text(XT.noticeTips.errorMsg.yzm);
				return false;
			}

			if(type==1){
				XT.login.statusToggle(1);
			}
			if(type==2){
				$tips.text('正在登录,请稍后...');
			}
			$.ajax({
				'type':'post',
				'data':$(LoginForm).serialize(),
				'url':sDomin + "/accounts/checklogin",
				'error':function(){
					$(LoginForm.user_verify).focus();
					$tips.text('登录发生错误，请稍后再试！');
					approveImg.click();
					if(type==1){
						XT.login.statusToggle(2);
					}


				},
				'cache':false,
				'dataType':'json',
				'success':function(data){
					if(data.state==1){
						
						if(type==2){
							$tips.text('登录成功').addClass('green');
						}

						$('body').append(data.script);
						setTimeout(function(){
							window.location.href = data.return_url;
						},1000);
					}else{
						if(type==1){

							XT.login.statusToggle(2);
						}
						$tips.text(data.msg);
						approveImg.click();
						$(LoginForm.user_verify).focus();

					}

				}
			});

		},
		'keyDownLogin':function(id,ev){
			var ev = ev || event;
			
			if(ev.keyCode==13){
				$('#'+id).click();
			}

			

		},
		'show':function(type){
			//type login 登录  reg 注册
			if(XT.login.param.hasLoaded == 0 && XT.login.param.ctrlStatus==0){
				_loadInit();
			}else{

				$('.login-popup,.common-mask').stop().show();

				type=='login' && XT.login.param.loginOrReg != 1 && XT.login.popupToggle('login');


				type=='reg' && XT.login.param.loginOrReg != 2 && XT.login.popupToggle('reg');

				$('.popup-form')[0].reset();


			}

			function _loadInit(){
				XT.login.param.ctrlStatus = 1;
				$.get(sDomin + '/Public/reglogin_view',{},function(re){
					$('body').append(re);
					var enterPopup = $('#enter_popup'),regPopup = $('#register_popup');
					//保存登录与注册弹窗
					XT.login.param.loginAlert = enterPopup.clone(true);
					XT.login.param.regAlert = regPopup.clone(true);

					if(type=='login'){

						regPopup.remove();
						XT.login.param.loginOrReg = 1;
						XT.login.posinit(enterPopup);

					}else{

						enterPopup.remove();
						XT.login.param.loginOrReg = 2;
						XT.login.posinit(regPopup);

					}

					XT.login.param.hasLoaded = 1;



				},'html');
			}




		},
		'posinit':function(obj){obj.css({'left':$(window).width()/2 - obj.width()/2,'top':$(window).height()/2 - obj.outerHeight()/2});},
		'popupToggle':function(type){

			//登录/注册弹窗切换

			if(type=='login'){


				$('#register_popup').remove();

				$('body').append(XT.login.param.loginAlert);

				XT.login.param.loginOrReg = 1;

				XT.login.posinit($('#enter_popup'));



			}else if(type=='reg'){

				$('#enter_popup').remove();

				$('body').append(XT.login.param.regAlert);

				XT.login.param.loginOrReg = 2;

				XT.login.posinit($('#register_popup'));



			}

			$('.popup-form')[0].reset();

		},
		'close':function(_this){
			$(_this).parent().parent().stop().hide();
			$('.common-mask').stop().hide();
		},
		'methodToggle':function(ev){
			var ev = ev || window.event;
			var target = ev.target || ev.srcElement || null;

			var $loginAcc = $('.login-account');
			if(target.nodeName == 'SPAN'){
				$(target).addClass('on').siblings('span').removeClass('on');
			}

			if(target.getAttribute('data-type')=='phone'){

				$loginAcc.html(XT.login.param.phoneStr);
				$('#msgProveBlock').attr('class',XT.login.param.msgCodeJson.className).html(XT.login.param.msgCodeJson.html);
				$('#yzmCodeBlock').empty().attr('class','');
				XT.login.param.phoneOrUsername = 'phone';

			}else if(target.getAttribute('data-type')=='username'){

				$loginAcc.html(XT.login.param.userNameStr);

				$('#msgProveBlock').empty().attr('class','');
				$('#yzmCodeBlock').attr('class',XT.login.param.proveCodeJson.className).html(XT.login.param.proveCodeJson.html);

				XT.login.param.phoneOrUsername = 'username';

			}

			$('.popup-form')[0].reset();




		},
		'goReg':function(id){

			var regForm = document.getElementById('register_form');
			var user_name = regForm.user_name.value;
			var user_pwd = regForm.user_pwd.value;
			var user_repwd = regForm.user_repwd.value;
			var approve_code = regForm.approve_code.value;
			var $tips = $(regForm).siblings('.error-tips');
			$tips.text('').removeClass('green');
			//正则验证输入的合法性
			var userReg = '',userTips = '',codeReg = '',codeTips = '';
			if(XT.login.param.phoneOrUsername == 'phone'){
				userReg = XT.noticeTips.regularList.mobile;
				userTips = XT.noticeTips.errorMsg.mobile;
				codeReg = XT.noticeTips.regularList.dxyz;
				codeTips = XT.noticeTips.errorMsg.dxyz;
			}else{
				userReg = XT.noticeTips.regularList.loginName;
				userTips = XT.noticeTips.errorMsg.loginName;
				codeReg = XT.noticeTips.regularList.yzm;
				codeTips = XT.noticeTips.errorMsg.yzm;
			}

			if(user_name.length <=0 ){
				$tips.text('请输入用户名');
				return false;
			}else if(!userReg.test(user_name)){
				$tips.text(userTips);
				return false;
			}else if(user_pwd.length <=0 ){
				$tips.text('请输入密码');
				return false;
			}else if(!XT.noticeTips.regularList.passWord.test(user_pwd)){
				$tips.text(XT.noticeTips.errorMsg.passWord);
				return false;
			}else if(user_repwd.length<=0){
				$tips.text('请再次输入密码');
				return false;
			}else if(user_pwd != user_repwd){
				$tips.text('两次输入密码不一致');
				return false;
			}else if(approve_code.length<=0){
				$tips.text('请输入验证码');
				return false;
			}else if(!codeReg.test(approve_code)){
				$tips.text(codeTips);
				return false;
			}
			//判断是否勾选使用条款
			if(regForm.is_agree.value!=1){
				$tips.text('请勾选《中国视频娱乐网服务使用协议》');
				return false;
			}

			$tips.text('正在注册,请稍后...').addClass('green');
			$.ajax({
				'type':'post',
				'url':sDomin + '/Accounts/do_register2',
				'data':$(regForm).serialize(),
				'dataType':'json',
				'success':function(re){
					if(re.status==1){
						$tips.text(re.info).addClass('green');
						setTimeout(function(){
							window.location.href = re.url;
						},500);
					}else{
						$tips.text(re.info).removeClass('green');
					}
				}
			});





		}



	}

	XT.pay = {
		'tips':function(msg){
			$('#pay_core').append('<div class="ctrl-tips">' + msg + '</div>').find('.ctrl-tips').fadeOut(2500,function(){
				$(this).remove();
			});
		},
		'popup':function(tit,cnt1,cnt2){
			/*
				tit   订单超额
				cnt   您的订单已超出限额，微信支付单笔限额3000.00元
						请选择其他金额，或更换充值方式
			*/

			var popupStr =	'<div class="pay-mask"></div>'
							+'<div class="pay-alert" onmousedown="XT.tool.limitDrag(this,event);">'
							+	'<h4 class="title">'
							+		'<span>'+ tit +'</span>'
							+		'<a class="close" href="javascript:;" onclick="XT.pay.close();">×</a>'
							+	'</h4>'
							+	'<div class="tips-cnt">'
							+		'<p class="content">'+ cnt1 +'</p>'
							+		'<p class="s-tips">'+ cnt2 +'</p>'
							+		'<p class="btn-area">'
							+			'<a class="btn-link m_center" href="javascript:;" onclick="XT.pay.close();">返回修改</a>'
							+		'</p>'
							+	'</div>'
							+'</div>';


			$('#pay_core').append(popupStr);

			var payAlert = payCore.find('.pay-alert');




		},
		'gopay':function(){
			alert('充值按钮点击');
		},
		'close':function(){
			$('.pay-mask').remove();
			$('.pay-alert').fadeOut(200,function(){
				$(this).remove();
			})
		}


	}


	XT.animate = {
		'scrollAdInit':function(id){
			var gameAd = $(id);
			var tabBtn = gameAd.find('.tab-btn');//获得左右切换按钮
			var bannerList = gameAd.find('.ad-list');//获得轮播图UL
			var iNow = 0;
			var timer = null;
			tabBtn.click(function(){
				if($(this).hasClass('prev-btn')){
					iNow--;
					if(iNow<0){
						iNow = bannerList.find('li').length - 1;
					}

				}else{
					iNow++;
					iNow%=bannerList.find('li').length;
				}

				startBanner(iNow);
			});
			gameAd.hover(function(){
				clearInterval(timer);
			},function(){
				timer = setInterval(function(){
					iNow++;iNow%=bannerList.find('li').length;
					startBanner(iNow);
				},2000);
			})
			clearInterval(timer);
			timer = setInterval(function(){
				iNow++;iNow%=bannerList.find('li').length;
				startBanner(iNow);
			},2000);
			//初始化图片和dot
			bannerList.find('li').each(function(index, ele){
				//更新图片 data-img
				var subA = $(this).find('a');
				subA.css('background','url('+subA.attr("data-img")+') no-repeat center center');
				//更新dot
				var spanStr = '';
				if(index==0){
					$(this).addClass('current');
					spanStr = '<span class="dot on"></span>';
				}else{

					spanStr = '<span class="dot"></span>';
				}
				gameAd.find('.sort-dot').append(spanStr);

			});

			gameAd.find('.sort-dot span').mouseover(function(){
				iNow = $(this).index();
				startBanner(iNow);
			});

			function startBanner(index){
				gameAd.find('.sort-dot span').eq(index).addClass('on').siblings().removeClass('on');
				bannerList.children('li').eq(index).addClass('current').siblings().removeClass('current');
			}


		}


	}



	window.XT = XT;

})(window, $)
