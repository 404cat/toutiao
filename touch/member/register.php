<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
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
<div class="loginbox registerbox">
	<div class="login_from">
	<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}&mobile=2">
		<input type="hidden" name="regsubmit" value="yes" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
		<input type="hidden" name="referer" value="$dreferer" />
		<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
		<ul>
			<li><input type="text" tabindex="1" class="bz-lore-input" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang registerinputtip}" fwin="login"></li>
			<li><input type="password" tabindex="2" class="bz-lore-input" size="30" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{lang login_password}" fwin="login"></li>
			<li><input type="password" tabindex="3" class="bz-lore-input" size="30" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{lang registerpassword2}" fwin="login"></li>
			<li class="bl_none"><input type="email" tabindex="4" class="bz-lore-input" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
			<!--{if empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)}-->
			<li><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="bz-lore-input" size="30" value="" placeholder="{lang invite_code}" fwin="login"></li>
			<!--{/if}-->
			<!--{if $_G['setting']['regverify'] == 2}-->
			<li><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="bz-lore-input" size="30" value="" placeholder="{lang register_message}" fwin="login"></li>
			<!--{/if}-->
		</ul>
		<!--{if $secqaacheck || $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
		<!--{/if}-->
	</div>
	<p class="mtw mbw cl b_plr10">
		<!--{if $bbrules}-->
		<input type="checkbox" class="pc" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" /><label for="agreebbrule" class="grey">{lang agree}<a href="#BzBBRules" class="blue BzBBRules"> {lang rulemessage}</a></label>
		<!--{/if}-->
		<input type="reset" value="{lang reset}" class="y grey bz_reset" />
	</p>
	<div class="btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog pn"><span>{lang quickregister}</span></button></div>
	</form>
	<p class="reg_link hm">
		<a href="member.php?mod=logging&action=login" class="blue">{lang login}</a>
	</p>
</div>

<!--{if $bbrules}-->

<div id="BzBBRules" class="BzBBRules" style="display: none;">
    <div class="BzBBRulesBox">
    		<h2 class="hm">{lang rulemessage}</h2>
   	 	<div class="BzBBRulesBoxTxt">
   	 		$bbrulestxt
   	 	</div>
    </div>
    <div href="#BzBBRules" class="BzBBRulesMask MaskBg"></div>
	<div href="#BzBBRules" class="BzBBRulesClose blue">{lang agree}</div>
</div>
<script type="text/javascript">
	(function() {
		$('.BzBBRules').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
	 (function() {
		$('.BzBBRulesMask').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
	 (function() {
		$('.BzBBRulesClose').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<!--{/if}-->

<div class="bz_bottom"></div>
<!--{eval updatesession();}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
