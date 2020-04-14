<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!--{template common/header}-->
<!--{if empty($diymode)}-->
<div class="bz-header">
	<div class="bz-header-left"><a href="home.php?mod=space&uid={$_G[uid]}&do=profile&mycenter=1" class="banzhuan_font icon-fanhui1"></a></div>
	<h2>{lang myfavorite}</h2>
	<div class="bz-header-right bzleft"><a class="banzhuan_font icon-daohang"></a></div>
</div>
<!--{/if}-->
<!--{if $list}-->
	<div class="cl">
		<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=spacecp&ac=favorite&op=delete&type=$_GET[type]&checkall=1" onsubmit="showDialog('{lang del_select_favorite_confirm}', 'confirm', '', '$(\'delform\').submit();'); return false;">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="delfavorite" value="true" />
			<ul id="favorite_ul" class="clear">
				<!--{loop $list $k $value}-->
				<li id="fav_$k">
					<a class="y dialog" href="home.php?mod=spacecp&ac=favorite&op=delete&favid=$k"><em class="banzhuan_font icon-close"></em></a>
					<a href="$value[url]">$value[title]</a>
				</li>
				<!--{/loop}-->
			</ul>
		</form>
	</div>
	<!--{if $multi}-->$multi<!--{/if}-->
<!--{else}-->
	<div class="b_p hm grey">{lang no_favorite_yet}</div>
<!--{/if}-->
<script type="text/javascript">
	function favorite_delete(favid) {
		var el = $('fav_' + favid);
		if(el) {
			el.style.display = "none";
		}
	}
	<!--{if $_GET[type] == "thread"}-->
	function collection_favorite() {
		var form = $('delform');
		var prefix = '^favorite';
		var tids = '';
		for(var i = 0; i < form.elements.length; i++) {
			var e = form.elements[i];		
			if(e.name.match(prefix) && e.checked) {
				tids += 'tids[]=' + e.getAttribute('vid') + '&';
			}
		}
		if(tids) {
			showWindow(null, 'forum.php?mod=collection&action=edit&op=addthread&' + tids);
		}
	}
	function update_collection() {}
	<!--{/if}-->
</script>
<div class="clear"></div>
<div class="bz_bottom"></div>
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
