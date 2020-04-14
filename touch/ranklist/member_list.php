<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $list}-->
<div class="bz_member_ist">
	<ul>
	<!--{loop $list $key $value}-->
	<li>
		<a href="home.php?mod=space&uid=$value[uid]&do=profile">
			<span class="ranknum grey"><!--{if $value[rank] <= 3}-->$value[rank]<!--{else}-->$value[rank]<!--{/if}--></span>
			<!--{avatar($value[uid],middle)}-->
			<span class="name">$value[username]</span><!--{if $value['gender'] == 1}--><i class="rmale fz12 banzhuan_font icon-nan"></i><!--{elseif $value['gender'] == 2}--><i class="rfemale fz12 banzhuan_font icon-nv"></i><!--{/if}-->
			<span class="y fz12 grey">
			<!--{if $value['credits']}-->$value[credits]{lang credits}<!--{/if}-->
			<!--{if $value['posts']}-->$value[posts]{lang posts}<!--{/if}-->
			</span>
		</a>
	</li>
	<!--{/loop}-->
	</ul>
	<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
</div>
<!--{else}-->
<div class="emp hm grey fz12 b_p mtm mbm">{lang no_members_of}</div>
<!--{/if}-->

<!--{if $cachetip}--><div class="notice hm grey fz12 b_p mtw">{lang ranklist_update}</div><!--{/if}-->

