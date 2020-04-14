<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $sublist > 0}-->
<div class="bz_h10"></div>
<div class="banzhuan-clear"></div>
<div class="bz-mb10">
	<div class="bz-sub-show bzbb1 cl">
    		<h2><a>$_G['forum'][name]</a></h2>
    </div>
	<div class="sub_forum_only">
		<ul>
			<!--{loop $sublist $sub}-->
			<li>
				<div class="gengduo"><a href="forum.php?mod=forumdisplay&fid={$sub[fid]}"><i class="banzhuan_font icon-gengduo"></i></a></div>
				<div class="name-pic">
                    <!--{if $sub[icon]}-->
                    {$sub[icon]}
                    <!--{else}-->
                    <a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">
						<img src="template/banzhuan_xmbbs/touch/xmbbs/images/forum-icon.jpg" align="left" />
                    </a>
                    <!--{/if}-->
			    </div>
                	<div class="name-tit">
                		<a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">
                			<span>{$sub['name']}</span>
                			<!--{if $sub[todayposts] > 0}-->
                	        	<p>{lang forum_threads} <!--{echo dnumber($sub[threads])}--> / {lang posts} <!--{echo dnumber($sub[posts])}--> / <em class="rq">{lang index_today}: $sub[todayposts]</em></p>
                	        <!--{else}-->
                	        	<p>{lang forum_threads} <!--{echo dnumber($sub[threads])}--> / {lang posts} <!--{echo dnumber($sub[posts])}--></p>
                	        	<!--{/if}-->
                	    </a>
                	</div>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
</div>
<div class="banzhuan-clear"></div>
<!--{/if}-->



