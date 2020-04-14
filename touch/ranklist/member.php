<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang ranklist_member}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="bz-ranklist-nav">
	<ul class="flex_box">
		<li class="flex">
			<!--{if $_GET['view'] == 'credit'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=member&view=credit" <!--{if $_GET['view'] == 'credit'}-->class="rtt"<!--{/if}-->>{lang credits}&#27036;</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'post'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=member&view=post" <!--{if $_GET['view'] == 'post'}-->class="rtt"<!--{/if}-->>&#21457;&#24086;&#27036;</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'beauty'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=member&view=beauty" <!--{if $_GET['view'] == 'beauty'}-->class="rtt"<!--{/if}-->>&#32654;&#22899;&#27036;</a>
		</li>
		<li class="flex">
			<!--{if $_GET['view'] == 'handsome'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="misc.php?mod=ranklist&type=member&view=handsome" <!--{if $_GET['view'] == 'handsome'}-->class="rtt"<!--{/if}-->>&#24069;&#21733;&#27036;</a>
		</li>
	</ul>
</div>

<div class="cl b_p">

<!--{if $now_pos >= 0}-->
<div class="tbmu hm fz12 grey">
	<!--{if $_GET[view]=='show'}-->
		<h3 class="mbn">{lang friend_top_note}:</h3>
		<!--{if $space[unitprice]}-->
		{lang your_current_bid}: $space[unitprice] {$extcredits[$creditid][unit]},{lang current_ranking} <span class="rq">$now_pos</span> ,{lang make_persistent_efforts}!
		<!--{else}-->
		{lang ranking_message_0}
		<!--{/if}-->
		<br />{lang ranking_message_1}
		<br />{lang ranking_message_2}
	<!--{else}-->
		<!--{if $_GET[view]=='credit'}-->
		{lang self_current_credit}<!--{if $now_choose=='all'}-->{lang credits}<!--{else}-->{$extcredits[$now_choose][title]}<!--{/if}-->: $mycredits
		<!--{elseif $_GET[view]=='friendnum'}-->
		{lang self_current_friend_num}: $space[friends]
		<!--{/if}-->
		, {lang current_ranking}<span class="rq"> $now_pos</span>
	<!--{/if}-->
	<!--{if $cache_mode}-->
	<p>{lang top_100_update}</p>
	<!--{/if}-->
</div>
<!--{/if}-->

<!--{template ranklist/member_list}-->

</div>

<!--{template common/footer}-->
