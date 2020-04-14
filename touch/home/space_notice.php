<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{if $do == 'notice' && $view == 'mypost'}-->
	<!--{subtemplate home/space_notice_mypost}-->
<!--{elseif $do == 'notice' && $view == 'interactive'}-->
	<!--{subtemplate home/space_notice_interactive}-->
<!--{elseif $do == 'notice' && $view == 'system'}-->
	<!--{subtemplate home/space_notice_system}-->
<!--{elseif $do == 'notice' && $view == 'app'}-->
	<!--{subtemplate home/space_notice_app}-->
<!--{elseif $do == 'notice' && $view == 'manage'}-->
	<!--{subtemplate home/space_notice_manage}-->
<!--{else}-->
<div class="b_p15 bz-bg-fff">
	<div class="bz_notice_list cl">
		<ul>
			<li class="no-pm"><a href="home.php?mod=space&do=pm"><span class="banzhuan_font icon-pm bgicon-pm"></span>{lang myitem}{lang news}<i class="banzhuan_font icon-gengduo y fz14"></i><!--{if $_G[member][newpm] || $newpmcount}--><em class="banzhuan_font icon-dian y rq"></em><!--{/if}--></a></li>
			<li class="no-follower"><a href="home.php?mod=follow&do=follower&uid=$_G[uid]"><span class="banzhuan_font icon-follower bgicon-follower"></span>{lang myitem}&#31881;&#19997;<i class="banzhuan_font icon-gengduo y fz14"></i></a></li>
			<!--{loop $_G['notice_structure'] $key $type}-->
			<li class="no-$key"><a href="home.php?mod=space&do=notice&view=$key"><span class="banzhuan_font icon-$key bgicon-$key"></span><!--{eval echo lang('template', 'notice_'.$key)}--><i class="banzhuan_font icon-gengduo y fz14"></i><!--{if $_G['member']['category_num'][$key]}--><em class="rq y fz14">$_G['member']['category_num'][$key]</em><!--{/if}--></a></li>
			<!--{/loop}-->
		</ul>
	</div>
</div>
<div class="bzfoot_xm bz-bg-fff bzbt1">
<ul class="bzfoot_flex">
<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_a"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_a"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
<!--{if $_G[uid]}-->
<li class="flex post"><a href="forum.php?mod=misc&action=nav" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
<!--{else}-->
<li class="flex post"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
<!--{/if}-->
<li class="flex"><a href="home.php?mod=space&do=notice&view=userapp" class="bzfc_s"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_a"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
</ul>
</div>
<div class="bz_bottom"></div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
	
