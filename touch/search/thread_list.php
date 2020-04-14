<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="fz12 grey thread_tit"><!--{if $keyword}-->{lang search_result_keyword} <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page" target="_blank">{lang goto_memcp}</a><!--{/if}--><!--{else}-->{lang search_result}<!--{/if}--></div>
<div class="bzthreadlist">
	<!--{if empty($threadlist)}-->
	<div class="hm mtw">
		<div class="nodata"></div>
		<p class="b_p grey">&#25442;&#20010;&#20851;&#38190;&#35789;&#20877;&#35797;&#35797;&#21543;</p>
	</div>
	<!--{else}-->
	<ul class="bzbt1">
		<!--{loop $threadlist $thread}-->
		<li>
			<div class="list cl">
				<!--{if !$thread[author]}-->
				<a class="avatar">{avatar($thread[0],middle)}</a>
				<!--{else}-->
				<a href="home.php?mod=space&uid=$thread['authorid']&do=profile" class="avatar">{avatar($thread[authorid],middle)}</a>
			    <!--{/if}-->
				<div class="main">
					<a href="forum.php?mod=viewthread&tid=$thread[realtid]&highlight=$index[keywords]" class="title"><!--{if $thread[folder] == 'lock'}--><img src="{IMGDIR}/folder_lock.gif" class="lock" /><!--{/if}-->{$thread[subject]}</a>
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
	<!--{/if}-->
	
	
	$multipage
	
	
</div>
