<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1&mobile=2" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{if $operation == 'password'}-->{lang password_security}<!--{else}-->{lang update_profile}<!--{/if}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>

<div class="cl">

<!--{if $validate}-->

	<div>
		<p class="tbmu mbm">{lang validator_comment}</p>
		<form action="member.php?mod=regverify" method="post" autocomplete="off" accept-charset="UTF-8">
			<input type="hidden" value="{FORMHASH}" name="formhash" />
			<table summary="{lang memcp_profile}" cellspacing="0" cellpadding="0" class="tfm">
				<tr>
					<th>{lang validator_remark}</th>
					<td>$validate[remark]</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<th>{lang validator_message}</th>
					<td><input type="text" class="px" name="regmessagenew" value="" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td colspan="2">
						<button type="submit" name="verifysubmit" value="true" class="button2" /><strong>{lang validator_submit}</strong></button>
					</td>
				</tr>
			</table>
	    </form>
	</div>
	<div class="appl">
		<div class="tbn">
			<h2 class="mt bbda">{lang setup}</h2>
			<ul>
				<li$actives[avatar]><a href="home.php?mod=spacecp&ac=avatar">{lang memcp_avatar}</a></li>
				<li$actives[profile]><a href="home.php?mod=spacecp&ac=profile">{lang memcp_profile}</a></li>
				<!--{if $_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']}-->
				<li$actives[verify]><a href="{if $_G['setting']['verify']['enabled']}home.php?mod=spacecp&ac=profile&op=verify{else}home.php?mod=spacecp&ac=videophoto{/if}">{lang memcp_verify}</a></li>
				<!--{/if}-->
				<li$actives[credit]><a href="home.php?mod=spacecp&ac=credit">{lang memcp_credit}</a></li>
				<li$actives[usergroup]><a href="home.php?mod=spacecp&ac=usergroup">{lang memcp_usergroup}</a></li>
				<li$actives[privacy]><a href="home.php?mod=spacecp&ac=privacy">{lang memcp_privacy}</a></li>
				
				<!--{if $_G['setting']['sendmailday']}--><li$actives[sendmail]><a href="home.php?mod=spacecp&ac=sendmail">{lang memcp_sendmail}</a></li><!--{/if}-->
				<li$actives[password]><a href="home.php?mod=spacecp&ac=profile&op=password">{lang password_security}</a></li>
		
				<!--{if $_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']}-->
				<li$actives[promotion]><a href="home.php?mod=spacecp&ac=promotion">{lang memcp_promotion}</a></li>
				<!--{/if}-->
				<!--{if !empty($_G['setting']['plugins']['spacecp'])}-->
					<!--{loop $_G['setting']['plugins']['spacecp'] $id $module}-->
						<!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}--><li{if $_GET[id] == $id} class="a"{/if}><a href="home.php?mod=spacecp&ac=plugin&id=$id">$module[name]</a></li><!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
			</ul>
		</div>
    </div>

<!--{else}-->

	<!--{if $operation == 'password'}-->

	<div class="b_p15 bz-profile-password">
	    <script type="text/javascript" src="{$_G[setting][jspath]}register.js?{VERHASH}"></script>
	    <div class="b_p hm cl grey">
        <!--{if !$_G['member']['freeze']}-->
            <!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->{lang old_password_comment}<!--{elseif $wechatuser}-->{lang wechat_config_newpassword_comment}<!--{else}-->{lang connect_config_newpassword_comment}<!--{/if}-->
        <!--{elseif $_G['member']['freeze'] == 1}-->
            <strong class="xi1">{lang freeze_pw_tips}</strong>
        <!--{elseif $_G['member']['freeze'] == 2}-->
            <strong class="xi1">{lang freeze_email_tips}</strong>
        <!--{/if}-->
	    </div>
	    <form action="home.php?mod=spacecp&ac=profile" method="post" autocomplete="off">
	        <input type="hidden" value="{FORMHASH}" name="formhash" />
	        <ul>
	            <!--{if !$_G['setting']['connect']['allow'] || !$conisregister}-->
	            <li><input type="password" name="oldpassword" id="oldpassword" class="bz-input" placeholder="{lang old_password} * " /></li>
	            <!--{/if}-->
	            <li><input type="password" name="newpassword" id="newpassword" class="bz-input" placeholder="{lang new_password}" /></li>
	            <li><input type="password" name="newpassword2" id="newpassword2" class="bz-input" placeholder="{lang new_password_confirm}" /></li>
	            <li id="contact"{if $_GET[from] == 'contact'}{/if}><input type="text" name="emailnew" id="emailnew" value="$space[email]" class="bz-input" placeholder="{lang email}" /></li>
	            <li>
	                <div class="grey"><!--{if empty($space['newemail'])}-->{lang email_been_active}<!--{else}-->$acitvemessage<!--{/if}--></div>
	                <!--{if $_G['setting']['regverify'] == 1 && (($_G['group']['grouptype'] == 'member' && $_G['adminid'] == 0) || $_G['groupid'] == 8) || $_G['member']['freeze']}--><p class="d">{lang memcp_profile_email_comment}</p><!--{/if}-->
	            </li>
	            <!--{if $_G['member']['freeze'] == 2}-->
	            <li>
					<textarea rows="4" cols="80" name="freezereson" class="txt_s" placeholder="{lang freeze_reason}">$space[freezereson]</textarea>
	            </li>
	           	<!--{/if}-->
	            <li>
	                <div class="cp_select">
	                    <select name="questionidnew" id="questionidnew" class="sel_list">
	                        <option value="" selected>{lang memcp_profile_security_keep}</option>
	                        <option value="0">{lang security_question_0}</option>
	                        <option value="1">{lang security_question_1}</option>
	                        <option value="2">{lang security_question_2}</option>
	                        <option value="3">{lang security_question_3}</option>
	                        <option value="4">{lang security_question_4}</option>
	                        <option value="5">{lang security_question_5}</option>
	                        <option value="6">{lang security_question_6}</option>
	                        <option value="7">{lang security_question_7}</option>
	                    </select>
	                </div>
	            </li>
	            <li>
		            	<input type="text" name="answernew" id="answernew" class="bz-input" placeholder="{lang security_answer}" />
		            	<p class="fz12 grey" style="font-style: italic;">{lang memcp_profile_security_comment}</p>
	            </li>
	            <!--{if $secqaacheck || $seccodecheck}-->
	        </ul>
	            <!--{eval $sectpl = '<table cellspacing="0" cellpadding="0" class="tfm"><li><em><sec></em><div><sec><p class="d"><sec></p></div></li></table>';}-->
	            <!--{subtemplate common/seccheck}-->
	        <ul class="cl">
	            <!--{/if}-->
	            <div class="mbw mtw">
					<div class="btn-big">
						<button type="submit" name="pwdsubmit" value="true" class="touch" />{lang save}</button>
					</div>
				</div>
	        	</ul>
	        <input type="hidden" name="passwordsubmit" value="true" />
	    </form>
	    <script type="text/javascript">
	        var strongpw = new Array();
	        <!--{if $_G['setting']['strongpw']}-->
	            <!--{loop $_G['setting']['strongpw'] $key $val}-->
	            strongpw[$key] = $val;
	            <!--{/loop}-->
	        <!--{/if}-->
	        var pwlength = <!--{if $_G['setting']['pwlength']}-->$_G['setting']['pwlength']<!--{else}-->0<!--{/if}-->;
	        checkPwdComplexity($('newpassword'), $('newpassword2'), true);
	    </script>
	</div>
	<div class="bz_bottom"></div>
	
	<!--{else}-->
	
    <div class="bz-profile-setlist-nav cl">
	<!--{if $operation != 'verify'}-->
		<!--{loop $profilegroup $key $value}-->
		<!--{if $value[available]}-->
		<a href="home.php?mod=spacecp&ac=profile&op=$key" $opactives[$key]>$value[title]</a>
		<!--{/if}-->
		<!--{/loop}-->
		<!--{if $_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength')}-->
		<a href="home.php?mod=spacecp&ac=domain" $opactives[domain]>{lang space_domain}</a>
		<!--{/if}-->
	<!--{else}-->
		<!--{if $_G[setting][verify]}-->
			<!--{loop $_G['setting']['verify'] $vid $verify}-->
			<!--{if $verify['available'] && (empty($verify['groupid']) || in_array($_G['groupid'], $verify['groupid']))}-->
				<!--{if $vid != 7}-->
				<a href="home.php?mod=spacecp&ac=profile&op=verify&vid=$vid" $opactives['verify'.$vid]>$verify['title']</a>
				<!--{elseif $_G['setting']['my_app_status'] && $vid == 7}-->
				<a href="home.php?mod=spacecp&ac=videophoto" $opactives[videophoto]>{lang video_certification}</a>
				<!--{/if}-->
			<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
	<!--{/if}-->
	<!--{if $op != 'verify' && !empty($_G['setting']['plugins']['spacecp_profile'])}-->
		<!--{loop $_G['setting']['plugins']['spacecp_profile'] $id $module}-->
		<!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}-->
		<a href="home.php?mod=spacecp&ac=plugin&op=profile&id=$id"{if $_GET[id] == $id} class="a"{/if}>$module[name]</a>
		<!--{/if}-->
		<!--{/loop}-->
	<!--{/if}-->
	</div>
	<div class="clear"></div>
	<div class="cl">
		<!--{if $vid}-->
		<p class="tbms mtm {if !$showbtn}tbms_r{/if}"><!--{if $showbtn}-->{lang spacecp_profile_message1}<!--{else}-->{lang spacecp_profile_message2}<!--{/if}--></p>
		<!--{/if}-->
		<iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
		<form action="{if $operation != 'plugin'}home.php?mod=spacecp&ac=profile&op=$operation{else}home.php?mod=spacecp&ac=plugin&op=profile&id=$_GET[id]{/if}" method="post" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off"{if $operation != 'plugin'} target="frame_profile"{/if} class="banzhuan-clear">
			<input type="hidden" value="{FORMHASH}" name="formhash" />
			<!--{if $_GET[vid]}-->
			<input type="hidden" value="$_GET[vid]" name="vid" />
			<!--{/if}-->
			<div class="b_p15 bzbt1 bzbb1">
			<div class="bz-profile-setlist">
				<ul>
					<!--{loop $settings $key $value}-->
					<!--{if $value[available]}-->
					<!--{if $value[formtype] == 'textarea'}-->
						<li class="bztextarea" id="tr_$key">
							<div class="cl label_nameprivacy">
								<div class="label_name z grey" id="th_$key">$value[title]<!--{if $value[required]}--><span class="rq">*</span><!--{/if}--></div>
								<div class="label_privacy y {$privacy[$key]}">
									<!--{if $vid}-->
									<input type="hidden" name="privacy[$key]" value="3" />
									<!--{else}-->
									<select name="privacy[$key]">
									<option value="0"{if $privacy[$key] == "0"} selected="selected"{/if}>{lang open_privacy}</option>
									<option value="1"{if $privacy[$key] == "1"} selected="selected"{/if}>{lang friend_privacy}</option>
									<option value="3"{if $privacy[$key] == "3"} selected="selected"{/if}>{lang secrecy}</option>
									</select>
									<!--{/if}-->
								</div>
							</div>
							<div class="label_txt $value[formtype]" id="td_$key">$htmls[$key]</div>
						</li>
			        <!--{else}-->
						<li class="bzinputselect" id="tr_$key">
							<div class="label_name grey" id="th_$key">$value[title] <!--{if $value[required]}--><span class="rq">*</span><!--{/if}--></div>
							<div class="label_txt $value[formtype]" id="td_$key">
								<!--{if in_array($value['fieldid'], array('birthcity','residecity'))}-->
								<div>$htmls[$key]</div>
								<!--{else}-->
								$htmls[$key]
								<!--{/if}-->
							</div>
							<div class="label_privacy {$privacy[$key]}">
								<!--{if $vid}-->
								<input type="hidden" name="privacy[$key]" value="3" />
								<!--{else}-->
								<select name="privacy[$key]">
								<option value="0"{if $privacy[$key] == "0"} selected="selected"{/if}>{lang open_privacy}</option>
								<option value="1"{if $privacy[$key] == "1"} selected="selected"{/if}>{lang friend_privacy}</option>
								<option value="3"{if $privacy[$key] == "3"} selected="selected"{/if}>{lang secrecy}</option>
								</select>
								<!--{/if}-->
							</div>
						</li>
			        <!--{/if}-->
					<!--{/if}-->
					<!--{/loop}-->
					<!--{if $allowcstatus && in_array('customstatus', $allowitems)}-->
					<li class="bztextarea">
						<div class="cl">
							<div class="label_name grey" id="th_customstatus">{lang permission_basic_status}</div>
						</div>
						<div class="label_txt" id="td_customstatus">
							<input type="text" value="$space[customstatus]" name="customstatus" id="customstatus" class="txt_s" />
							<div class="rq" id="showerror_customstatus"></div>
						</div>
					</li>
					<!--{/if}-->
					<!--{if $_G['group']['maxsigsize'] && in_array('sightml', $allowitems)}-->
					<li class="bztextarea">
						<div class="cl">
							<div class="label_name grey" id="th_sightml">{lang personal_signature}</div>
						</div>
						<div class="label_txt" id="td_sightml">
							<div class="cl">
								<textarea rows="3" cols="80" name="sightml" id="sightmlmessage" onkeydown="ctrlEnter(event, 'profilesubmitbtn');">$space[sightml]</textarea>
							</div>
							<div id="signhtmlpreview"></div>
							<div id="showerror_sightml" class="rq"></div>
							<script type="text/javascript" src="{$_G[setting][jspath]}bbcode.js?{VERHASH}"></script>
							<script type="text/javascript">var forumallowhtml = 0,allowhtml = 0,allowsmilies = 0,allowbbcode = parseInt('{$_G[group][allowsigbbcode]}'),allowimgcode = parseInt('{$_G[group][allowsigimgcode]}');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];</script>
						</div>
					</li>
					<!--{/if}-->
					<!--
					<!--{if $operation == 'contact'}-->
						<tr>
							<th id="th_sightml">Email</th>
							<td id="td_sightml">$space[email]&nbsp;(<a href="home.php?mod=spacecp&ac=profile&op=password&from=contact#contact">{lang modify}</a>)</td>
							<td>&nbsp;</td>
						</tr>
					<!--{/if}-->
					-->
					<!--{if $operation == 'plugin'}-->
						<!--{eval include(template($_GET['id']));}-->
					<!--{/if}-->
				</ul>
			</div>
			</div>
			<!--{if $showbtn}-->
			<div class="b_p15">
				<div class="btn-big">
					<input type="hidden" name="profilesubmit" value="true" />
					<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="touch" /><strong>{lang save}</strong></button>
					<span id="submit_result" class="rq"></span>
				</div>
			</div>
			<!--{/if}-->
			<div class="bz_bottom"></div>
		</form>
		<script type="text/javascript">
	       
	        function show_error(fieldid, extrainfo) {
				var elem = $('#tr_'+fieldid);
				if(elem) {
					fieldname = elem.find('.label_name').text();
					popup.open('{lang check_date_item}: ' + fieldname, 'alert');
					$('#'+fieldid).focus();
				}
			}
	        function show_success(message) {
				message = message == '' ? '{lang update_date_success}' : message;
				popup.open('<div class="bztip_success">'+message+'</div');
				setTimeout(function() {
					popup.close();
				}, '1500');
			}
	        function clearErrorInfo() {
	            var spanObj = $('profilelist').getElementsByTagName("div");
	            for(var i in spanObj) {
	                if(typeof spanObj[i].id != "undefined" && spanObj[i].id.indexOf("_")) {
	                    var ids = explode('_', spanObj[i].id);
	                    if(ids[0] == "showerror") {
	                        spanObj[i].innerHTML = '';
	                        $('th_'+ids[1]).className = '';
	                    }
	                }
	            }
	        }
    		</script>
	</div>
	<!--{/if}-->

<!--{/if}-->

</div>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->

