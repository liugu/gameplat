//首页幻灯片
$(function(){
	XT.animate.scrollAdInit('#game_ad');
	
});

//首页登录信息显示与隐藏
$(function(){
	var timer = null;
	function hideInfo(){
		timer = setTimeout(function(){
			$('#detail_info').css('display','none');
		},300);
	}
	
	function showInfo(){
		clearTimeout(timer);
		$('#detail_info').css('display','block');
	}
	$('#nav_username,#detail_info').hover(showInfo,hideInfo);

});

//充值中心相关JS操作
$(function(){
	//支付方式切换
	$('.pay-method .met-list li').on('click',function(){
		$(this).addClass('current').siblings().removeClass('current');
		if($(this).data('pay')=='net_bank'){
			$('#vista_pay').addClass('vista-pay-show');
		}else{
			$('#vista_pay').removeClass('vista-pay-show');
		}
	});
	
	$('#money_con span').on('click',function(){
		$(this).addClass('current').siblings().removeClass('current');
	});
	
	$('#pay_random').on('focus',function(){
		$('#money_con span').removeClass('current');
	});

	$('#vista_pay span').on('click',function(){
		$(this).addClass('current').siblings().removeClass('current');
	});
	
	
	//游戏及服务器列表选择
	var gameOptInfo = $('#game_opt_info');
	var currentGameFlag = '';
	var gameServerSwitch = $('#pay_detail .game-opt-btn');
	gameServerSwitch.on('click',function(){
		var current_class = $(this).data('class');
		gameOptInfo.stop().show();
		if(current_class=='game-current'){
			currentGameFlag = '#games_detail';
			gameOptInfo.addClass(current_class).removeClass('server-current');
			
		}else if(current_class == 'server-current'){
			currentGameFlag = '#servers_detail';
			gameOptInfo.addClass(current_class).removeClass('game-current');
		}

	});
	
	//游戏选择按钮文字替换
	$('.pay-detail .game-con a').on('click',function(){
		var currentText = $(this).text();
		$(currentGameFlag).find('span').text(currentText);
		gameOptInfo.stop().hide();
		
	})
	
	
	$('.pay-detail .game-opt').on('click',function(ev){
		var ev = ev || window.event;
		
		if(ev.cancelBubble){
			ev.cancelBubble = true;
		}else{
			ev.stopPropagation();
		}
	});
	
	
	//最近玩的游戏与全部游戏选项切换
	$('#game_opt_tit a').on('click',function(){
		var current_id = $(this).data('id');
		$(this).addClass('active').siblings().removeClass('active');
		$('#'+current_id).stop().show().siblings().stop().hide();
		return false;
		
	});
	
	
	//点击空白处隐藏元素
	$('#pay_core').on('click',function(){
		
		gameOptInfo.stop().hide();
	});
	
	
});
