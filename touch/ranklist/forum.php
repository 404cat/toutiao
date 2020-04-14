<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang ranklist_forum}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="bz-ranklist-nav">
	<ul class="flex_box">
		<li class="flex">
			<!--{if $_GET['view'] == 'threads'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=forum&view=threads" <!--{if $_GET['view'] == 'threads'}-->class="rtt"<!--{/if}-->>{lang ranklist_post}</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'posts'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=forum&view=posts" <!--{if $_GET['view'] == 'posts'}-->class="rtt"<!--{/if}-->>{lang ranklist_reply}</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'today'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=forum&view=today" <!--{if $_GET['view'] == 'today'}-->class="rtt"<!--{/if}-->>24&#23567;&#26102;&#25490;&#34892;</a>
		</li>
	</ul>
</div>

<div class="cl b_p">

<!--{if $forumsrank}-->
<div class="bz_member_ist">
	<ul>
	<!--{loop $forumsrank $forum}-->
	<li>
		<a href="forum.php?mod=forumdisplay&fid=$forum['fid']">
			<span class="ranknum grey"><!--{if $forum['rank'] <= 3}-->$forum['rank']<!--{else}-->$forum['rank']<!--{/if}--></span>
			<img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/forum-icon.jpg" alt="$forum['name']" />
			<span class="name">$forum['name']</span>
			<span class="y fz12 grey">
			<!--{if $_GET[view] == 'posts'}-->$forum['posts']{lang reply}<!--{else}-->$forum['posts']{lang ranklist_forum_post}<!--{/if}-->
			</span>
		</a>
	</li>
	<!--{/loop}-->
	</ul>
	<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
</div>
<!--{else}-->
<div class="mbm hm grey fz12 emp">{lang none_data}</div>
<!--{/if}-->
<div class="notice hm grey fz12 b_p mtw">{lang ranklist_update}</div>
			
</div>

<!--{template common/footer}-->