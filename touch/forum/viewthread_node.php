<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{eval $_G[forum_thread][special] = 0;}-->
<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->

<div class="bz_plc_reply cl bz-bg-fff" id="pid$post[pid]">
    <div class="display pi" href="#replybtn_$post[pid]">
    		<div class="cl" style="position: relative;">
    			<span class="avatar">
    				<a<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}--> href="home.php?mod=space&uid=$post[authorid]&do=profile"<!--{/if}-->>
    					<img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, middle, true)}--><!--{else}--><!--{avatar($post[authorid], middle, true)}--><!--{/if}-->" style="width:34px;height:34px;" />
    				</a>
    			</span>
    			<ul class="authi">
				<li>
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						<!--{eval $_self = $thread['author'] && $post['author'] == $thread['author'] && $post['position'] !== '1';}-->
						<a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="blue fz14 z">$post[author]</a>
						<span class="authortitle z">$post[authortitle]</span>
					<!--{else}-->
						<!--{if !$post['authorid']}-->
						<a class="blue fz14 z">{lang guest} <span class="fz12 color-bbb">{if $post[port]}$post[port]{/if}</span></a>
						<!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
							<a class="blue fz14 z"><!--{if $_G['forum']['ismoderator']}-->{lang anonymous}<!--{else}-->{lang anonymous}<!--{/if}--></a>
						<!--{else}-->
						<a class="blue fz14 z">$post[author] <span class="fz12 color-bbb">{lang member_deleted}</span></a>
						<!--{/if}-->
					<!--{/if}-->
					
					<!--{if $post[gender] == 1}-->
		      	    <span class="banzhuan_font icon-nan rmale z gender"></span>
		            <!--{/if}-->
		            	<!--{if $post[gender] == 2}-->
		      	    <span class="banzhuan_font icon-nv rfemale z gender"></span>
		            <!--{/if}-->
					<!--{if $_self}--><span class="self color-bbb z">{lang thread_author}</span><!--{/if}-->
					
					<!--{if !$post[first] && $_G['forum_thread']['special'] == 5}-->
						<!--{if $post[stand] == 1}--><a class="color-bbb stand z" title="{lang debate_view_square}">{lang debate_square}</a>
						<!--{elseif $post[stand] == 2}--><a class="color-bbb stand z" title="{lang debate_view_opponent}">{lang debate_opponent}</a>
						<!--{else}--><a class="color-bbb stand z" title="{lang debate_view_neutral}">{lang debate_neutral}</a>
						<!--{/if}-->
						<!--{if $post[stand]}-->
							<!--<a class="b" href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&pid=$post[pid]" id="voterdebate_$post[pid]" onclick="ajaxmenu(this);doane(event);">{lang debate_support} $post[voters]</a>-->
						<!--{/if}-->
					<!--{/if}-->
					
					<em class="color-bbb">
					<!--{if isset($post[isstick])}-->
						<i>{lang modmenu_stickthread}</i><i>{$post[number]}{$postnostick}</i>
					<!--{elseif $post[number] == -1}-->
						<i>{lang recommend_post}</i>
					<!--{else}-->
						<!--{if !empty($postno[$post[number]])}-->
						    <i>$postno[$post[number]]</i><i>{$post[number]}{$postnostick}</i>
						<!--{else}-->
						    <i>{$post[number]}{$postnostick}</i>
						<!--{/if}-->
					<!--{/if}-->
					</em>
				</li>
            	</ul>
    		</div>
    		<!--{ad/thread/bz_vtr_inside_pt hm/2/$postcount}-->
		<!--{ad/thread/bz_vtr_inside_pr hm/3/$postcount}-->
		<div class="message bz_message">
			
        		<!--{if $post['warned']}-->
                <span class="grey quote">{lang warn_get}</span>
            <!--{/if}-->
            <!--{if !$post['first'] && !empty($post[subject])}-->
                <h2><strong>$post[subject]</strong></h2>
            <!--{/if}-->
            
            <!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
                <div class="grey quote">{lang message_banned}</div>
            <!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
                <div class="grey quote">{lang message_single_banned}</div>
            <!--{elseif $needhiddenreply}-->
                <div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
			<!--{else}-->
            		<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
                    <div class="grey quote">{lang admin_message_banned}</div>
                <!--{elseif $post['status'] & 1}-->
                    <div class="grey quote">{lang admin_message_single_banned}</div>
                <!--{/if}-->
                $post[message]
			<!--{/if}-->

		</div>
		<div class="times">
			<span class="color-bbb">$post[dateline]<!--<!--{if $post['status'] & 8}-->&nbsp;{lang from_mobile}&nbsp;<!--{else}-->&nbsp;&#26469;&#33258;&#30005;&#33041;&nbsp;<!--{/if}-->--></span>
			<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
			<!--{if $_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']}-->
			<!--{if $_G['forum']['ismoderator']}-->
			<!--{else}-->
			<a class="blue" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page"><em>{lang edit}</em></a>
			<!--{/if}-->
			<!--{/if}-->
			<!--{/if}-->
			<!--{if $_G['forum']['ismoderator']}-->
			<a href="#moption_$post[pid]" class="popup blue"><em>{lang manage}</em></a>
			<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
				<input type="button" value="{lang edit}" class="redirect bz_button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
				<!--{if $_G['group']['allowdelpost']}--><input type="button" value="{lang modmenu_deletepost}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
				<!--{if $_G['group']['allowbanpost']}--><input type="button" value="{lang modmenu_banpost}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
				<!--{if $_G['group']['allowwarnpost']}--><input type="button" value="{lang modmenu_warn}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
			</div>
			<!--{/if}-->
			<!--{if $_G[uid]}-->
			<a class="y" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" style="margin-left: 10px;"><i class="banzhuan_font icon-message color-bbb"></i></a>
			<!--{/if}-->
			<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
			<a class="replyadd y" href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}" onmouseover="this.title = ($('review_support_$post[pid]').innerHTML ? $('review_support_$post[pid]').innerHTML : 0) + ' {lang activity_member_unit} {lang support_reply}'"><em class="color-bbb">$post[postreview][support]</em><i class="banzhuan_font icon-praise color-bbb"></i></a>
			<!--{/if}-->
			<!--{if !$post[first] && $_G['forum_thread']['special'] == 5}-->
			<!--{if $post[stand]}-->
			<!--{if $_G[uid]}-->
			<a class="y dialog" href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&pid=$post[pid]" id="voterdebate_$post[pid]"><!--{if $post[voters]>0 }--><em class="grey">$post[voters]</em><!--{/if}--><i class="banzhuan_font icon-praise color-bbb"></i></a>
			<!--{else}-->
			<a class="y" href="javascript:popup.open('&#24744;&#36824;&#26410;{lang login}, &#31435;&#21363;{lang login}?', 'confirm', 'member.php?mod=logging&action=login');"><!--{if $post[voters]>0 }--><em class="grey">$post[voters]</em><!--{/if}--><i class="banzhuan_font icon-praise color-bbb"></i></a>
			<!--{/if}-->
			<!--{/if}-->
			<!--{/if}-->
		</div>
		<!--{ad/thread/bz_vtr_inside_pb hm/1/$postcount}-->
		<!--{ad/interthread/bz_vtr_midway hm/$postcount}-->
	</div>
</div>
