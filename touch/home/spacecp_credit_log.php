<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{subtemplate home/spacecp_header_name}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<!--{subtemplate home/spacecp_credit_header}-->
<p class="b_p">
	<a{if $_GET[suboperation] == 'creditrulelog'} class="a fz14"{/if} href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditrulelog" hidefocus="true">{lang credit_log_sys}</a>&nbsp;&nbsp;
	<a{if $_GET[suboperation] != 'creditrulelog'} class="a fz14"{/if} href="home.php?mod=spacecp&ac=credit&op=log" hidefocus="true">{lang credit_log}</a>
</p>
<!--{if $_GET[suboperation] != 'creditrulelog'}-->
<form method="post" action="home.php?mod=spacecp&ac=credit&op=log">
	
	<div class="b_p bz-at-form">
		<table summary="{lang memcp_credits_log_payment}" cellspacing="0" cellpadding="0">
			<tr>
				<th>{lang operation}</th>
				<th>{lang credit_change}</th>
				<th>{lang detail}</th>
				<th>{lang changedateline}</th>
			</tr>
			<!--{loop $loglist $value}-->
			<!--{eval $value = makecreditlog($value, $otherinfo);}-->
			<tr>
				<td><!--{if $value['operation']}--><a href="home.php?mod=spacecp&ac=credit&op=log&optype=$value['operation']">$value['optype']</a><!--{else}-->$value['title']<!--{/if}--></td>
				<td>$value['credit']</td>
				<td><!--{if $value['operation']}-->$value['opinfo']<!--{else}-->$value['text']<!--{/if}--></td>
				<td>$value['dateline']</td>
			</tr>
			<!--{/loop}-->
		</table>
	</div>
	
</form>
<!--{elseif $_GET[suboperation] == 'creditrulelog'}-->
<div class="bz-at-form b_p">
	<table summary="{lang get_credit_histroy}" cellspacing="0" cellpadding="0">
		<tr>
			<th>{lang action_name}</th>
			<th>{lang total_time}</th>
			<th>{lang cycles_num}</th>
			<!--{loop $_G['setting']['extcredits'] $key $value}-->
			<th>$value[title]</th>
			<!--{/loop}-->
			<th>{lang last_award_time}</th>
		</tr>
		<!--{eval $i = 0;}-->
		<!--{loop $list $key $log}-->
		<!--{eval $i++;}-->
		<tr{if $i % 2 == 0} class="alt"{/if}>
			<td><a href="home.php?mod=spacecp&ac=credit&op=rule&rid=$log[rid]">$log[rulename]</a></td>
			<td>$log[total]</td>
			<td>$log[cyclenum]</td>
			<!--{loop $_G['setting']['extcredits'] $key $value}-->
			<!--{eval $creditkey = 'extcredits'.$key;}-->
			<td>$log[$creditkey]</td>
			<!--{/loop}-->
			<td><!--{date($log[dateline], 'Y-m-d H:i')}--></td>
		</tr>
		<!--{/loop}-->
	</table>
</div>
<!--{/if}-->
<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->


