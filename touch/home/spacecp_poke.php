<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{subtemplate home/spacecp_poke_type}-->

<!--{if !$_G[inajax]}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&do=pm" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang myitem}{lang poke}</h2>
	<div class="bz-header-right">
		<!--{if $op == 'send'}-->
		<a href="home.php?mod=spacecp&ac=poke"><em>&#25105;{lang poke_received}</em></a>
		<!--{else}-->
		<a href="home.php?mod=spacecp&ac=poke&op=send"><em>&#21435;{lang say_hi}</em></a>
		<!--{/if}-->
	</div>
</div>
<div class="b_p15">
<!--{/if}-->

<!--{if $op == 'send' || $op == 'reply'}-->

		<div class="{if $_G[inajax]}tip {/if}tip_poke cl">
			<form method="post" autocomplete="off" id="pokeform_{$tospace[uid]}" name="pokeform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=poke&op=$op&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}">
				<input type="hidden" name="pokesubmit" value="true" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="from" value="$_GET[from]" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<div class="{if $_G[inajax]}bg bzbb1 {/if}{if $tospace[uid]}bzbb1 {/if}cl b_p">
					<!--{if $_G[inajax]}-->
					<a href="javascript:;" onclick="popup.close();" class="delete"><i class="banzhuan_font icon-delete grey"></i></a>
					<!--{/if}-->
					<!--{if $tospace[uid]}-->
					<a href="home.php?mod=space&uid=$tospace[uid]&do=profile" class="avatar"><!--{avatar($tospace[uid],middle)}--></a>
					<p class="mbm grey">{lang to}<span class="blue"> {$tospace[username]} </span>{lang say_hi}</p>
					<!--{else}-->
					<input type="text" name="username" value="" placeholder="{lang username}" class="bz-input" />
					<!--{/if}-->
				</div>
				<div class="cl detail b_p15">
					<div class="mtn">
						<ul class="poke_list cl">
						<!--{loop $icons $k $v}-->
						<li><label for="poke_$k"><input type="radio" name="iconid" id="poke_$k" value="{$k}" {if $k==3}checked="checked"{/if} />{$v}</label></li>
						<!--{/loop}-->
						</ul>
					</div>
					<div class="mtm">
						<input type="text" name="note" id="note" value="" size="30" onkeydown="ctrlEnter(event, 'pokesubmit_btn', 1);" placeholder="{lang thread_content}" class="bz-input" />
						<p class="fz12 grey poke_message mtn">{lang max_text_poke_message}</p>
					</div>
					<div class="mtm btn-big">
						<button type="submit" name="pokesubmit_btn" id="pokesubmit_btn" value="true" class="touch">{lang send}</button>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				function succeedhandle_{$_GET[handlekey]}(url, msg, values) {
					if(values['from'] == 'notice') {
						deleteQueryNotice(values['uid'], 'pokeQuery');
					}
					showCreditPrompt();
				}
			</script>
		</div>
		
<!--{elseif $op == 'view'}-->

		<!--{loop $list $key $subvalue}-->
		<p class="pbm mbm bbda">
			<!--{if $subvalue[fromuid]==$space[uid]}-->{lang me}<!--{else}--><a href="home.php?mod=space&uid=$subvalue[fromuid]" class="xi2">{$value[fromusername]}</a><!--{/if}-->:
			<span class="xw0">
				<!--{if $subvalue[iconid]}-->{$icons[$subvalue[iconid]]}<!--{else}-->{lang say_hi}<!--{/if}-->
				<!--{if $subvalue[note]}-->, {lang say}: $subvalue[note]<!--{/if}-->
				&nbsp; <span class="xg1"><!--{date($subvalue[dateline],'n-j H:i')}--></span>
			</span>
		</p>
		<!--{/loop}-->
		<div class="pbn ptm xg1 xw0">
			<a href="home.php?mod=spacecp&ac=poke&op=reply&uid=$value[uid]&handlekey=pokehk_{$value[uid]}" id="a_p_r_$value[uid]" onclick="showWindow(this.id, this.href, 'get', 0);">{lang back_to_say_hello}</a><span class="pipe">|</span>
			<a href="home.php?mod=spacecp&ac=poke&op=ignore&uid=$value[uid]" id="a_p_i_$value[uid]" onclick="showWindow('pokeignore', this.href, 'get', 0);">{lang ignore}</a>
			<!--{if !$value['isfriend']}--><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]&handlekey=addfriendhk_{$value[uid]}" id="a_friend_$value[uid]" onclick="showWindow(this.id, this.href, 'get', 0);">{lang add_friend}</a> <!--{/if}-->
		</div>
		
<!--{elseif $op == 'ignore'}-->

		<div class="tip tip_notice_ignore cl">
			<form method="post" autocomplete="off" id="friendform_{$uid}" name="friendform_{$uid}" action="home.php?mod=spacecp&ac=poke&op=ignore&uid=$uid" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}">
				<input type="hidden" name="ignoresubmit" value="true" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="from" value="$_GET[from]" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<div class="cl bzbb1 b_p15">
					<!--{if $_G[inajax]}-->
					<a href="javascript:;" onclick="popup.close();" class="close" title="{lang close}"><i class="banzhuan_font icon-delete grey"></i></a>
					<!--{/if}-->
					<p class="fz16"><em id="return_$_GET[handlekey]">{lang determine_lgnore_poke}</em></p>
				</div>
				<div class="cl detail b_p15">
					<div class="mtm btn-big">
						<button type="submit" name="ignoresubmit_btn" value="true" class="touch">{lang determine}</button>
					</div>
				</div>
			</form>
		</div>
		
<!--{else}-->

		<p class="mb15 cl"><a href="home.php?mod=spacecp&ac=poke&op=ignore" class="dialog y blue fz12">{lang ignore_all}</a></p>
		<!--{if $list}-->
		<div id="poke_ul" class="wbnotice_system_list">
			<ul>
			<!--{loop $list $key $value}-->
			<li id="poke_$value[uid]" class="cl">
				<div class="avatar">
					<a href="home.php?mod=space&uid=$value[uid]&do=profile" class="bgicon-system"><!--{avatar($value[uid],middle)}--></a>
				</div>
				<h2>
					<span class="grey"><!--{date($value[dateline], 'n-j H:i')}--></span>&nbsp;&nbsp;<a href="home.php?mod=spacecp&ac=poke&op=reply&uid=$value[uid]&handlekey=pokereply" class="blue dialog fz12">{lang back_to_say_hello}</a><a href="home.php?mod=spacecp&ac=poke&op=ignore&uid=$value[uid]&handlekey=pokeignore" class="y grey dialog banzhuan_font icon-pingbi fz12" title="{lang ignore}"></a>
				</h2>
				<div id="poke_td_$value[uid]" class="ntc_body">
					<a href="home.php?mod=space&uid=$value[fromuid]&do=profile" class="blue">{$value[fromusername]}</a>:&nbsp;&nbsp;<!--{if $value[iconid]}-->{$icons[$value[iconid]]}<!--{else}-->{lang say_hi}<!--{/if}--><!--{if $value[note]}-->, $value[note]<!--{/if}-->
				</div>
			</li>
			<!--{/loop}-->
			</ul>
		</div>
		<!--{if $multi}--><div class="pgs cl mtm">$multi</div><!--{/if}-->
		<!--{else}-->
		<div class="b_p hm grey">{lang no_new_poke}</div>
		<!--{/if}-->
		
<!--{/if}-->

<!--{if !$_G[inajax]}-->
</div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->