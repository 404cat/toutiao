<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{if $_G['inajax'] == 1}-->

	<!--{loop $data $key $list}-->
		<!--{if $list['threadcount']}-->
			<!--{subtemplate forum/guide_list_row}-->
		<!--{/if}-->
	<!--{/loop}-->
	
<!--{else}-->
	
	<div class="bz-header">
		<div class="bz-header-left"><a href="javascript:;" onclick="history.go(-1);" class="banzhuan_font icon-fanhui1"></a></div>
		<h2>{$_G[setting][navs][10][navname]}</h2>
		<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
	</div>
	<div class="guide_nav bz-bg-fff bzbb1 mbm">
		<ul class="flex_box">
			<li class="flex">
				<!--{if $view == 'newthread'}--><em class="bg_xm"></em><!--{/if}-->
				<a href="forum.php?mod=guide&view=newthread" <!--{if $view == 'newthread'}-->class="rtt"<!--{/if}-->>{lang guide_newthread}</a>
			</li>
			<li class="flex">
				<!--{if $view == 'digest'}--><em class="bg_xm"></em><!--{/if}-->
				<a href="forum.php?mod=guide&view=digest" <!--{if $view == 'digest'}-->class="rtt"<!--{/if}-->>{lang guide_digest}</a>
			</li>
			<li class="flex">
				<!--{if $view == 'new'}--><em class="bg_xm"></em><!--{/if}-->
				<a href="forum.php?mod=guide&view=new" <!--{if $view == 'new'}-->class="rtt"<!--{/if}-->>{lang guide_new}</a>
			</li>
			<li class="flex">
				<!--{if $view == 'sofa'}--><em class="bg_xm"></em><!--{/if}-->
				<a href="forum.php?mod=guide&view=sofa" <!--{if $view == 'sofa'}-->class="rtt"<!--{/if}-->>{lang guide_sofa}</a>
			</li>
		</ul>
	</div>
	<div class="threadlist">
	<!--{loop $data $key $list}-->
	<ul class="hotlist">
		<!--{subtemplate forum/guide_list_row}-->
	</ul>
	<!--{/loop}-->
	</div>

	<!--{if $list['threadcount']}-->

		<div style="display: none;">$multipage</div>

		<div class="bz_loading">
			<a href="javascript:;" class="color-bbb"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif"/>&#21152;&#36733;&#20013;...</a>
		</div>

		<script type="text/javascript">
			var ajax_state = true;
			var ajax_page = <!--{if $_GET[page]}-->$_GET[page]<!--{else}-->1<!--{/if}--> + 1;
			var all_page = jQuery('div.pg label span').text().replace(/[^\d]/g, '') || 0;
			var ajax_url = 'forum.php?mod=guide&view=' + '$_GET[view]';
			function list_ajax() {
				if(ajax_state == true) {
					if(all_page >= 2 && all_page >= ajax_page) {
						ajax_state = false;
						jQuery(".bz_loading").html('<a href="javascript:;" class="color-bbb"><img src="{$_G['style']['styleimgdir']}/touch/xmbbs/images/icon_load.gif"/>&#21152;&#36733;&#20013;...</a>');
						$.ajax({
							url: ajax_url + '&inajax=1&page=' + ajax_page + '&mobile=2',
							type: 'GET',
							dataType: 'html',
							success: function(result) {
								jQuery(".hotlist").append(result);
								ajax_page++;
								ajax_state = true;
							}
						});
					} else {
						jQuery(".bz_loading").html('<a class="color-bbb">&#24050;&#32463;&#21040;&#24213;&#20102;...</a>');
						ajax_state = false;
					}
				}
			}
			if(jQuery(document).height() <= jQuery(window).height()) {
				list_ajax();
			}
			jQuery(window).scroll(function() {
				if(jQuery(document).height() <= jQuery(window).height() + jQuery(window).scrollTop() + 100) {
					list_ajax();
				}
			});
		</script>
		
	<!--{/if}-->
	
	<div class="pullrefresh" style="display:none;"></div>

<!--{/if}-->