<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang tag}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>

<!--{if $type != 'countitem'}-->
<div class="cl bz-tag">
	
	<div class="bz-in-sehot bz-bg-fff">
		<ul>
			<li>
				<a>
				<em class="banzhuan_font icon-search"></em>
					<form method="post" action="misc.php?mod=tag" class="searchform">
					<input type="text" name="name" placeholder="{lang enter_content}..." class="input">
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
	<div class="clear"></div>
	<div class="bz-tag-list b_p15">
		<p class="fz12 grey"><em class="banzhuan_font icon-huati fz14"></em> {lang tag}&#20113;</p>
		<div class="cl">
		<!--{if $tagarray}-->
			<!--{loop $tagarray $tag}-->
			<a href="misc.php?mod=tag&id=$tag[tagid]" title="$tag[tagname]">$tag[tagname]</a>
			<!--{/loop}-->
		<!--{else}-->
			<div class="hm grey">{lang no_tag}</div>
		<!--{/if}-->
		</div>
	</div>
</div>
<!--{else}-->
$num
<!--{/if}-->


<!--{template common/footer}-->

	