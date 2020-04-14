<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->

<!--{if !$_G[inajax]}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{if $op == 'find'}-->{lang people_might_know}<!--{elseif $op == 'request'}-->{lang friend_request}<!--{elseif $op == 'group'}-->{lang set_friend_group}<!--{else}-->{lang friends}<!--{/if}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<!--{/if}-->

<!--{if $op =='ignore'}-->

	<div class="bz_tip cl">
		<form method="post" autocomplete="off" id="friendform_{$uid}" name="friendform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=ignore&uid=$uid&confirm=1">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<input type="hidden" name="friendsubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="from" value="$_GET[from]" />
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<dt><p>{lang determine_lgnore_friend}</p></dt>
			<dd class="cl">
				<a href="javascript:;" onclick="popup.close();" class="bz_btn_close grey">{lang cancel}</a>
				<a class="bz_btn_confirm"><span><button type="submit" name="friendsubmit_btn" value="true">{lang determine}</button></span></a>
			</dd>
		</form>
	</div>

<!--{elseif $op == 'find'}--> 

	<!--{if !empty($recommenduser) || $nearlist || $friendlist || $onlinelist}--> 
		
		<!--{if !empty($recommenduser)}-->
		<h2 class="mtw">{lang recommend_user}</h2>
		<ul class="buddy cl">
			<!--{loop $recommenduser $key $value}-->
			<li>
				<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" c="1"><!--{avatar($value[uid],small)}--></a></div>
				<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
				<p title="$value[reason]" class="maxh">$value[reason]</p>
				<p><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]" id="a_near_friend_$key" onclick="showWindow(this.id, this.href, 'get', 0);" class="addbuddy">{lang add_friend}</a></p>
			</li>
			<!--{/loop}-->
		</ul>
		<!--{/if}--> 
		
		<!--{if $nearlist}-->
		<h2 class="mtw">{lang surprise_they_near}</h2>
		<ul class="buddy cl">
			<!--{loop $nearlist $key $value}-->
			<li>
				<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" c="1"><!--{avatar($value[uid],small)}--></a></div>
				<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
				<p><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]" id="a_near_friend_$key" onclick="showWindow(this.id, this.href, 'get', 0);" class="addbuddy">{lang add_friend}</a></p>
			</li>
			<!--{/loop}-->
		</ul>
		<!--{/if}--> 
		  
		<!--{if $friendlist}-->
		<h2 class="mtw">{lang friend_friend_might_know}</h2>
		<ul class="buddy cl">
			<!--{loop $friendlist $key $value}-->
			<li>
				<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" c="1"><!--{avatar($value[uid],small)}--></a></div>
				<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
				<p><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]&handlekey=friendhk_{$value[uid]}" id="a_friend_friend_$key" onclick="showWindow(this.id, this.href, 'get', 0);" class="addbuddy">{lang add_friend}</a></p>
			</li>
			<!--{/loop}-->
		</ul>
		<!--{/if}--> 
		  
		<!--{if $onlinelist}-->
		<h2 class="mtw">{lang they_online_add_friend}</h2>
		<ul class="buddy cl">
			<!--{loop $onlinelist $key $value}-->
			<li>
				<div class="avt"><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]" c="1"><!--{avatar($value[uid],small)}--></a></div>
				<h4><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></h4>
				<p><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]&handlekey=onlinehk_{$value[uid]}" id="a_online_friend_$key" onclick="showWindow(this.id, this.href, 'get', 0);" class="addbuddy">{lang add_friend}</a></p>
			</li>
			<!--{/loop}-->
		</ul>
		<!--{/if}-->
	
	<!--{else}-->
		<div class="bz-p10 bz-bg-fff bzbt1 bzbb1">
			<div class="guide-no">
				<p class="banzhuan_font icon-nothing color-b" style="font-size: 50px;"></p>
				<p class="color-b">{lang find_know_nofound}</p>
			</div>
		</div>
	<!--{/if}-->

<!--{elseif $op == 'search'}-->

	<h3 class="tbmu">{lang search_member_result}:</h3>
	NONE

<!--{elseif $op=='changenum'}-->
	
	<div class="tip tip_changenum">
		<form method="post" autocomplete="off" id="changenumform_{$uid}" name="changenumform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=changenum&uid=$uid">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="b_p15">
				<div class="cl">
					<!--{if $_G[inajax]}-->
					<a href="javascript:;" onclick="popup.close();" class="delete"><i class="banzhuan_font icon-close grey"></i></a>
					<!--{/if}-->
					<p class="mbm fz14">{lang adjust_friend_hot}</p>
				</div>
				<div class="cl">
					<p><input type="text" name="num" value="$friend[num]" size="5" class="bz-input" placeholder="{lang new_hot}: {lang num_0_999}" /></p>
					<div class="mtm btn-big">
						<button type="submit" name="changenumsubmit" class="touch" value="true">{lang determine}</button>
					</div>
				</div>
			</div>
		</form>
		<script type="text/javascript" reload="1">
			function succeedhandle_$_GET[handlekey](url, msg, values) {
			friend_delete(values['uid']);
			$('spannum_'+values['fid']).innerHTML = values['num'];
			hideWindow('$_GET[handlekey]');
			}
		</script>
	</div>

<!--{elseif $op=='changegroup'}-->

	<h3 class="flb changegroup"> 
		<em id="return_$_GET[handlekey]">{lang set_friend_group}</em> 
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}--> 
	</h3>
	<form method="post" autocomplete="off" id="changegroupform_{$uid}" name="changegroupform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=changegroup&uid=$uid" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<input type="hidden" name="changegroupsubmit" value="true" />
		<!--{if $_G[inajax]}-->
		<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
		<!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="c">
			<p>{lang set_friend_group}</p>
			<table>
				<tr> 
					<!--{eval $i=0;}--> 
					<!--{loop $groups $key $value}-->
					<td style="padding:8px 8px 0 0;">
						<label>
							<input type="radio" name="group" value="$key"$groupselect[$key] />$value
						</label>
					</td>
					<!--{if $i%2==1}-->
					</tr>
					<tr>   	
					<!--{/if}-->
					<!--{eval $i++;}--> 
					<!--{/loop}--> 
				</tr>
			</table>
		</div>
		<p class="o pns">
			<button type="submit" name="changegroupsubmit_btn" class="pn pnc" value="true"><strong>{lang determine}</strong></button>
		</p>
	</form>
	<script type="text/javascript">
		function succeedhandle_$_GET[handlekey](url, msg, values) {
		friend_changegroup(values['gid']);
			}
	</script>
  
<!--{elseif $op=='editnote'}-->

	<h3 class="flb editnote">
		<em id="return_$_GET[handlekey]">{lang friend_note}</em> 
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}--> 
	</h3>
	<form method="post" autocomplete="off" id="editnoteform_{$uid}" name="editnoteform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=editnote&uid=$uid" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<input type="hidden" name="editnotesubmit" value="true" />
		<!--{if $_G[inajax]}-->
		<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
		<!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="c">
			<p>{lang friend_note_message}</p>
			<input type="text" name="note" class="px mtn" value="$friend[note]" size="50" />
		</div>
		<p class="o pns">
			<button type="submit" name="editnotesubmit_btn" class="pn pnc" value="true"><strong>{lang determine}</strong></button>
		</p>
	</form>
	<script type="text/javascript">
		function succeedhandle_$_GET[handlekey](url, msg, values) {
			var uid=values['uid'];
			var elem = $('friend_note_'+uid);
			if(elem) {
				elem.innerHTML = values['note'];
				}
			}
	</script> 
  
<!--{elseif $op=='group'}-->
  
	<p class="tbmu">
		<a href="home.php?mod=spacecp&ac=friend&op=group"{if !isset($_GET[group])} class="a"{/if}>{lang all_friends}</a> 
		<!--{loop $groups $key $value}--> 
		<span class="pipe">|</span><a href="home.php?mod=spacecp&ac=friend&op=group&group=$key"{if isset($_GET[group]) && $_GET[group]==$key} class="a"{/if}>$value</a> 
		<!--{/loop}--> 
	</p>
	<p class="tbmu">{lang friend_group_hot_message}</p>
	<!--{if $list}-->
	<form method="post" autocomplete="off" action="home.php?mod=spacecp&ac=friend&op=group&ref">
		<div id="friend_ul">
			<ul class="buddy cl">
				<!--{loop $list $key $value}-->
				<li>
					<div class="avt"><a href="home.php?mod=space&uid=$value[uid]"><!--{avatar($value[uid],small)}--></a></div>
					<h4>
						<input type="checkbox" name="fuids[]" value="$value[uid]" class="pc" />
						<a href="home.php?mod=space&uid=$value[uid]">$value[username]</a>
					</h4>
					<p class="xg1">{lang hot}:$value[num]</p>
					<p class="xg1">$value[group]</p>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<div class="mtn">
			<label for="chkall" onclick="checkAll(this.form, 'fuids')"><input type="checkbox" name="chkall" id="chkall" class="pc" />{lang select_all}</label>
			{lang set_member_group}:
			<select name="group" class="pn vm">
				<!--{loop $groups $key $value}-->
				<option value="$key">$value</option>
				<!--{/loop}-->
			</select>
			&nbsp;
			<button type="submit" name="btnsubmit" value="true" class="pnc vm"><strong>{lang determine}</strong></button>
		</div>
		<!--{if $multi}-->
		<div class="pgs cl mtm">$multi</div>
		<!--{/if}-->
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="groupsubmin" value="true" />
	</form>
	<!--{else}-->
	<div class="bz-p10 bz-bg-fff bzbt1 bzbb1">
		<div class="guide-no">
			<p class="banzhuan_font icon-nothing color-b" style="font-size: 50px;"></p>
			<p class="color-b">{lang find_know_nofound}</p>
		</div>
	</div>
	<!--{/if}--> 
  
<!--{elseif $op=='groupname'}-->

	<h3 class="flb groupname"> 
		<em id="return_$_GET[handlekey]">{lang friends_group}</em> 
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}--> 
	</h3>
	<div id="__groupnameform_{$group}">
		<form method="post" autocomplete="off" id="groupnameform_{$group}" name="groupnameform_{$group}" action="home.php?mod=spacecp&ac=friend&op=groupname&group=$group" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<input type="hidden" name="groupnamesubmit" value="true" />
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="c">
				<p>{lang set_friend_group_name}</p>
				<p class="mtm">{lang new_name}:
					<input type="text" name="groupname" value="$groups[$group]" size="15" class="px" />
				</p>
			</div>
			<p class="o pns">
				<button type="submit" name="groupnamesubmit_btn" value="true" class="pn pnc"><strong>{lang determine}</strong></button>
			</p>
		</form>
		<script type="text/javascript">
			function succeedhandle_$_GET[handlekey](url, msg, values) {
				friend_changegroupname(values['gid']);
			}
		</script> 
	</div>
  
<!--{elseif $op=='groupignore'}-->

	<h3 class="flb groupignore">
		<em id="return_$_GET[handlekey]">{lang set_member_feed}</em>
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}--> 
	</h3>
	<div id="$group">
		<form method="post" autocomplete="off" id="groupignoreform" name="groupignoreform" action="home.php?mod=spacecp&ac=friend&op=groupignore&group=$group" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<input type="hidden" name="groupignoresubmit" value="true" />
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="c"> 
				<!--{if !isset($space['privacy']['filter_gid'][$group])}-->
				<p>{lang not_show_feed_homepage}</p>
				<!--{else}-->
				<p>{lang show_feed_homepage}</p>
				<!--{/if}--> 
			</div>
			<p class="o pns">
				<button type="submit" name="groupignoresubmit_btn" class="pn pnc" value="true"><strong>{lang determine}</strong></button>
			</p>
		</form>
	</div>

<!--{elseif $op=='request'}-->
	<div class="bz-fe-appl">
		<a href="home.php?mod=space&do=friend">{lang my_friends}</a>
		<a href="home.php?mod=space&do=friend&view=online&type=near">&#38468;&#36817;&#30340;&#20154;</a>
		<!--{if empty($_G['setting']['sessionclose'])}-->
		<a href="home.php?mod=space&do=friend&view=online&type=member">{lang online_member}</a>
		<!--{/if}-->
	    <a href="home.php?mod=space&do=friend&view=blacklist">&#40657;&#21517;&#21333;</a>
		<a href="home.php?mod=spacecp&ac=friend&op=request" class="a">{lang friend_request}</a>
	</div>
	<div class="container">
	<div class="card">
	<div class="b_p15">
	<!--{if $list}-->
		<div class="clear bz-fe-list">
			<ul>
				<!--{loop $list $key $value}-->
				<li id="friend_tbody_$value[fuid]">
					<div class="z avatar"><a href="home.php?mod=space&uid=$value[fuid]&do=profile&mobile=2" c="1"><!--{avatar($value[fuid],middle)}--></a></div>
					<div class="y ntbody">
						<a href="home.php?mod=space&uid=$value[fuid]&do=profile&mobile=2" class="fz16" {eval g_color($value[groupid]);}>$value[fusername]</a>
						<span class="y grey"><!--{date($value[dateline], 'n-j H:i')}--></span>
						<a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$value[fuid]&confirm=1&handlekey=afifriendhk_{$value[uid]}" id="afi_$value[fuid]" class="dialog y" style="margin-right: 10px;">{lang ignore}</a>
						<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[fuid]&handlekey=afrfriendhk_{$value[uid]}" id="afr_$value[fuid]" class="dialog y" style="margin-right: 10px;">{lang confirm_applications}</a>
					</div>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{if $multi}-->
		<div class="pgs cl mtm">$multi</div>
		<!--{/if}-->
	<!--{else}-->
		<div class="clear"></div>
	    <div class="grey hm">{lang find_know_nofound}</div>
	<!--{/if}-->
	</div>
	</div>
	</div>
  
<!--{elseif $op=='getcfriend'}-->
  
	<h3 class="flb getcfriend">
		<em id="return_$_GET[handlekey]">{lang common_friends}</em> 
		<!--{if $_G[inajax]}--><span><a href="javascript:;" onclick="hideWindow('$_GET[handlekey]');" class="flbc" title="{lang close}">{lang close}</a></span><!--{/if}--> 
	</h3>
	<div class="c" style="width: 370px;"> 
		<!--{if $list}--> 
			<!--{if count($list)>14}-->
			<p>{lang max_view_15_friends}</p>
			<!--{else}-->
			<p>{lang you_have_common_friends}</p>
			<!--{/if}-->
			<ul class="mtm ml mls cl">
				<!--{loop $list $key $value}-->
				<li>
					<div class="avt"><a href="home.php?mod=space&uid=$value[uid]"><!--{avatar($value[uid],small)}--></a></div>
					<p><a href="home.php?mod=space&uid=$value[uid]" title="$value[username]">$value[username]</a></p>
				</li>
				<!--{/loop}-->
			</ul>
		<!--{else}-->
		<p>{lang you_have_no_common_friends}</p>
		<!--{/if}--> 
	</div>
  
<!--{elseif $op=='add'}-->

	<div class="tip tip_addfriend cl">
		<form method="post" autocomplete="off" id="addform_{$tospace[uid]}" name="addform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="addsubmit" value="true" />
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="bz-bg-f5 cl bzbb1 b_p">
				<!--{if $_G[inajax]}-->
				<a href="javascript:;" onclick="popup.close();" class="delete"><i class="banzhuan_font icon-close grey"></i></a>
				<!--{/if}-->
				<!--{if $tospace[uid]}-->
				<a href="home.php?mod=space&uid=$tospace[uid]&do=profile" class="avatar"><!--{avatar($tospace[uid],middle)}--></a>
				<!--{else}-->
				{lang username}: <input type="text" name="username" value="" />
				<!--{/if}-->
				<p class="mbm grey">{lang add}<span class="blue"> {$tospace[username]} </span>&#20026;&#22909;&#21451;</p>
			</div>
			<div class="cl detail b_p15">
				<textarea name="note" rows="1" class="txt" placeholder="&#38468;&#35328;"></textarea>
				<p class="mtn">
					<select name="gid" class="sort_sel">
						<!--{loop $groups $key $value}-->
						<option value="$key" {if empty($space['privacy']['groupname']) && $key==1} selected="selected"{/if}>{lang friend_group}: $value</option>
						<!--{/loop}-->
					</select>
				</p>
				<div class="mtm btn-big">
					<button type="submit" name="addsubmit_btn" id="addsubmit_btn" value="true" class="touch">{lang add_friend}</button>
				</div>
			</div>
		</form>
	</div>

<!--{elseif $op=='add2'}-->

	<div class="tip tip_addfriend cl">
		<form method="post" autocomplete="off" id="addratifyform_{$tospace[uid]}" name="addratifyform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="add2submit" value="true" />
			<input type="hidden" name="from" value="$_GET[from]" />
			<!--{if $_G[inajax]}-->
			<input type="hidden" name="handlekey" value="$_GET[handlekey]" />
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<div class="bz-bg-f5 cl bzbb1 b_p">
				<!--{if $_G[inajax]}-->
				<a href="javascript:;" onclick="popup.close();" class="delete"><i class="banzhuan_font icon-close grey"></i></a>
				<!--{/if}-->
				<a href="home.php?mod=space&uid=$tospace[uid]&do=profile" class="avatar"><!--{avatar($tospace[uid],middle)}--></a>
				<p class="mbm grey">{lang approval}<span class="blue"> {$tospace[username]} </span>&#30340;&#22909;&#21451;&#35831;&#27714;</p>
			</div>
			<div class="cl detail b_p15">
				<p class="mtn">
					<select name="gid" class="sort_sel">
						<!--{loop $groups $key $value}-->
						<option value="$key" {if empty($space['privacy']['groupname']) && $key==1} selected="selected"{/if}>{lang friend_group}: $value</option>
						<!--{/loop}-->
					</select>
				</p>
				<div class="mtm btn-big">
					<button type="submit" name="add2submit_btn" value="true" class="touch">{lang approval}</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		function succeedhandle_$_GET[handlekey](url, msg, values) {
		if(values['from'] == 'notice') {
		deleteQueryNotice(values['uid'], 'pendingFriend');
		} else {
		myfriend_post(values['uid']);
		}
		}
	</script> 
	
<!--{elseif $op=='getinviteuser'}-->

	$jsstr

<!--{/if}-->

<!--{template common/footer}-->

