<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->

<!--{if !$_GET['lostpasswd']}-->
{eval $loginhash = 'L'.random(4);}
<!--{if $_GET[infloat]}-->
<!--{else}-->
<div class="bz-lore-header">
	<div class="logo">
		<div class="logo-header">
			<div class="logo-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
			<div class="logo-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
		</div>
		<img src="./template/banzhuan_xmbbs/touch/xmbbs/images/logo.png" />
	</div>
	<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
</div>
<!--{/if}-->
<!--{if $_GET[infloat]}-->
<h2 class="log_tit"><a href="javascript:;" onclick="popup.close();" class="banzhuan_font icon-delete"></a></h2>
<!--{/if}-->
<div class="loginbox<!--{if $_GET[infloat]}--> login_pop<!--{/if}-->">
	<form id="loginform" method="post" action="member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$loginhash&mobile=2" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('password3_$loginhash');{/if}" >
		<input type="hidden" name="formhash" id="formhash" value='{FORMHASH}' />
		<input type="hidden" name="referer" id="referer" value="<!--{if dreferer()}-->{echo dreferer()}<!--{else}-->forum.php?mobile=2<!--{/if}-->" />
		<input type="hidden" name="fastloginfield" value="username">
		<input type="hidden" name="cookietime" value="2592000">
		<!--{if $auth}-->
		<input type="hidden" name="auth" value="$auth" />
		<!--{/if}-->
		<div class="login_from">
			<ul>
				<li class="flexbox">
					<span class="name"><i class="banzhuan_font icon-yonghu-xianxing icon"></i></span>
					<span class="flex"><input type="text" value="" tabindex="1" class="bz-lore-input" size="30" autocomplete="off" value="" name="username" {if $_G['setting']['autoidselect']}placeholder="{lang username}/Email{if getglobal('setting/uidlogin')}/UID{/if}"{else}placeholder="{lang username}"{/if} fwin="login"></span>
				</li>
				<li class="flexbox">
					<span class="name"><i class="banzhuan_font icon-unlock icon"></i></span>
					<span class="flex"><input type="password" tabindex="2" class="bz-lore-input" size="30" value="" name="password" placeholder="{lang login_password}" fwin="login"></span>
				</li>
				<li class="questionli">
					<div class="login_select">
						<span class="login-btn-inner">
							<span class="login-btn-text">
								<span class="span_question">{lang security_question}</span><span class="banzhuan_font icon-gengduo y fz12"></span>
							</span>
						</span>
						<select id="questionid_{$loginhash}" name="questionid" class="sel_list">
							<option value="0" selected="selected">{lang security_question}</option>
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
				<li class="bl_none answerli" style="display:none;">
					<input type="text" name="answer" id="answer_{$loginhash}" class="bz-lore-input" size="30" placeholder="{lang security_a}">
				</li>
			</ul>
			<!--{if $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
			<!--{/if}-->
		</div>
		<p class="mtw mbw b_plr10">
			<label class="grey"><input type="checkbox" name="cookietime" id="cookietime_{$loginhash}" class="pc" value="2592000" checked="checked" />{lang login_permanent}</label>
			<input type="reset" value="{lang reset}" class="y grey bz_reset" />
		</p>
		<div class="btn_login"><button tabindex="3" value="true" name="submit" type="submit" class="formdialog pn"><span>{lang login}</span></button></div>
	</form>
	<p class="reg_link hm">
		<a href="member.php?mod=logging&action=login&lostpasswd=yes" class="grey">&#24536;&#35760;{lang login_password}?</a>
		<!--{if $_G['setting']['regstatus']}-->
		&nbsp;&nbsp;<em style="color: #D7D7D7;">|</em>&nbsp;&nbsp;&nbsp;<a href="member.php?mod={$_G[setting][regname]}" class="blue">$_G['setting']['reglinkname']</a>
		<!--{/if}-->
	</p>
	<!--{hook/logging_bottom_mobile}-->
	
	<div class="btn_qqlogin">
		<!--{if $_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']}-->
		<a href="$_G[connect][login_url]&statfrom=login_simple" class="banzhuan_font icon-qqnew rqq"></a>
		<!--{/if}-->
		<!--<a href="#" class="banzhuan_font icon-wechat rwx"></a>-->
		<!--<a href="#" class="banzhuan_font icon-shoujitianchong rphone"></a>-->
	</div>
   
</div>

<!--{else}-->

<!--{if $_GET[infloat]}-->
<!--{else}-->
<div class="bz-lore-header">
	<div class="logo">
		<div class="logo-header">
			<div class="logo-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
			<div class="logo-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
		</div>
		<img src="./template/banzhuan_xmbbs/touch/xmbbs/images/logo.png" />
	</div>
	<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
</div>
<!--{/if}-->
<div id="layer_lostpw_$loginhash" class="loginbox">
	<form method="post" autocomplete="off" id="lostpwform_$loginhash" action="member.php?mod=lostpasswd&lostpwsubmit=yes&infloat=yes">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="handlekey" value="lostpwform" />
		<div class="login_from">
			<ul>
				<li><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" placeholder="{lang email} *" class="bz-lore-input" /></li>
				<li><input type="text" name="username" id="lostpw_username" size="30" value="" placeholder="{lang username}" tabindex="1" class="bz-lore-input" /></li>			
			</ul>
		</div>
		<p class="mtw mbw b_plr10 cl"></p>
		<div class="btn_login"><button type="submit" name="lostpwsubmit" value="true" tabindex="100" class="formdialog pn"><span>{lang submit}</span></button></div>
	</form>
	<p class="reg_link hm">
		<a href="member.php?mod=logging&action=login" class="grey">{lang login}</a>
		<!--{if $_G['setting']['regstatus']}-->
		&nbsp;&nbsp;<em style="color: #D7D7D7;">|</em>&nbsp;&nbsp;&nbsp;<a href="member.php?mod={$_G[setting][regname]}" class="grey">$_G['setting']['reglinkname']</a>
		<!--{/if}-->
	</p>
</div>

<!--{/if}-->

<!--{if $_G['setting']['pwdsafety']}-->
	<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
<!--{/if}-->
<!--{eval updatesession();}-->

<script type="text/javascript">
	(function() {
		$(document).on('change', '.sel_list', function() {
			var obj = $(this);
			$('.span_question').text(obj.find('option:selected').text());
			if(obj.val() == 0) {
				$('.answerli').css('display', 'none');
				$('.questionli').addClass('bl_none');
			} else {
				$('.answerli').css('display', 'block');
				$('.questionli').removeClass('bl_none');
			}
		});
	 })();
</script>
<!--{if $_GET[infloat]}-->
<!--{else}-->
<div class="bz_bottom"></div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
