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
	<li id="thread_{$thread['tid']}" class="bzxmli bz-bg-fff">
        <!--{hook/forumdisplay_thread_mobile $key}-->
        <div class="cl">
            <header class="bzfdtlh">
	            <div class="bzfdtlh-left">
			        <!--{if $thread['authorid'] && $thread['author']}-->
	              	<a class="avatar" href="home.php?mod=space&uid=$thread[authorid]&do=profile">{avatar($thread[authorid],middle)}</a>
	              	<!--{else}-->
	              	<a class="avatar">{avatar($thread[0],middle)}</a>
	              	<!--{/if}-->
			    </div>
			    	<div class="bzfdtlh-middle">
				    <div class="name">
				    	    <!--{if $thread['authorid'] && $thread['author']}-->
			            <a href="home.php?mod=space&uid=$thread[authorid]&do=profile" class="user">$thread[author]</a>
		              	<!--{else}-->
			            <a class="user">$_G[setting][anonymoustext]</a>
		              	<!--{/if}-->
				    </div>
				    <div class="time-from"><span class="grey">{echo dgmdate($thread[dbdateline],'u');}</span></div>
			    </div>
            </header>
            <section class="bzfdtld">
                <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra">
                    <div class="title fz18">	<span $thread[highlight]>$thread[subject]</span></div>
                    <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4)) || $thread['digest'] > 0 && $filter != 'digest' || $thread[heatlevel]}-->
                    <p class="b_ptrl10">
                        	<!--{if $thread['special'] == 1}-->
						<i class="grey fz12 bor">{lang thread_poll}</i>
						<!--{elseif $thread['special'] == 2}-->
						<i class="grey fz12 bor">{lang thread_trade}</i>
						<!--{elseif $thread['special'] == 3}-->
						<i class="grey fz12 bor">{lang thread_reward}</i>
						<!--{elseif $thread['special'] == 4}-->
						<i class="grey fz12 bor">{lang thread_activity}</i>
						<!--{elseif $thread['special'] == 5}-->
						<i class="grey fz12 bor">{lang thread_debate}</i>
						<!--{/if}-->
                    		<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
						<i class="color-ding fz12 bor">$_G[setting][threadsticky][3-$thread[displayorder]]</i>
						<!--{/if}-->
						<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
						<i class="color-jing fz12 bor">{lang thread_digest}$thread[digest]</i>
						<!--{/if}-->
						<!--{if $thread[heatlevel]}-->
						<i class="color-hot fz12 bor">{lang heats}{$thread[heats]}</i>
						<!--{/if}-->
                    </p>
                    <!--{/if}-->
                    <p class="grey b_p fz14"><!--{eval require_once(DISCUZ_ROOT."./source/function/function_post.php");}--><!--{echo messagecutstr(DB::result_first('SELECT `message` FROM '.DB::table('forum_post').' WHERE `tid` ='.$thread[tid].' AND `first` =1'),100);}--></p>
                    <div class="cl">
                    <!--{eval $tbid = DB::result(DB::query("SELECT tableid FROM ".DB::table('forum_attachment')." WHERE `tid`= '$thread[tid]'"));}-->
					<!--{if $tbid}-->
						<!--{eval $picount = DB::fetch_all("SELECT aid FROM ".DB::table('forum_attachment_'.$tbid.'')." WHERE `tid`= '$thread[tid]' AND `isimage`=1;");}-->
						<!--{eval $picnum = count($picount);}-->
						<!--{if $picnum > 2}-->
					    <!--{eval $litpicnum = '3';}-->
					    <!--{else}-->
					    <!--{eval $litpicnum = $picnum ;}-->
					    <!--{/if}-->
						<!--{eval $covers = DB::fetch_all("SELECT attachment,aid,description FROM ".DB::table('forum_attachment_'.$tbid.'')." WHERE `tid`= '$thread[tid]' AND `isimage`=1 LIMIT 0,$litpicnum;");}-->
					<!--{/if}-->
	                <!--{if $tbid}-->
	                    <!--{if $litpicnum == 1}--> 
	                        <div class="bz-wall-list-1 b_p cl">
			                <!--{loop $covers $thecover}-->
								<a href="forum.php?mod=viewthread&tid=$thread[tid]" class="z"><img src="data/attachment/forum/$thecover['attachment']" /></a>
							<!--{/loop}-->
						    </div>
						<!--{elseif $litpicnum == 4}-->
						    <div class="bz-wall-list-4 b_p cl">
			                <!--{loop $covers $thecover}-->
								<a href="forum.php?mod=viewthread&tid=$thread[tid]" class="z"><img src="data/attachment/forum/$thecover['attachment']" /></a>
							<!--{/loop}-->
						    </div>
						<!--{else}-->
						    <div class="bz-wall-list-other b_p cl">
			                <!--{loop $covers $thecover}-->
								<a href="forum.php?mod=viewthread&tid=$thread[tid]" class="z"><img src="data/attachment/forum/$thecover['attachment']" /></a>
							<!--{/loop}-->
						    </div>
						<!--{/if}-->
					<!--{/if}-->
                    </div>
           	   </a>
            </section>
            <footer class="bzfdtlf">
                <ul>
			        <li><a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra"><i class="banzhuan_font icon-chakan grey fz14"></i><em class="grey">$thread[views]</em></a></li>
			        <li class="ping"><a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra"><i class="banzhuan_font icon-message grey fz14"></i><!--{if $thread[replies] > 0}--><em class="grey">$thread[replies]</em><!--{/if}--></a></li>
			        <li><a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra"><i class="banzhuan_font icon-praise grey fz14"></i><!--{if $thread[recommendicon]}--><em class="grey">$thread[recommends]</em><!--{/if}--></a></li>
			    </ul>
            </footer>
         </div>
		</li>
<!--{/loop}-->