<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->

<!--{if in_array($filter, array('privatepm')) || in_array($_GET[subop], array('view')) || in_array($filter, array('announcepm')) || in_array($_GET[subop], array('viewg'))}-->

	<!--{if in_array($filter, array('privatepm'))}-->

		<div class="bz-header">
			<div class="bz-header-left bzleft"><a class="banzhuan_font icon-daohang"></a></div>
			<h2>{lang myitem}{lang news}</h2>
			<div class="bz-header-right"><a href="home.php?mod=spacecp&ac=pm"><em>&#21457;&#31169;&#20449;</em></a></div>
		</div>
		<div class="b_p15">
			<div class="bz_notice_list cl">
				<ul>
					<li class="no-pm"$actives[announcepm]><a href="home.php?mod=space&do=pm&filter=announcepm"><span class="banzhuan_font icon-pm bgicon-pm"></span>{lang announce_pm}<i class="banzhuan_font icon-gengduo y fz14"></i></a></li>
					<li class="no-follower"><a href="home.php?mod=follow&do=follower&uid=$_G[uid]"><span class="banzhuan_font icon-follower bgicon-follower"></span>{lang myitem}&#31881;&#19997;<i class="banzhuan_font icon-gengduo y fz14"></i></a></li>
					<!--{loop $_G['notice_structure'] $key $type}-->
					<li class="no-$key"><a href="home.php?mod=space&do=notice&view=$key"><span class="banzhuan_font icon-$key bgicon-$key"></span><!--{eval echo lang('template', 'notice_'.$key)}--><i class="banzhuan_font icon-gengduo y fz14"></i><!--{if $_G['member']['category_num'][$key]}--><em class="rq y fz14">$_G['member']['category_num'][$key]</em><!--{/if}--></a></li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>

		<!--{if !$list}-->
		<!--{else}-->
		<div class="pmbox bz-bg-fff">
			<ul>
				<!--{loop $list $key $value}-->
				<li>
					<div class="avatar_img">
						<!--{if $value[pmtype] == 2}-->
						<img style="border:1px solid #EFEFEF;" src="{STATICURL}image/common/grouppm.png" />
						<!--{else}-->
						<img style="height:38px;width:38px;" src="<!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), middle, true)}-->" />
						<!--{/if}-->
						<!--{if $value[new]}--><span class="num">$value[pmnum]</span><!--{/if}-->
					</div>
					<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">
						<div class="cl">
							<!--{if $value[touid]}-->
								<!--{if $value[msgfromid] == $_G[uid]}-->
									<span class="name">{$value[tousername]}</span>
								<!--{else}-->
									<span class="name">{$value[tousername]}</span>
								<!--{/if}-->
							<!--{elseif $value['pmtype'] == 2}-->
								<span class="name">( $value[members]&#20154; ) <!--{if $value[subject]}-->$value[subject]<!--{/if}--></span>
							<!--{/if}-->
							<span class="grey y" style="font-size: 12px;"><!--{date($value[dateline], 'u')}--></span>
						</div>
						<div class="cl grey">
							<span>
							<!--{if $value['pmtype'] == 2}-->
								&#32676;&#20027; : $value['firstauthor']<br>
							<!--{/if}-->
							<!--{if $value['pmtype'] == 2 && $value['lastauthor']}-->
								<div>......<br>$value['lastauthor'] : $value[message]</div>
							<!--{else}-->
								$value[message]
							<!--{/if}-->
							</span>
						</div>
					</a>
				</li>
				<!--{/loop}-->
			</ul>
		</div>
		<!--{/if}-->
		
		<div class="bzfoot_xm bz-bg-fff bzbt1">
		<ul class="bzfoot_flex">
		<li class="flex"><a href="forum.php?mod=guide&view=hot" class="bzfc_a"><i class="banzhuan_font icon-foothome"></i><span>{lang homepage}</span></a></li>
		<li class="flex"><a href="forum.php?forumlist=1" class="bzfc_a"><i class="banzhuan_font icon-footforum"></i><span>{lang forum}</span></a></li>
		<li class="flex post"><a href="forum.php?mod=misc&action=nav" class="bzfc_s"><em class="bor_ef"></em><span class="bz-bg-fff"><i class="post banzhuan_font icon-footpost"></i></span></a></li>
		<li class="flex"><a href="home.php?mod=space&do=pm" class="bzfc_s"><i class="banzhuan_font icon-footmessage"><!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G[member][newprompt_num][follower]}--><span class="news bz-bg-rq"></span><!--{/if}--></i><span>{lang pm_center}</span></a></li>
		<li class="flex"><a href="{if $_G[uid]}home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1{else}member.php?mod=logging&action=login{/if}" class="bzfc_a"><i class="banzhuan_font icon-footwo"></i><span>{if $_G[uid]}{lang myitem}{else}{lang login}{/if}</span></a></li>
		</ul>
		</div>
		<div class="bz_bottom"></div>
	
	<!--{elseif in_array($filter, array('announcepm'))}-->

		<div class="bz-header">
			<div class="bz-header-left"><a href="home.php?mod=space&do=pm" class="banzhuan_font icon-fanhui1"></a></div>
			<h2>{lang announce_pm}</h2>
			<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
		</div>
		<!--{if $count || $grouppms}-->
		<div class="b_p15 bz-bg-fff">
			<!--{if $grouppms}-->
			<div class="bznotice_system_list">
				<ul>
					<!--{loop $grouppms $grouppm}-->
					<li id="gpmlist_$grouppm[id]" class="cl{if !$gpmstatus[$grouppm[id]]} newpm{/if}">
						<div class="avatar">
						<!--{if $grouppm[author]}-->
							<a href="home.php?mod=space&uid=$grouppm[authorid]&do=profile" class="bgicon-system"><!--{avatar($grouppm[authorid],middle)}--></a>
						<!--{else}-->
							<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]" class="banzhuan_font icon-system bgicon-system"></a>
						<!--{/if}-->
						</div>
						<h2>
							<span class="grey"><!--{date($grouppm[dateline], 'u')}--></span>
							<!--{if $grouppm[author]}-->
							<a href="home.php?mod=space&uid=$grouppm[authorid]&do=profile" class="blue">&nbsp;$grouppm[author]</a><span class="grey">&nbsp;{lang say}:</span>
							<!--{/if}-->
						</h2>
						<div id="p_gpmid_$grouppm[id]" class="ntc_body">$grouppm[message]...<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]" id="gpmlist_$grouppm[id]_a" class="blue fz14">&nbsp;&nbsp;{lang show}</a></div>
					</li>
					<!--{/loop}-->
				</ul>
			</div>
			<!--{/if}-->
		</div>
 		<!--{else}-->
		<div class="b_p hm grey">{lang no_corresponding_pm}</div>
	    <!--{/if}-->

	<!--{elseif in_array($_GET[subop], array('view'))}-->

		<div class="bz-header">
			<div class="bz-header-left"><a href="home.php?mod=space&do=pm" class="banzhuan_font icon-fanhui1"></a></div>
			<h2><!--{if $tousername}-->{$tousername}<!--{else}--><!--{if $value[subject]}-->$value[subject] <!--{else}-->{lang chat_type} <!--{/if}--><em class="rq fz12">$value[members]</em><em class="fz12">&#20154;</em><!--{/if}--></h2>
			<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
		</div>
		<div class="cl">
		<!--{if !$list}-->
			<div class="b_p hm grey">{lang no_corresponding_pm}</div>
		<!--{else}-->
			<div class="b_p15">
			<!--{loop $list $key $value}-->
			<!--{subtemplate home/space_pm_node}-->
			<!--{/loop}-->
			</div>
			$multi
		<!--{/if}-->
		</div>
		<div class="bz_bottom"></div>
		<div class="bz_bottom"></div>
		<form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&pmsubmit=yes&mobile=2" >
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<!--{if !$touid}-->
			<input type="hidden" name="plid" value="$plid" />
			<!--{else}-->
			<input type="hidden" name="touid" value="$touid" />
			<!--{/if}-->
			<div class="b_p15 pm_reply bzbt1 bz-bg-fff">
				<table width="100%" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td>
								<input type="text" value="" class="bz-input" autocomplete="off" id="replymessage" name="message" placeholder="{lang thread_content}">
							</td>
							<td width="60" align="right">
								<input type="button" name="pmsubmit" id="pmsubmit" class="formdialog button2" value="{lang reply}" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>

	<!--{elseif in_array($_GET[subop], array('viewg'))}-->

		<div class="bz-header">
			<div class="bz-header-left"><a href="home.php?mod=space&do=pm&filter=announcepm" class="banzhuan_font icon-fanhui1"></a></div>
			<h2>{lang announce_pm}</h2>
			<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
		</div>
		<div class="b_p15 bz-bg-fff">
			<div class="cl pm_viewg">
			<div class="bznotice_system_list">
				<ul>
					<li class="cl">
						<div class="avatar">
						<!--{if $grouppm[author]}-->
							<a href="home.php?mod=space&uid=$grouppm[authorid]&do=profile" class="bgicon-system"><!--{avatar($grouppm[authorid],middle)}--></a>
						<!--{else}-->
							<a href="home.php?mod=space&do=pm&subop=viewg&pmid=$grouppm[id]" class="banzhuan_font icon-system bgicon-system"></a>
						<!--{/if}-->
						</div>
						<h2>
							<span class="grey"><!--{date($grouppm[dateline], 'u')}--></span>
							<!--{if $grouppm[author]}-->
							<a href="home.php?mod=space&uid=$grouppm[authorid]&do=profile" class="blue">&nbsp;$grouppm[author]</a><span class="grey">&nbsp;{lang say}:</span>
							<!--{else}-->
							<span class="grey">{lang sendmultipmsystem}</span>
							<!--{/if}-->
						</h2>
						<div class="ntc_body">$grouppm[message]</div>
						<!--{if $grouppm[author]}-->
						<!--{if $grouppm[authorid] !== $_G['uid']}-->
						<p class="mtm">
							<a href="home.php?mod=spacecp&ac=pm&touid=$grouppm[authorid]" class="fz14 blue">&#32473; $grouppm[author] &#21457;&#31169;&#20449;</a>
						</p>
						<!--{/if}-->
						<!--{/if}-->
					</li>
				</ul>
			</div>
			</div>
		</div>

	<!--{/if}-->

<!--{else}-->

	<div class="b_p hm grey">{lang user_mobile_pm_error}</div>
	
<!--{/if}-->

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
