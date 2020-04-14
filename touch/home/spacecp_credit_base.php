<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{subtemplate home/spacecp_header_name}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<div class="cl">

	<!--{hook/spacecp_credit_top}-->
	
	<!--{subtemplate home/spacecp_credit_header}-->

	<!--{if in_array($_GET['op'], array('base'))}-->
		<ul class="creditl cl mtm bzbb1">
		<!--{eval $creditid=0;}-->
		<!--{if $_GET['op'] == 'base' && $_G['setting']['creditstrans']}-->
			<!--{eval $creditid=$_G['setting']['creditstrans'];}-->
			<!--{if $_G['setting']['extcredits'][$creditid]}-->
			<!--{eval $credit=$_G['setting']['extcredits'][$creditid]; }-->
			<!--{if ($_G['setting']['ec_ratio'] && ($_G['setting']['ec_tenpay_opentrans_chnid'] || $_G['setting'][ec_tenpay_bargainor] || $_G['setting']['ec_account'])) || $_G['setting']['card']['open']}-->
			<li><a href="home.php?mod=spacecp&ac=credit&op=buy" class="bzbb1">{$credit[title]}<em class="blue fz12">&nbsp;&nbsp;{lang card_use}&raquo;</em><span><!--{echo getuserprofile('extcredits'.$creditid);}--></span></a></li>
			<!--{else}-->
			<li><a class="bzbb1">{$credit[title]}<span><!--{echo getuserprofile('extcredits'.$creditid);}--></span></a></li>
			<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
		<!--{loop $_G['setting']['extcredits'] $id $credit}-->
			<!--{if $id!=$creditid}-->
			<li><a class="bzbb1">{$credit[title]}<span><!--{echo getuserprofile('extcredits'.$id);}--></span></a></li>
			<!--{/if}-->
		<!--{/loop}-->
			<li><a>{lang credits}<span>$_G['member']['credits']</span></a></li>
		<!--{hook/spacecp_credit_extra}-->
		</ul>
		<!--{if $_GET['op'] == 'base'}-->
		<div class="b_p grey">$creditsformulaexp</div>
		<!--{/if}-->
	<!--{/if}-->
	
	<!--{if $_GET['op'] == 'base'}-->
	
		<div class="b_p bz-at-form">
			<table cellspacing="0" cellpadding="0">
				<caption>
					<h2 class="mbm">
						<a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditrulelog" class="y">{lang viewmore}&raquo;</a>{lang memcp_credits_log}
					</h2>
				</caption>
				<tr>
					<th>{lang operation}</th>
					<th>{lang logs_credit}</th>
					<th>{lang detail}</th>
					<th>{lang changedateline}</th>
				</tr>
			<!--{if $loglist}-->
				<!--{loop $loglist $value}-->
				<!--{eval $value = makecreditlog($value, $otherinfo);}-->
				<tr>
					<td><!--{if $value['operation']}--><a href="home.php?mod=spacecp&ac=credit&op=log&optype=$value['operation']">$value['optype']</a><!--{else}-->$value['title']<!--{/if}--></td>
					<td>$value['credit']</td>
					<td><!--{if $value['operation']}-->$value['opinfo']<!--{else}-->$value['text']<!--{/if}--></td>
					<td>$value['dateline']</td>
				</tr>
				<!--{/loop}-->
			<!--{else}-->
				<tr><td colspan="4"><p class="emp">{lang memcp_credits_log_none}</p></td></tr>
			<!--{/if}-->
			</table>
		</div>

	<!--{elseif $_GET['op'] == 'buy'}-->

		<!--{if ($_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor])) || $_G[setting][card][open]}-->
		<div class="bz_credit_buy cl b_p15">
			<form id="addfundsform" name="addfundsform" method="post" class="form" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=buy">
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="addfundssubmit" value="true" />
				<input type="hidden" name="handlekey" value="buycredit" />
				<table cellspacing="0" cellpadding="0">
					<tr>
						<th>{lang mode_of_payment}&nbsp;:</th>
						<td colspan="2">
							<div class="cl">
								<ul>
								<!--{if $_G[setting][card][open]}-->
								<li>
									<input name="bank_type" type="radio" value="card" checked="checked" id="apitype_card" class="vm" $ecchecked /><label><span class="xs2">{lang card_credit}</span></label>
								</li>
								<!--{/if}-->
								</ul>
							</div>
						</td>
					</tr>
					<!--{if $_G[setting][card][open]}-->
					<tr id="cardbox">
						<th>{lang card}&nbsp;:</th>
						<td colspan="2">
							<input type="text" class="credit-input" id="cardid" placeholder="&#36755;&#20837;&#21345;&#21495;" name="cardid" />
						</td>
					</tr>
					<!--{if $seccodecheck}-->
						</table>
						<!--{block sectpl}--><table id="card_box_sec" cellspacing="0" cellpadding="0" class="tfm mtn"><tr><th><sec></th><td colspan="2"><span id="sec<hash>" onclick="showMenu({'ctrlid':this.id,'win':'{$_GET[handlekey]}'})"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div></td></tr></table><!--{/block}-->
						<!--{subtemplate common/seccheck}-->
						<table cellspacing="0" cellpadding="0" class="tfm">
					<!--{/if}-->
					<!--{/if}-->
					<div class="mtw btn-big">
						<button type="submit" name="addfundssubmit_btn" class="touch" id="addfundssubmit_btn" value="true">{lang memcp_credits_addfunds}</button>
					</div>
				</table>
			</form>
			<div class="mtw btn-big-bor">
				<a href="#" class="touch">&#28857;&#20987;&#36141;&#20080;{lang memcp_credits_addfunds}&#21345;</a>
			</div>
		</div>
		<!--{/if}-->
		
	<!--{elseif $_GET['op'] == 'transfer'}-->

		<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
		<div class="bz_credit_transfer cl b_p15">
		<form id="transferform" name="transferform" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=credit&op=transfer">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="transfersubmit" value="true" />
			<input type="hidden" name="handlekey" value="transfercredit" />
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th>{lang memcp_credits_transfer} <span class="rq">*</span></th>
					<td>
						<input type="text" name="transferamount" id="transferamount" class="credit-input" value="" placeholder="&#35831;&#36755;&#20837;{$_G[setting][extcredits][$_G[setting][creditstransextra][9]][title]}&#25968;" />
						{lang memcp_credits_transfer}{lang credits_give}
						<input type="text" name="to" id="to" class="credit-input" placeholder="&#36755;&#20837;{lang username}" />
					</td>
				</tr>
				<tr>
					<th>{lang transfer_login_password} <span class="rq">*</span></th>
					<td><input type="password" name="password" class="credit-input" value="" placeholder="&#36755;&#20837;{lang transfer_login_password}" /></td>
				</tr>
				<tr>
					<th>{lang credits_transfer_message}</th>
					<td><input type="text" name="transfermessage" class="credit-input" placeholder="&#36755;&#20837;&#30041;&#35328;" /></td>
				</tr>
			</table>
			<p class="grey fz12 mtn">{lang memcp_credits_transfer_min_balance} $_G[setting][transfermincredits] {$_G[setting][extcredits][$_G[setting][creditstransextra][9]][unit]}   <!--{if intval($taxpercent) > 0}--><span class="y">{lang credits_tax} $taxpercent</span><!--{/if}--></p>
			<div class="mtw btn-big">
				<button type="submit" name="transfersubmit_btn" id="transfersubmit_btn" class="touch" value="true"><em>{lang memcp_credits_transfer}</em></button>
				<span style="display: none" id="return_transfercredit"></span>
			</div>
		</form>
		</div>
		<!--{/if}-->

	<!--{elseif $_GET['op'] == 'exchange'}-->

		<p class="b_p hm grey">{lang mobile2version}&#26242;&#26080;&#27492;&#21151;&#33021;, &#35831;&#20351;&#29992;{lang nomobiletype}</p>

	<!--{else}-->
	
		{eval
			$_TPL['cycletype'] = array(
				'0' => '{lang one_time}',
				'1' => '{lang everyday}',
				'2' => '{lang the_time}',
				'3' => '{lang interval_minutes}',
				'4' => '{lang open_cycle}'
			);
		}
		<div class="b_p grey">{lang activity_award_message}</div>
		
		<div class="b_p bz-at-form">
			<table cellspacing="0" cellpadding="0" class="dt valt">
				<tr>
					<th>{lang action_name}</th>
					<th>{lang cycle_range}</th>
					<th>{lang max_award_per_week}</th>
					<!--{loop $_G['setting']['extcredits'] $key $value}-->
					<th>$value[title]</th>
					<!--{/loop}-->
				</tr>
				<!--{eval $i = 0;}-->
				<!--{loop $list $key $value}-->
				<!--{eval $i++;}-->
				<tr{if $i % 2 == 0} class="0"{/if}>
					<td>$value[rulename]</td>
					<td>$_TPL[cycletype][$value[cycletype]]</td>
					<td><!--{if $value[rewardnum]}-->$value[rewardnum]<!--{else}-->{lang unlimited_time}<!--{/if}--></td>
					<!--{loop $_G['setting']['extcredits'] $key $credit}-->
					<!--{eval $creditkey = 'extcredits'.$key;}-->
					<td><!--{if $value[$creditkey] > 0}-->+$value[$creditkey]<!--{elseif $value[$creditkey] < 0}-->$value[$creditkey]<!--{else}-->0<!--{/if}--></td>
					<!--{/loop}-->
				</tr>
				<!--{/loop}-->
			</table>
		</div>
	
	<!--{/if}-->
	
	<!--{hook/spacecp_credit_bottom}-->
</div>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->

