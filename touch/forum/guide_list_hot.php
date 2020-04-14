<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{eval $slide_bid = DB::result(DB::query("SELECT a.bid FROM ".DB::table('common_block')." a LEFT JOIN ".DB::table('common_template_block')." b ON a.bid=b.bid WHERE (a.name = 'banzhuanxmbbsslide') AND b.targettplname = 'forum/discuz' ORDER BY a.bid DESC"));}-->
<!--{if !$slide_bid}-->
<!--{eval $slide_bid = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE (name = 'banzhuanxmbbsslide') ORDER BY bid DESC"));}-->
<!--{/if}-->
<!--{if $slide_bid}-->
<!--{eval $slide = DB::fetch_all("SELECT * FROM ".DB::table('common_block_item')." WHERE bid = '$slide_bid' ORDER BY `displayorder` ASC LIMIT 10");}-->
<!--{if $slide}-->
<div class="cl">
<div class="bztione swiper-container">
	<div class="swiper-wrapper">
		<!--{loop $slide $sl}-->
		<div class="swiper-slide">
			<!--{if $sl[picflag] == 1}-->
			<a href="{$sl[url]}" title="{$sl[title]}"><img src="{$_G['setting']['attachurl']}{if $sl[makethumb] == 1}{$sl[thumbpath]}{else}{$sl[pic]}{/if}" /></a>
			<!--{elseif $sl[picflag] == 2}-->
			<a href="{$sl[url]}" title="{$sl[title]}"><img src="{$_G['setting']['ftp']['attachurl']}{if $sl[makethumb] == 1}{$sl[thumbpath]}{else}{$sl[pic]}{/if}" /></a>
			<!--{else}-->
			<a href="{$sl[url]}" title="{$sl[title]}"><img src="{$sl[pic]}" /></a>
			<!--{/if}-->
		</div>
		<!--{/loop}-->
	</div>
	<div class="swiper-pagination"></div>
</div>
</div>
<!--{/if}-->
<!--{/if}-->

<!--{eval $bzdiybtn_bid = DB::result(DB::query("SELECT a.bid FROM ".DB::table('common_block')." a LEFT JOIN ".DB::table('common_template_block')." b ON a.bid=b.bid WHERE (a.name = 'banzhuanxmbbsbtn') AND b.targettplname = 'forum/discuz' ORDER BY a.bid DESC"));}-->
<!--{if !$bzdiybtn_bid}-->
<!--{eval $bzdiybtn_bid = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE (name = 'banzhuanxmbbsbtn') ORDER BY bid DESC"));}-->
<!--{/if}-->
<!--{if $bzdiybtn_bid}-->
<!--{eval $bzdiybtn = DB::fetch_all("SELECT * FROM ".DB::table('common_block_item')." WHERE bid = '$bzdiybtn_bid' ORDER BY `displayorder` ASC LIMIT 10");}-->
<!--{if $bzdiybtn}-->
<div class="bzt-itwo">
	<div class="entry">
		<ul>
		<!--{loop $bzdiybtn $bzbtn}-->
		<li>
			<!--{if $bzbtn[picflag] == 1}-->
			<a href="{$bzbtn[url]}" title="{$bzbtn[title]}">
				<img src="{$_G['setting']['attachurl']}{if $bzbtn[makethumb] == 1}{$bzbtn[thumbpath]}{else}{$bzbtn[pic]}{/if}" />
				<div class="name">{$bzbtn[title]}</div>
			</a>
			<!--{elseif $bzbtn[picflag] == 2}-->
			<a href="{$bzbtn[url]}" title="{$bzbtn[title]}">
				<img src="{$_G['setting']['ftp']['attachurl']}{if $bzbtn[makethumb] == 1}{$bzbtn[thumbpath]}{else}{$bzbtn[pic]}{/if}" />
				<div class="name">{$bzbtn[title]}</div>
			</a>
			<!--{else}-->
			<a href="{$bzbtn[url]}" title="{$bzbtn[title]}">
				<img src="{$bzbtn[pic]}" /><div class="name">{$bzbtn[title]}</div>
			</a>
			<!--{/if}-->
		</li>
		<!--{/loop}-->
		</ul>
	</div>
</div>
<!--{/if}-->
<!--{/if}-->

<!--{eval $bztt_bid = DB::result(DB::query("SELECT a.bid FROM ".DB::table('common_block')." a LEFT JOIN ".DB::table('common_template_block')." b ON a.bid=b.bid WHERE (a.name = 'banzhuanxmbbstt') AND b.targettplname = 'forum/discuz' ORDER BY a.bid DESC"));}-->
<!--{if !$bztt_bid}-->
	<!--{eval $bztt_bid = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE (name = 'banzhuanxmbbstt') ORDER BY bid DESC"));}-->
<!--{/if}-->
<!--{if $bztt_bid}-->
	<!--{eval $bztt = DB::fetch_all("SELECT * FROM ".DB::table('common_block_item')." WHERE bid = '$bztt_bid' ORDER BY `displayorder` ASC LIMIT 10");}-->
	<!--{if $bztt}-->
	<div class="bzttbg cl bz-bg-fff">
	<div class="bztt swiper-container">
		<ul class="swiper-wrapper">
			<!--{loop $bztt $bztt1}-->
			<li class="swiper-slide">
				<a href="{$bztt1[url]}" title="{$bztt1[title]}"><i class="banzhuan_font icon-jinritoutiao rtt fz20"></i>&nbsp;<!--{echo cutstr($bztt1[title],40,'')}--></a>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	</div>
	<!--{/if}-->
<!--{/if}-->

<!--{eval $bz_guide_more_bid = DB::result(DB::query("SELECT bid FROM ".DB::table('common_block')." WHERE name = 'banzhuanxmbbsmore' ORDER BY bid DESC"));}-->
<!--{if $bz_guide_more_bid}-->
<div class="clear"></div>
<div class="bz_guide">
<!--{eval $bz_guide_more = DB::fetch_all("SELECT * FROM ".DB::table('common_block_item')." WHERE bid = '$bz_guide_more_bid' ORDER BY `displayorder` ASC LIMIT 999");}-->
<!--{if $bz_guide_more}-->
	<ul class="bz_guide_more_none">
		<!--{loop $bz_guide_more $bz_guide_more1}-->
		<li class="bz_guide_more_li cl">
			<!--{eval $lm_fields = unserialize($bz_guide_more1[fields]);}-->
			<!--{eval $lm_summary = strip_tags("$bz_guide_more1[summary]");}-->
			<div class="bz-card b_p15">
				<div class="bz-card-title">
					<!--{if $bz_guide_more1[pic] == 'static/image/common/nophoto.gif'}-->
					<!--{else}-->
					<div class="bz-card-title-pic">
						<!--{if $bz_guide_more1[picflag] == 1}-->
						<a href="{$bz_guide_more1[url]}&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="{$bz_guide_more1[title]}"><img src="{$_G['setting']['attachurl']}{if $bz_guide_more1[makethumb] == 1}{$bz_guide_more1[thumbpath]}{else}{$bz_guide_more1[pic]}{/if}" /></a>
						<!--{elseif $bz_guide_more1[picflag] == 2}-->
						<a href="{$bz_guide_more1[url]}&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="{$bz_guide_more1[title]}"><img src="{$_G['setting']['ftp']['attachurl']}{if $bz_guide_more1[makethumb] == 1}{$bz_guide_more1[thumbpath]}{else}{$bz_guide_more1[pic]}{/if}" /></a>
						<!--{else}-->
						<a href="{$bz_guide_more1[url]}&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="{$bz_guide_more1[title]}"><img src="{$bz_guide_more1[pic]}" /></a>
						<!--{/if}-->
					</div>
					<!--{/if}-->
					<div class="bz-card-title-info">
					    	<a href="{$bz_guide_more1[url]}&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" class="fz18">{$bz_guide_more1[title]}</a>
					    	<p class="grey fz14">{$lm_summary}</p>
					</div>
				</div>
				<div class="bz-card-info banzhuan-clear">
					<div class="bz-card-info-name z">
						<!--{if $lm_fields[authorid]}-->
						<a href="home.php?mod=space&uid={$lm_fields[authorid]}&do=profile" class="fz12 grey">{$lm_fields[author]}</a>
						<!--{elseif $lm_fields[authorid] == "0"}-->
						<a class="fz12 grey">{$lm_fields[author]}</a>
					    <!--{else}-->
						<a href="home.php?mod=space&uid={$lm_fields[uid]}&do=profile" class="fz12 grey">{$lm_fields[username]}</a>
					    <!--{/if}-->
					</div>
					<div class="bz-card-info-view y grey">
						<span class="views"><i class="banzhuan_font icon-browse_fill fz12 color-ccc"></i> {$lm_fields[views]}</span>
						<span class="replies"><i class="banzhuan_font icon-message_fill fz12 color-ccc"></i> {$lm_fields[replies]}</span>
					</div>
				</div>
			</div>
		</li>
		<!--{/loop}-->
	</ul>
	<ul class="bz_guide_more_ul"></ul>
	<div class="bz_guide_more_btn"><a class="aload grey"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif" />&#21152;&#36733;&#20013;...</a></div>
	<script type="text/javascript">
		var _content = [];
		var loadding = {
			_default:5,
			_loading:3,
			init:function(){
				var lis = jQuery(".bz_guide_more_li");
				jQuery(".bz_guide_more_ul").html("");
				for(var n=0;n<loadding._default;n++){
					lis.eq(n).appendTo(".bz_guide_more_ul");
				}
				for(var i=loadding._default;i<lis.length;i++){
					_content.push(lis.eq(i));
				}
			}
		}
		loadding.init();
		function list_ajax() {
			for(var i =0;i<loadding._loading;i++) {
				var target = _content.shift();
				if(!target) {
					jQuery(".bz_guide_more_btn").html('<a href="forum.php?forumlist=1" class="amore">&#21040;&#24213;&#20102;, {lang show}{lang more}<em class="banzhuan_font icon-gengduo fz12"></em></a>');
					break;
				}
				jQuery(".bz_guide_more_ul").append(target);
			}
		}
		if(jQuery(document).height() <= jQuery(window).height()) {
			list_ajax();
		}
		jQuery(window).scroll(function() {
			if(jQuery(document).height() <= jQuery(window).height() + jQuery(window).scrollTop() + 100) {
				list_ajax();
			}
		});
	</script>
<!--{/if}-->
</div>
<!--{/if}-->

