<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{if $op != ''}-->
<div class="b_p hm grey">{lang user_mobile_pm_error}</div>
<!--{else}-->
<form id="pmform_{$pmid}" name="pmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=send&touid=$touid&pmid=$pmid&mobile=2" >
	<input type="hidden" name="referer" value="{echo dreferer();}" />
	<input type="hidden" name="pmsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="pmsubmit_btn" value="yes" />
	<div class="bz-header">
		<div class="bz-header-left"><a href="home.php?mod=space&do=pm" class="banzhuan_font icon-fanhui1"></a></div>
		<h2>&#21457;&#31169;&#20449;</h2>
		<div class="bz-header-right"><a><button id="pmsubmit_btn" class="btn_pn_pm btn_pn_grey_pm" disable="true"><span>{lang sendpm}</span></button></a></div>
	</div>
	<div class="b_p15">
		<div class="bz_post_msg_from">
			<ul>
				<!--{if !$touid}-->
				<li><input type="text" value="" tabindex="1" class="input" autocomplete="off" id="username" name="username" placeholder="{lang addressee}{lang username}"></li>
				<!--{/if}-->
				<li>
					<textarea class="textarea" tabindex="2" autocomplete="off" value="" id="sendmessage" name="message" cols="80" rows="10" placeholder="{lang thread_content}"></textarea>
				</li>
			</ul>
		</div>
	</div>
</form>
<script type="text/javascript">
	(function() {
		$('#sendmessage').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				$('.btn_pn_pm').removeClass('btn_pn_grey_pm').addClass('btn_pn_blue_pm');
				$('.btn_pn_pm').attr('disable', 'false');
			} else {
				$('.btn_pn_pm').removeClass('btn_pn_blue_pm').addClass('btn_pn_grey_pm');
				$('.btn_pn_pm').attr('disable', 'true');
			}
		});
		var form = $('#pmform_{$pmid}');
		$('#pmsubmit_btn').on('click', function() {
			var obj = $(this);
			if(obj.attr('disable') == 'true') {
				return false;
			}
			$.ajax({
				type:'POST',
				url:form.attr('action') + '&handlekey='+form.attr('id')+'&inajax=1',
				data:form.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				popup.open('{lang networkerror}', 'alert');
			});
			return false;
			});
	 })();
</script>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
