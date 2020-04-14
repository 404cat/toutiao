<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="forum.php?forumlist=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<div class="b_p15 cl bz-bg-fff" style="height: 100%;">
	<div class="bz_passwd">
		<div class="hm">
			<i class="banzhuan_font icon-unlock_fill fz80 rpasspay"></i>
		</div>
		<div class="hm">
			<p class="grey fz14">&#26412;&#29256;&#22359;&#38656;&#35201;&#23494;&#30721;&#25165;&#21487;&#20197;&#35775;&#38382;</p>
			<p class="grey fz14">&#35831;&#22312;&#19979;&#26041;&#36755;&#20837;&#23494;&#30721;</p>
		</div>
		<div class="b_p15">
			<form method="post" autocomplete="off" action="forum.php?mod=forumdisplay&fid=$_G[fid]&action=pwverify">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<div class="b_p15 hm">
					<input type="password" name="pw" class="bz_passwd_px" placeholder="&#35831;&#36755;&#20837;&#23494;&#30721;" />
					<div class="mtw btn-big">
						<button class="touch" type="submit" name="loginsubmit" value="true">{lang submit}</button>
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