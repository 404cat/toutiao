<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $value[msgfromid] != $_G['uid']}-->
<div class="friend_msg cl">
	<div class="avat z">
		<a href="home.php?mod=space&uid=$value[msgfromid]&do=profile">
			<img src="<!--{avatar($value[msgfromid], middle, true)}-->" />
		</a>
	</div>
	<div class="dialog_green z">
		<div class="dialog_name">{$value[author]}</div>
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{else}-->
<div class="self_msg cl">
	<div class="avat y">
		<a href="home.php?mod=space&uid=$_G['uid']&do=profile">
			<img src="<!--{avatar($value[msgfromid], middle, true)}-->" />
		</a>
	</div>
	<div class="dialog_white y">
		<div class="dialog_c">
			<div class="dialog_t">$value[message]</div>
		</div>
		<div class="dialog_b"></div>
		<div class="date"><!--{date($value[dateline], 'u')}--></div>
	</div>
</div>
<!--{/if}-->
