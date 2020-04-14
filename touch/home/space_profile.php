<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->

<!--{if !$_GET['mycenter']}-->

	<div class="porfile_card">
		<div class="porfile_card_cover" style="background-image: url(<!--{avatar($space[uid], big, true)}-->);background-size: cover;">
			<div class="card_cover">
				<div class="card_cover_header cl">
					<div class="left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
					<h2><!--{if $space[self]}-->{lang myitem}&#31354;&#38388;<!--{else}-->Ta&#30340;&#31354;&#38388;<!--{/if}--></h2>
					<div class="right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
				</div>
			</div>
			<div class="card_cover_wrapper white">
				<div class="b_p15">
				<!--{if $_G[uid]}-->
					<!--{if $space[self]}-->
					<!--{else}-->
						<!--{if helper_access::check_module('follow')}-->
						<div class="card_follow cl">
							<!--{eval $follow = 0;}-->
							<!--{eval $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);}-->
							<!--{if !$follow}-->
							<a href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$space[uid]" class="dialog fz12 follow white">&#20851;&#27880;Ta</a>
							<!--{else}-->
							<a href="home.php?mod=spacecp&ac=follow&op=del&fuid=$space[uid]" class="dialog fz12 follow white">&#24050;&#20851;&#27880;</a>
							<!--{/if}-->
						</div>
						<!--{/if}-->
					<!--{/if}-->
				<!--{else}-->
					<!--{if helper_access::check_module('follow')}-->
					<div class="card_follow cl">
						<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="dialog fz12 follow white">&#20851;&#27880;Ta</a>
					</div>
					<!--{/if}-->
				<!--{/if}-->
				<div class="main_avt"><img src="<!--{avatar($space[uid], middle, true)}-->" /></div>
				<h2 class="fts">$space[username]</h2>
				<p><span class="lv">Lv.{$_G['cache']['usergroups'][$space[groupid]][stars]}</span><span class="fts">{$space[group][grouptitle]}&nbsp;&nbsp;</span><!--{if $space[gender]}-->{if $space[gender] == 1}<i class="fts rmale fz12 banzhuan_font icon-nan"></i>{elseif $space[gender] == 2}<i class="fts rfemale fz12 banzhuan_font icon-nv"></i>{/if}<!--{/if}--></p>
				</div>
			</div>
		</div>
		<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
	</div>
	
	<div class="porfile_card_nav bz-bg-fff bzbb1">
		<ul class="flex_box">
			<li class="flex">
				<!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}--><em class="bg_xm"></em><!--{/if}-->
				<!--{if $_G[uid]}-->
				<a href="{if CURMODULE != 'follow'}home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space{else}home.php?mod=space&uid=$space[uid]&view=thread{/if}" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}-->class="rtt"<!--{/if}-->><!--{if $space[self]}-->{lang my}&#20027;&#39064;<!--{else}-->Ta&#30340;&#20027;&#39064;<!--{/if}--></a>
				<!--{else}-->
				<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}-->class="rtt"<!--{/if}-->>Ta&#30340;&#20027;&#39064;</a>
				<!--{/if}-->
			</li>
			<li class="flex">
				<!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'profile'}--><em class="bg_xm"></em><!--{/if}-->
				<a href="home.php?mod=space&uid=$space[uid]&do=profile" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'profile'}-->class="rtt"<!--{/if}-->><!--{if $space[self]}-->{lang my}&#36164;&#26009;<!--{else}-->Ta&#30340;&#36164;&#26009;<!--{/if}--></a>
			</li>
		</ul>
	</div>

	<!--{if $space[group][maxsigsize] && $space[sightml]}-->
	<div class="mtm b_p bzbt1 bzbb1 fz14 bz-bg-fff">$space[sightml]</div>
	<!--{/if}-->
	
	<div class="mtm cl">
		<div class="bz_credits bz-bg-fff bzbt1 bzbb1">
			<ul class="cl">
				<li>
					<div><span>$space[credits]</span></div>
					<div><em class="grey fz12">{lang credits}</em></div>
				</li>
				<!--{loop $_G[setting][extcredits] $key $value}-->
				<!--{if $value[title]}-->
				<li>
					<div><span>{$space["extcredits$key"]} $value[unit]</span></div>
					<div><em class="grey fz12">$value[title]</em></div>
				</li>
				<!--{/if}-->
				<!--{/loop}-->
			</ul>
		</div>
	</div>

	<!--{if $space['medals']}-->
	<div class="mtm cl">
		<div class="bz_medals bz-bg-fff bzbt1 bzbb1">
			<div class="b_p bzbb1 fz14">
			<!--{if $space[self]}-->
			<strong>{lang myitem}{lang medals}</strong><a href="home.php?mod=medal" class="fz12 y grey">{lang medals_center}</a>
			<!--{else}-->
			<strong>Ta&#30340;{lang medals}</strong><a href="home.php?mod=medal" class="fz12 y grey">{lang medals_center}</a>
			<!--{/if}-->
			</div>
			<div class="b_p">
			<!--{loop $space['medals'] $medal}-->
				<img src="{STATICURL}/image/common/$medal[image]" alt="$medal[name]" id="md_{$medal[medalid]}" />
			<!--{/loop}-->
			</div>
		</div>
	</div>
	<!--{/if}-->
	
	<div class="mtm cl">
		<div class="bz_per_info bz-bg-fff bzbt1 bzbb1">
			<ul class="cl b_ptb10">
				<li><em>&#29992;&#25143;ID</em><span class="grey">$space[uid]</span></li>
				<!--{if $space[adminid]}-->
				<li><em>{lang management_team}</em><span class="grey">{$space[admingroup][grouptitle]}</span></li>
				<!--{/if}-->
				<li><em>{lang usergroup}</em><span class="grey">{$space[group][grouptitle]}</span></li>
				<!--{if $space[extgroupids]}-->
				<li><em>{lang group_expiry_type_ext}</em><span class="grey">$space[extgroupids]</span></li>
				<!--{/if}-->
				<li><em>{lang regdate}</em><span class="grey">$space[regdate]</span></li>
				<!--{if $space[lastsendmail]}-->
				<li><em>{lang last_send_email}</em><span class="grey">$space[lastsendmail]</span></li>
				<!--{/if}-->
				<!--{if in_array($_G[adminid], array(1, 2))}-->
				<li><em>Email</em><span class="grey">$space[email]</span></li>
				<!--{/if}-->
				<!--{if $space[customstatus]}-->
				<li><em>{lang permission_basic_status}</em><span class="grey">$space[customstatus]</span></li>
				<!--{/if}-->
				<!--{if $_G[uid]}-->
					<!--{if $_G['setting']['allowviewuserthread'] !== false}-->
					<!--{eval $space['posts'] = $space['posts'] - $space['threads'];}-->
					<li><em>{lang threads_num}</em><span class="grey"><a href="{if CURMODULE != 'follow'}home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space{else}home.php?mod=space&uid=$space[uid]&view=thread{/if}" class="blue">$space[threads]</a></span></li>
					<li><em>{lang replay_num}</em><span class="grey"><a href="{if CURMODULE != 'follow'}home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=reply&from=space{else}home.php?mod=space&uid=$space[uid]&view=thread&type=reply{/if}" class="blue">$space[posts]</a></span></li>
					<!--{/if}-->
				<!--{else}-->
					<!--{if $_G['setting']['allowviewuserthread'] !== false}-->
					<!--{eval $space['posts'] = $space['posts'] - $space['threads'];}-->
					<li><em>{lang threads_num}</em><span class="grey"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="blue">$space[threads]</a></span></li>
					<li><em>{lang replay_num}</em><span class="grey"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="blue">$space[posts]</a></span></li>
					<!--{/if}-->
				<!--{/if}-->
				<!--{if $profiles}-->
				<!--{loop $profiles $value}-->
				<li><em>$value[title]</em><span class="grey">$value[value]</span></li>
				<!--{/loop}-->
				<!--{/if}-->
			</ul>
		</div>
	</div>
	
	<!--{if !$space[self]}-->
	<!--{if $_G[uid]}-->
	<div class="bz_bottom"></div>
	<div class="porfile_foot bz-bg-fff bzbt1">
		<ul class="flex_box">
			<li class="flex">
				<!--{eval require_once libfile('function/friend');$isfriend=friend_check($space[uid]);}-->
				<!--{if !$isfriend}-->
				<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$space[uid]&handlekey=addfriendhk_{$space[uid]}" class="dialog"><i class="banzhuan_font icon-like rafriend"></i><span class="grey">&#21152;&#22909;&#21451;</span></a>
				<!--{else}-->
				<a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$space[uid]&handlekey=ignorefriendhk_{$space[uid]}" class="dialog"><i class="banzhuan_font icon-like_fill rifriend"></i><span class="grey">&#21024;&#22909;&#21451;</span></a>
				<!--{/if}-->
			</li>
			<li class="flex">
				<a href="home.php?mod=spacecp&ac=poke&op=send&uid={$space[uid]}&handlekey=propokehk_{$space[uid]}" class="dialog"><i class="banzhuan_font icon-emoji rhandle"></i><span class="grey">&#25171;&#25307;&#21628;</span></a>
			</li>
			<li class="flex">
				<a href="home.php?mod=space&do=pm&subop=view&touid=$space[uid]&mobile=2"><i class="banzhuan_font icon-message rpm"></i><span class="grey">&#21457;&#31169;&#20449;</span></a>
			</li>
		</ul>
	</div>
	<!--{else}-->
	<div class="bz_bottom"></div>
	<div class="porfile_foot bz-bg-fff bzbt1">
		<ul class="flex_box">
			<li class="flex">
				<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="dialog"><i class="banzhuan_font icon-like rafriend"></i><span class="grey">&#21152;&#22909;&#21451;</span></a>
			</li>
			<li class="flex">
				<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="dialog"><i class="banzhuan_font icon-emoji rhandle"></i><span class="grey">&#25171;&#25307;&#21628;</span></a>
			</li>
			<li class="flex">
				<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');"><i class="banzhuan_font icon-message rpm"></i><span class="grey">&#21457;&#31169;&#20449;</span></a>
			</li>
		</ul>
	</div>
	<!--{/if}-->
	<!--{/if}-->

<!--{else}-->

	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->
	
	<div class="userinfo">
		<div class="user_avatar cl">
			<div class="user_header">
				<div class="left bzleft"><a class="banzhuan_font icon-daohang"></a></div>
				<div class="right"><a href="search.php?mod=forum&mobile=2" class="banzhuan_font icon-search"></a></div>
			</div>
			<div class="avatar_m"><span><img src="<!--{avatar($_G[uid], big, true)}-->" /></span></div>
			<h2 class="name fts">$_G[username]</h2>
			<p class="white fz12 fts">Lv.{$_G['cache']['usergroups'][$space[groupid]][stars]}&nbsp;&nbsp;{$_G['cache']['usergroups'][$space[groupid]][grouptitle]}<!--{if getuserprofile('gender') == 1}-->&nbsp;&nbsp;<i class="banzhuan_font icon-nan fz12"></i><!--{elseif getuserprofile('gender') == 2}-->&nbsp;&nbsp;<i class="banzhuan_font icon-nv fz12"></i><!--{/if}--></p>
			<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
		</div>
		<div class="user_avatar_info bz-bg-fff bzbb1 cl">
			<ul class="cl">
				<li>
					<div><span>$space[threads]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread" class="blue fz12"><em>&#20027;&#39064;</em></a></div>
				</li>
				<li>
					<div><span>$space[posts]</span></div>
					<div><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=reply" class="blue fz12"><em>{lang reply}</em></a></div>
				</li>
				<li>
					<div><span>$space[friends]</span></div>
					<div><a href="home.php?mod=space&uid={$_G[uid]}&do=friend&view=me&from=space" class="blue fz12"><em>{lang friends}</em></a></div>
				</li>
				<li>
					<div><span>$space['following']</span></div>
					<div><a href="home.php?mod=follow&do=following&uid={$_G[uid]}" class="blue fz12"><em>&#20851;&#27880;</em></a></div>
				</li>
				<li>
					<div><span>$space['follower']</span></div>
					<div><a href="home.php?mod=follow&do=follower&uid={$_G[uid]}" class="blue fz12"><em>&#31881;&#19997;</em></a></div>
				</li>
			</ul>
		</div>
		<div class="myinfo_list cl">
			<ul>
				<li class="mtm bzbt1"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile" class="bzbb1">{lang myitem}&#31354;&#38388;<span class="y banzhuan_font icon-gengduo"></span></a></li>
				<li><a href="home.php?mod=spacecp&mobile=2" class="bzbb1">{lang update_profile}<span class="y banzhuan_font icon-gengduo"></span><!--{if $space[profileprogress] != 100}--><em class="y fz12 grey">&#24050;&#23436;&#25104; $space[profileprogress]%&nbsp;&nbsp;</em><!--{/if}--></a></li>
				<li class="bzbb1"><a href="home.php?mod=spacecp&ac=profile&op=password">{lang password_security}<span class="y banzhuan_font icon-gengduo"></span></a></li>
				<li class="mtm bzbt1"><a href="home.php?mod=space&do=favorite&type=all" class="bzbb1">{lang myfavorite}<span class="y banzhuan_font icon-gengduo"></span></a></li>
				<li><a href="home.php?mod=medal&action=log" class="bzbb1">{lang my_medals}<span class="y banzhuan_font icon-gengduo"></span></a></li>
				<li><a href="home.php?mod=spacecp&ac=credit" class="bzbb1">{lang my_credits}<span class="y banzhuan_font icon-gengduo"></span><em class="y fz12 grey">$space[credits]&nbsp;{lang credits}&nbsp;&nbsp;</em></a></li>
				<li class="bzbb1"><a href="home.php?mod=spacecp&ac=usergroup">{lang my_usergroups}<span class="y banzhuan_font icon-gengduo"></span><em class="y fz12 grey">$_G[group][grouptitle]&nbsp;&nbsp;</em></a></li>
				<li class="mtm bzbt1 bzbb1"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout_mobile}<span class="y banzhuan_font icon-gengduo"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="bzfoot_xm bz-bg-fff bzbt1">
	<ul class="bzfoot_flex">
	<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_a"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
	<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_a"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
	<li class="flex post"><a href="forum.php?mod=misc&action=nav" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
	<li class="flex"><a href="home.php?mod=space&do=pm" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
	<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_s"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
	</ul>
	</div>
	<div class="bz_bottom"></div>
	<div class="bz_bottom"></div>
	
<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->

