<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="cl bz_medals_tip">
	<form id="medalform" method="post" autocomplete="off" action="home.php?mod=medal&action=apply&medalsubmit=yes">
		<div class="tipbox">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="medalid" value="$medal[medalid]" />
			<input type="hidden" name="operation" value="" />
			<!--{if !empty($_GET['infloat'])}--><input type="hidden" name="handlekey" value="$_GET['handlekey']" /><!--{/if}-->
			<!--{if $_G[inajax]}-->
			<a href="javascript:;" onclick="popup.close();" class="delete"><i class="banzhuan_font icon-close grey"></i></a>
			<!--{/if}-->
			<h1 class="tipbox_title bg"><!--{if $medal['price']}-->{lang space_medal_buy}{lang medals}<!--{else}-->{lang space_medal_apply}<!--{/if}--></h1>
			<div class="cl b_p15">
				<div class="hm medals_img">
					<img src="{STATICURL}image/common/$medal[image]" alt="$medal[name]" />
				</div>
				<div class="tipbox_box cl b_p">
					<p class="fz14">$medal[name]</p>
					<p class="grey fz12">$medal[description]</p>
					<p class="grey fz12">
						<!--{if $medal[expiration]}-->{lang expire} $medal[expiration] {lang days} <!--{/if}-->
						<!--{if $medal[permission]}-->$medal[permission] <!--{/if}-->
						<!--{if $medal[type] == 0}-->
							( {lang medals_type_0} )
						<!--{elseif $medal[type] == 1}-->
							<!--{if $medal['price']}-->
								<!--{if {$_G['setting']['extcredits'][$medal[credit]][unit]}}-->
									( {$_G['setting']['extcredits'][$medal[credit]][title]} <strong class="rq">$medal[price]</strong> {$_G['setting']['extcredits'][$medal[credit]][unit]} )
								<!--{else}-->
									( <strong class="rq">$medal[price]</strong> {$_G['setting']['extcredits'][$medal[credit]][title]} )
								<!--{/if}-->
							<!--{else}-->
								( {lang medals_type_1} )
							<!--{/if}-->
						<!--{elseif $medal[type] == 2}-->
							( {lang medals_type_2} )
						<!--{/if}-->
					</p>
				</div>
			</div>
		</div>
		<div class="mbm btn-big">
		<!--{if $medal[type] && $_G['uid']}-->
			<button class="touch" type="submit" value="true" name="medalsubmit">
				<!--{if $medal['price']}-->
					{lang space_medal_buy}
				<!--{else}-->
					<!--{if !$medal[permission]}-->
						{lang medals_apply}
					<!--{else}-->
						{lang medals_draw}
					<!--{/if}-->
				<!--{/if}-->
			</button>
		<!--{/if}-->
		</div>
	</form>
</div>
<!--{template common/footer}-->