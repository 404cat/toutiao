<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $_G['inajax'] == 1}-->

	<!--{if $_G['forum_threadcount']}-->
		<!--{if !empty($_G['forum']['picstyle']) && !$_G['cookie']['forumdefstyle']}-->
		<!--{subtemplate forum/forumdisplay_pic}-->
		<!--{else}-->
		<!--{subtemplate forum/forumdisplay_list}-->
		<!--{/if}-->
	<!--{/if}-->

<!--{else}-->

	<!--{template common/header}-->
	<!--{hook/forumdisplay_top_mobile}-->
	<!--{if !$subforumonly}-->
		<div class="forum_fd_box bz-bg-fff">
			<div class="forum_fd_banner" style="background-image:url($_G[forum][banner]);background-size:cover;">
				<div class="cover">
					<div class="forum_fd_header cl">
						<div class="left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
						<div class="right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
					</div>
					<div class="b_p15">
						<p class="name fz20 color-fff"><!--{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}--></p>
						<!--{if $moderatedby}-->
						<div class="modedby color-fff">{lang forum_modedby}: $moderatedby</div>
						<!--{/if}-->
						<p class="data color-fff">{lang index_threads}: $_G[forum][threads]&nbsp;&nbsp;&nbsp;{lang favorite}: $_G[forum][favtimes]</p>
					</div>
				</div>
				<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
			</div>
			<div class="forum_fd_iconfav">
				<div class="icon z bz-bg-fff"><img alt="$_G['forum'][name]" src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->template/banzhuan_xmbbs/touch/xmbbs/images/forum-icon.jpg<!--{/if}-->"></div>
				<!--{eval}-->
				if($_G['uid']){$favfids = C::t('home_favorite')->fetch_all_by_uid_idtype($_G['uid'], 'fid');foreach($favfids as $val){if($val['id'] == $_G[fid]){$isFav = $val['favid'];}}}
				<!--{/eval}-->
				<!--{if $isFav}-->
				<div class="fav y"><a href="home.php?mod=spacecp&ac=favorite&type=forum&id={$_G[fid]}&formhash={FORMHASH}" class="forum-fav fz12 a">&#24050;{lang favorite}</a></div>
				<!--{else}-->
				<div class="fav y"><a href="home.php?mod=spacecp&ac=favorite&type=forum&id={$_G[fid]}&formhash={FORMHASH}" class="forum-fav fz12">{lang favorite}</a></div>
				<!--{/if}-->
				<!--{if empty($_G['forum']['picstyle'])}-->
				<!--{else}-->
					<!--{if empty($_G[ 'cookie'][ 'forumdefstyle'])}-->
					<div class="pic y"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=yes"><i class="banzhuan_font icon-picfill"></i></a></div>
					<!--{else}-->
					<div class="pic y"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=no"><i class="banzhuan_font icon-pic"></i></a></div>
					<!--{/if}-->
				<!--{/if}-->
			</div>
			<!--{if (!empty($_G[forum][domain]) && !empty($_G['setting']['domain']['root']['forum'])) || $moderatedby || ($_G['page'] == 1 && $_G['forum']['rules'])}-->
			<!--{if $_G['page'] == 1 && $_G['forum']['rules']}-->
			<div class="clear"></div>
			<div class="forum_fd_rules fz14">$_G['forum'][rules]</div>
			<!--{/if}-->
			<!--{/if}-->
		</div>
		<!--{if $subexists && $_G['page'] == 1}-->
		<div class="bz-sub-nav">
			<a style="background: #F5F5F5;">{lang forum_subforums}&nbsp;:</a>
			<!--{loop $sublist $sub}-->
			<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">{$sub['name']}<!--{if empty($sub[redirect])}--><!--{if $sub[threads] > 0}--><i class="grey" style="-webkit-transform: scale(0.8,0.8); display: inline-block;">&nbsp;<!--{echo dnumber($sub[threads])}--></i><!--{/if}--><!--{/if}--></a>
			<!--{/loop}-->
		</div>
		<div class="clear"></div>
		<!--{/if}-->
	<!--{else}-->
	<!--{subtemplate forum/forumdisplay_subforumonly}-->
	<!--{/if}-->
	
	<!--{if !$subforumonly}-->
	
		<!--{if !empty($_G['forum']['picstyle']) && !$_G['cookie']['forumdefstyle']}-->
		
			<!--{if $_G['forum_threadcount']}-->
				<div class="bz-types-nav b_p15 bz-bg-fff fz14">
					<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}" <!--{if $_GET[orderby] != 'dateline'}-->class="a"<!--{/if}-->>&#40664;&#35748;</a>
					<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=author&orderby=dateline" <!--{if $_GET[orderby] != 'dateline'}--><!--{else}-->class="a"<!--{/if}-->>&#26032;&#24086;</a>
				</div>
				<div class="picstyle cl">
					<ul class="threadlist_ul">
					<!--{subtemplate forum/forumdisplay_pic}-->
					</ul>
				</div>
			<!--{else}-->
			<div class="b_p hm grey">{lang forum_nothreads}</div>
			<!--{/if}-->
			
		<!--{else}-->
		
			<!--{if $_G['forum_threadcount']}-->
				<!--{if empty($_G['forum']['sortmode'])}-->
					<div class="bz-types-nav b_p15 bz-bg-fff fz14">
						<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}" <!--{if $_GET[orderby] != 'dateline'}-->class="a"<!--{/if}-->>&#40664;&#35748;</a>
						<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=author&orderby=dateline" <!--{if $_GET[orderby] != 'dateline'}--><!--{else}-->class="a"<!--{/if}-->>&#26032;&#24086;</a>
					</div>
					<div class="cl bzbt1 bzxmthreadlist">
						<ul class="threadlist_ul">
						<!--{subtemplate forum/forumdisplay_list}-->
						</ul>
					</div>
				<!--{else}-->
					<div class="bz-types-nav b_p15 bz-bg-fff fz14">
						<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}" <!--{if $_GET[orderby] != 'dateline'}-->class="a"<!--{/if}-->>&#40664;&#35748;</a>
						<a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter=author&orderby=dateline" <!--{if $_GET[orderby] != 'dateline'}--><!--{else}-->class="a"<!--{/if}-->>&#26032;&#24086;</a>
					</div>
					<!--{subtemplate forum/forumdisplay_sort}-->
				<!--{/if}-->
			<!--{else}-->
			<div class="b_p hm grey">{lang forum_nothreads}</div>
			<!--{/if}-->
			
		<!--{/if}-->	

		<!--{if $_G['forum_threadcount']}-->
		
			<div style="display: none;">$multipage</div>
			
			<div class="bz_loading">
				<a href="javascript:;" class="color-bbb"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif"/>&#21152;&#36733;&#20013;...</a>
			</div>
			<script type="text/javascript">
				var ajax_state = true;
				var ajax_page = <!--{if $_GET[page]}-->$_GET[page]<!--{else}-->1<!--{/if}--> + 1;
				var all_page = jQuery('div.pg label span').text().replace(/[^\d]/g, '') || 0;
				var ajax_url = 'forum.php?mod=forumdisplay&fid=' + '$_GET[fid]'<!--{if $_GET[filter]}--> + '&filter=' + '$_GET[filter]'<!--{/if}--><!--{if $_GET[digest]}--> + '&digest=' + '$_GET[digest]'<!--{/if}--><!--{if $_GET[sortid]}--> + '&sortid=' + '$_GET[sortid]'<!--{/if}--><!--{if $_GET[typeid]}--> + '&typeid=' + '$_GET[typeid]'<!--{/if}--><!--{if $_GET[orderby]}--> + '&orderby=' + '$_GET[orderby]'<!--{/if}--><!--{if $_GET[specialtype]}--> + '&specialtype=' + '$_GET[specialtype]'<!--{/if}--><!--{if $_GET[dateline]}--> + '&dateline=' + '$_GET[dateline]'<!--{/if}--><!--{if $_GET[sortall]}--> + '&sortall=' + '$_GET[sortall]'<!--{/if}-->;
	
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
									jQuery(".threadlist_ul").append(result);
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

	<!--{/if}-->
	
	<!--{hook/forumdisplay_bottom_mobile}-->
	<!--{if !$subforumonly}-->
		<!--{if $_G[uid] || $_G['group']['allowpost']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G['fid']" class="bz-post-fd"><i class="banzhuan_font icon-post"></i></a>
		<!--{else}-->
		<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="bz-post-fd"><i class="banzhuan_font icon-post"></i></a>
		<!--{/if}-->
	<!--{/if}-->
	<script type="text/javascript">
		$('.forum-fav').on('click', function() {
			var obj = $(this);
			$.ajax({
				type:'POST',
				url:obj.attr('href') + '&handlekey=forum-fav&inajax=1',
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