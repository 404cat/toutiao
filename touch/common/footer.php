<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{hook/global_footer_mobile}-->
<!--{eval $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''}-->
<!--{if strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';}-->
<!--{elseif strpos($useragent, 'android') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';}-->
<!--{elseif strpos($useragent, 'windows phone') !== false}-->
<!--{eval $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';}-->
<!--{/if}-->
<div id="mask" style="display:none;"></div>
<!--{template common/bzlnav}-->
<!--{if !$nofooter}-->
<div class="clear"></div>
<div class="footer">
	<p>&copy; $_G['setting']['sitename']</p>
</div>
<div class="bz_bottom"></div>
<!--{/if}-->
<!--{if $slide}-->
<script>
var bzSwiper = new Swiper ('.bztione', {
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    },
})
</script>
<!--{/if}-->
<!--{if $bztt}-->
<script>
var bzSwiper = new Swiper ('.bztt', {
	direction: 'vertical',
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
})        
</script>
<!--{/if}-->
<!--{if CURSCRIPT == 'forum' && CURMODULE == 'guide'}-->
<!--{eval $lastpost_date = DB::result(DB::query("SELECT lastpost FROM ".DB::table('forum_thread')." ORDER BY lastpost DESC"));}-->
<!--{eval $new_article_date = DB::result(DB::query("SELECT dateline FROM ".DB::table('portal_article_content')." ORDER BY dateline DESC"));}-->
<div style="display:none;">
<!--{if $slide_bid}-->
	<!--{eval $slide_bid_date = DB::result(DB::query("SELECT dateline FROM ".DB::table('common_block')." WHERE bid = '$slide_bid'"));}-->
	<!--{if ($lastpost_date > $slide_bid_date) || ($new_article_date > $slide_bid_date)}-->
	<script type="text/javascript" src="api.php?mod=js&bid={$slide_bid}"></script>
	<!--{/if}-->
<!--{/if}-->
</div>
<div style="display:none;">
<!--{if $bztt_bid}-->
	<!--{eval $bztt_bid_date = DB::result(DB::query("SELECT dateline FROM ".DB::table('common_block')." WHERE bid = '$bztt_bid'"));}-->
	<!--{if ($lastpost_date > $bztt_bid_date) || ($new_article_date > $bztt_bid_date)}-->
	<script type="text/javascript" src="api.php?mod=js&bid={$bztt_bid}"></script>
	<!--{/if}-->
<!--{/if}-->
</div>
<div style="display:none;">
<!--{if $bz_guide_more_bid}-->
	<!--{eval $bz_guide_more_bid_date = DB::result(DB::query("SELECT dateline FROM ".DB::table('common_block')." WHERE bid = '$bz_guide_more_bid'"));}-->
	<!--{if ($lastpost_date > $bz_guide_more_bid_date) || ($new_article_date > $bz_guide_more_bid_date)}-->
	<script type="text/javascript" src="api.php?mod=js&bid={$bz_guide_more_bid}"></script>
	<!--{/if}-->
<!--{/if}-->
</div>
<!--{/if}-->
</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->
