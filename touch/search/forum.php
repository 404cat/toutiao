<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{if $_G['setting']['domain']['app']['mobile']}-->
	{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
<!--{else}-->
	{eval $nav = "forum.php";}
<!--{/if}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>$_G['setting']['sitename']</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="bz-in-sehot bz-bg-fff">
	<ul>
		<li>
			<a>
			<em class="banzhuan_font icon-search"></em>
		    <form id="searchform" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum&mobile=2">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<!--{subtemplate search/pubsearch}-->
				<!--{eval $policymsgs = $p = '';}-->
				<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
				<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
				<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
				<!--{/loop}-->
				<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
			 </form>
			</a>
		</li>
	</ul>
</div>
<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/thread_list}-->
<!--{/if}-->
<!--{if $_GET['searchsubmit'] !== 'yes'}-->
<!--{if $_G['setting']['srchhotkeywords']}-->
<div class="scbar-hot bz-bg-fff b_p15">
	<div class="fz12 grey">&#22823;&#23478;&#37117;&#22312;&#25628;</div>
	<div class="scbar-hot-title">
		<!--{loop $_G['setting']['srchhotkeywords'] $val}-->
		<!--{if $val=trim($val)}-->
		<!--{eval $valenc=rawurlencode($val);}-->
		<!--{block srchhotkeywords[]}-->
		<!--{if !empty($searchparams[url])}-->
		<a href="$searchparams[url]?q=$valenc&source=hotsearch{$srchotquery}" class="xi2" sc="1">$val</a>
		<!--{else}-->
		<a href="search.php?mod=forum&srchtxt=$valenc&formhash={FORMHASH}&searchsubmit=true&source=hotsearch" class="xi2" sc="1">$val</a>
		<!--{/if}-->
		<!--{/block}-->
		<!--{/if}-->
		<!--{/loop}-->
		<!--{echo implode('', $srchhotkeywords);}-->
	</div>
</div>
<!--{/if}-->
<!--{/if}-->
<div class="bz_bottom"></div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
