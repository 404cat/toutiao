<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<title><!--{if !empty($navtitle)}-->$navtitle<!--{/if}--><!--{if empty($nobbname)}--> - $_G['setting']['bbname']<!--{/if}--></title>
<script src="template/banzhuan_xmbbs/touch/xmbbs/jquery.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<script src="static/js/common.js?g9O" type="text/javascript"></script>
<link rel="stylesheet" href="template/banzhuan_xmbbs/touch/xmbbs/bzstyle.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="template/banzhuan_xmbbs/touch/xmbbs/font/iconfont.css">
<!--{eval $_G['cookie']['extstyle'] && $_G[style][defaultextstyle] = $_G['cookie']['extstyle'];}-->
<link id="css_extstyle" type="text/css" rel="stylesheet" href='{if $_G[style][defaultextstyle]}$_G[style][defaultextstyle]{else}./template/banzhuan_xmbbs/style/t1{/if}/style.css'>
</head>
<body class="bg">
<!--{hook/global_header_mobile}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang send_posts}</h2>
	<div class="bz-header-right"><a href="search.php?mod=forum" class="banzhuan_font icon-search"></a></div>
</div>
<div class="cl">
	<div style="display: none">
		<ul id="fs_group">$grouplist</ul>
		<ul id="fs_forum_common">$commonlist</ul>
		<!--{loop $forumlist $forumid $forum}-->
			<ul id="fs_forum_$forumid">$forum</ul>
		<!--{/loop}-->
		<!--{loop $subforumlist $forumid $forum}-->
			<ul id="fs_subforum_$forumid">$forum</ul>
		<!--{/loop}-->
	</div>
	<div class="c forumlistpbl_box bzbb1">
		<div class="b_p">
			<span class="pbnv grey">$_G['setting']['sitename']<span id="pbnv"></span> <a id="enterbtn" class="xg1 grey" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[{lang nav_forum}]</a></span>
		</div>
		<ul class="forumlistpbl cl">
			<li id="block_group"></li>
			<li id="block_forum"></li>
			<li id="block_subforum"></li>
		</ul>
	    	<p class="cl z pbut">
		<!--{if $_G['group']['allowpost'] || !$_G['uid']}-->
			<!--{if $special === null}-->
				<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&mobile=2'" disabled="disabled">{lang send_posts}</button>
			<!--{else}-->
				<button id="postbtn" class="pn pnc z" onclick="hideWindow('nav');window.location.href='forum.php?mod=post&action=newthread&fid=' + selectfid + '&special=$special&mobile=2'" disabled="disabled">$actiontitle</button>
			<!--{/if}-->
		<!--{/if}-->
		</p>
	</div>
	<script type="text/javascript" reload="1">
		var s = '<!--{if $commonfids}--><p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">{lang nav_forum_frequently}</a></p><!--{/if}-->';
		var lis = $('fs_group').getElementsByTagName('LI');
		for(i = 0;i < lis.length;i++) {
			var gid = lis[i].getAttribute('fid');
			if($('fs_forum_' + gid)) {
				s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
			}
		}
		$('block_group').innerHTML = s;
		var lastswitchobj = null;
		var selectfid = 0;
		var switchforum = switchsubforum = '';
		switchforums($('commonforum'), 1, 'common');
		function switchforums(obj, block, fid) {
			if(lastswitchobj != obj) {
				if(lastswitchobj) {
					lastswitchobj.parentNode.className = '';
				}
				obj.parentNode.className = 'pbls';
			}
			var s = '';
			if(fid != 'common') {
				$('enterbtn').className = 'xi2 grey';
				currentblock = block;
				currentfid = fid;
			} else {
				$('enterbtn').className = 'xg1 grey';
			}
			if(block == 1) {
				var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
				for(i = 0;i < lis.length;i++) {
					fid = lis[i].getAttribute('fid');
					if(fid != '') {
						s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ?  ' class="pbsb"' : '') + '>' + lis[i].innerHTML + '</a></p>';
					}
				}
				$('block_forum').innerHTML = s;
				$('block_subforum').innerHTML = '';
				switchforum = switchsubforum = '';
				selectfid = 0;
				$('postbtn').setAttribute("disabled", "disabled");
				$('postbtn').className = 'pn xg1 y';
			} else if(block == 2) {
				selectfid = fid;
				if($('fs_subforum_' + fid)) {
					var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
					for(i = 0;i < lis.length;i++) {
						fid = lis[i].getAttribute('fid');
						s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
					}
					$('block_subforum').innerHTML = s;
				} else {
					$('block_subforum').innerHTML = '';
				}
				switchforum = obj.innerHTML;
				switchsubforum = '';
				$('postbtn').removeAttribute("disabled");
				$('postbtn').className = 'pn pnc y';
			} else {
				selectfid = fid;
				switchsubforum = obj.innerHTML;
				$('postbtn').removeAttribute("disabled");
				$('postbtn').className = 'pn pnc y';
			}
			lastswitchobj = obj;
			$('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum : '') : '';
		}
		function locationforums(block, fid) {
			location.href = block == 1 ? 'forum.php?gid=' + fid : 'forum.php?mod=forumdisplay&fid=' + fid;
		}
	</script>
</div>
<div class="bzfoot_xm bz-bg-fff bzbt1">
<ul class="bzfoot_flex">
<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_a"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_a"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
<li class="flex post"><a class="bzfc_a"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
<li class="flex"><a href="home.php?mod=space&do=pm" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_a"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
</ul>
</div>
<div class="bz_bottom"></div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->