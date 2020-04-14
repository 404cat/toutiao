<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $view == 'hot'}-->

	<!--{template common/header}-->
	<!--{if $_G['setting']['domain']['app']['mobile']}-->
		{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
	<!--{else}-->
		{eval $nav = "forum.php";}
	<!--{/if}-->
	<a class="bz-guide-daohang bzleft"><i class="banzhuan_font icon-daohang"></i></a>
	<a href="search.php?mod=forum&mobile=2" class="bz-guide-search"><i class="banzhuan_font icon-search"></i></a>
	<!--{subtemplate forum/guide_list_hot}-->
	<div class="bzfoot_xm bz-bg-fff bzbt1">
		<ul class="bzfoot_flex">
			<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_s"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
			<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_a"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
			<!--{if $_G[uid] || $_G['group']['allowpost']}-->
			<li class="flex post"><a href="forum.php?mod=misc&action=nav" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
			<li class="flex"><a href="home.php?mod=space&do=pm" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
			<!--{else}-->
			<li class="flex post"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
			<li class="flex"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
			<!--{/if}-->
			<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_a"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
		</ul>
	</div>
	<!--{template common/footer}-->

<!--{else}-->

	<!--{if $_G['inajax'] == 1}-->
		<!--{loop $data $key $list}-->
			<!--{if $list['threadcount']}-->
				<!--{subtemplate forum/guide_list_row}-->
			<!--{/if}-->
		<!--{/loop}-->
	<!--{else}-->
		<!--{template common/header}-->
		<!--{subtemplate forum/guide_list}-->
		<!--{template common/footer}-->
	<!--{/if}-->

<!--{/if}-->


