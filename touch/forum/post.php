<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->

<!--{eval $adveditor = $isfirstpost && $special && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' );}-->
	
<form method="post" id="postform" 
	{if $_GET[action] == 'newthread'}action="forum.php?mod=post&action={if $special != 2}newthread{else}newtrade{/if}&fid=$_G[fid]&extra=$extra&topicsubmit=yes&mobile=2"
	{elseif $_GET[action] == 'reply'}action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$extra&replysubmit=yes&mobile=2"
	{elseif $_GET[action] == 'edit'}action="forum.php?mod=post&action=edit&extra=$extra&editsubmit=yes&mobile=2" $enctype
	{/if}>
	<input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
	<input type="hidden" name="posttime" id="posttime" value="{TIMESTAMP}" />
	<!--{if !empty($_GET['modthreadkey'])}--><input type="hidden" name="modthreadkey" id="modthreadkey" value="$_GET['modthreadkey']" /><!--{/if}-->
	<!--{if $_GET[action] == 'reply'}-->
		<input type="hidden" name="noticeauthor" value="$noticeauthor" />
		<input type="hidden" name="noticetrimstr" value="$noticetrimstr" />
		<input type="hidden" name="noticeauthormsg" value="$noticeauthormsg" />
		<!--{if $reppid}-->
			<input type="hidden" name="reppid" value="$reppid" />
		<!--{/if}-->
		<!--{if $_GET[reppost]}-->
			<input type="hidden" name="reppost" value="$_GET[reppost]" />
		<!--{elseif $_GET[repquote]}-->
			<input type="hidden" name="reppost" value="$_GET[repquote]" />
		<!--{/if}-->
	<!--{/if}-->
	<!--{if $_GET[action] == 'edit'}-->
		<input type="hidden" name="fid" id="fid" value="$_G[fid]" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="pid" value="$pid" />
		<input type="hidden" name="page" value="$_GET[page]" />
	<!--{/if}-->
	<!--{if $sortid}-->
		<input type="hidden" name="sortid" value="$sortid" />
	<!--{/if}-->
	<!--{if $special}-->
		<input type="hidden" name="special" value="$special" />
	<!--{/if}-->
	<!--{if $specialextra}-->
		<input type="hidden" name="specialextra" value="$specialextra" />
	<!--{/if}-->
	
	<div class="bz-header">
		<div class="bz-header-left"><a href="<!--{if $_GET[action] == 'newthread'}-->forum.php?mod=forumdisplay&fid=$_G[fid]&page=$_GET[page]<!--{else}-->forum.php?mod=redirect&goto=findpost&ptid=$_G[tid]&pid=$pid<!--{/if}-->" class="banzhuan_font icon-fanhui1"></a></div>
		<h2><!--{if $_GET[action] == 'newthread'}-->{lang send_threads}<!--{elseif $_GET[action] == 'reply'}-->{lang join_thread}<!--{elseif $_GET[action] == 'edit'}-->{lang edit}<!--{else}-->{lang send_threads}<!--{/if}--></h2>
		<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
	</div>
	<!--{if $_GET[action] == 'newthread'}-->
	<div class="bz-post-nav b_p bzbb1">
		<!--{if !$_G['forum']['allowspecialonly']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]" <!--{if ($_GET[sortid] || !$special) && $_GET['action'] != 'edit' && $_GET['action'] != 'reply'}--><!--{if $isfirstpost && $sortid}--><!--{else}-->class="a"<!--{/if}--><!--{/if}-->>{lang send_threads}</a>
		<!--{/if}-->
		<!--{if $_G['group']['allowpostpoll']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1" <!--{if !$_GET[sortid] && $special == 1}-->class="a"<!--{/if}-->>{lang poll}</a>
		<!--{/if}-->
		<!--{if $_G['group']['allowposttrade']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2" <!--{if !$_GET[sortid] && $special == 2}-->class="a"<!--{/if}-->>{lang trade}</a>
		<!--{/if}-->
		<!--{if $_G['group']['allowpostreward']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3" <!--{if !$_GET[sortid] && $special == 3}-->class="a"<!--{/if}-->>{lang reward}</a>
		<!--{/if}-->
		<!--{if $_G['group']['allowpostactivity']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4" <!--{if !$_GET[sortid] && $special == 4}-->class="a"<!--{/if}-->>{lang activity}</a>
		<!--{/if}-->
		<!--{if $_G['group']['allowpostdebate']}-->
		<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5" <!--{if !$_GET[sortid] && $special == 5}-->class="a"<!--{/if}-->>{lang debate}</a>
		<!--{/if}-->
		
		<!--{loop $_G['forum']['threadsorts'][types] $tsortid $name}-->
		<a href="forum.php?mod=post&action=newthread&sortid=$tsortid&fid=$_G[fid]" <!--{if $sortid == $tsortid}-->class="a"<!--{/if}-->><!--{echo strip_tags($name);}--></a>
		<!--{/loop}-->
		
		<!--{if $_G['setting']['threadplugins']}-->
			<!--{loop $_G['forum']['threadplugin'] $tpid}-->
			<!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
			<a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&specialextra=$tpid" <!--{if $specialextra==$tpid}-->class="a"<!--{/if}-->>{$_G[setting][threadplugins][$tpid][name]}</a>
			<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
	</div>
	<div class="clear"></div>
	<!--{/if}-->
	
	<div class="bz-bg-fff">
		<div class="post_from">
			<ul class="cl">
				<li class="b_p">
				<!--{if $_GET['action'] != 'reply'}-->
				<input type="text" tabindex="1" class="bz-input" id="needsubject" size="30" autocomplete="off" value="$postinfo[subject]" name="subject" placeholder="{lang thread_subject} *" fwin="login">
				<!--{else}-->
					RE: $thread['subject']
					<!--{if $quotemessage}-->$quotemessage<!--{/if}-->
				<!--{/if}-->
				</li>
				<!--{if $isfirstpost && !empty($_G['forum'][threadtypes][types])}-->
				<li class="b_p">
					<select id="typeid" name="typeid" class="sort_sel">
						<option value="0" selected="selected">&#28857;&#20987;{lang select_thread_catgory}</option>
						<!--{loop $_G['forum'][threadtypes][types] $typeid $name}-->
						<!--{if empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']}-->
						<option value="$typeid"{if $thread['typeid'] == $typeid || $_GET['typeid'] == $typeid} selected="selected"{/if}><!--{echo strip_tags($name);}--></option>
						<!--{/if}-->
						<!--{/loop}-->
					</select>
				</li>
				<!--{/if}-->
				
				<!--{if $showthreadsorts}-->
					<!--{template forum/post_sortoption}-->
				<!--{elseif $adveditor}-->
			        <!--{if $special == 1}--><!--{template forum/post_poll}-->
			        <!--{elseif $special == 3}--><!--{template forum/post_reward}-->
			        <!--{elseif $special == 4}--><!--{template forum/post_activity}-->
			        <!--{elseif $special == 5}--><!--{template forum/post_debate}-->
			        <!--{elseif $special == 2}--><!--{template forum/post_trade}-->
			        <!--{elseif $specialextra}--><div>$threadplughtml</div>
			        <!--{/if}-->
			    <!--{/if}-->
			    
				<!--{if $_GET[action] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']}-->
				<li class="b_p">
					<input type="checkbox" name="delete" id="delete" class="pc" value="1" title="{lang post_delpost}{if $thread[special] == 3}{lang reward_price_back}{/if}"> {lang post_delpost}{if $thread[special] == 3}{lang reward_price_back}{/if}?
				</li>
				<!--{/if}-->
				<li class="b_p">
					<textarea class="pt" id="needmessage" tabindex="3" autocomplete="off" id="{$editorid}_textarea" name="$editor[textarea]" cols="80" rows="10" placeholder="{lang thread_content} *" fwin="reply">$postinfo[message]</textarea>
				</li>
			</ul>
			<ul id="imglist" class="bz_post_imglist cl">
				<li>
					<a href="javascript:;" class="bz_post_imglist_add">
						<input type="file" name="Filedata" id="filedata"/>
					</a>
				</li>
			</ul>
			<!--{if $_GET[action] != 'edit' && ($secqaacheck || $seccodecheck)}-->
				<!--{subtemplate common/seccheck}-->
			<!--{/if}-->
			<!--{hook/post_bottom_mobile}-->
		</div>
	</div>
	<div class="clear"></div>
	<div class="btn_post">
		<button id="postsubmit" class="btn_pn <!--{if $_GET[action] == 'edit'}-->btn_pn_blue" disable="false"<!--{else}-->btn_pn_grey" disable="true"<!--{/if}-->><span><!--{if $_GET[action] == 'newthread'}-->{lang send_thread}<!--{elseif $_GET[action] == 'reply'}-->{lang join_thread}<!--{elseif $_GET[action] == 'edit'}-->{lang edit_save}<!--{/if}--></span></button>
		<input type="hidden" name="{if $_GET[action] == 'newthread'}topicsubmit{elseif $_GET[action] == 'reply'}replysubmit{elseif $_GET[action] == 'edit'}editsubmit{/if}" value="yes">
	</div>
	<p class="hm" style="font-style: italic;font-size: 12px;color: #D7D7D7;">* &#21495;&#20026;&#24517;&#22635;&#39033;</p>
	
	<p class="hm" style="font-style: italic;font-size: 12px;color: #D7D7D7;">&#33509;{lang seccode}&#22635;&#20889;&#38169;&#35823;, &#21487;&#28857;&#20987;{lang seccode}&#22270;&#29255;&#25442;&#19968;&#20010;</p>
	<p class="hm" style="font-style: italic;font-size: 12px;color: #D7D7D7;">&#33509;{lang send_thread}/{lang join_thread}/{lang edit_save}&#25353;&#38062;&#26080;&#27861;&#28857;&#20987;, &#21487;&#22312;{lang thread_content}&#36755;&#20837;&#26694;&#20013;&#22810;&#36755;&#20837;&#20010;&#31354;&#26684;</p>
	
</form>

<div class="bz_bottom"></div>
<script type="text/javascript">
	(function() {
		var needsubject = needmessage = false;

		<!--{if $_GET[action] == 'reply'}-->
			needsubject = true;
		<!--{elseif $_GET[action] == 'edit'}-->
			needsubject = needmessage = true;
		<!--{/if}-->

		<!--{if $_GET[action] == 'newthread' || ($_GET[action] == 'edit' && $isfirstpost)}-->
		$('#needsubject').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				needsubject = true;
				if(needmessage == true) {
					$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
					$('.btn_pn').attr('disable', 'false');
				}
			} else {
				needsubject = false;
				$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
				$('.btn_pn').attr('disable', 'true');
			}
		});
		<!--{/if}-->
		$('#needmessage').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				needmessage = true;
				if(needsubject == true) {
					$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
					$('.btn_pn').attr('disable', 'false');
				}
			} else {
				needmessage = false;
				$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
				$('.btn_pn').attr('disable', 'true');
			}
		});

		$('#needmessage').on('scroll', function() {
			var obj = $(this);
			if(obj.scrollTop() > 0) {
				obj.attr('rows', parseInt(obj.attr('rows'))+2);
			}
		}).scrollTop($(document).height());
	 })();
</script>
<script type="text/javascript" src="template/banzhuan_xmbbs/touch/xmbbs/ajaxfileupload.js?{VERHASH}"></script>
<script type="text/javascript" src="template/banzhuan_xmbbs/touch/xmbbs/buildfileupload.js?{VERHASH}"></script>
<script type="text/javascript">
	var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png' : imgexts;
	var STATUSMSG = {
		'-1' : '{lang uploadstatusmsgnag1}',
		'0' : '{lang uploadstatusmsg0}',
		'1' : '{lang uploadstatusmsg1}',
		'2' : '{lang uploadstatusmsg2}',
		'3' : '{lang uploadstatusmsg3}',
		'4' : '{lang uploadstatusmsg4}',
		'5' : '{lang uploadstatusmsg5}',
		'6' : '{lang uploadstatusmsg6}',
		'7' : '{lang uploadstatusmsg7}(' + imgexts + ')',
		'8' : '{lang uploadstatusmsg8}',
		'9' : '{lang uploadstatusmsg9}',
		'10' : '{lang uploadstatusmsg10}',
		'11' : '{lang uploadstatusmsg11}'
	};
	var form = $('#postform');
	$(document).on('change', '#filedata', function() {
			popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

			uploadsuccess = function(data) {
				if(data == '') {
					popup.open('{lang uploadpicfailed}', 'alert');
				}
				var dataarr = data.split('|');
				if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
					popup.close();
					$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><img src="template/banzhuan_xmbbs/touch/xmbbs/images/icon_del.png"></a></span><span class="p_img"><a href="javascript:;"><img style="height:60px;width:60px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="{$_G[setting][attachurl]}forum/'+dataarr[5]+'" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
				} else {
					var sizelimit = '';
					if(dataarr[7] == 'ban') {
						sizelimit = '{lang uploadpicatttypeban}';
					} else if(dataarr[7] == 'perday') {
						sizelimit = '{lang donotcross}'+Math.ceil(dataarr[8]/1024)+'K)';
					} else if(dataarr[7] > 0) {
						sizelimit = '{lang donotcross}'+Math.ceil(dataarr[7]/1024)+'K)';
					}
					popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
				}
			};

			if(typeof FileReader != 'undefined' && this.files[0]) {//note
				
				$.buildfileupload({
					uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
					files:this.files,
					uploadformdata:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					uploadinputname:'Filedata',
					maxfilesize:"$swfconfig[max]",
					success:uploadsuccess,
					error:function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});

			} else {

				$.ajaxfileupload({
					url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
					data:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					dataType:'text',
					fileElementId:'filedata',
					success:uploadsuccess,
					error: function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});

			}
	});

	<!--{if 0 && $_G['setting']['mobile']['geoposition']}-->
	geo.getcurrentposition();
	<!--{/if}-->
	
	$('#postsubmit').on('click', function() {
		var obj = $(this);
		if(obj.attr('disable') == 'true') {
			return false;
		}

		obj.attr('disable', 'true').removeClass('btn_pn_blue').addClass('btn_pn_grey');
		popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

		var postlocation = '';
		if(geo.errmsg === '' && geo.loc) {
			postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
		}

		$.ajax({
			type:'POST',
			url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
			data:form.serialize(),
			dataType:'xml'
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});

	$(document).on('click', '.del', function() {
		var obj = $(this);
		$.ajax({
			type:'GET',
			url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid'),
		})
		.success(function(s) {
			obj.parent().remove();
		})
		.error(function() {
			popup.open('{lang networkerror}', 'alert');
		});
		return false;
	});

</script>

<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
