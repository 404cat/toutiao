<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz_com_tip cl">
<!--{if in_array($_GET[action], array('delpost', 'banpost', 'warn'))}-->
	<form id="topicadminform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&action=$_GET[action]&modsubmit=yes&modclick=yes&mobile=2" >
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="fid" value="$_G[fid]" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="page" value="$_G[page]" />
		<input type="hidden" name="reason" value="{lang topicadmin_mobile_mod}" />
	    <!--{if $_GET[action] == 'delpost'}-->
	        <dt>{lang admin_delpost_confirm}</dt>
	        $deleteid
			<dd>
				<a href="javascript:;" onclick="popup.close();" class="bz_com_btn_close grey">{lang cancel}</a>
				<input type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog bz_com_btn_confirm">
			</dd>
		<!--{elseif $_GET[action] == 'banpost'}-->
			<dt>
	            <p>{lang admin_banpost_confirm}</p>
	            $banid
	            <p><label><input type="radio" name="banned" class="pr" value="1" $checkban />{lang admin_banpost}</label></p>
				<p><label><input type="radio" name="banned" class="pr" value="0" $checkunban />{lang admin_unbanpost}</label></p>
			</dt>
			<dd>
				<a href="javascript:;" onclick="popup.close();" class="bz_com_btn_close grey">{lang cancel}</a>
				<input type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog bz_com_btn_confirm">
			</dd>
	    <!--{elseif $_GET[action] == 'warn'}-->
			<dt>
	            <p>{lang admin_warn_confirm}</p>
	            $warnpid
	            <p><label><input type="radio" name="warned" class="pr" value="1" $checkwarn />{lang topicadmin_warn_add}</label></p>
				<p><label><input type="radio" name="warned" class="pr" value="0" $checkunwarn />{lang topicadmin_warn_delete}</label></p>
			</dt>
			<dd>
				<a href="javascript:;" onclick="popup.close();" class="bz_com_btn_close grey">{lang cancel}</a>
				<input type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog bz_com_btn_confirm">
			</dd>
	    <!--{/if}-->
    </form>

<!--{else}-->
    <dt><em>{lang admin_threadtopicadmin_error}</em></dt>
	<dd class="hm"><input type="button" onclick="popup.close();" value="{lang confirms}" class="button2" /></dd>
<!--{/if}-->
</div>
<!--{template common/footer}-->
