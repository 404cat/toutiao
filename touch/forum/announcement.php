<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang announcement}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="cl">
	<div class="bz_h10"></div>
	<div class="bz-anno-nav b_plrb10">
		<a href="forum.php?mod=announcement" {if empty($_GET[m])}class="a"{/if}>{lang all}</a>
		<!--{loop $months $month}-->
		<a href="forum.php?mod=announcement&m=$month[0].$month[1]" {if $_GET[m] == $month[0].$month[1]}class="a"{/if}>$month[0] {lang year} $month[1] {lang month}</a>
	    <!--{/loop}-->
	</div>
	<div class="clear"></div>
	<div id="annofilter"></div>
	<ul class="bz-anno-ul">
		<!--{loop $announcelist $ann}-->
		<li class="bz-anno-li bz-bg-fff b_p15">
			<h1 id="announce$ann[id]_c" class="bz-anno-li-title">$ann[subject]</h1>
			<p style="padding-bottom: 15px;"><em class="grey">{lang author} : $ann[author]</em><em class="y grey">$ann[starttime]</em></p>
			<div id="announce$ann[id]" class="bz-anno-li-detail">
				$ann[message]
			</div>
		</li>
		<!--{/loop}-->
	</ul>
</div>

<!--{template common/footer}-->

