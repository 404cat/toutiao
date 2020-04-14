<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="cl banzhuan-debate mbw">
	<!--{if $debate[endtime]}-->
	<div class="grey fz12 cl hm">{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}-->{lang debate_umpire}: $debate[umpire]<!--{/if}--></div>
	<!--{/if}-->
	<div class="mtw mbw cl banzhuan-debate-box">

	    <div class="z bg banzhuan-debate-half square">
		    	<div class="main b_p15 cl">
		    		<div class="z info">
			        <p class="statement">$debate[affirmpoint]</p>
				</div>
				<div class="y point_chart">
					<div class="chart" style="height: {echo $debate[affirmvoteswidth]}%;" title="{lang debate_square} ($debate[affirmvotes])"></div>
				</div>
				<!--{if !$_G['forum_thread']['is_archived']}-->
				<div class="clear"></div>
			    <div class="mtm mbm btn-big">
		        		<!--{if !$_G['uid']}-->
					<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="touch_square">{lang debate_support}&#27491;&#26041;</a>
		            <!--{else}-->
					<a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=1" id="affirmbutton" class="touch_square dialog">{lang debate_support}&#27491;&#26041;</a>
					<!--{/if}-->
				</div>
				<!--{/if}-->
			    <div class="grey fz12 cl hm">$debate[affirmvotes] &#20154;</div>
		    </div>
		    	<!--{if $debate[affirmdebaters] > 0 }-->
		    	<div class="clear"></div>
	        <div class="debater grey fz12 cl mbw b_p" style="display: none;">
	        		{lang debater}: 
	        		<!--{loop $debate[affirmavatars] $user}--><a href="home.php?mod=space&uid=$user[authorid]&do=profile" class="blue">$user[author] </a><!--{/if}-->
	        </div>
	        <!--{/if}-->
	    </div>

	    <div class="y bg banzhuan-debate-half opponent">
			<div class="main b_p15 cl">
				<div class="y info">
			        <p class="statement">$debate[negapoint]</p>
			    </div>
			    <div class="z point_chart">
					<div class="chart" style="height: {echo $debate[negavoteswidth]}%;" title="{lang debate_opponent} ($debate[negavotes])"></div>
			    </div>
		        <div class="clear"></div>
		        <div class="mtm mbm btn-big">
		        		<!--{if !$_G['uid']}-->
					<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="touch_opponent">{lang debate_support}&#21453;&#26041;</a>
		            <!--{else}-->
					<a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=2" id="negabutton" class="touch_opponent dialog">{lang debate_support}&#21453;&#26041;</a>
					<!--{/if}-->
				</div>
			    <div class="grey fz12 cl hm">$debate[negavotes] &#20154;</div>
		    </div>
		    <!--{if $debate[negadebaters] > 0 }-->
		    <div class="clear"></div>
	        <div class="grey fz12 cl mbw" style="display: none;">
	        		{lang debater}: 
	        		<!--{loop $debate[negaavatars] $user}--><a href="home.php?mod=space&uid=$user[authorid]&do=profile" class="blue">$user[author] </a><!--{/if}-->
	        </div>
	        <!--{/if}-->
	    </div>

    </div>
	<!--{if $debate[umpire] && $_G['username'] && $debate[umpire] == $_G['member']['username']}-->
	<div class="clear"></div>
	<div class="mtw mbw grey fz12 cl hm">
		<p>{lang mobile2version}&#26242;&#19981;{lang debate_support} " {lang debate_umpire_end}/{lang debate_umpirepoint_edit} "</p>
		<p>&#35831;&#20351;&#29992;{lang nomobiletype}{lang manage}{lang thread_debate}&#20027;&#39064;</p>
	</div>
	<!--{/if}-->
</div>

<!--{if $debate[umpire]}-->
<!--{if $debate['umpirepoint']}-->
<div class="cl banzhuan-debate mtw mbw">
	<div class="banzhuan-debate-box bg b_p15 ">
	<div class="hm mtw">
	<!--{if $debate[winner]}-->
		<!--{if $debate[winner] == 1}-->{lang debate_square}{lang debate_winner}<!--{elseif $debate[winner] == 2}-->{lang debate_opponent}{lang debate_winner}<!--{else}-->{lang debate_draw}<!--{/if}-->
	<!--{/if}-->
	</div>
	<div class="grey fz12 cl hm">{lang debate_comment_dateline}: $debate[endtime]</div>
	<!--{if $debate[bestdebater]}-->
	<div class="hm mtw">{lang debate_bestdebater}</div>
	<div class="blue fz12 cl hm">$debate[bestdebater]</div>
	<!--{/if}-->
	<!--{if $debate[umpirepoint]}-->
	<div class="hm mtw">{lang debate_umpirepoint}</div>
	<div class="grey fz12 cl hm mbw">$debate[umpirepoint]</div>
	<!--{/if}-->
	</div>
</div>
<!--{/if}-->
<!--{/if}-->




<div class="clear"></div>
<div id="postmessage_$post[pid]" class="postmessage bz_message_table mtw mbw">$post[message]</div>



