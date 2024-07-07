//4. 動画のモーダル
$(".video-open").modaal({
	type: 'video',
	overlay_close:true,//モーダル背景クリック時に閉じるか
	background: '#28BFE7', // 背景色
	overlay_opacity:0.8, // 透過具合
	before_open:function(){// モーダルが開く前に行う動作
		$('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
	},
	after_close:function(){// モーダルが閉じた後に行う動作
		$('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
	}
});
