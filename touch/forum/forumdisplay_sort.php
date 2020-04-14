<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div id="threadlist" class="bm bmw"{if $_G['uid']} style="position: relative;"{/if}>
	<!--{if $quicksearchlist && !$_GET['archiveid']}-->
		<!--{subtemplate forum/search_sortoption}-->
	<!--{/if}-->
	$sorttemplate['header']
	<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&action=moderate&fid=$_G[fid]&infloat=yes&nopost=yes">
		$sorttemplate['body']
	</form>
	$sorttemplate['footer']
</div>