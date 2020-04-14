<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $param['login']}-->
	<!--{if $_G['inajax']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login&inajax=1&infloat=1');exit;}-->
	<!--{else}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
	<!--{/if}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if $_G['inajax']}-->
<div class="tip">
	<dt id="messagetext">
		<p>$show_message</p>
        <!--{if $_G['forcemobilemessage']}-->
        	<p>
            	<a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
            <a href="javascript:history.back();">{lang goback}</a>
        </p>
        <!--{/if}-->
		<!--{if $url_forward && !$_GET['loc']}-->
			<!--<p><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>-->
			<script type="text/javascript">
				setTimeout(function() {
					window.location.href = '$url_forward';
				}, '1500');
			</script>
		<!--{elseif $allowreturn}-->
			<script type="text/javascript">
				setTimeout(function() {
					window.location.href = '';
				}, '1500');
			</script>
		<!--{/if}-->
	</dt>
</div>
<!--{else}-->

<!--{if $_G['setting']['domain']['app']['mobile']}-->
	{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
<!--{else}-->
	{eval $nav = "forum.php";}
<!--{/if}-->

<div class="hm">
	<div class="jump_c">
		<div class="hm" style="height: 50px;"><div class="k-loader k-circle"></div></div>
		<p class="hm">$show_message</p>
	    <!--{if $_G['forcemobilemessage']}-->
			<p>
	            <a href="{$_G['setting']['mobile']['pageurl']}" class="mtn">{lang continue}</a><br />
	            <a href="javascript:history.back();">{lang goback}</a>
	        </p>
	    <!--{/if}-->
		<!--{if $url_forward}-->
			<p class="hm"><a class="grey" href="$url_forward">{lang message_forward_mobile}</a></p>
		<!--{elseif $allowreturn}-->
			<p class="hm"><a href="javascript:history.back();">{lang message_go_back}</a></p>
		<!--{/if}-->
	</div>
</div>

<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
