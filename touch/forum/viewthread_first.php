<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz_plc_first cl bz-bg-fff bzbb1" id="pid$post[pid]">
    <div class="display pi" href="#replybtn_$post[pid]">
    		<div class="cl" style="position: relative;">
    			<!--{if $_G['forum_threadstamp']}-->
			<div id="threadstamp"><img src="{STATICURL}image/stamp/$_G[forum_threadstamp][url]" title="$_G[forum_threadstamp][text]" /></div>
			<!--{/if}-->
    			<span class="avatar">
    				<a<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}--> href="home.php?mod=space&uid=$post[authorid]&do=profile"<!--{/if}-->>
    					<img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, middle, true)}--><!--{else}--><!--{avatar($post[authorid], middle, true)}--><!--{/if}-->" style="width:34px;height:34px;" />
    				</a>
    			</span>
    			<ul class="authi">
				<li>
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
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
					<em class="color-bbb fz12 y">&#27004;&#20027;</em>
				</li>
				<li class="color-bbb">
					$post[dateline]&nbsp;
					<!--<!--{if $post['status'] & 8}-->{lang from_mobile}&nbsp;&nbsp;<!--{else}-->&#26469;&#33258;&#30005;&#33041;&nbsp;&nbsp;<!--{/if}-->-->
					
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && $post['authorid'] == $_G['uid']))}-->
					<!--{if $_G['forum_thread']['special'] != 2 || $_G['forum_thread']['special'] != 4 || !$post['first']}-->
					<!--{if $_G['forum']['ismoderator']}-->
					<!--{else}-->
					<a class="blue" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">{lang edit}</a>
					<!--{/if}-->
					<!--{/if}-->
					<!--{/if}-->
					
					<!--{if $_G['forum']['ismoderator']}-->
					<a href="#moption_$post[pid]" class="popup blue">{lang manage}</a>
					<div id="moption_$post[pid]" popup="true" class="manage" style="display:none;">
						<!--{if !$_G['forum_thread']['special']}-->
						<input type="button" value="{lang edit}" class="redirect bz_button" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
						<!--{/if}-->
						<input type="button" value="{lang delete}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
						<input type="button" value="{lang close}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
						<input type="button" value="{lang admin_banpost}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
						<input type="button" value="{lang topicadmin_warn_add}" class="dialog bz_button" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
					</div>
					<!--{/if}-->
					
				</li>
            	</ul>
    		</div>
		<div class="message bz_message">
			<!--{ad/thread/bz_vtf_inside_pt hm/2/$postcount}-->
			<!--{ad/thread/bz_vtf_inside_pr hm/3/$postcount}-->
			<div>
            		<!--{if $post['warned']}-->
                    <span class="grey quote">{lang warn_get}</span>
                <!--{/if}-->
                
                <!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
                    <div class="grey quote">{lang message_banned}</div>
                <!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
                    <div class="grey quote">{lang message_single_banned}</div>
                <!--{elseif $needhiddenreply}-->
                    <div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
                <!--{elseif $post['first'] && $_G['forum_threadpay']}-->
					<!--{template forum/viewthread_pay}-->
				<!--{else}-->
				
                		<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
                        <div class="grey quote">{lang admin_message_banned}</div>
                    <!--{elseif $post['status'] & 1}-->
                        <div class="grey quote">{lang admin_message_single_banned}</div>
                    <!--{/if}-->
                    <!--{if $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
                   		<div class="pay_view b_p15 bg mtw mbw">
                        		{lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]}</strong>
                        		<a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" class="dialog y blue">{lang pay_view}</a>
                   		</div>
                    <!--{/if}-->

                    <!--{if $post['first'] && $threadsort && $threadsortshow}-->
                    	   <!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
                            <!--{if $threadsortshow['optionlist'] == 'expire'}-->
                                {lang has_expired}
                            <!--{else}-->
                                <div class="box_ex2 viewsort cl">
						            <div class="bz-at-form mtw mbw">
						            	<h4 class="hm mbn">$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</h4>
									<table cellpadding="0" cellspacing="1" border="0">
							            <!--{loop $threadsortshow['optionlist'] $option}--> 
							            <!--{if $option['type'] != 'info'}-->
							            <!--{if $option['value']}-->
										<tr>
											<th>$option[title]:</th>
											<td>
											
												<!--{eval preg_match("/(".str_replace("/",'\/',$_G['setting']['attachurl']).")(.*?)((.gif)|(.jpg)|(.jpeg)|(.bmp)|(.png))/",strtolower($option['value']),$dzlab_match);}-->
												<!--{if count($dzlab_match)}-->
												<img src='$dzlab_match[0]' />
												<!--{else}-->
												$option[value]
												<!--{/if}-->
											$option[unit]
											
											</td>
										</tr>
										<!--{else}-->
											<!--{/if}-->
							            <!--{/if}-->
							            <!--{/loop}-->
					              	</table>
								    </div>
                                </div>
                            <!--{/if}-->
                        <!--{/if}-->
                    <!--{/if}-->
                    
					<!--{if !$_G[forum_thread][special]}-->
						<div class="bz_message_table">$post[message]</div>
					<!--{elseif $_G[forum_thread][special] == 1}-->
					    <!--{template forum/viewthread_poll}-->
					<!--{elseif $_G[forum_thread][special] == 2}-->
					    <!--{template forum/viewthread_trade}-->
					<!--{elseif $_G[forum_thread][special] == 3}-->
					    <!--{template forum/viewthread_reward}-->
					<!--{elseif $_G[forum_thread][special] == 4}-->
					    <!--{template forum/viewthread_activity}-->
					<!--{elseif $_G[forum_thread][special] == 5}-->
					    <!--{template forum/viewthread_debate}-->
					<!--{elseif $threadplughtml}-->
					    $threadplughtml
					    $post[message]
					<!--{else}-->
						$post[message]
					<!--{/if}-->
					
				<!--{/if}-->

			</div>

			<!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
				<!--{if $post['attachment']}-->
					<div class="grey quote">
						{lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em>
					</div>
				<!--{elseif $post['imagelist'] || $post['attachlist']}-->
					<!--{if $post['imagelist']}-->
						<!--{if count($post['imagelist']) == 1}-->
						<ul class="img_one">{echo showattach($post, 1)}</ul>
						<!--{else}-->
						<ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
						<!--{/if}-->
					<!--{/if}-->
					<!--{if $post['attachlist']}-->
						<ul>{echo showattach($post)}</ul>
					<!--{/if}-->
				<!--{/if}-->
			<!--{/if}-->
			
			
			<!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
		    <div class="bz-vt-tag cl">
			    <!--{if $post[tags]}-->
					<!--{eval $tagi = 0;}-->
					<!--{loop $post[tags] $var}-->
						<!--{if $tagi}--> <!--{/if}--><a title="$var[1]" href="misc.php?mod=tag&id=$var[0]" class="color-bbb fz12">$var[1]</a>
						<!--{eval $tagi++;}-->
					<!--{/loop}-->
				<!--{/if}-->
				<!--{if $relatedkeywords}--><span>$relatedkeywords</span><!--{/if}-->
			</div>
			<!--{/if}-->
			

		</div>
	<!--{ad/thread/bz_vtf_inside_pb hm/1/$postcount}-->
    </div>
</div>

<!--{if !IS_ROBOT && $post['first'] && !$_G['forum_thread']['archiveid']}-->
<!--{if $post['invisible'] == 0}-->
<div class="bz_postfirst_btn">
	<ul>
		<li><a href="forum.php?mod=misc&action=recommend&do=add&tid=$_G[tid]&hash={FORMHASH}" class="recbtn banzhuan_font icon-praise"><span>{lang support_reply}<em id="recommendv_add"{if !$_G['forum_thread']['recommend_add']} style="display:none"{/if}>&nbsp;{$_G['forum_thread']['recommend_add']}</em></span></a></li>
		<li><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn banzhuan_font icon-collection"><span>{lang thread_favorite}<em id="favoritenumber"{if !$_G['forum_thread']['favtimes']} style="display:none"{/if}>&nbsp;{$_G['forum_thread']['favtimes']}</em></span></a></li>
		<!--<li><a href="#BzvtShare" class="BzvtShare banzhuan_font icon-share"><span>{lang thread_share}</span></a></li>-->
		<!--<li><a href="#" class="banzhuan_font icon-share"><span>{lang thread_share}</span></a></li>-->
	</ul>
</div>

<div id="BzvtShare" class="BzvtShare" style="display: none;">
    <div class="BzvtShareBox">
    		<div class="bdsharebuttonbox">
	    		<a data-cmd="sqq"><span class="share_qq"></span>QQ&#22909;&#21451;</a>
	    		<a data-cmd="qzone"><span class="share_qzone"></span>QQ&#31354;&#38388;</a>
	    		<a data-cmd="weixin"><span class="share_wechat"></span>&#24494;&#20449;</a>
	    		<a data-cmd="weixin"><span class="share_moments"></span>&#26379;&#21451;&#22280;</a>
	    		<a data-cmd="tsina"><span class="share_weibo"></span>&#24494;&#21338;</a>
	    		<a data-cmd="copy"><span class="share_url"></span>{lang share_url_copy}</a>
	    		<a href="#"><span class="share_ding"></span>{lang scrolltop}</a>
	    		<a data-cmd="more"><span class="share_more"></span>{lang more}</a>
    		</div>
    </div>
    <div href="#BzvtShare" class="BzvtShareMask MaskBg"></div>
	<div href="#BzvtShare" class="BzvtShareClose blue">{lang cancel}</div>
</div>
<script type="text/javascript">
	(function() {
		$('.BzvtShare').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
	 (function() {
		$('.BzvtShareMask').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
	 (function() {
		$('.BzvtShareClose').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
			} else {
				subobj.css('display', 'none');
			}
		});
	 })();
</script>

<!--{/if}-->
<!--{/if}-->

<div class="clear"></div>
<div class="bz_list" style="display: none;">
<img src="#"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]" class="z blue">{eval echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];}</a><i class="banzhuan_font icon-gengduo"></i>
</div>

<!--{ad/interthread/bz_vtf_midway hm/$postcount}-->

<!--{if $post['invisible'] == 0}-->
<!--{if $post['relateitem']}-->
<div class="clear"></div>
<div class="bz_relateitem_title b_p bz-bg-fff bzbt1 cl">
	<h1 class="z">{lang related_thread}</h1>
	<a href="misc.php?mod=tag" class="y grey">{lang more}<i class="banzhuan_font icon-gengduo color-bbb"></i></a>
</div>
<div class="bz_relateitem_list bzbb1">
	<ol class="cl" type="1">
	<!--{loop $post['relateitem'] $var}-->
	<li><a href="forum.php?mod=viewthread&tid=$var[tid]">$var[subject]</a></li>
	<!--{/loop}-->
	</ol>
</div>
<div class="clear"></div>
<!--{/if}-->
<!--{/if}-->

<div class="bz_replylist_title b_p bz-bg-fff bzbt1 cl">
	<h1 class="z">{lang all}{lang reply}</h1><em{if !$_G[forum_thread][allreplies]} style="display:none"{/if} class="z color-bbb">&nbsp;&nbsp;$_G[forum_thread][allreplies]</em>
	<!--{if $ordertype != 1}-->
	<a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=1" class="y grey"><i class="banzhuan_font icon-paixujiang"></i>&#20498;&#24207;</a>
	<!--{else}-->
	<a href="forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype=2" class="y grey"><i class="banzhuan_font icon-paixusheng"></i>&#27491;&#24207;</a>
	<!--{/if}-->
	<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
	<!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
	<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page&authorid=$_G[forum_thread][authorid]" rel="nofollow" class="y grey"><i class="banzhuan_font icon-chakan"></i>&#27004;&#20027;</a>
	<!--{elseif !$_G['forum_thread']['archiveid']}-->
	<a href="forum.php?mod=viewthread&tid=$_G[tid]&page=$page" rel="nofollow" class="y grey"><i class="banzhuan_font icon-chakan"></i>{lang all}</a>
	<!--{/if}-->
	<!--{/if}-->
</div>
<div class="clear"></div>

