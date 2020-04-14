<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->

<!--{if $viewtype == 'reply' || $viewtype == 'postcomment'}-->

	<div class="bz-header">
		<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
		<h2>$space[username]&#30340;{lang reply}</h2>
		<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
	</div>
	<!--{if $list}-->
	<div class="bzthreadlist cl rep">
		<ul>
			<!--{loop $list $stid $thread}-->
			<li>
				<div class="list cl">
					<!--{if !$thread[author]}-->
					<a class="avatar">{avatar($thread[0],middle)}</a>
					<!--{else}-->
					<a href="home.php?mod=space&uid=$thread['authorid']&do=profile" class="avatar">{avatar($thread[authorid],middle)}</a>
				    <!--{/if}-->
					<div class="main">
						<a href="forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$thread[pid]" class="title"><span $thread[highlight]><!--{if $thread[folder] == 'lock'}--><img src="{IMGDIR}/folder_lock.gif" class="lock" /><!--{/if}-->{$thread[subject]}</span></a>
						<p class="p">
							<!--{if $thread['special'] == 1}-->
					            <i class="grey fz12 bor">{lang thread_poll}</i>
					        <!--{elseif $thread['special'] == 2}-->
					            <i class="grey fz12 bor">{lang thread_trade}</i>
					        <!--{elseif $thread['special'] == 3}-->
					            <i class="grey fz12 bor">{lang thread_reward}</i>
					        <!--{elseif $thread['special'] == 4}-->
					            <i class="grey fz12 bor">{lang thread_activity}</i>
					        <!--{elseif $thread['special'] == 5}-->
					            <i class="grey fz12 bor">{lang thread_debate}</i>
					        <!--{/if}-->
							<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
							<i class="color-ding fz12 bor">$_G[setting][threadsticky][3-$thread[displayorder]]</i>
							<!--{/if}-->
							<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
							<i class="color-jing fz12 bor">{lang thread_digest}$thread[digest]</i>
							<!--{/if}-->
					        <!--{if $thread[heatlevel]}-->
					        <i class="color-hot fz12 bor">{lang heats}{$thread[heats]}</i>
						    <!--{/if}-->
						</p>
						<div class="cl">
							<span class="z fz12 grey">$thread[dateline]</span>
							<!--{if $thread[replies] > 0}-->
							<span class="z replies fz12 grey"><i class="banzhuan_font icon-message fz12"></i><!--{if $thread['isgroup'] != 1}-->$thread[replies]<!--{else}-->{$groupnames[$thread[tid]][replies]}<!--{/if}--></span>
							<!--{/if}-->
							<span class="z replies fz12 grey"><i class="banzhuan_font icon-chakan fz12"></i>{$thread[views]}</span>
							<!--{if $thread[recommendicon] && $filter != 'recommend'}-->
							<span class="z replies fz12 grey"><i class="banzhuan_font icon-praise fz12"></i>$thread[recommends]</span>
							<!--{/if}-->
							<span class="y">
							   	<!--{if $thread['authorid'] && $thread['author']}-->
								<a class="grey fz12">$thread[author]</a>
								<!--{else}-->
								<a class="grey fz12">$_G[setting][anonymoustext]</a>
							    <!--{/if}-->
							</span>
						</div>
						<!--{if $actives[me] && $viewtype=='reply'}-->
						<div class="bzstidlist cl">
							<em class="arrow"></em>
							<div>
							<!--{loop $tids[$stid] $pid}-->
							<!--{eval $post = $posts[$pid];}-->
							<a href="forum.php?mod=redirect&goto=findpost&ptid=$thread[tid]&pid=$pid"><span class="blue">$space[username]</span><span class="grey"><!--{if $post[message]}-->: {$post[message]}<!--{else}-->...<!--{/if}--></span></a>
							<!--{/loop}-->
							</div>
						</div>
						<!--{/if}-->
					</div>
					
				</div>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	<!--{else}-->
	<div class="b_p hm grey">{lang no_related_posts}</div>
	<!--{/if}-->

<!--{else}-->

	<!--{if !$diymode}-->

		<div class="bz-header">
			<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
			<h2>$space[username]&#30340;{lang topic}</h2>
			<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
		</div>
		<!--{if $list}-->
		<div class="bzthreadlist cl bzbt1 mtm mode">
			<ul>
				<!--{loop $list $thread}-->
				<li>
					<div class="list cl">
						<!--{if !$thread[author]}-->
						<a class="avatar">{avatar($thread[0],middle)}</a>
						<!--{else}-->
						<a href="home.php?mod=space&uid=$thread['authorid']&do=profile" class="avatar">{avatar($thread[authorid],middle)}</a>
					    <!--{/if}-->
						<div class="main">
							<a href="forum.php?mod=viewthread&tid=$thread[tid]" class="title"><span $thread[highlight]><!--{if $thread[folder] == 'lock'}--><img src="{IMGDIR}/folder_lock.gif" class="lock" /><!--{/if}-->{$thread[subject]}</span></a>
							<p class="p">
								<!--{if $thread['special'] == 1}-->
						            <i class="grey fz12 bor">{lang thread_poll}</i>
						        <!--{elseif $thread['special'] == 2}-->
						            <i class="grey fz12 bor">{lang thread_trade}</i>
						        <!--{elseif $thread['special'] == 3}-->
						            <i class="grey fz12 bor">{lang thread_reward}</i>
						        <!--{elseif $thread['special'] == 4}-->
						            <i class="grey fz12 bor">{lang thread_activity}</i>
						        <!--{elseif $thread['special'] == 5}-->
						            <i class="grey fz12 bor">{lang thread_debate}</i>
						        <!--{/if}-->
								<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
								<i class="color-ding fz12 bor">$_G[setting][threadsticky][3-$thread[displayorder]]</i>
								<!--{/if}-->
								<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
								<i class="color-jing fz12 bor">{lang thread_digest}$thread[digest]</i>
								<!--{/if}-->
						        <!--{if $thread[heatlevel]}-->
						        <i class="color-hot fz12 bor">{lang heats}{$thread[heats]}</i>
							    <!--{/if}-->
							</p>
							
							<!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}-->
			                <!--{if $thread['attachment'] == 2}-->
			                <!--{eval $table='forum_attachment_'.substr($thread['tid'], -1);}-->
							<!--{eval $query = DB::fetch_all("SELECT aid,tid,description,filename FROM ".DB::table($table)." WHERE tid='$thread[tid]' AND isimage!=0 ORDER BY `dateline` DESC LIMIT 0,9"); }-->
							<!--{eval $picnum = count($query);}-->
							<!--{if $picnum > 9}-->
							<!--{eval $litpicnum = '9';}-->
							<!--{else}-->
							<!--{eval $litpicnum = $picnum ;}-->
							<!--{/if}-->
							<!--{eval $query2 = DB::fetch_all("SELECT aid,tid,description,filename FROM ".DB::table($table)." WHERE tid='$thread[tid]' AND isimage!=0 ORDER BY `dateline` DESC LIMIT 0,$litpicnum"); }-->
							<!--{eval $thread['pics']=count($query2);}-->
							<div class="cl">
			                  <div class="bz-stc-pic">
			                  	 <ul>
								    <!--{loop $query2 $pic}-->
									<li>
										<a href="forum.php?mod=viewthread&tid=$thread[tid]#aimg_$pic[aid]"><img src="{eval echo(getforumimg($pic[aid],0,400,400))}" /></a>
									</li>
									<!--{/loop}-->
			                  	 </ul>
			                  </div>
							</div>
			                <!--{/if}-->
							
							<div class="cl">
								<span class="z fz12 grey">$thread[dateline]</span>
								<!--{if $thread[replies] > 0}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-message fz12"></i><!--{if $thread['isgroup'] != 1}-->$thread[replies]<!--{else}-->{$groupnames[$thread[tid]][replies]}<!--{/if}--></span>
								<!--{/if}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-chakan fz12"></i>{$thread[views]}</span>
								<!--{if $thread[recommendicon]}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-praise fz12"></i>$thread[recommends]</span>
								<!--{/if}-->
								<span class="y">
								   	<!--{if $thread['authorid'] && $thread['author']}-->
									<a class="grey fz12">$thread[author]</a>
									<!--{else}-->
									<a class="grey fz12">$_G[setting][anonymoustext]</a>
								    <!--{/if}-->
								</span>
							</div>
						</div>
					</div>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{else}-->
		<div class="b_p hm grey">{lang no_related_posts}</div>
		<!--{/if}-->

	<!--{else}-->
		
		<div class="porfile_card">
			<div class="porfile_card_cover" style="background-image: url(<!--{avatar($space[uid], big, true)}-->);background-size: cover;">
				<div class="card_cover">
					<div class="card_cover_header cl">
						<div class="left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
						<h2><!--{if $space[self]}-->{lang myitem}&#31354;&#38388;<!--{else}-->Ta&#30340;&#31354;&#38388;<!--{/if}--></h2>
						<div class="right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
					</div>
				</div>
				<div class="card_cover_wrapper white">
					<div class="b_p15">
					<!--{if $_G[uid]}-->
						<!--{if $space[self]}-->
						<!--{else}-->
							<!--{if helper_access::check_module('follow')}-->
							<div class="card_follow cl">
								<!--{eval $follow = 0;}-->
								<!--{eval $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);}-->
								<!--{if !$follow}-->
								<a href="home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$space[uid]" class="dialog fz12 follow white">&#20851;&#27880;Ta</a>
								<!--{else}-->
								<a href="home.php?mod=spacecp&ac=follow&op=del&fuid=$space[uid]" class="dialog fz12 follow white">&#24050;&#20851;&#27880;</a>
								<!--{/if}-->
							</div>
							<!--{/if}-->
						<!--{/if}-->
					<!--{else}-->
						<!--{if helper_access::check_module('follow')}-->
						<div class="card_follow cl">
							<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="dialog fz12 follow white">&#20851;&#27880;Ta</a>
						</div>
						<!--{/if}-->
					<!--{/if}-->
					<div class="main_avt"><img src="<!--{avatar($space[uid], middle, true)}-->" /></div>
					<h2 class="fts">$space[username]</h2>
					<p><span class="lv">Lv.{$_G['cache']['usergroups'][$space[groupid]][stars]}</span><span class="fts">{$space[group][grouptitle]}&nbsp;&nbsp;</span></p>
					</div>
				</div>
			</div>
			<div class="vision_bottom"><div class="s_botm"></div><div class="s_botm"></div></div>
		</div>
		<div class="porfile_card_nav bz-bg-fff bzbb1">
			<ul class="flex_box">
				<li class="flex">
					<!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}--><em class="bg_xm"></em><!--{/if}-->
					<!--{if $_G[uid]}-->
					<a href="{if CURMODULE != 'follow'}home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space{else}home.php?mod=space&uid=$space[uid]&view=thread{/if}" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}-->class="rtt"<!--{/if}-->><!--{if $space[self]}-->{lang my}&#20027;&#39064;<!--{else}-->Ta&#30340;&#20027;&#39064;<!--{/if}--></a>
					<!--{else}-->
					<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'thread'}-->class="rtt"<!--{/if}-->>Ta&#30340;&#20027;&#39064;</a>
					<!--{/if}-->
				</li>
				<li class="flex">
					<!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'profile'}--><em class="bg_xm"></em><!--{/if}-->
					<a href="home.php?mod=space&uid=$space[uid]&do=profile" <!--{if $_GET['mod'] == 'space' && $_GET['do'] == 'profile'}-->class="rtt"<!--{/if}-->><!--{if $space[self]}-->{lang my}&#36164;&#26009;<!--{else}-->Ta&#30340;&#36164;&#26009;<!--{/if}--></a>
				</li>
			</ul>
		</div>
		
		<!--{if $list}-->
		<div class="bzthreadlist cl bzbt1 mtm else">
			<ul>
				<!--{loop $list $thread}-->
				<li>
					<div class="list cl">
						<!--{if !$thread[author]}-->
						<a class="avatar">{avatar($thread[0],middle)}</a>
						<!--{else}-->
						<a href="home.php?mod=space&uid=$thread['authorid']&do=profile" class="avatar">{avatar($thread[authorid],middle)}</a>
					    <!--{/if}-->
						<div class="main">
							<a href="forum.php?mod=viewthread&tid=$thread[tid]" class="title"><span $thread[highlight]><!--{if $thread[folder] == 'lock'}--><img src="{IMGDIR}/folder_lock.gif" class="lock" /><!--{/if}-->{$thread[subject]}</span></a>
							<p class="p">
								<!--{if $thread['special'] == 1}-->
						            <i class="grey fz12 bor">{lang thread_poll}</i>
						        <!--{elseif $thread['special'] == 2}-->
						            <i class="grey fz12 bor">{lang thread_trade}</i>
						        <!--{elseif $thread['special'] == 3}-->
						            <i class="grey fz12 bor">{lang thread_reward}</i>
						        <!--{elseif $thread['special'] == 4}-->
						            <i class="grey fz12 bor">{lang thread_activity}</i>
						        <!--{elseif $thread['special'] == 5}-->
						            <i class="grey fz12 bor">{lang thread_debate}</i>
						        <!--{/if}-->
								<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
								<i class="color-ding fz12 bor">$_G[setting][threadsticky][3-$thread[displayorder]]</i>
								<!--{/if}-->
								<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
								<i class="color-jing fz12 bor">{lang thread_digest}$thread[digest]</i>
								<!--{/if}-->
						        <!--{if $thread[heatlevel]}-->
						        <i class="color-hot fz12 bor">{lang heats}{$thread[heats]}</i>
							    <!--{/if}-->
							</p>
							
							<!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}-->
			                <!--{if $thread['attachment'] == 2}-->
			                <!--{eval $table='forum_attachment_'.substr($thread['tid'], -1);}-->
							<!--{eval $query = DB::fetch_all("SELECT aid,tid,description,filename FROM ".DB::table($table)." WHERE tid='$thread[tid]' AND isimage!=0 ORDER BY `dateline` DESC LIMIT 0,9"); }-->
							<!--{eval $picnum = count($query);}-->
							<!--{if $picnum > 9}-->
							<!--{eval $litpicnum = '9';}-->
							<!--{else}-->
							<!--{eval $litpicnum = $picnum ;}-->
							<!--{/if}-->
							<!--{eval $query2 = DB::fetch_all("SELECT aid,tid,description,filename FROM ".DB::table($table)." WHERE tid='$thread[tid]' AND isimage!=0 ORDER BY `dateline` DESC LIMIT 0,$litpicnum"); }-->
							<!--{eval $thread['pics']=count($query2);}-->
							<div class="cl">
			                  <div class="bz-stc-pic">
			                  	 <ul>
								    <!--{loop $query2 $pic}-->
									<li>
										<a href="forum.php?mod=viewthread&tid=$thread[tid]#aimg_$pic[aid]"><img src="{eval echo(getforumimg($pic[aid],0,400,400))}" /></a>
									</li>
									<!--{/loop}-->
			                  	 </ul>
			                  </div>
							</div>
			                <!--{/if}-->
			                
							<div class="cl">
								<span class="z fz12 grey">$thread[dateline]</span>
								<!--{if $thread[replies] > 0}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-message fz12"></i><!--{if $thread['isgroup'] != 1}-->$thread[replies]<!--{else}-->{$groupnames[$thread[tid]][replies]}<!--{/if}--></span>
								<!--{/if}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-chakan fz12"></i>{$thread[views]}</span>
								<!--{if $thread[recommendicon]}-->
								<span class="z replies fz12 grey"><i class="banzhuan_font icon-praise fz12"></i>$thread[recommends]</span>
								<!--{/if}-->
								<span class="y">
								   	<!--{if $thread['authorid'] && $thread['author']}-->
									<a class="grey fz12">$thread[author]</a>
									<!--{else}-->
									<a class="grey fz12">$_G[setting][anonymoustext]</a>
								    <!--{/if}-->
								</span>
							</div>
						</div>
					</div>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{else}-->
		<div class="b_p hm grey">{lang no_related_posts}</div>
		<!--{/if}-->

	<!--{/if}-->

<!--{/if}-->

<!--{if $multi}-->$multi<!--{/if}-->		
<div class="clear"></div>
<div class="bz_bottom"></div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
