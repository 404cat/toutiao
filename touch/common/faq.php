<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang faq}</h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>

<div class="cl bz-faq">

	<form method="post" autocomplete="off" action="misc.php?mod=faq&action=search">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="searchtype" value="all" />
		<div class="faqsearch">
			<input type="text" name="keyword" value="$keyword" class="input" placeholder="{lang enter_content}...">
			<button type="submit" name="searchsubmit" class="button2" value="yes"><em>{lang search}</em></button>
		</div>
	</form>

	<div class="bz-faq-appl b_p15">
		<a href="misc.php?mod=faq"{if empty($_GET[action])} class="a"{/if}>{lang all}</a>
		<!--{loop $faqparent $fpid $parent}-->
		<a href="misc.php?mod=faq&action=faq&id=$fpid" {if $_GET[id] == $fpid}class="a"{/if}>$parent[title]</a>
		<!--{/loop}-->
		<!--{if !empty($_G['setting']['plugins']['faq'])}-->
		<!--{loop $_G['setting']['plugins']['faq'] $id $module}-->
		<a href="misc.php?mod=faq&action=plugin&id=$id" {if $_GET[id] == $id}class="a"{/if}>$module[name]</a>
		<!--{/loop}-->
		<!--{/if}-->
	</div>
	<div class="clear"></div>
	<div class="b_p15 bzbt1 mtw">
		<!--{if empty($_GET[action])}-->
			<div class="all">
				<!--{if $fpid}-->
					<!--{loop $faqparent $fpid $parent}-->
					<h2><a href="misc.php?mod=faq&action=faq&id=$fpid" class="fz16">$parent[title]</a></h2>
					<ul name="$parent[title]">
						<!--{loop $faqsub[$parent[id]] $sub}-->
						<li><a href="misc.php?mod=faq&action=faq&id=$sub[fpid]&messageid=$sub[id]" class="fz14">$sub[title]</a></li>
						<!--{/loop}-->
					</ul>
					<!--{/loop}-->
				<!--{else}-->
					<div class="hm grey">&#26080;{lang faq}&#20869;&#23481;</div>
				<!--{/if}-->
			</div>
		<!--{elseif $_GET[action] == 'faq'}-->
			<!--{loop $faqlist $faq}-->
			<div id="messageid$faq[id]_c"><h2 class="fz16">$faq[title]</h2></div>
			<div class="detail" id="messageid$faq[id]">$faq[message]</div>
			<!--{/loop}-->
		<!--{elseif $_GET[action] == 'search'}-->
			<div class="fz14 mbw">{lang keyword_faq}</div>
			<!--{if $faqlist}-->
				<!--{loop $faqlist $faq}-->
				<h2 class="fz16">$faq[title]</h2>
				<div class="detail">$faq[message]</div>
				<!--{/loop}-->
			<!--{else}-->
				<div class="hm grey">&#26080;{lang faq}&#20869;&#23481;</div>
			<!--{/if}-->
		<!--{elseif $_GET[action] == 'plugin' && !empty($_GET['id'])}-->
			<!--{eval include(template($_GET['id']));}-->
		<!--{/if}-->
	</div>
	
</div>


<!--{template common/footer}-->

