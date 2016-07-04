(function(window, $, undefined){
	
	var XT = function(){
		
	}
	
	XT.tool = {
		//带限制范围的拖拽
		'limitDrag':function(_this,ev){
			var ev = ev || window.event;
			var oTarget = ev.target || ev.scrElement || null;
			//console.log(oTarget);
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
