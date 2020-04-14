<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><!--{if $viewself}--><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a><!--{else}--><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a><!--{/if}--></div>
	<h2><!--{if $space[self]}-->{lang my_friends}<!--{else}-->{lang count_member}<!--{/if}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<div class="bz-fe-appl bz-bg-fff">
	<a href="home.php?mod=space&do=friend" {$a_actives[me]}>{lang my_friends}</a>
	<a href="home.php?mod=space&do=friend&view=online&type=near" {$a_actives[onlinenear]}>&#38468;&#36817;&#30340;&#20154;</a>
	<!--{if empty($_G['setting']['sessionclose'])}-->
	<a href="home.php?mod=space&do=friend&view=online&type=member" {$a_actives[onlinemember]}>{lang online_member}</a>
	<!--{/if}-->
    <a href="home.php?mod=space&do=friend&view=blacklist" {$a_actives[blacklist]}>&#40657;&#21517;&#21333;</a>
	<a href="home.php?mod=spacecp&ac=friend&op=request">{lang friend_request}</a>
</div>

<!--{if $_GET['view']=='blacklist'}-->
<div class="b_p15 bz-bg-fff">
<p class="grey mbm">{lang add_blacklist}</p>
<div class="cl">
	<form method="post" autocomplete="off" name="blackform" action="home.php?mod=spacecp&ac=friend&op=blacklist&start=$_GET[start]">
		<input type="text" name="username" value="" size="15" placeholder="{lang username}" class="bz-input" />
		<div class="btn-big mtm">
			<button type="submit" name="blacklistsubmit_btn" id="moodsubmit_btn" value="true" class="touch"><em>{lang add}</em></button>
		</div>
		<input type="hidden" name="blacklistsubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
	</form>
</div>
</div>
<!--{/if}-->

<div class="b_p15 bz-bg-fff bzbt1 bzbb1">
<!--{if $list}-->
	<div class="clear bz-fe-list">
		<ul>
			<!--{loop $list $key $value}-->
			<li id="friend_{$value[uid]}_li">
				<!--{if $value[username] == ''}-->
				<div class="avatar"><img src="{STATICURL}image/magic/hidden.gif" alt="{lang anonymity}" /></div>
				<h4>{lang anonymity}</h4>
				<!--{else}-->
				<div class="z avatar"><a href="home.php?mod=space&uid=$value[uid]&do=profile" c="1"><!--{avatar($value[uid],middle)}--></a></div>
				<div class="y ntbody">
					<a href="home.php?mod=space&uid=$value[uid]&do=profile" class="fz16" {eval g_color($value[groupid]);}>$value[username]</a>
					<!--{eval g_icon($value[groupid]);}-->
					<!--{if $value['videostatus']}-->
					<img src="{IMGDIR}/videophoto.gif" alt="videophoto" class="vm" />
					<!--{/if}-->
					<span class="y grey">
					<!--{if $_GET['view'] == 'blacklist'}-->
						<a href="home.php?mod=spacecp&ac=friend&op=blacklist&subop=delete&uid=$value[uid]&start=$_GET[start]" class="blue fz12">{lang delete_blacklist}</a>
					<!--{elseif $_GET['view'] == 'visitor' || $_GET['view'] == 'trace'}-->
						<!--{date($value[dateline], 'n{lang month}j{lang day}')}-->
					<!--{elseif $_GET['view'] == 'online'}-->
						<!--{date($ols[$value[uid]], 'H:i')}-->
					<!--{else}-->
						<a href="home.php?mod=spacecp&ac=friend&op=changenum&uid=$value[uid]&handlekey=hotuserhk_{$value[uid]}" class="dialog fz12"><i class="banzhuan_font icon-like_fill rq fz12"></i><i id="spannum_$value[uid]">$value[num]</i></a>
					<!--{/if}-->
					</span>
				</div>
				<!--{/if}-->	
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
<!--{else}-->
	<div class="clear"></div>
    <div class="grey hm">{lang no_friend_list}</div>
<!--{/if}-->
</div>

<!--{template common/footer}-->