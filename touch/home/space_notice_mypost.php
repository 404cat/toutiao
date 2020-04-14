<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&do=pm" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{eval echo lang('template', 'notice_'.$view)}--></h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>

<!--{if $_G['notice_structure'][$view] && ($view == 'mypost' || $view == 'interactive')}-->
<div class="bz-notice-subtype cl">
	<!--{loop $_G['notice_structure'][$view] $subtype}-->
	<a href="home.php?mod=space&do=notice&view=$view&type=$subtype" $readtag[$subtype]><!--{eval echo lang('template', 'notice_'.$view.'_'.$subtype)}--><!--{if $_G['member']['newprompt_num'][$subtype]}--><em class="rq fz12">$_G['member']['newprompt_num'][$subtype]</em><!--{/if}--></a>
	<!--{/loop}-->
</div>
<!--{/if}-->
<!--{if $list}-->
	<div class="b_p15 bz-bg-fff">
		<div class="bznotice_system_list">
			<ul>
				<!--{loop $list $key $value}-->
				<li class="cl {if $key==1}bw0{/if}" $value[rowid] notice="$value[id]">
					<div class="avatar">
						<!--{if $value[authorid]}-->
						<a href="home.php?mod=space&uid=$value[authorid]&do=profile" class="bgicon-system"><!--{avatar($value[authorid],middle)}--></a>
						<!--{else}-->
						<a class="banzhuan_font icon-system bgicon-system"></a>
						<!--{/if}-->
					</div>
					<h2>
						<span class="grey"><!--{date($value[dateline], 'u')}--></span><a class="y grey dialog banzhuan_font icon-delete fz12" href="home.php?mod=spacecp&ac=common&op=ignore&authorid=$value[authorid]&type=$value[type]&handlekey=addfriendhk_{$value[authorid]}" id="a_note_$value[id]" title="{lang shield}"></a>
					</h2>
					<div class="ntc_body" style="$value[style]">$value[note]</div>
					<!--{if $value[from_num]}-->
					<div class="grey">{lang ignore_same_notice_message}</div>
					<!--{/if}-->
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{if $view!='userapp' && $space[notifications]}-->
		<div class="b_p hm grey"><a href="home.php?mod=space&do=notice&ignore=all">{lang ignore_same_notice_message} <em class="banzhuan_font icon-gengduo grey fz12"></em></a></div>
		<!--{/if}-->
	</div>
	<!--{if $multi}--><div class="pgs cl">$multi</div><!--{/if}-->
<!--{/if}-->
<!--{if empty($list)}-->
<div class="b_p hm grey">
	<!--{if $new == 1}-->
		{lang no_new_notice}<a href="home.php?mod=space&do=notice&isread=1">{lang view_old_notice}</a>
	<!--{else}-->
		{lang no_notice}
	<!--{/if}-->
</div>
<!--{/if}-->
