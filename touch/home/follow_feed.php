<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><!--{if $viewself}--><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a><!--{else}--><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a><!--{/if}--></div>
	<h2><!--{if $viewself}--><!--{if $do=='following'}-->{lang myitem}&#20851;&#27880;<!--{else}-->{lang myitem}&#31881;&#19997;<!--{/if}--><!--{else}--><!--{if $do=='following'}-->TA&#30340;&#20851;&#27880;<!--{else}-->TA&#30340;&#31881;&#19997;<!--{/if}--><!--{/if}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<!--{if in_array($do, array('following', 'follower'))}-->

	<!--{if $list}-->

		<div class="cl">
			<!--{if $do=='following'}-->
			<div class="bzflw_ulist b_p bz-bg-fff">
				<h3 class="grey hm">&#20851;&#27880; $space['following']</h3>
				<ul>
				<!--{loop $list $fuid $fuser}-->
					<li class="cl<!--{if in_array($fuser['uid'], $newfollower_list)}--> unread<!--{/if}-->">
						<p class="follow_manage">
							<!--{if $viewself}-->
								<a id="a_followmod_{$fuser['followuid']}" href="home.php?mod=spacecp&ac=follow&op=del&fuid=$fuser['followuid']" class="flw_btn_unfo dialog"><i class="banzhuan_font icon-like_fill rq"></i><font class="grey">{lang cancel}</font></a>
							<!--{elseif $fuser[followuid] != $_G[uid]}-->
								<!--{if $fuser['mutual']}-->
									<a id="a_followmod_{$fuser['followuid']}" href="home.php?mod=spacecp&ac=follow&op=del&fuid=$fuser['followuid']" class="flw_btn_unfo dialog"><i class="banzhuan_font icon-like_fill rq"></i><font class="grey">{lang cancel}</font></a>
								<!--{elseif helper_access::check_module('follow')}-->
									<a id="a_followmod_{$fuser['followuid']}" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$fuser['followuid']" class="flw_btn_fo dialog"><i class="banzhuan_font icon-like grey"></i><font class="grey">&#20851;&#27880;</font></a>
								<!--{/if}-->
							<!--{/if}-->
							<!--{if $viewself && $fuser[followuid] != $_G[uid]}-->
								<a href="home.php?mod=spacecp&ac=follow&op=bkname&fuid=$fuser['followuid']&handlekey=followbkame_$fuser['followuid']" id="fbkname_$fuser['followuid']" class="dialog"><!--{if $fuser['bkname']}--><i class="banzhuan_font icon-post grey"></i><font class="grey">&#20462;&#25913;</font><!--{else}--><i class="banzhuan_font icon-post grey"></i><font class="grey">&#22791;&#27880;</font><!--{/if}--></a>
								<!--{if helper_access::check_module('follow')}-->
								<!--<a id="a_specialfollow_{$fuser['followuid']}" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&special={if $fuser['status'] == 1}2{else}1{/if}&fuid=$fuser['followuid']" class="dialog"><!--{if $fuser['status'] == 1}--><i class="banzhuan_font icon-like_fill rq"></i><font class="grey">{lang cancel}</font><!--{else}--><i class="banzhuan_font icon-like grey"></i><font class="grey">&#26631;&#26143;</font><!--{/if}--></a>-->
								<!--{/if}-->
							<!--{/if}-->
						</p>
						<a href="home.php?mod=space&uid=$fuser['followuid']&do=profile" title="$fuser['fusername']" id="edit_avt" class="avatar" shref="home.php?mod=space&uid=$fuser['followuid']"><!--{avatar($fuser['followuid'],middle)}--></a>
						<p class="tit"><a href="home.php?mod=space&uid=$fuser['followuid']&do=profile" title="$fuser['fusername']" c="1" shref="home.php?mod=space&uid=$fuser['followuid']">$fuser['fusername']</a><!--{if $fuser['bkname']}--><span id="followbkame_{$fuser['followuid']}" class="grey fz12">&nbsp;$fuser[bkname]</span><!--{/if}--><!--{if $fuser[followuid] != $_G[uid]}--><!--{if $fuser['mutual']}--><!--{if $fuser['mutual'] > 0}--><span class="flw_status_2 grey fz12">&nbsp;&#20114;&#30456;&#20851;&#27880;</span><!--{else}--><span class="flw_status_1 grey fz12">&nbsp;{lang did_not_follow_to_me}</span><!--{/if}--><!--{elseif helper_access::check_module('follow')}--><!--{/if}--><!--{/if}--></p>
						<p class="txt grey">
							<a><span class="rq" id="followernum_$fuser['followuid']">$memberinfo[$fuid]['follower']</span></a>&#31881;&#19997;&nbsp;
							<a><span class="rq">$memberinfo[$fuid]['following']</span></a>&#20851;&#27880;
						</p>
					</li>
				<!--{/loop}-->
				</ul>
				<!--{if !empty($multi)}--><div>$multi</div><!--{/if}-->
			</div>
			<!--{else}-->
			<div class="bzflw_ulist b_p bz-bg-fff">
				<h3 class="grey hm">&#31881;&#19997; $space['follower']</h3>
				<ul>
				<!--{loop $list $fuid $fuser}-->
					<li class="cl<!--{if in_array($fuser['uid'], $newfollower_list)}--> unread<!--{/if}-->">
						<p class="follow_manage">
							<!--{if $fuser[uid] != $_G[uid]}-->
								<!--{if $fuser['mutual']}-->
									<a id="a_followmod_{$fuser['uid']}" href="home.php?mod=spacecp&ac=follow&op=del&fuid=$fuser['uid']" class="flw_btn_unfo dialog"><i class="banzhuan_font icon-like_fill rpink"></i><font class="grey">{lang cancel}</font></a>
								<!--{elseif helper_access::check_module('follow')}-->
									<a id="a_followmod_{$fuser['uid']}" href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$fuser['uid']" class="flw_btn_fo dialog"><i class="banzhuan_font icon-like grey"></i><font class="grey">&#20851;&#27880;</font></a>
								<!--{/if}-->
							<!--{/if}-->
						</p>
						<a href="home.php?mod=space&uid=$fuser['uid']&do=profile" title="$fuser['username']" id="edit_avt" class="avatar" c="1" shref="home.php?mod=space&uid=$fuser['uid']"><!--{avatar($fuser['uid'],middle)}--></a>
						<p class="tit"><a href="home.php?mod=space&uid=$fuser['uid']&do=profile" title="$fuser['username']" c="1" shref="home.php?mod=space&uid=$fuser['uid']">$fuser['username']</a><!--{if $fuser[uid] != $_G[uid]}--><!--{if $fuser['mutual']}--><!--{if $fuser['mutual'] > 0}--><span class="flw_status_2 grey fz12">&nbsp;&#20114;&#30456;&#20851;&#27880;</span><!--{else}--><span class="flw_status_1 grey fz12">&nbsp;{lang did_not_follow_to_me}</span><!--{/if}--><!--{elseif helper_access::check_module('follow')}--><!--{/if}--><!--{/if}--></p>
						<p class="txt grey">
							<a><span class="rpink" id="followernum_$fuser['uid']">$memberinfo[$fuid]['follower']</span></a>&#31881;&#19997;&nbsp;
							<a><span class="rpink">$memberinfo[$fuid]['following']</span></a>&#20851;&#27880;
						</p>
					</li>
				<!--{/loop}-->
				</ul>
				<!--{if !empty($multi)}--><div>$multi</div><!--{/if}-->
			</div>
			<!--{/if}-->
		</div>

	<!--{else}-->

		<div id="nofollowmsg" class="grey hm b_p">
		<!--{if $viewself}-->
			<!--{if $do=='following'}-->
				&#24744;&#27809;&#26377;&#20851;&#27880;&#20219;&#20309;&#20154;&#21734;~
			<!--{else}-->
				&#27809;&#26377;&#20154;&#20851;&#27880;&#24744;&#21734;~
			<!--{/if}-->
		<!--{else}-->
			<!--{if $do=='following'}-->
				Ta&#27809;&#26377;&#20851;&#27880;&#20219;&#20309;&#20154;&#21734;~
			<!--{else}-->
				&#27809;&#26377;&#20154;&#20851;&#27880;Ta&#21734;~
			<!--{/if}-->
		<!--{/if}-->
		</div>

	<!--{/if}-->

<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
