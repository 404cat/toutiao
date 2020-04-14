<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="banzhuan-poll bg b_p15 mtw mbw">
	<form id="poll" name="poll" method="post" autocomplete="off" action="forum.php?mod=misc&action=votepoll&fid=$_G[fid]&tid=$_G[tid]&pollsubmit=yes{if $_GET[from]}&from=$_GET[from]{/if}&quickforward=yes&mobile=2" >
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<div class="hm mtw">$_G[forum_thread][subject]</div>
		<div class="fz12 grey cl hm"><!--{if $multiple}-->{lang poll_multiple}{lang thread_poll}<!--{else}-->{lang poll_single}{lang thread_poll}<!--{/if}-->&nbsp;/&nbsp;<!--{if $multiple}--><!--{if $maxchoices}-->{lang poll_more_than}&nbsp;/&nbsp;<!--{/if}--><!--{/if}-->{lang poll_voterscount}</div>
		<!--{if $_G[forum_thread][remaintime]}-->
		<div class="grey fz12 cl hm"><!--{if $visiblepoll && $_G['group']['allowvote']}-->{lang poll_after_result}&nbsp;/&nbsp;<!--{/if}-->{lang poll_count_down}&nbsp;:&nbsp;&nbsp;<!--{if $_G[forum_thread][remaintime][0]}-->$_G[forum_thread][remaintime][0]{lang days}<!--{/if}--><!--{if $_G[forum_thread][remaintime][1]}-->$_G[forum_thread][remaintime][1]{lang poll_hour}<!--{/if}-->$_G[forum_thread][remaintime][2]{lang poll_minute}</div>
		<!--{elseif $expiration && $expirations < TIMESTAMP}-->
		<div class="grey fz12 cl hm">{lang poll_end}</div>
		<!--{/if}-->
		<div>
			
	        <!--{loop $polloptions $key $option}-->
	            <div class="p">
	            	<div>
	            <!--{if $_G['group']['allowvote']}-->
	                <input type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if}  />
	            <!--{/if}-->
	           		<label for="option_$key">$key.$option[polloption]</label>
	            <!--{if !$visiblepoll}-->
	                <span class="grey fz12 y">$option[percent]% <em style="color:#$option[color]">($option[votes])</em></span>
	            <!--{/if}-->
	            </div>
	            <!--{if !$visiblepoll}-->
	            <div class="bzvisiblepoll">
	           		<div class="bzpbg">
						<div class="bzpbr" style="width: $option[width]; background-color:#$option[color]"></div>
					</div>
	            </div>
	            <!--{/if}-->
	            
	            </div>
	        <!--{/loop}-->
	        
	        <!--{if $_G['group']['allowvote'] && !$_G['forum_thread']['is_archived']}-->
	            <div class="mtw mbw btn-big">
					 <input type="submit" name="pollsubmit" id="pollsubmit" value="{lang submit}" class="touch" />
				</div>
	            <!--{if $overt}-->
	            <div class="grey fz12 cl hm mbw">{lang poll_msg_overt}</div>
	            <!--{/if}-->
	        <!--{elseif !$allwvoteusergroup}-->
	            <!--{if !$_G['uid']}-->
	            <div class="mtw mbw btn-big">
					<a href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');" class="touch">&#25105;&#35201;{lang thread_poll}</a>
				</div>
	            <!--{else}-->
	            <div class="grey fz12 cl hm mbw">{lang poll_msg_allwvoteusergroup}</div>
	            <!--{/if}-->
	        <!--{elseif !$allowvotepolled}-->
	            <div class="grey fz12 cl hm mbw">{lang poll_msg_allowvotepolled}</div>
	        <!--{elseif !$allowvotethread}-->
	            <div class="grey fz12 cl hm mbw">{lang poll_msg_allowvotethread}</div>
	        <!--{/if}-->
		</div>
	</form>
</div>
<div class="clear cl"></div>
<div id="postmessage_$post[pid]" class="postmessage bz_message_table mtw mbw">$post[message]</div>
