<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{if !$_G[inajax]}-->
<div class="cl">
<!--{/if}-->

<!--{if $_GET['op'] == 'ignore'}-->
<div class="tip tip_notice_ignore cl">
	<form method="post" autocomplete="off" id="ignoreform_{$formid}" name="ignoreform_{$formid}" action="home.php?mod=spacecp&ac=common&op=ignore&type=$type" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="ignoresubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<div class="bg cl bzbb1 b_p15">
			<!--{if $_G[inajax]}-->
			<a href="javascript:;" onclick="popup.close();" class="close"><i class="banzhuan_font icon-close grey"></i></a>
			<!--{/if}-->
			<p class="mbm fz16"><em id="return_$_GET[handlekey]">{lang shield_notice}</em></p>
			<p class="grey fz12">{lang no_view_notice_next}</p>
		</div>
		<div class="cl detail b_p15">
			<p class="mbn fz14"><label><input type="radio" name="authorid" id="authorid1" value="$_GET[authorid]" checked="checked" /> {lang shield_this_friend}</label></p>
			<p class="mbn fz14"><label><input type="radio" name="authorid" id="authorid0" value="0" /> {lang shield_all_friend}</label></p>
			<div class="mtm btn-big">
				<button type="submit" name="feedignoresubmit" value="true" class="touch">{lang determine}</button>
			</div>
		</div>
	</form>
</div>
<!--{elseif $_GET['op']=='modifyunitprice'}-->

	<h3 class="flb modifyunitprice">
		<em id="return_$_GET[handlekey]">{lang modify_unitprice}</em>
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}-->
	</h3>
	<form method="post" autocomplete="off" id="ignoreform_{$formid}" name="ignoreform_{$formid}" action="home.php?mod=spacecp&ac=common&op=modifyunitprice" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<input type="hidden" name="modifysubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<div class="c altw">
			<p>{lang modify_unitprice_note}</p>
			<p class="ptn"><label>{lang bid_single_price}: <input type="text" name="unitprice" class="px" value="$showinfo[unitprice]" /></label></p>
		</div>
		<p class="o pns">
			<button type="submit" name="unitpriceysubmit" value="true" class="pn pnc"><strong>{lang determine}</strong></button>
		</p>
	</form>
	<script type="text/javascript">
		function succeedhandle_$_GET['handlekey'] (url, message, values) {
			var priceObj = $('show_unitprice');
			if(priceObj) {
				priceObj.innerHTML = values['unitprice'];
			}

		}
	</script>
<!--{/if}-->

<!--{if !$_G[inajax]}-->
</div>
<!--{/if}-->

<!--{template common/footer}-->