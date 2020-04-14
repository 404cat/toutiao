<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $_G['inajax'] == 1}-->

	<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/common.js?{VERHASH}" charset="{CHARSET}"></script>
	<!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
	<!--{if $post[first]}-->
	<!--{else}-->
		<!--{subtemplate forum/viewthread_reply}-->
	<!--{/if}-->
   	<!--{hook/viewthread_postbottom_mobile $postcount}-->
   	<!--{eval $postcount++;}-->
   	<!--{/loop}-->

<!--{else}-->

	<!--{template common/header}-->
	<!--{hook/viewthread_top_mobile}-->
	<div class="postlist">
		<h2 class="bz-bg-fff">$_G[forum_thread][subject]<!--{if $threadsorts && $_G['forum_thread']['sortid']}-->[{$_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']]}]<!--{/if}--><!--{if $_G['forum_thread'][displayorder] == -2}--> <span>({lang moderating})</span><!--{elseif $_G['forum_thread'][displayorder] == -3}--> <span>({lang have_ignored})</span><!--{elseif $_G['forum_thread'][displayorder] == -4}--> <span>({lang draft})</span><!--{/if}--></h2>
		<div class="clear"></div>
		<div class="bzvt-type bz-bg-fff">
			<a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="z blue">{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}</a>
			<!--{if $_G['forum_thread']['typeid'] && $_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}--><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$_G[forum_thread][typeid]" class="z blue">&nbsp;&nbsp;#{$_G['forum']['threadtypes']['types'][$_G['forum_thread']['typeid']]}</a><!--{/if}-->
			<em class="y color-bbb"><i class="fz14 banzhuan_font icon-chakan"></i>$_G[forum_thread][views]</em>
			<!--{if $_G[forum_thread][allreplies] > 0}-->
			<em class="y color-bbb"><i class="fz14 banzhuan_font icon-message"></i>$_G[forum_thread][allreplies]&nbsp;&nbsp;</em>
			<!--{/if}-->
			<!--{if $_G[forum_thread][recommends] > 0}-->
			<em class="y color-bbb fz12"><i class="fz14 banzhuan_font icon-praise"></i>$_G[forum_thread][recommends]&nbsp;&nbsp;</em>
			<!--{/if}-->
			<!--{if $_G['forum_thread']['digest'] > 0}-->
			<!--<em class="y color-bbb fz12">{lang digest}&nbsp;&nbsp;</em>-->
			<!--{/if}-->
	    </div>
		<div class="clear"></div>
	
		<!--{eval $postcount = 0;}-->
		
		<!--{loop $postlist $post}-->
		<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
		<!--{hook/viewthread_posttop_mobile $postcount}-->
		<!--{if $post[first]}-->
			<!--{subtemplate forum/viewthread_first}-->
		<!--{else}-->
		<!--{/if}-->
	   	<!--{hook/viewthread_postbottom_mobile $postcount}-->
	   	<!--{eval $postcount++;}-->
	   	<!--{/loop}-->
	   	
	   	<div class="postlist_list">
		<!--{loop $postlist $post}-->
		<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
		<!--{hook/viewthread_posttop_mobile $postcount}-->
		<!--{if $post[first]}-->
		<!--{else}-->
			<!--{subtemplate forum/viewthread_reply}-->
		<!--{/if}-->
	   	<!--{hook/viewthread_postbottom_mobile $postcount}-->
	   	<!--{eval $postcount++;}-->
	   	<!--{/loop}-->
	   </div>
	   	
	   	<a class="bz-menu-vt bzleft"><i class="banzhuan_font icon-daohang"></i></a>
		<!--{subtemplate forum/forumdisplay_fastpost}-->
		
		<!--{if $_G[forum_thread][allreplies] >= 1}-->
		
		<div style="display: none;">$multipage</div>
		<div class="bz_loading">
			<a href="javascript:;" class="color-bbb"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif"/>&#21152;&#36733;&#20013;...</a>
		</div>
		<script type="text/javascript">
			var ajax_state = true;
			var ajax_page = <!--{if $_GET[page]}-->$_GET[page]<!--{else}-->1<!--{/if}--> + 1;
			var all_page = jQuery('div.pg label span').text().replace(/[^\d]/g, '') || 0;
			var ajax_url = 'forum.php?mod=viewthread&tid=' + '$_GET[tid]'<!--{if $_GET[extra]}--> + '&extra=' + '$_GET[extra]'<!--{/if}--><!--{if $_GET[authorid]}--> + '&authorid=' + '$_GET[authorid]'<!--{/if}--><!--{if $_GET[ordertype]}--> + '&ordertype=' + '$_GET[ordertype]'<!--{/if}-->;
			function list_ajax() {
				if(ajax_state == true) {
					if(all_page >= 2 && all_page >= ajax_page) {
						ajax_state = false;
						jQuery(".bz_loading").html('<a href="javascript:;" class="color-bbb"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif"/>&#21152;&#36733;&#20013;...</a>');
						$.ajax({
							url: ajax_url + '&inajax=1&page=' + ajax_page + '&mobile=2',
							type: 'GET',
							dataType: 'html',
							success: function(result) {
								jQuery(".postlist_list").append(result);
								ajax_page++;
								ajax_state = true;
							}
						});
					} else {
						jQuery(".bz_loading").html('<a class="color-bbb">&#24050;&#32463;&#21040;&#24213;&#20102;...</a>');
						ajax_state = false;
					}
				}
			}
			if(jQuery(document).height() <= jQuery(window).height()) {
				list_ajax();
			}
			jQuery(window).scroll(function() {
				if(jQuery(document).height() <= jQuery(window).height() + jQuery(window).scrollTop() + 100) {
					list_ajax();
				}
			});
		</script>
		
		<!--{/if}-->	
		
	</div>
	

	<!--{hook/viewthread_bottom_mobile}-->
	<!--{if $_G[uid] || $allowpostreply}-->
	<div class="bz-vt-post">
		<div class="bz-vt-post-return">
			<ul>	<li><a href="<!--{if $_GET[fromguid] == 'hot'}-->forum.php?mod=guide&view=hot&page=$_GET[page]<!--{else}-->forum.php?mod=forumdisplay&fid=$_G[fid]&<!--{eval echo rawurldecode($_GET[extra]);}--><!--{/if}-->" class="banzhuan_font icon-fanhui1"></a></li></ul>
		</div>
		<div class="bz-vt-post-reply">
			<ul>
				<li><a class="fastre color-bbb" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&reppost=$_G[forum_firstpid]&page=$page"><em class="banzhuan_font icon-post"></em>&#25105;&#26469;&#35828;&#20004;&#21477;...</a></li>
			</ul>
		</div>
		<div class="bz-vt-post-share">
			<ul>
				<li><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn banzhuan_font icon-collection"><em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>{$_G['forum_thread']['favtimes']}</em></a></li>
				<!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
				<li><a href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" class="recbtn banzhuan_font icon-praise"><em id="recommendv_add"{if !$_G['forum_thread']['recommend_add']} style="display:none"{/if}>{$_G['forum_thread']['recommend_add']}</em></a></li>
				<!--{/if}-->
			</ul>
		</div>
	</div>
	<!--{else}-->
	<div class="bz-vt-post">
		<div class="bz-vt-post-return">
			<ul>	<li><a href="<!--{if $_GET[fromguid] == 'hot'}-->forum.php?mod=guide&view=hot&page=$_GET[page]<!--{else}-->forum.php?mod=forumdisplay&fid=$_G[fid]&<!--{eval echo rawurldecode($_GET[extra]);}--><!--{/if}-->" class="banzhuan_font icon-fanhui1"></a></li></ul>
		</div>
		<div class="bz-vt-post-reply">
			<ul>
				<li><a class="fastre color-bbb" href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');"><em class="banzhuan_font icon-post fz14"></em>&#25105;&#26469;&#35828;&#20004;&#21477;...</a></li>
			</ul>
		</div>
		<div class="bz-vt-post-share">
			<ul>
				<li><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="favbtn banzhuan_font icon-collection"><em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>{$_G['forum_thread']['favtimes']}</em></a></li>
				<!--{if !empty($_G['setting']['recommendthread']['addtext'])}-->
				<li><a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="recbtn banzhuan_font icon-praise"><em id="recommendv_add"{if !$_G['forum_thread']['recommend_add']} style="display:none"{/if}>{$_G['forum_thread']['recommend_add']}</em></a></li>
				<!--{/if}-->
			</ul>
		</div>
	</div>
	<!--{/if}-->
	<script type="text/javascript">
		$('.favbtn').on('click', function() {
			var obj = $(this);
			$.ajax({
				type:'POST',
				url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
				data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
				dataType:'xml',
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
				evalscript(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				window.location.href = obj.attr('href');
				popup.close();
			});
			return false;
		});
		
		$('.recbtn').on('click', function() {
			var obj = $(this);
			$.ajax({
				type:'POST',
				url:obj.attr('href') + '&handlekey=recbtn&inajax=1',
				data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
				dataType:'xml',
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
				evalscript(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				window.location.href = obj.attr('href');
				popup.close();
			});
			return false;
		});
		
		$('.replyadd').on('click', function() {
			var obj = $(this);
			$.ajax({
				type:'POST',
				url:obj.attr('href') + '&handlekey=replyadd&inajax=1',
				data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
				dataType:'xml',
			})
			.success(function(s) {
				popup.open(s.lastChild.firstChild.nodeValue);
				evalscript(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				window.location.href = obj.attr('href');
				popup.close();
			});
			return false;
		});
	</script>
	
	<!--{template common/footer}-->

<!--{/if}-->