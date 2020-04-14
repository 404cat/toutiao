<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
{eval
function tpl_hide_credits_hidden($creditsrequire) {
global $_G;
}
<!--{block return}--><div class="cl bz_quote grey"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_credits_hidden}</div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_credits($creditsrequire, $message) {
}
<!--{block return}--><div class="cl bz_quote_show"><h4>{lang post_hide_credits}</h4>$message</div>

<!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_codedisp($code) {
}
<!--{block return}--><div class="bz_blockcode"><div><ol><li>$code</ol></div></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_quote() {
}
<!--{block return}--><div class="bz_quote_show"><blockquote>{lang reply}: \\1</blockquote></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_free() {
}
<!--{block return}--><div class="bz_quote_show"><blockquote>\\1</blockquote></div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_reply() {
global $_G;
}
<!--{block return}--><div class="bz_showhide"><h4>{lang post_hide}</h4>\\1</div>
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function tpl_hide_reply_hidden() {
global $_G;
}
<!--{block return}--><div class="cl bz_quote grey"><!--{if $_G[uid]}-->{$_G[username]}<!--{else}-->{lang guest}<!--{/if}-->{lang post_hide_reply_hidden}</div><!--{/block}-->
<!--{eval return $return;}-->
{eval
}

function attachlist($attach) {
	global $_G;
	$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
	$aidencode = packaids($attach);
	$widthcode = attachwidth($attach['width']);
	$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
	$pluginhook = !empty($_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]]) ? $_G['setting']['pluginhooks']['viewthread_attach_extra'][$attach[aid]] : '';
}
<!--{block return}-->
<!--{if !$attach['price'] || $attach['payed']}-->
<div class="box box_ex2 attach">
	<dd>
		<p class="attnm">
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
				$attach[attachicon]
			<!--{/if}-->
			<!--{if !$attach['price'] || $attach['payed']}-->
				<a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" id="aid$attach[aid]" target="_blank">$attach[filename]</a>
			<!--{else}-->
				<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]">$attach[filename]</a>
			<!--{/if}-->
			<span class="xg1">($attach[dateline] {lang upload})</span>
		</p>
		<p class="xg1">$attach[attachsize]<!--{if $attach['readperm']}-->, {lang readperm}: <strong>$attach[readperm]</strong><!--{/if}-->, {lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->, {lang attachcredits}: $_G[getattachcredits]<!--{/if}--></p>
		<!--{if $attach['description']}--><p class="xg2">{$attach[description]}</p><!--{/if}-->
	</dd>
</div>
<!--{/if}-->
<!--{/block}-->
<!--{block return}-->
<div class="bz_tattl mtw mbw">
	<div class="hm">$attach[attachicon]</div>
	<!--{if !$attach['price'] || $attach['payed']}-->
	<div class="hm mtw"><a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" id="aid$attach[aid]" class="dialog blue">$attach[filename]<span class="grey fz12">&nbsp;/&nbsp;&#28857;&#20987;&#25991;&#20214;&#21517;&#19979;&#36733;&#38468;&#20214;</span></a></div>
	<!--{else}-->
	<div class="hm mtw"><a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog blue">$attach[filename]<span class="grey fz12">&nbsp;/&nbsp;&#28857;&#20987;&#25991;&#20214;&#21517;&#19979;&#36733;&#38468;&#20214;</span></a></div>
	<!--{/if}-->
	<!--{if $attach['description']}--><div class="hm"><span class="grey fz12">{$attach[description]}</span></div><!--{/if}-->
	<div class="hm mbw"><span class="grey fz12">$attach[dateline]{lang upload}&nbsp;/&nbsp;$attach[attachsize]<!--{if $attach['readperm']}-->, {lang readperm}: <strong>$attach[readperm]</strong><!--{/if}-->, {lang downloads}: $attach[downloads]<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->, {lang attachcredits}: $_G[getattachcredits]<!--{/if}--></span></div>
	<!--{if $attach['price']}-->
	<div class="hm mtw mbw color-red"><strong>$attach[price]&nbsp;</strong>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</div>
	<!--{/if}-->
	<!--{if !$attach['attachimg'] && $_G['getattachcredits']}-->{lang attachcredits}: $_G[getattachcredits]<!--{/if}-->
	<!--{if $attach['price']}-->
	<!--{if !$attach['payed']}-->
	<div class="b_m btn-big">
		<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog touch">{lang attachment_buy}</a>
	</div>
	<!--{/if}-->
	<!--{/if}-->
	<!--{if $attach['price']}-->
	<div class="hm mtw"><a href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]" class="dialog blue fz12">{lang pay_view}</a></div>
	<!--{/if}-->
</div>
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}


function imagelist($attach) {
global $_G, $post;
$fix = count($post[imagelist]) == 1 ? 6000 : 750;
$fixtype = count($post[imagelist]) == 1 ? 'fixnone' : 'fixwr';
$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, $fix, $fix, $fixtype) : '' ;
$aidencode = packaids($attach);
$is_archive = $_G['forum_thread']['is_archived'] ? "&fid=".$_G['fid']."&archiveid=".$_G[forum_thread][archiveid] : '';
$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];
}
<!--{block return}-->
	<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && (((!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])) || (($guestviewthumb)))}-->
			<!--{if !$attach['price'] || $attach['payed']}-->
				<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
					
					<!--{if $_G[uid]}-->
						<li><a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="bz_postother_img"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a></li>
					<!--{else}-->
						<!--{if $guestviewthumb}-->
							<div class="guestviewthumb_other">
								<div><a href="member.php?mod=logging&action=login"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a></div>
								<a href="member.php?mod=logging&action=login" class="blue">{lang guestviewthumb}</a>
							</div>
						<!--{else}-->
							<li><a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="bz_postother_img"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a></li>
						<!--{/if}-->
					<!--{/if}-->
					
				<!--{/if}-->
			<!--{/if}-->
	<!--{/if}-->
<!--{/block}-->
<!--{eval return $return;}-->
{eval
}


function attachinpost($attach) {
	global $_G;
	$attach['refcheck'] = (!$attach['remote'] && $_G['setting']['attachrefcheck']) || ($attach['remote'] && ($_G['setting']['ftp']['hideurl'] || ($attach['isimage'] && $_G['setting']['attachimgpost'] && strtolower(substr($_G['setting']['ftp']['attachurl'], 0, 3)) == 'ftp')));
	$mobilethumburl = $attach['attachimg'] && $_G['setting']['showimages'] && (!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid']) ? getforumimg($attach['aid'], 0, 10000, 10000, 'fixnone') : '' ;
	$aidencode = packaids($attach);
	$is_archive = $_G['forum_thread']['is_archived'] ? '&fid='.$_G['fid'].'&archiveid='.$_G[forum_thread][archiveid] : '';
	$guestviewthumb = !empty($_G['setting']['guestviewthumb']['flag']) && !$_G['uid'];
}
<!--{block return}-->
	<!--{if $attach['attachimg'] && $_G['setting']['showimages'] && (((!$attach['price'] || $attach['payed']) && ($_G['group']['allowgetimage'] || $_G['uid'] == $attach['uid'])) || (($guestviewthumb)))}-->
		<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<!--{if $_G[uid]}-->
				<a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="bz_postfirst_img"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a>
			<!--{else}-->
				<!--{if $guestviewthumb}-->
					<div class="guestviewthumb">
						<div><a href="member.php?mod=logging&action=login"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a></div>
						<a href="member.php?mod=logging&action=login" class="blue">{lang guestviewthumb}</a>
					</div>
				<!--{else}-->
					<a href="forum.php?mod=viewthread&tid=$attach[tid]&aid=$attach[aid]&from=album&page=$_G[page]" class="bz_postfirst_img"><img id="aimg_$attach[aid]" src="$mobilethumburl" alt="$attach[imgalt]" title="$attach[imgalt]" /></a>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/if}-->
	<!--{else}-->
		<div id="attach_$attach[aid]" class="bz_attach mtw mbw" >
			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
			<div class="hm">$attach[attachicon]</div>
			<!--{/if}-->
			<!--{if !$attach['price'] || $attach['payed']}-->
				<div class="hm mtw"><a href="forum.php?mod=attachment{$is_archive}&aid=$aidencode" target="_blank">$attach[filename]</a></div>
			<!--{else}-->
				<div class="hm mtw"><a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" target="_blank">$attach[filename]</a></div>
			<!--{/if}-->
			<div class="hm mbw grey fz12">$attach[dateline]{lang upload}&nbsp;/&nbsp;$attach[attachsize]&nbsp;/&nbsp;{lang downloads}: $attach[downloads]</div>
			<!--{if $attach['price']}-->
			<div class="hm mtw mbw color-red"><strong>$attach[price]&nbsp;</strong>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</div>
			<!--{/if}-->
			<!--{if !$attach['attachimg'] && $_G['getattachcredits']}--><div class="hm mbw grey fz12">{lang attachcredits}: $_G[getattachcredits]</div><!--{/if}-->
			<!--{if $attach['price']}-->
			<!--{if !$attach['payed']}-->
			<div class="b_m btn-big">
				<a href="forum.php?mod=misc&action=attachpay&aid=$attach[aid]&tid=$attach[tid]" class="dialog touch" style="color: #FFF !important;">{lang attachment_buy}</a>
			</div>
			<!--{/if}-->
			<!--{/if}-->
			<!--{if $attach['price']}-->
			<div class="hm mtw"><a href="forum.php?mod=misc&action=viewattachpayments&aid=$attach[aid]" class="dialog blue fz12">{lang pay_view}</a></div>
			<!--{/if}-->
		</div>
	<!--{/if}-->
<!--{/block}-->





<!--{eval return $return;}-->
<!--{eval
}

}-->
