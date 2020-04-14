<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="forum.php?forumlist=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<div class="b_p15 cl bz-bg-fff" style="height: 100%;">
	<div class="bz_pay">
		<div class="hm">
			<i class="banzhuan_font icon-transaction_fill fz80 rpasspay"></i>
		</div>
		<div class="hm">
			<p class="grey fz14">{lang youneedpay} <strong class="rq">$paycredits {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]]['unit']}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]]['title']}</strong> {lang onlyintoforum}</p>
		</div>
		<div class="b_p15">
			<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&fid=$_G[fid]&action=paysubmit">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<div class="b_p15">
					<div class="mtw btn-big">
						<button class="touch" type="submit" name="loginsubmit" value="true">{lang confirmyourpay}</button>
					</div>
					<div class="mtw mbw btn-big-bor">
						<button class="touch" type="button" onclick="history.go(-1)">{lang cancel}</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--{hook/forumdisplay_bottom_mobile}-->
<!--{template common/footer}-->
