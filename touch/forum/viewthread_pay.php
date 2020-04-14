<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $thread['freemessage']}-->
	<div id="postmessage_$pid" class="t_f">$thread[freemessage]</div>
<!--{/if}-->
<!--{if empty($_GET['archiver'])}-->
	<div class="cl locked bg b_p15 mtw mbw">
		<p class="hm mtw"><!--{if $_G[forum_thread][price] > 0}-->{lang pay_comment}<!--{/if}--><!--{if $thread[endtime]}-->{lang pay_free_time}<!--{/if}--></p>
		<!--{if $thread[payers]}--><p class="hm mtw grey fz14">{lang have} $thread[payers] {lang people_buy}</p><!--{/if}-->
		<div class="mtw mbw btn-big">
			<a href="forum.php?mod=misc&action=pay&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET['from'])}&from=$_GET['from']{/if}" class="dialog touch" title="{lang pay}">{lang pay}</a>
		</div>
	</div>
<!--{else}-->
	<div class="cl b_p15 mtw mbw">
		<!--{if $_G[forum_thread][price] > 0}--><p class="hm mtw">{lang pay_comment}</p><!--{/if}--><!--{if $thread[endtime]}--><p class="hm mtw">{lang pay_free_time}</p><!--{/if}-->
		<!--{if $thread[payers]}--><p class="hm mbw grey">{lang have} $thread[payers] {lang people_buy}</p><!--{/if}-->
	</div>
<!--{/if}-->