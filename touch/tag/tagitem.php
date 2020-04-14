<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="javascript:history.back();" class="banzhuan_font icon-fanhui1"></a></div>
	<h2><!--{if $tagname}-->{lang tag}: $tagname<!--{else}-->{lang tag}: $searchtagname<!--{/if}--></h2>
	<div class="bz-header-right"><a class="banzhuan_font icon-daohang bzleft"></a></div>
</div>
<div class="clear"></div>

<!--{if $tagname}-->

	<div class="bz-in-sehot bz-bg-fff">
		<ul>
			<li>
				<a>
				<em class="banzhuan_font icon-search"></em>
					<form method="post" action="misc.php?mod=tag" class="searchform">
					<input type="text" name="name" placeholder="{lang enter_content}..." class="input">
					<!--{eval $policymsgs = $p = '';}-->
					<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
					<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
					<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
					<!--{/loop}-->
					<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
				 </form>
				</a>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
	<div class="cl">
		<!--{if empty($showtype) || $showtype == 'thread'}-->
			<div class="bz-tag-thread">
				<p class="fz14 b_p bzbb1 grey"><em class="banzhuan_font icon-huati fz14"></em> {lang related_thread}</p>
				<!--{if $threadlist}-->
					<ul class="threadlist">
						<!--{loop $threadlist $thread}-->
						<li>
							<a href="forum.php?mod=viewthread&tid=$thread[tid]">
								<span $thread[highlight]>{$thread[subject]}</span>
								<p>
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
								<p>
									<!--{if !$thread[author]}-->
					              	<span class="avt">{avatar($thread[0],small)}</span>
					              	<!--{else}-->
					              	<span class="avt">{avatar($thread[authorid],small)}</span>
					              	<!--{/if}-->
									<span class="grey fz14">
									<!--{if $thread['authorid'] && $thread['author']}-->
									$thread[author]&nbsp;
									<!--{else}-->
									$_G[setting][anonymoustext]&nbsp;
									<!--{/if}-->
									</span>
									<span class="grey fz12">$thread[dateline]</span>
									<span class="y grey fz12 banzhuan_font icon-chakan" style="margin-left: 5px;">{$thread[views]}</span>
									<!--{if $thread[replies] > 0}-->
									<span class="y grey fz12 banzhuan_font icon-message" style="margin-left: 5px;"><!--{if $thread['isgroup'] != 1}-->$thread[replies]<!--{else}-->{$groupnames[$thread[tid]][replies]}<!--{/if}--></span>
									<!--{/if}-->
									<!--{if $thread[recommendicon]}-->
									<span class="y grey fz12 banzhuan_font icon-praise">$thread[recommends]</span>
									<!--{/if}-->
								</p>
							</a>
						</li>
						<!--{/loop}-->
					</ul>
					<!--{if empty($showtype)}-->
						<div class="hm grey b_p">
							<a href="misc.php?mod=tag&id=$id&type=thread" class="blue">{lang more}...</a>
						</div>
					<!--{else}-->
						<!--{if $multipage}--><div class="pgs mtm cl">$multipage</div><!--{/if}-->
					<!--{/if}-->
				<!--{else}-->
					<div class="hm grey b_p">{lang no_content}</div>
				<!--{/if}-->
			</div>
		<!--{/if}-->
		<!--{if helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')}-->
		<!--{/if}-->
	</div>

<!--{else}-->

	<div class="cl">
		<div class="bz-in-sehot bz-bg-fff">
			<ul>
				<li>
					<a>
					<em class="banzhuan_font icon-search"></em>
						<form method="post" action="misc.php?mod=tag" class="searchform">
						<input type="text" name="name" placeholder="{lang enter_content}..." class="input">
						<!--{eval $policymsgs = $p = '';}-->
						<!--{loop $_G['setting']['creditspolicy']['search'] $id $policy}-->
						<!--{block policymsg}--><!--{if $_G['setting']['extcredits'][$id][img]}-->$_G['setting']['extcredits'][$id][img] <!--{/if}-->$_G['setting']['extcredits'][$id][title] $policy $_G['setting']['extcredits'][$id][unit]<!--{/block}-->
						<!--{eval $policymsgs .= $p.$policymsg;$p = ', ';}-->
						<!--{/loop}-->
						<!--{if $policymsgs}--><p>{lang search_credit_msg}</p><!--{/if}-->
					 </form>
					</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="hm grey b_p">&#27809;&#26377;&#27492;{lang tag}</div>
	</div>
	
<!--{/if}-->

<!--{template common/footer}-->
