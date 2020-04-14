<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $tradenum}-->
	<!--{if $trades}-->
        <!--{loop $trades $key $trade}-->
            <div id="trade$trade[pid]" class="box banzhuan-trade cl bg b_p15 mtw mbw">
                <div class="bz-at-form mtw mbw">
					<table cellpadding="0" cellspacing="1" border="0">
						<tr>
							<td colspan="2"><h4 class="color-red hm"><strong>$trade[subject]</strong></h4></td>
						</tr>
						<!--{if $trade['thumb']}-->
						<tr>
							<td width="70">{lang post_trade_picture}:</td>
							<td>
								<!--{if $trade['displayorder'] > 0}--><em class="hot">{lang post_trade_sticklist}</em><!--{/if}-->
								<!--{if $trade['thumb']}-->
									<img src="$trade[thumb]" alt="$trade[subject]" />
								<!--{/if}-->
							</td>
						</tr>
						<!--{/if}-->
						<tr>
							<td>{lang trade_remaindays}:</td>
							<td>
								<!--{if $trade[closed]}-->
									<em>{lang trade_timeout}</em>
								<!--{elseif $trade[expiration] > 0}-->
									{$trade[expiration]}{lang days}{$trade[expirationhour]}{lang trade_hour}
								<!--{elseif $trade[expiration] == -1}-->
									<em>{lang trade_timeout}</em>
								<!--{else}-->
									&#27704;&#20037;
								<!--{/if}-->
							</td>
						</tr>
						<tr>
							<td width="70">{lang trade_type_viewthread}:</td>
							<td>
								<!--{if $trade['quality'] == 1}-->{lang trade_new}<!--{/if}-->
								<!--{if $trade['quality'] == 2}-->{lang trade_old}<!--{/if}-->
								{lang trade_type_buy}
							</td>
						</tr>
						<tr>
							<td>{lang trade_transport}:</td>
							<td>
								<!--{if $trade['transport'] == 0}-->{lang post_trade_transport_offline}<!--{/if}-->
								<!--{if $trade['transport'] == 1}-->{lang post_trade_transport_seller}<!--{/if}-->
								<!--{if $trade['transport'] == 2 || $trade['transport'] == 4}-->
									<!--{if $trade['transport'] == 4}-->{lang post_trade_transport_physical}<!--{/if}-->
									<!--{if !empty($trade['ordinaryfee']) || !empty($trade['expressfee']) || !empty($trade['emsfee'])}-->
										<!--{if !empty($trade['ordinaryfee'])}-->{lang post_trade_transport_mail} $trade[ordinaryfee] {lang payment_unit}<!--{/if}-->
										<!--{if !empty($trade['expressfee'])}--> {lang post_trade_transport_express} $trade[expressfee] {lang payment_unit}<!--{/if}-->
										<!--{if !empty($trade['emsfee'])}--> EMS $trade[emsfee] {lang payment_unit}<!--{/if}-->
									<!--{elseif $trade['transport'] == 2}-->
										{lang post_trade_transport_none}
									<!--{/if}-->
								<!--{/if}-->
								<!--{if $trade['transport'] == 3}-->{lang post_trade_transport_virtual}<!--{/if}-->
							</td>
						</tr>
						<tr>
							<td>{lang post_trade_number}:</td><td>$trade[amount]</td>
						</tr>
						<!--{if $trade[locus]}-->
						<tr>
							<td>{lang trade_locus}:</td><td>$trade[locus]</td>
						</tr>
						<!--{/if}-->
						<tr>
							<td>{lang post_trade_buynumber}:</td><td>$trade[totalitems]</td>
						</tr>
						<tr>
							<td>{lang trade_price}:</td>
							<td>
								 <!--{if $trade[price] > 0}-->
									<span class="color-red">$trade[price]</span> &nbsp;{lang payment_unit}
								<!--{/if}-->
								<!--{if $_G['setting']['creditstransextra'][5] != -1 && $trade[credit]}-->
									<!--{if $trade['price'] > 0}-->{lang trade_additional} <!--{/if}-->$trade[credit]&nbsp;{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][5]][title]}
								<!--{/if}-->
							</td>
						</tr>
						<tr>
							<td>{lang trade_costprice}:</td>
							<td>
								<!--{if $trade['costprice'] > 0}-->
									<del>$trade[costprice] {lang payment_unit}</del>
								<!--{/if}-->
								<!--{if $_G['setting']['creditstransextra'][5] != -1 && $trade['costcredit'] > 0}-->
									<del><!--{if $trade['costprice'] > 0}-->{lang trade_additional} <!--{/if}-->$trade[costcredit] {$_G[setting][extcredits][$_G['setting']['creditstransextra'][5]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][5]][title]}</del>
								<!--{/if}-->
							</td>
						</tr>
					</table>
                </div>
	            <!--{if count($trades) > 1 || ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])}-->
				<!--{if !$_G['forum_thread']['is_archived'] && ($_G['uid'] == $_G['forum_thread']['authorid'] || $_G['group']['allowedittrade'])}-->
				<div class="grey fz12 cl hm">{lang trade_mod}</div><div class="clear"></div>
				<!--{/if}-->
				<!--{/if}-->
				<!--{if $post['authorid'] != $_G['uid'] && empty($thread['closed']) && $trade[expiration] > -1}-->
					<!--{if $trade[amount]}-->
						<div class="grey fz12 cl hm">&#35831;&#20351;&#29992;{lang nomobiletype}{lang attachment_buy}</div>
					<!--{else}-->
						<div class="grey fz12 cl hm">{lang sold_out}</div>
					<!--{/if}-->
					<!--{if $_G['uid']}-->
					<div class="mtw mbw btn-big">
						<a href="home.php?mod=space&do=pm&subop=view&touid=$post['authorid']&mobile=2" class="touch">{lang on_line}{lang trade_bargain}</a>
					</div>
					<!--{/if}-->
				<!--{/if}-->
            </div>
        <!--{/loop}-->
	<!--{/if}-->
<div id="postmessage_$post[pid]">$post[counterdesc]</div>
<div class="clear"></div>
<!--{else}-->
<div class="locked">{lang trade_nogoods}</div>
<div class="clear"></div>
<!--{/if}-->

<!--{if !$post['message'] && (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
<div class="mtw mbw btn-big">
	<a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]&page=$page" class="touch">{lang post_add_aboutcounter}</a>
</div>
<div class="clear"></div>
<!--{else}-->
<div class="postmessage bz_message_table mtw mbw cl banzhuan-trade bg b_p15">
	<p class="hm mbw grey">&#26588;&#21488;&#20171;&#32461;</p>
	$post[message]
</div>
<div class="clear"></div>
<!--{/if}-->






