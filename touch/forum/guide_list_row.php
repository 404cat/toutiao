<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $list['threadcount']}-->
<!--{loop $list['threadlist'] $key $thread}-->
<li>
	<a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra">
		<!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
			<!--{eval $thread[tid]=$thread[closed];}-->
		<!--{/if}-->
		$thread[typehtml] $thread[sorthtml]
		<span $thread[highlight] >{$thread[subject]}</span>
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
<!--{else}-->
<p class="b_p hm grey">{lang guide_nothreads}</p>
<!--{/if}-->
