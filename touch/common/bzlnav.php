<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-l-nav">
	<div class="bgDiv"></div>
	<div class="leftNav">
		<div class="leftNav-header">
			<div class="cover">
		    <a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}">
			<!--{if $_G[uid]}-->
				<div class="leftNav-header-img hm">
					<img src="uc_server/avatar.php?uid={$_G[uid]}&size=midlle"/>
				</div>
				<div class="leftNav-header-info hm">
				<div class="fz18 name rw">{$_G['member']['username']}</div>
					<p class="rw">
						<span class="fz12">$_G[group][grouptitle]&nbsp;</span>
						<span class="fz12">&nbsp;&#31215;&#20998;:$_G['member'][credits]</span>
					</p>
					<!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><!--<a href="home.php?mod=space&do=pm" class="point"><i class="banzhuan_font icon-footmessage color-fff"></i></a>--><!--{/if}-->
				</div>
			<!--{else}-->
				<div class="leftNav-header-img hm"><img src="uc_server/avatar.php?uid=0&size=midlle"/></div>
				<div class="leftNav-header-info hm">
					<span class="color-fff">
					 	<script language="javaScript">
							now = new Date(),hour = now.getHours()
							if (hour < 6){document.write("&#20940;&#26216;&#22909;,")}
							else if (hour < 9){document.write("&#26089;&#19978;&#22909;,")}
							else if (hour < 12){document.write("&#19978;&#21320;&#22909;,")}
							else if (hour < 14){document.write("&#20013;&#21320;&#22909;,")}
							else if (hour < 17){document.write("&#19979;&#21320;&#22909;,")}
							else if (hour < 19){document.write("&#20621;&#26202;&#22909;,")}
							else {document.write("&#26202;&#19978;&#22909;,")}
						</script>
					 	&nbsp;{lang login}&#21518;&#26356;&#31934;&#24425; ~
					</span>
				</div>
			<!--{/if}-->
		    </a>
		    <div class="vision_bottom">
			    	<div class="s_botm"></div>
			    	<div class="s_botm"></div>
			</div>
		    </div>
		</div>
		<div class="leftNav-list">
			<!--{if $_G['style']['extstyle']}-->
			<a class="mbm"><div id="stylelist"><!--{loop $_G['style']['extstyle'] $i $item}--><b class="{if $item[0] == $_G[style][defaultextstyle]}cover{/if}" data-id="$item[0]"><em class="banzhuan_font icon-right" style="background:{$item[2]};"></em></b><!--{/loop}--></div></a>
			<!--{/if}-->
			<a href="forum.php?mod=guide&view=hot&mobile=2"><em class="banzhuan_font icon-foothome color-bbb"></em>&nbsp;&nbsp;{lang homepage}<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a href="forum.php?forumlist=1&mobile=2"><em class="banzhuan_font icon-footforum color-bbb"></em>&nbsp;&nbsp;&#29256;&#22359;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<!--{if helper_access::check_module('guide')}--><a href="forum.php?mod=guide&view=newthread&mobile=2"><em class="banzhuan_font icon-dynamic_fill color-bbb"></em>&nbsp;&nbsp;{$_G[setting][navs][10][navname]}<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a><!--{/if}-->
			<a href="search.php?mod=forum&mobile=2"><em class="banzhuan_font icon-searchfill color-bbb"></em>&nbsp;&nbsp;{lang search}<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a href="forum.php?mod=announcement&mobile=2"><em class="banzhuan_font icon-systemprompt_fill color-bbb"></em>&nbsp;&nbsp;&#20844;&#21578;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a href="home.php?mod=medal&mobile=2"><em class="banzhuan_font icon-medalfill color-bbb"></em>&nbsp;&nbsp;&#21195;&#31456;&#20013;&#24515;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a href="misc.php?mod=tag&mobile=2"><em class="banzhuan_font icon-label color-bbb"></em>&nbsp;&nbsp;&#26631;&#31614;&#20113;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<!--{if helper_access::check_module('ranklist')}--><a href="misc.php?mod=ranklist&type=member&view=credit&mobile=2"><em class="banzhuan_font icon-yonghu color-bbb"></em>&nbsp;&nbsp;&#29992;&#25143;&#25490;&#34892;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a><!--{/if}-->
			<!--{if helper_access::check_module('ranklist')}--><a href="misc.php?mod=ranklist&type=thread&view=replies&orderby=all&mobile=2"><em class="banzhuan_font icon-document_fill color-bbb"></em>&nbsp;&nbsp;&#36148;&#23376;&#25490;&#34892;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a><!--{/if}-->
			<!--{if helper_access::check_module('ranklist')}--><a href="misc.php?mod=ranklist&type=forum&view=threads&mobile=2"><em class="banzhuan_font icon-order_fill color-bbb"></em>&nbsp;&nbsp;&#29256;&#22359;&#25490;&#34892;<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a><!--{/if}-->
			<a href="misc.php?mod=faq&mobile=2"><em class="banzhuan_font icon-wenhaofill color-bbb"></em>&nbsp;&nbsp;{lang faq}<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a href="{$_G['setting']['mobile']['nomobileurl']}"><em class="banzhuan_font icon-computer_fill color-bbb"></em>&nbsp;&nbsp;&#35775;&#38382;{lang nomobiletype}<em class="y banzhuan_font icon-gengduo color-bbb fz12"></em></a>
			<a></a>
		</div>
	</div>
</div>