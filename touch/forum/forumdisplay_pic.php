<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{loop $_G['forum_threadlist'] $key $thread}-->
	<!--{if !$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0}-->
		{eval continue;}
	<!--{/if}-->
		<!--{if $thread['displayorder'] > 0 && !$displayorder_thread}-->
		{eval $displayorder_thread = 1;}
    <!--{/if}-->
	<!--{if $thread['moved']}-->
		<!--{eval $thread[tid]=$thread[closed];}-->
	<!--{/if}-->
	<li class="bz-bg-fff">
		<!--{hook/forumdisplay_thread_mobile $key}-->
		<div class="c cl">
			<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="$thread[subject]" class="z">
				<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4)) && $thread['digest'] > 0}-->
				<i>&#32622;&#39030; / &#31934;&#21326;</i>
				<!--{elseif in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
				<i>&#32622;&#39030;</i>
				<!--{elseif $thread['digest'] > 0}-->
				<i>&#31934;&#21326;</i>
				<!--{else}-->
				<!--{/if}-->
				<!--{if $thread['cover']}-->
				<img src="$thread[coverpath]" alt="$thread[subject]"/>
				<!--{else}-->
				<span class="nopic" style="width: 100%; height: 120px;"></span>
				<!--{/if}-->
			</a>
		</div>
	</li>
<!--{/loop}-->
					
					
					