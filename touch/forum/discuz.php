<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->
	<!--{eval dheader('Location:forum.php?mod=guide&view=hot');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<div class="bz-dis-header">
	<div class="bz-dis-header-left bzleft"><a class="banzhuan_font icon-daohang"></a></div>
	<h2>{lang forum}</h2>
	<div class="bz-dis-header-right"><a href="search.php?mod=forum" class="banzhuan_font icon-search"></a></div>
</div>
<div class="bz_top"></div>
<!--{if $_GET['visitclient']}-->
<!--{else}-->
<div class="forum_bg">
	<div class="nav">
		<ul>
		<li>&#25105;&#30340;&#25910;&#34255;</li>
		<!--{loop $catlist $key $cat}-->
		<li>$cat[name]</li>
		<!--{/loop}-->
		</ul>
	</div>
	<div class="forum">
		<!--{if $showvisitclient}-->
		<div class="visitclienttip vm" style="display:block;">
			<a href="javascript:;" id="visitclientid" class="btn_download">{lang downloadnow}</a>	
			<p>
				{lang downloadzslttoshareview}
			</p>
		</div>
		<script type="text/javascript">
			var visitclienthref = getvisitclienthref();
			if(visitclienthref) {
				$('#visitclientid').attr('href', visitclienthref);
				$('.visitclienttip').css('display', 'block');
			}
		</script>
		<!--{/if}-->
		<!--{hook/index_top_mobile}-->
		<div class="sub_forum_bg" style="display: block;">
		<!--{if $_G[uid]}-->
			<!--{eval $forumscount = count($forum_favlist);}-->
			<!--{eval $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;}-->
			<!--{eval $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';}-->
			<div id="chart" class="cl">
				<ul>
					<li>
						<span>{lang index_today}</span>
						<em>$todayposts</em>
					</li>
					<li>
						<span>{lang index_posts}</span>
						<em>$posts</em>
					</li>
					<li>
						<span>{lang index_members}</span>
						<em>$_G['cache']['userstats']['totalmembers']</em>
					</li>
				</ul>
			</div>
			<!--{if empty($gid) && $announcements}-->
			<div class="bzbb1" style="margin: 0 40px;padding: 10px 0;">
				<div class="announcement">
				    <div class="z"><i class="banzhuan_font icon-systemprompt_fill rq"></i></div>
				    <ul id="ancl">$announcements</ul>
				</div>
			</div>
			<script>
			  setInterval(function(){
				  $('#ancl li:last').css({'height':'0px','opacity': '0'}).insertBefore('#ancl li:first').animate({'height':'44px','opacity': '1'}, 'slow', function(){
			          $(this).removeAttr('style');
			      });
			  },3000);
			</script>
			<!--{/if}-->
			<!--{if empty($gid) && !empty($forum_favlist)}-->
			<div class="sub_forum">
				<div class="b_plr15">
					<ul>
					<!--{loop $forum_favlist $key $favorite}-->
					<!--{eval $forum=$favforumlist[$favorite[id]];}-->
					<!--{eval $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];}-->
					<li>
						<!--{if $forum[icon]}-->
						$forum[icon]
						<!--{else}-->
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/forum-icon.jpg" alt="$forum[name]" /></a>
						<!--{/if}-->
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="name">{$forum[name]}</a>
						<p>{lang index_threads}:<!--{echo dnumber($forum[threads])}-->&nbsp;&nbsp;{lang posts}:<!--{echo dnumber($forum[posts])}--></p>
						<!--{if $forum[todayposts] > 0}--><a class="data">{lang index_today}:$forum[todayposts]</a><!--{/if}-->
					</li>
					<!--{/loop}-->
					</ul>
				</div>
			</div>
			<!--{else}-->
			<div class="hm" style="padding: 20px 0;">
				<img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/forum-icon.jpg" alt="$forum[name]" style="width: 120px;border-radius: 10px;" />
				<p class="color-bbb fz12">&#24744;&#36824;&#27809;&#26377;&#25910;&#34255;&#20219;&#20309;&#29256;&#22359;</p>
			</div>
			<!--{/if}-->
			
			
			
		<!--{else}-->
			<div id="chart" class="cl">
				<ul>
					<li>
						<span>{lang index_today}</span>
						<em>$todayposts</em>
					</li>
					<li>
						<span>{lang index_posts}</span>
						<em>$posts</em>
					</li>
					<li>
						<span>{lang index_members}</span>
						<em>$_G['cache']['userstats']['totalmembers']</em>
					</li>
				</ul>
			</div>
			<!--{if empty($gid) && $announcements}-->
			<div class="bzbb1" style="margin: 0 40px;padding: 10px 0;">
				<div class="announcement">
				    <div class="z"><i class="banzhuan_font icon-systemprompt_fill rq"></i></div>
				    <ul id="ancl">$announcements</ul>
				</div>
			</div>
			<script>
			  setInterval(function(){
				  $('#ancl li:last').css({'height':'0px','opacity': '0'}).insertBefore('#ancl li:first').animate({'height':'44px','opacity': '1'}, 'slow', function(){
			          $(this).removeAttr('style');
			      });
			  },3000);
			</script>
			<!--{/if}-->
			<div class="hm" style="padding: 40px 0;">
				<img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/forum-icon.jpg" alt="$forum[name]" style="width: 120px;border-radius: 10px;" />
				<p class="color-bbb fz12">{lang login}{lang show}{lang forum_myfav}</p>
			</div>
			
			

		<!--{/if}-->
		</div>
		<!--{loop $catlist $key $cat}-->
		<div class="sub_forum_bg" style="display: none;">
			<div class="sub_forum">
				<div id="sub_forum_$cat[fid]" class="b_plr15">
				<ul>
					<!--{loop $cat[forums] $forumid}-->
					<!--{eval $forum=$forumlist[$forumid];}-->
					<li>
						<!--{if $forum[icon]}-->
						$forum[icon]
						<!--{else}-->
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/forum-icon.jpg" alt="$forum[name]" /></a>
						<!--{/if}-->
						<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="name">{$forum[name]}</a>
						<p>{lang index_threads}:<!--{echo dnumber($forum[threads])}-->&nbsp;&nbsp;{lang posts}:<!--{echo dnumber($forum[posts])}--></p>
						<!--{if $forum[todayposts] > 0}--><a class="data">{lang index_today}:$forum[todayposts]</a><!--{/if}-->
					</li>
					<!--{/loop}-->
				</ul>
				</div>
			</div>
		</div>
		<!--{/loop}-->
		<!--{hook/index_middle_mobile}-->
	</div>
</div>
<script id="jsID" type="text/javascript">jQuery(".forum_bg").slide({trigger:"click"});</script>
<!--{/if}-->

<div class="clear"></div>
<div class="bzfoot_xm bz-bg-fff bzbt1">
<ul class="bzfoot_flex">
<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_a"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_s"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
<!--{if $_G[uid] || $_G['group']['allowpost']}-->
<li class="flex post"><a href="forum.php?mod=misc&action=nav" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
<li class="flex"><a href="home.php?mod=space&do=pm" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
<!--{else}-->
<li class="flex post"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
<li class="flex"><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bzfc_a"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
<!--{/if}-->
<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_a"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
</ul>
</div>
<div class="bz_bottom"></div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
