<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang ranklist_thread}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="bz-ranklist-nav">
	<ul class="flex_box">
		<li class="flex">
			<!--{if $_GET['view'] == 'replies'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=thread&view=replies&orderby=$orderby" <!--{if $_GET['view'] == 'replies'}-->class="rtt"<!--{/if}-->>{lang ranklist_reply}</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'views'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=thread&view=views&orderby=$orderby" <!--{if $_GET['view'] == 'views'}-->class="rtt"<!--{/if}-->>{lang visit_ranklist}</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'heats'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=thread&view=heats&orderby=$orderby" <!--{if $_GET['view'] == 'heats'}-->class="rtt"<!--{/if}-->>{lang ranklist_hot}</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'favtimes'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=thread&view=favtimes&orderby=$orderby" <!--{if $_GET['view'] == 'favtimes'}-->class="rtt"<!--{/if}-->>{lang ranklist_favorite}</a>
		</li>
	</ul>
</div>

<div class="cl b_p ">

<div class="bz_time_box bzbb1">
	<a href="misc.php?mod=ranklist&type=thread&view=$_GET[view]&orderby=all" id="all" {if $orderby == 'all'}class="rtt"{/if} />{lang all}</a><span class="fz14">/</span>
	<a href="misc.php?mod=ranklist&type=thread&view=$_GET[view]&orderby=thisweek" id="604800" {if $orderby == 'thisweek'}class="rtt"{/if} />{lang ranklist_week}</a><span class="fz14">/</span>
	<a href="misc.php?mod=ranklist&type=thread&view=$_GET[view]&orderby=thismonth" id="2592000" {if $orderby == 'thismonth'}class="rtt"{/if} />{lang ranklist_month}</a><span class="fz14">/</span>
	<a href="misc.php?mod=ranklist&type=thread&view=$_GET[view]&orderby=today" id="86400" {if $orderby == 'today'}class="rtt"{/if} />{lang ranklist_today}</a>
</div>
<!--{if $threadlist}-->
<div class="bz_ranklist_thread cl">
	<ul>
		<!--{loop $threadlist $thread}-->
		<li>
			<div class="ranknum grey"><!--{if $thread['rank'] <= 3}-->$thread['rank']<!--{else}-->$thread['rank']<!--{/if}--></div>
			<a href="forum.php?mod=viewthread&tid={$thread['tid']}" class="title">$thread['subject']</a>
			<p class="fz12">
				<a href="home.php?mod=space&uid={$thread['authorid']}&do=profile" class="blue"><!--{avatar($thread[authorid],middle)}-->$thread['author']</a>
				<span class="fz12 grey">$thread['dateline']</span>
				<span class="y fz12 grey"><!--{if $_GET[view] == 'views'}-->$thread['views']{lang ranklist_thread_view}<!--{elseif $_GET[view] == 'favtimes'}-->$thread['favtimes']{lang ranklist_thread_favorite}<!--{elseif $_GET[view] == 'heats'}-->$thread['heats']{lang ranklist_thread_heat}<!--{else}-->$thread['replies']{lang ranklist_thread_reply}<!--{/if}--></span>
			</p>
		</li>
		<!--{/loop}-->
	</ul>
</div>
<!--{else}-->
<div class="mbm mtm hm grey fz12 emp">{lang none_data}</div>
<!--{/if}-->
<div class="notice hm grey fz12 b_p mtw">{lang ranklist_update}</div>

</div>

<!--{template common/footer}-->