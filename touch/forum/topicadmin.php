<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz_com_tip cl">
<!--{if ($_GET['optgroup'] == 3 && $operation == 'delete') || ($_GET['optgroup'] == 4 && $operation == '')}-->
    <form id="moderateform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&action=moderate&optgroup=$optgroup&modsubmit=yes&mobile=2" >
        <input type="hidden" name="frommodcp" value="$frommodcp" />
        <input type="hidden" name="formhash" value="{FORMHASH}" />
        <input type="hidden" name="fid" value="$_G[fid]" />
        <input type="hidden" name="redirect" value="{echo dreferer()}" />
        <input type="hidden" name="reason" value="{lang topicadmin_mobile_mod}" />
        <!--{loop $threadlist $thread}-->
        <input type="hidden" name="moderate[]" value="$thread[tid]" />
        <!--{/loop}-->
        <!--{if $_GET['optgroup'] == 3}-->
            <!--{if $operation == 'delete'}-->
                <!--{if $_G['group']['allowdelpost']}-->
                    <input name="operations[]" type="hidden" value="delete"/>
                    <dt><em>{lang admin_delthread_confirm}</em></dt>
					<dd>
						<a href="javascript:;" onclick="popup.close();" class="bz_com_btn_close grey">{lang cancel}</a>
						<input type="submit" class="formdialog bz_com_btn_confirm" name="modsubmit" id="modsubmit" value="{lang confirms}">
					</dd>
                <!--{else}-->
                    <dt>{lang admin_delthread_nopermission}</dt>
                <!--{/if}-->
            <!--{/if}-->
        <!--{elseif $_GET['optgroup'] == 4}-->
			<dt>
	            <p>{lang expire}:</p>
	            <p><input type="text" name="expirationclose" id="expirationclose" class="bz-input" autocomplete="off" value="$expirationclose" /></p>
	            <p class="grey fz12">{lang admin_close_expire_comment}</p>
	            <p><label><input type="radio" name="operations[]" class="pr" value="open" $closecheck[0] />{lang admin_open}</label></p>
	            <p><label><input type="radio" name="operations[]" class="pr" value="close" $closecheck[1] />{lang admin_close}</label></p>
			</dt>
			<dd>
				<a href="javascript:;" onclick="popup.close();" class="bz_com_btn_close grey">{lang cancel}</a>
				<input type="submit" name="modsubmit" id="modsubmit"  value="{lang confirms}" class="formdialog bz_com_btn_confirm">
			</dd>
        <!--{/if}-->
    </form>
<!--{else}-->
    	<dt><em>{lang admin_threadtopicadmin_error}</em></dt>
	<dd class="hm"><input type="button" onclick="popup.close();" value="{lang confirms}" class="button2"></dd>
<!--{/if}-->
</div>
<!--{template common/footer}-->
