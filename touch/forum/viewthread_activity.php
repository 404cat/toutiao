<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="mtm mbm">
	<div class="bz-at-form mtm mbm">
		<!--{if $activity['thumb']}-->
		<div class="activity_thumb"><img src="$activity['thumb']" /></div>
		<!--{/if}-->
		<table cellpadding="0" cellspacing="1" border="0">
			<tr>
				<th>{lang activity_type}:</th>
				<td><strong>$activity[class]</strong></td>
			</tr>
			<tr>
				<th>{lang activity_starttime}:</th>
				<td>
					<!--{if $activity['starttimeto']}-->
						{lang activity_start_between}
					<!--{else}-->
						$activity[starttimefrom]
					<!--{/if}-->
				</td>
			</tr>
			<tr>
				<th>{lang activity_space}: </th>
				<td>$activity[place]</td>
			</tr>
			<tr>
				<th>{lang gender}: </th>
				<td>
					<!--{if $activity['gender'] == 1}-->
						{lang male}
					<!--{elseif $activity['gender'] == 2}-->
						{lang female}
					<!--{else}-->
						 {lang unlimited}
					<!--{/if}-->
				</td>
			</tr>
			<!--{if $activity['cost']}-->
			<tr>
				<th>{lang activity_payment}:  </th>
				<td>
					<strong class="rq">$activity[cost] {lang payment_unit}</strong>
				</td>
			</tr>
			<!--{/if}-->
			<!--{if !$_G['forum_thread']['is_archived']}-->
				<tr>
					<th>{lang activity_already}:</th>
					<td>
						<strong class="rq"><em>$allapplynum</em> {lang activity_member_unit}</strong>
						<!--{if $post['invisible'] == 0 && ($_G['forum_thread']['authorid'] == $_G['uid'] || (in_array($_G['group']['radminid'], array(1, 2)) && $_G['group']['alloweditactivity']) || ( $_G['group']['radminid'] == 3 && $_G['forum']['ismoderator'] && $_G['group']['alloweditactivity']))}-->
						<span class="grey">{lang activity_mod}</span>
						<!--{/if}-->
					</td>
				</tr>
				<!--{if $activity['number']}-->
				<tr>
					<th>{lang activity_about_member}:</th>
					<td>$aboutmembers {lang activity_member_unit}</td>
				</tr>
				<!--{/if}-->
				<!--{if $activity['expiration']}-->
				<tr>
					<th>{lang post_closing}:</th>
					<td>$activity[expiration]</td>
				</tr>
				<!--{/if}-->
				
				<!--{if $post['invisible'] == 0}-->
				<!--{if $applied && $isverified < 2}-->
					<!--{if !$isverified}--><tr><td colspan="2" class="rq">{lang activity_wait}</td></tr><!--{else}--><tr><td colspan="2" class="rq">{lang activity_join_audit}</td></tr><!--{/if}-->
					<!--{if !$activityclose}--><!--{/if}-->
				<!--{elseif !$activityclose}-->
					<!--{if $isverified != 2}-->
					<!--{else}-->
					<tr><td colspan="2"><input value="{lang complete_data}" name="ijoin" id="ijoin"/></td></tr>
					<!--{/if}-->
				<!--{/if}-->
				<!--{/if}-->
				
			<!--{/if}-->
		</table>
   </div>
</div>
<div class="clear cl"></div>
<!--{if !$activityclose}-->
	<!--{if $_G['uid']}-->
		<!--{if !$activityclose && (!$applied || $isverified == 2)}-->
		<div id="activityjoin" class="bz-at-form mtw mbw">
			<!--{if $_G['forum']['status'] == 3 && helper_access::check_module('group') && $isgroupuser != 'isgroupuser'}-->
				<p>{lang activity_no_member}</p>
				<p><a href="forum.php?mod=group&action=join&fid=$_G[fid]">{lang activity_join_group}</a></p>
			<!--{else}-->
			<form name="activity" id="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}&mobile=2" >
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<table cellpadding="0" cellspacing="1" border="0">
				<div class="rq hm mbn"><strong class="fz16">&#25105;&#35201;&#25253;&#21517;</strong></div>
				<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && !$applied}-->
				<div colspan="2" class="grey fz12 hm mbn">{lang activity_need_credit} <strong class="fz12 rq">$activity[credit]</strong> {$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}</div>
				<!--{/if}-->
				<!--{if $activity['cost']}-->
				<tr>
					<th>{lang activity_paytype}</th>
					<td>
						<label><input class="pr" type="radio" value="0" name="payment" id="payment_0" checked="checked" />{lang activity_pay_myself}</label><br />
					</td>
				</tr>
				<!--{/if}-->
				<!--{if !empty($activity['ufield']['userfield'])}-->
					<!--{loop $activity['ufield']['userfield'] $fieldid}-->
					<!--{if $settings[$fieldid][available]}-->
						<tr>
							<th>$settings[$fieldid][title]<span class="rq">*</span></th>
							<td>$htmls[$fieldid]</td>
						</tr>
					<!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
		
				<!--{if !empty($activity['ufield']['extfield'])}-->
					<!--{loop $activity['ufield']['extfield'] $extname}-->
						<tr>
							<th>$extname</th>
							<td><input type="text" name="$extname" maxlength="200" value="{if !empty($ufielddata)}$ufielddata[extfield][$extname]{/if}" /></td>
						</tr>
					<!--{/loop}-->
				<!--{/if}-->
				<tr>
					<th>{lang leaveword}</th>
					<td><textarea name="message" class="px">$applyinfo[message]</textarea></td>
				</tr>
				<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && checklowerlimit(array('extcredits'.$_G['setting']['activitycredit'] => '-'.$activity['credit']), $_G['uid'], 1, 0, 1) !== true}-->
				<tr>
					<td colspan="2">{$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]} {lang not_enough}$activity['credit']</td>
				</tr>
				<!--{else}-->
				<tr>
					<td colspan="2">
						<input type="hidden" name="activitysubmit" value="true">
						<em id="return_activityapplies"></em>
						<div class="b_m btn-big">
							<button type="submit" class="touch">{lang submit}</button>
						</div>
					</td>
				</tr>
				<!--{/if}-->
				</table>
			</form>
			<script type="text/javascript">
				function succeedhandle_activityapplies(locationhref, message) {
					showDialog(message, 'notice', '', 'location.href="' + locationhref + '"');
				}
			</script>
			<!--{/if}-->
		</div>
		<!--{elseif !$activityclose && $applied}-->
		<div id="activityjoincancel" class="bz-at-form mtw mbw">
			<table cellpadding="0" cellspacing="1" border="0">
				<div class="rq hm mbn"><strong class="fz16">{lang activity_join_cancel}</strong></div>
		        <form name="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}">
		        <input type="hidden" name="formhash" value="{FORMHASH}" />
		        <tr>
					<th>{lang leaveword}</th>
					<td><textarea name="message" class="px"></textarea></td>
		        </tr>
		        <tr>
					<td colspan="2">
						<div class="b_m btn-big">
							<button type="submit" name="activitycancel" class="touch" value="true">{lang submit}</button>
						</div>
					</td>
		        </tr>
		        </form>
		    </table>
		</div>
		<!--{/if}-->
	<!--{else}-->
		<div class="mtw mbw btn-big">
			<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="touch">&#25105;&#35201;&#25253;&#21517;</a>
		</div>
	<!--{/if}-->
<!--{else}-->
	<div class="activityover cl mbm"><a class="grey">{lang activity}&#24050;&#32467;&#26463;</a></div>
<!--{/if}-->
<div class="clear cl"></div>
<!--{if $applylist}-->
<div class="bz-at-form mtw mbw">
	<p class="mtn mbn rq">{lang activity_new_join} ($applynumbers {lang activity_member_unit})</p>
	<table class="dt" cellpadding="5" cellspacing="5">
		<tr>
			<th class="grey">{lang username}</th>
			<!--{if $activity['cost']}-->
			<th class="grey">{lang activity_payment}</th>
			<!--{/if}-->
			<th class="grey">{lang activity_jointime}</th>
		</tr>
		<!--{loop $applylist $apply}-->
		<tr>
			<td>
				<a href="home.php?mod=space&uid=$apply[uid]&do=profile" class="blue">$apply[username]</a>
			</td>
			<!--{if $activity['cost']}-->
			<td>
				<!--{if $apply[payment] >= 0}-->$apply[payment] {lang payment_unit}
				<!--{else}-->{lang activity_self}
				<!--{/if}-->
			</td>
			<!--{/if}-->
			<td>$apply[dateline]</td>
		</tr>
		<!--{/loop}-->
	</table>
</div>
<!--{/if}-->
<div class="clear cl"></div>
<!--{if $applylistverified}-->
<div class="bz-at-form mtw mbw">
	<p class="mtn mbn rq">{lang activity_new_signup} ($noverifiednum {lang activity_member_unit})</p>
	<table class="dt" cellpadding="5" cellspacing="5">
		<tr>
			<th class="grey">{lang username}</th>
			<!--{if $activity['cost']}-->
			<th class="grey">{lang activity_payment}</th>
			<!--{/if}-->
			<th class="grey">{lang activity_jointime}</th>
		</tr>
		<!--{loop $applylistverified $apply}-->
			<tr>
				<td>
					<a href="home.php?mod=space&uid=$apply[uid]&do=profile" class="blue">$apply[username]</a>
				</td>
				<!--{if $activity['cost']}-->
				<td><!--{if $apply[payment] >= 0}-->$apply[payment] {lang payment_unit}<!--{else}-->{lang activity_self}<!--{/if}--></td>
				<!--{/if}-->
				<td>$apply[dateline]</td>
			</tr>
		<!--{/loop}-->
	</table>
</div>
<!--{/if}-->
<div class="clear cl"></div>
<div id="postmessage_$post[pid]" class="postmessage">
	<h1 class="activitytitle bzbb1 fz16">{lang activity}&#20171;&#32461;</h1>
	<div class="cl bz_message_table">$post[message]</div>
</div>