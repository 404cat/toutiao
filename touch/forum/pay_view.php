<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="b_p15 bz-bg-fff pay_view_list">
	<h3 class="mbm hm">{lang pay_view}</h3>
	<div>
		<table class="list" cellspacing="0" cellpadding="0" style="width: 250px;">
			<thead>
				<tr>
					<td>{lang username}</td>
					<td>{lang time}</td>
					<td>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</td>
				</tr>
			</thead>
			<!--{if $loglist}-->
				<!--{loop $loglist $log}-->
					<tr>
						<td><a href="home.php?mod=space&uid=$log[uid]&do=profile" class="blue">$log[username]</a></td>
						<td>$log[dateline]</td>
						<td>{$log[$extcreditname]} {$_G[setting][extcredits][$_G[setting][creditstransextra][1]][unit]}</td>
					</tr>
				<!--{/loop}-->
			<!--{else}-->
				<tr><td colspan="3">{lang pay_nobuyers}</td></tr>
			<!--{/if}-->
		</table>
	</div>
</div>
<!--{template common/footer}-->