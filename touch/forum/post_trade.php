<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<input type="hidden" name="trade" value="yes" />
<input type="hidden" name="item_type" value="1" />
<div class="bz-post-trade cl">
    <p class="bz-post-trade-p">
	    <label for="item_name">{lang post_trade_name}<strong class="color-red"> *</strong></label>
	    <input type="text" name="item_name" id="item_name" class="txt_s" value="$trade[subject]" tabindex="1" />
    </p>
    <p class="bz-post-trade-p">
	    <label for="item_number">{lang post_trade_number}<strong class="color-red"> *</strong></label>
	    <input type="text" name="item_number" id="item_number" class="txt_s" value="$trade[amount]" tabindex="1" />
    </p>	
	<p class="bz-post-trade-p">
        <label>&#21830;&#21697;&#25104;&#33394;</label>
		<select id="item_quality" class="sort_sel" name="item_quality" tabindex="1">
			<option value="1" {if $trade['quality'] == 1}selected="selected"{/if}>{lang trade_new}</option>
			<option value="2" {if $trade['quality'] == 2}selected="selected"{/if}>{lang trade_old}</option>
		</select>
	</p>	
	<p class="bz-post-trade-p">
        <label for="transport">{lang post_trade_transport}</label>
		<select name="transport" id="transport" change="$('logisticssetting').style.display = $('transport').value == 'virtual' ? 'none' : ''" class="sort_sel">
			<option value="virtual" {if $trade['transport'] == 3}selected="selected"{/if}>{lang post_trade_transport_virtual}</option>
			<option value="seller" {if $trade['transport'] == 1}selected="selected"{/if}>{lang post_trade_transport_seller}</option>
			<option value="buyer" {if $trade['transport'] == 2}selected="selected"{/if}>{lang post_trade_transport_buyer}</option>
			<option value="logistics" {if $trade['transport'] == 4}selected="selected"{/if}>{lang trade_type_transport_physical}</option>
			<option value="offline" {if $trade['transport'] == 0}selected="selected"{/if}>{lang post_trade_transport_offline}</option>
		</select>
	</p>	  
	<p class="bz-post-trade-p">
	    <label for="item_price">{lang post_trade_price} - {lang post_current_price}<strong class="color-red"> *</strong></label>
	    <input type="text" name="item_price" id="item_price" class="txt_s" value="$trade[price]" tabindex="1" />
	</p>	
	<p class="bz-post-trade-p">
	    <label for="item_costprice">{lang post_trade_price} - {lang post_original_price}</label>
	    <input type="text" name="item_costprice" id="item_costprice" class="txt_s" value="$trade[costprice]" tabindex="1" />
	</p>	
	<!--{if $_G['setting']['creditstransextra'][5] != -1}--> 
	<p class="bz-post-trade-p">
	    <label for="item_credit">{lang post_trade_price} - &#38468;&#21152;{lang post_current_credit}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][title]})</label>
	    <input type="text" name="item_credit" id="item_credit" class="txt_s" value="$trade[credit]" tabindex="1" />
	</p>
	<p class="bz-post-trade-p">
	    <label for="item_costcredit">{lang post_trade_price} - &#38468;&#21152;{lang post_original_credit}({$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][title]})</label>
	    <input type="text" name="item_costcredit" id="item_costcredit" class="txt_s" value="$trade[costcredit]" tabindex="1" />
	</p>
	<!--{/if}-->
	<p class="bz-post-trade-p">
		<label for="postage_mail">{lang post_trade_price} - {lang post_trade_transport_mail}</label>
		<input type="text" name="postage_mail" id="postage_mail" class="txt_s" value="$trade[ordinaryfee]" tabindex="1" />
	</p>
	<p class="bz-post-trade-p">
		<label for="postage_express">{lang post_trade_price} - {lang post_trade_transport_express}</label>
		<input type="text" name="postage_express" id="postage_express" class="txt_s" value="$trade[expressfee]" tabindex="1" />
	</p>
	<p class="bz-post-trade-p">
		<label for="postage_ems">{lang post_trade_price} - EMS</label>
		<input type="text" name="postage_ems" id="postage_ems" class="txt_s" value="$trade[emsfee]" tabindex="1" />
	</p>
	<p class="bz-post-trade-p">
        <label for="paymethod">{lang post_trade_paymethod}</label>
		<select name="paymethod" id="paymethod" change="display('tenpayseller')" class="sort_sel" tabindex="1">
			<!--{if $_G[setting][ec_tenpay_opentrans_chnid]}--><option value="0" {if $trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_online}</option><!--{/if}-->
			<option value="1" {if !$trade[tenpayaccount]}selected{/if}>{lang post_trade_paymethod_offline}</option>
		</select>
	</p>	
	<p class="bz-post-trade-p" style="{if !$trade[tenpayaccount]}display:none{/if}">
		<label for="tenpay_account">{lang post_trade_tenpay_seller}</label>
		<input type="text" name="tenpay_account" id="tenpay_account" class="txt_s" value="$trade[tenpayaccount]" tabindex="2" />
	</p>
	<p class="bz-post-trade-p">
		<label for="item_locus">{lang post_trade_locus}</label>
		<input type="text" name="item_locus" id="item_locus" class="txt_s" value="$trade[locus]" tabindex="1" />
	</p>
	<p class="bz-post-trade-p">
		<label for="item_expiration">{lang valid_before} <em class="grey fz12">&#22635;&#20889;&#26684;&#24335;&#20030;&#20363;:&nbsp;&nbsp;2020-12-31 10:00&nbsp;&nbsp;&nbsp;&#27704;&#20037;&#22635;0</em></label>
		<input type="text" name="item_expiration" id="item_expiration" class="txt_s" autocomplete="off" value="$trade[expiration]" tabindex="1" />
	</p>
	<!--{if $allowpostimg}-->
	<p class="bz-post-trade-p">
		<label>{lang post_trade_picture}</label>
		<div class="grey fz12">&#26242;&#19981;&#25903;&#25345;&#27492;&#21151;&#33021;, &#21487;&#20351;&#29992;&#24213;&#37096;&#20256;&#22270;&#25353;&#38062;&#25110;{lang nomobiletype}&#20256;&#22270;&#25353;&#38062;</div>
	</p>	
	<!--{/if}-->
	<!--{hook/post_trade_extra}-->
</div>
