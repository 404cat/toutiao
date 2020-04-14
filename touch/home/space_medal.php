<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{if $_GET[action] == 'log'}-->{lang my_medals}<!--{else}-->{lang medals_center}<!--{/if}--></h2>
	<div class="bz-header-right">
		<!--{if $_GET[action] == 'log'}-->
		<a href="home.php?mod=medal"><em>{lang medals_center}</em></a>
		<!--{else}-->
		<!--{if $_G[uid]}-->
		<a href="home.php?mod=medal&action=log"><em>{lang my_medals}</em></a>
		<!--{else}-->
		<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');"><em>{lang my_medals}</em></a>
		<!--{/if}-->
		<!--{/if}-->
	</div>
</div>
<div class="b_p15 bz-bg-fff">
<!--{if empty($_GET[action])}-->
	<div class="medals_action">
	<!--{if $medallist}-->
		<!--{if $_G[uid]}-->
			<!--{if $medalcredits}-->
			<div class="bz_space_medals_credits">
				{lang you_have_now}
				<!--{eval $i = 0;}-->
				<!--{loop $medalcredits $id}-->
					<!--{if $i != 0}-->, <!--{/if}-->{$_G['setting']['extcredits'][$id][img]} <span class="rq"><!--{echo getuserprofile('extcredits'.$id);}--></span>{$_G['setting']['extcredits'][$id][title]}{$_G['setting']['extcredits'][$id][unit]}
					<!--{eval $i++;}-->
				<!--{/loop}-->
			</div>
			<!--{/if}-->
		<!--{else}-->
		<div class="bz_space_medals_credits"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="grey">&#39532;&#19978;{lang login}&#33719;&#21462;&#23646;&#20110;&#33258;&#24049;&#30340;{lang medals}&#21543;! ^_^</a></div>
		<!--{/if}-->
		<ul class="cl bz_medals_aclist">
			<!--{loop $medallist $key $medal}-->
				<li>
					<div id="medal_$medal[medalid]" class="medals_img">
						<a href="javascript:popup.open('$medal[description]', 'alert');">
							<img src="{STATICURL}image/common/$medal[image]" alt="$medal[name]" />
						</a>
					</div>
					<p class="fz14 grey bz_medals_aclist_name">$medal[name]</p>
					<p class="bz_medals_aclist_btn">
						<!--{if in_array($medal[medalid], $membermedal)}-->
							<span class="fz12 grey">{lang space_medal_have}</span>
						<!--{else}-->
							<!--{if $medal[type] && $_G['uid']}-->
								<!--{if in_array($medal[medalid], $mymedals)}-->
									<!--{if $medal['price']}-->
										<span class="fz12 grey">{lang space_medal_purchased}</span>
									<!--{else}-->
										<!--{if !$medal[permission]}-->
											<span class="fz12 grey">{lang space_medal_applied}</span>
										<!--{else}-->
											<span class="fz12 grey">{lang space_medal_receive}</span>
										<!--{/if}-->
									<!--{/if}-->
								<!--{else}-->
									<!--{if $medal['price']}-->
									<a href="home.php?mod=medal&action=confirm&medalid=$medal[medalid]" class="dialog">{lang space_medal_buy}</a>
									<!--{else}-->
									<a href="home.php?mod=medal&action=confirm&medalid=$medal[medalid]" class="dialog">
										<!--{if !$medal[permission]}-->
											{lang medals_apply}
										<!--{else}-->
											{lang medals_draw}
										<!--{/if}-->
									</a>
									<!--{/if}-->
								<!--{/if}-->
							<!--{else}-->
							<!--{if $_G[uid]}--><span class="fz12 grey">{lang medals_type_0}</span><!--{/if}-->
							<!--{/if}-->
						<!--{/if}-->
						
					</p>
				</li>
			<!--{/loop}-->
		</ul>
	<!--{else}-->
		<!--{if $medallogs}-->
			<div class="b_p hm grey">{lang medals_nonexistence}</div>
		<!--{else}-->
			<div class="b_p hm grey">{lang medals_noavailable}</div>
		<!--{/if}-->
	<!--{/if}-->
	<!--{if $lastmedals}-->
		<div class="bz_menotes_title bzbt1"><h1>{lang medals_record}</h1></div>
		<div class="bz_menotes_list cl">
			<ul>
			<!--{loop $lastmedals $lastmedal}-->
			<li>
				<a href="home.php?mod=space&uid=$lastmedal[uid]&do=profile" class="avt"><!--{avatar($lastmedal[uid],middle)}--></a>
				<div class="list_body">
					<a href="home.php?mod=space&uid=$lastmedal[uid]&do=profile">
						<span>$lastmedalusers[$lastmedal[uid]][username]</span>
						<p>
							<span class="grey fz12">{lang medals_message2} $medallist[$lastmedal['medalid']]['name'] {lang medals}</span>
							<span class="y grey fz12">$lastmedal[dateline]</span>
						</p>
					</a>
				</div>
			</li>
			<!--{/loop}-->
			</ul>
		</div>
	<!--{/if}-->
	</div>
<!--{elseif $_GET[action] == 'log'}-->
	<div class="medals_log">
	<!--{if $mymedals}-->
		<ul class="cl bz_medals_loglist">
			<!--{loop $mymedals $mymedal}-->
			<li>
				<div class="medals_img"><img src="{STATICURL}image/common/$mymedal[image]" alt="$mymedal[name]" /></div>
				<p class="fz14 grey bz_medals_loglist_name">$mymedal[name]</p>
				<p class="bz_medals_loglist_btn"></p>
			</li>
			<!--{/loop}-->
		</ul>
	<!--{/if}-->
	<!--{if $medallogs}-->
		<div class="bz_menotes_title bzbt1"><h1>{lang medals_record}</h1></div>
		<div class="bz_menotes_list cl">
			<ul>
				<!--{loop $medallogs $medallog}-->
				<li>
					<div class="list_body">
						<a>
							<p>
								<span class="grey fz12">
									<!--{if $medallog['type'] == 2 || $medallog['type'] == 3}-->
										{lang medals_message3} $medallog[dateline] {lang medals_message4} <strong>$medallog[name]</strong> {lang medals} , <!--{if $medallog['type'] == 2}-->{lang medals_operation_2}<!--{elseif $medallog['type'] == 3}-->{lang medals_operation_3}<!--{/if}-->
									<!--{elseif $medallog['type'] != 2 && $medallog['type'] != 3}-->
										{lang medals_message3} $medallog[dateline] {lang medals_message5} <strong>$medallog[name]</strong> {lang medals} , <!--{if $medallog[expiration]}-->{lang expire}: $medallog[expiration]<!--{else}-->{lang medals_noexpire}<!--{/if}-->
									<!--{/if}-->
								</span>
							</p>
						</a>
					</div>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{if $multipage}--><div class="pgs cl mtm">$multipage</div><!--{/if}-->
	<!--{else}-->
		<div class="b_p hm grey">{lang medals_nonexistence_own}</div>
	<!--{/if}-->
	</div>
<!--{/if}-->
</div>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->