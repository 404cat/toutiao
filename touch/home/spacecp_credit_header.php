<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-credit-nav">
	<ul class="flex_box">
		<li class="flex">
			<!--{if $_GET['op'] == 'base'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=base" <!--{if $_GET['op'] == 'base'}-->class="rtt"<!--{/if}-->>{lang credits}</a>
		</li>
		<!--{if $_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor]) || $_G['setting']['card']['open']}-->
		<li class="flex">
			<!--{if $_GET['op'] == 'buy'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=buy" <!--{if $_GET['op'] == 'buy'}-->class="rtt"<!--{/if}-->>{lang buy_credits}</a>
		</li>
		<!--{/if}-->
		<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
		<li class="flex">
			<!--{if $_GET['op'] == 'transfer'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=transfer" <!--{if $_GET['op'] == 'transfer'}-->class="rtt"<!--{/if}-->>{lang transfer_credits}</a>
		</li>
		<!--{/if}-->
		<!--{if $_G[setting][exchangestatus]}-->
		<li class="flex">
			<!--{if $_GET['op'] == 'exchange'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=exchange" <!--{if $_GET['op'] == 'exchange'}-->class="rtt"<!--{/if}-->>{lang exchange_credits}</a>
		</li>
		<!--{/if}-->
		<li class="flex">
			<!--{if $_GET['op'] == 'log'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditrulelog" <!--{if $_GET['op'] == 'log'}-->class="rtt"<!--{/if}-->>&#35760;&#24405;</a>
		</li>
		<li class="flex">
			<!--{if $_GET['op'] == 'rule'}--><em class="bg_xm"></em><!--{/if}-->
			<a href="home.php?mod=spacecp&ac=credit&op=rule" <!--{if $_GET['op'] == 'rule'}-->class="rtt"<!--{/if}-->>&#35268;&#21017;</a>
		</li>
	</ul>
</div>

<!--{if $op == 'rule'}-->
<div class="b_m">
	<select onchange="location.href='home.php?mod=spacecp&ac=credit&op=rule&fid='+this.value"><option value="">{lang credit_rule_global}</option>$select</select>
</div>
<!--{/if}-->
