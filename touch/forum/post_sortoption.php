<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<script type="text/javascript">
	var forum_optionlist = <!--{if $forum_optionlist}-->'$forum_optionlist'<!--{else}-->''<!--{/if}-->;
</script>
<script type="text/javascript" src="template/banzhuan_xmbbs/touch/xmbbs/threadsort.js?{VERHASH}"></script>

<div class="bz-post-sortoption">
<input type="hidden" name="selectsortid" value="$_G['forum_selectsortid']" />

	<!--{if $_G['forum_typetemplate']}-->

		<!--{if $_G['forum']['threadsorts']['description'][$_G['forum_selectsortid']] || $_G['forum']['threadsorts']['expiration'][$_G['forum_selectsortid']]}-->
			<div class="sinf bw0">
				<dl>
					<!--{if $_G['forum']['threadsorts']['description'][$_G['forum_selectsortid']]}-->
						<dt>{lang threadtype_description}</dt>
						<dd>$_G[forum][threadsorts][description][$_G[forum_selectsortid]]</dd>
					<!--{/if}-->
					<!--{if $_G['forum']['threadsorts']['expiration'][$_G['forum_selectsortid']]}-->
						<dt><span class="rq">*</span>{lang threadtype_expiration}</dt>
						<dd>
							<div class="ftid">
								<select name="typeexpiration" tabindex="1" id="typeexpiration">
									<option value="259200">{lang three_days}</option>
									<option value="432000">{lang five_days}</option>
									<option value="604800">{lang seven_days}</option>
									<option value="2592000">{lang one_month}</option>
									<option value="7776000">{lang three_months}</option>
									<option value="15552000">{lang half_year}</option>
									<option value="31536000">{lang one_year}</option>
								</select>
							</div>
							<!--{if $_G['forum_optiondata']['expiration']}--><span class="fb">{lang valid_before}: $_G[forum_optiondata][expiration]</span><!--{/if}-->
						</dd>
					<!--{/if}-->
				</dl>
			</div>
		<!--{/if}-->
		$_G[forum_typetemplate]
	
	<!--{else}-->

		<!--{if $_G['forum']['threadsorts']['description'][$_G['forum_selectsortid']]}-->
		<p class="grey fz12 bzbb1" style="padding-bottom: 10px;margin-bottom: 10px;">{lang threadtype_description} : $_G[forum][threadsorts][description][$_G[forum_selectsortid]]</p>
		<!--{/if}-->
		
		<!--{if $_G['forum']['threadsorts']['expiration'][$_G['forum_selectsortid']]}-->
		<p class="bz-post-sortoption-p">
	        <label>{lang threadtype_expiration}<!--{if $_G['forum_optiondata']['expiration']}--><em class="grey fz12"> {lang valid_before} : $_G[forum_optiondata][expiration]</em><!--{/if}--></label>
			<select name="typeexpiration" tabindex="1" id="typeexpiration" class="sort_sel">
				<option value="259200">{lang three_days}</option>
				<option value="432000">{lang five_days}</option>
				<option value="604800">{lang seven_days}</option>
				<option value="2592000">{lang one_month}</option>
				<option value="7776000">{lang three_months}</option>
				<option value="15552000">{lang half_year}</option>
				<option value="31536000">{lang one_year}</option>
			</select>
		</p>	
		<!--{/if}-->
		
		<!--{loop $_G['forum_optionlist'] $optionid $option}-->
		<div id="select_$option[identifier]" class="cl">
			<!--{if in_array($option['type'], array('number', 'text', 'email', 'calendar', 'image', 'url', 'range', 'upload', 'range'))}-->
			
				<!--{if $option['type'] == 'calendar'}-->
				<p class="bz-post-sortoption-p">
					<label>
			        		$option[title]
			        		<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
			        		<em class="grey fz12">
			        			&#22635;&#20889;&#26684;&#24335;&#20030;&#20363; : 2020-12-31 10:00&nbsp;
					        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
								<!--{if $option['maxnum']}-->
									{lang maxnum} $option[maxnum]&nbsp;
								<!--{/if}-->
								<!--{if $option['minnum']}-->
									{lang minnum} $option[minnum]&nbsp;
								<!--{/if}-->
								<!--{if $option['maxlength']}-->
									{lang maxlength} $option[maxlength]&nbsp;
								<!--{/if}-->
								<!--{if $option['unchangeable']}-->
									{lang unchangeable}&nbsp;
								<!--{/if}-->
								<!--{if $option[description]}-->
									$option[description]
								<!--{/if}-->
							<!--{/if}-->
						</em>
					</label>
					<input type="text" name="typeoption[{$option[identifier]}]" id="typeoption_$option[identifier]" tabindex="1" size="$option[inputsize]" value="$option[value]" $option[unchangeable] class="txt_s"/>
				</p>	
				<!--{elseif $option['type'] == 'image'}-->
				<p class="bz-post-sortoption-p">
					<label>
			        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
				        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
							<em class="grey" style="font-style: italic;font-size: 12px;">
							<!--{if $option['maxnum']}-->
								{lang maxnum} $option[maxnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['minnum']}-->
								{lang minnum} $option[minnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['maxlength']}-->
								{lang maxlength} $option[maxlength]&nbsp;
							<!--{/if}-->
							<!--{if $option['unchangeable']}-->
								{lang unchangeable}&nbsp;
							<!--{/if}-->
							<!--{if $option[description]}-->
								$option[description]
							<!--{/if}-->
							</em>
						<!--{/if}-->
					</label>
				</p>	
				<div class="cl bzimage">
					<!--{if !($option[unchangeable] && $option['value'])}-->
						<div class="post_sort_img_btn">
                            <div id="psi_btn" class="psi_btn"><!--{if $option['value']}-->{lang update}<!--{else}-->{lang upload}<!--{/if}--></div>
                            <input type="file" id="sortfile_{$option[identifier]}" class="psi_ipt" />
                        </div>
						<input type="hidden" name="typeoption[{$option[identifier]}][aid]" value="$option[value][aid]" id="sortaid_{$option[identifier]}" />
						<input type="hidden" name="sortaid_{$option[identifier]}_url" id="sortaid_{$option[identifier]}_url" />
						<!--{if $option[value]}--><input type="hidden" name="oldsortaid[{$option[identifier]}]" value="$option[value][aid]" tabindex="1" /><!--{/if}-->
						<input type="hidden" name="typeoption[{$option[identifier]}][url]" id="sortattachurl_{$option[identifier]}" {if $option[value][url]}value="$option[value][url]"{/if} tabindex="1" />
					<!--{/if}-->
					<div id="sortattach_image_{$option[identifier]}" class="post_sort_img">
						<!--{if $option['value']['url']}-->
						<img src="$option[value][url]" alt="" />
						<!--{/if}-->
					</div>
				</div>
				<script type="text/javascript">
					$(document).on('change', '#sortfile_{$option[identifier]}', function() {
						popup.open('<img src="' + IMGDIR + '/imageloading.gif">');
						uploadsuccess = function(data) {
							if(data == '') {
								popup.open('{lang uploadpicfailed}', 'alert');
							}
							var dataarr = data.split('|');
							if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
								popup.close();
								$('#sortaid_{$option[identifier]}').val(dataarr[3]);
								$('#sortaid_{$option[identifier]}_url').val(dataarr[5]);
								$('#sortattachurl_{$option[identifier]}').val('{$_G[setting][attachurl]}forum/' + dataarr[5]);
								$('.post_sort_img').html('<img src="{$_G[setting][attachurl]}forum/'+dataarr[5]+'"/>');
								bz_id('psi_btn').innerHTML = '{lang update}';
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
								return false;
							}
						};
						if(typeof FileReader != 'undefined' && this.files[0]) {//note support html5
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
				</script>
				<!--{else}-->
				<p class="bz-post-sortoption-p">
					<label>
			        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
				        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
							<em class="grey fz12">
							<!--{if $option['maxnum']}-->
								{lang maxnum} $option[maxnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['minnum']}-->
								{lang minnum} $option[minnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['maxlength']}-->
								{lang maxlength} $option[maxlength]&nbsp;
							<!--{/if}-->
							<!--{if $option['unchangeable']}-->
								{lang unchangeable}&nbsp;
							<!--{/if}-->
							<!--{if $option[description]}-->
								$option[description]
							<!--{/if}-->
							</em>
						<!--{/if}-->
					</label>
					<input type="text" name="typeoption[{$option[identifier]}]" id="typeoption_$option[identifier]" class="txt_s" tabindex="1" size="$option[inputsize]" onBlur="checkoption('$option[identifier]', '$option[required]', '$option[type]'{if $option[maxnum]}, '$option[maxnum]'{else}, '0'{/if}{if $option[minnum]}, '$option[minnum]'{else}, '0'{/if}{if $option[maxlength]}, '$option[maxlength]'{/if})" value="{if $_G['tid']}$option[value]{else}{if $member_profile[$option['profile']]}$member_profile[$option['profile']]{else}$option['defaultvalue']{/if}{/if}" $option[unchangeable] />
				</p>	
				<!--{/if}-->
				
			<!--{elseif in_array($option['type'], array('radio', 'checkbox', 'select'))}-->
			
				<!--{if $option[type] == 'select'}-->
				
					<!--{loop $option['value'] $selectedkey $selectedvalue}-->
						<!--{if $selectedkey}-->
						<!--{else}-->
						<p class="bz-post-sortoption-p">
					        <label>
					        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
						        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
									<em class="grey fz12">
									<!--{if $option['maxnum']}-->
										{lang maxnum} $option[maxnum]&nbsp;
									<!--{/if}-->
									<!--{if $option['minnum']}-->
										{lang minnum} $option[minnum]&nbsp;
									<!--{/if}-->
									<!--{if $option['maxlength']}-->
										{lang maxlength} $option[maxlength]&nbsp;
									<!--{/if}-->
									<!--{if $option['unchangeable']}-->
										{lang unchangeable}&nbsp;
									<!--{/if}-->
									<!--{if $option[description]}-->
										$option[description]
									<!--{/if}-->
									</em>
								<!--{/if}-->
							</label>
							<select tabindex="1" onchange="changeselectthreadsort(this.value, '$optionid');checkoption('$option[identifier]', '$option[required]', '$option[type]')" $option[unchangeable] class="sort_sel">
								<option value="0">{lang please_select}</option>
								<!--{loop $option['choices'] $id $value}-->
									<!--{if !$value[foptionid]}-->
									<option value="$id">$value[content] <!--{if $value['level'] != 1}-->&raquo;<!--{/if}--></option>
									<!--{/if}-->
								<!--{/loop}-->
							</select>
						</p>	
						<!--{/if}-->
					<!--{/loop}-->
					
					<!--{if !is_array($option['value'])}-->
					<p class="bz-post-sortoption-p">
				        <label>
				        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
					        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
								<em class="grey fz12">
								<!--{if $option['maxnum']}-->
									{lang maxnum} $option[maxnum]&nbsp;
								<!--{/if}-->
								<!--{if $option['minnum']}-->
									{lang minnum} $option[minnum]&nbsp;
								<!--{/if}-->
								<!--{if $option['maxlength']}-->
									{lang maxlength} $option[maxlength]&nbsp;
								<!--{/if}-->
								<!--{if $option['unchangeable']}-->
									{lang unchangeable}&nbsp;
								<!--{/if}-->
								<!--{if $option[description]}-->
									$option[description]
								<!--{/if}-->
								</em>
							<!--{/if}-->
						</label>
						<select tabindex="1" onchange="changeselectthreadsort(this.value, '$optionid');checkoption('$option[identifier]', '$option[required]', '$option[type]')" $option[unchangeable] class="sort_sel">
							<option value="0">{lang please_select}</option>
							<!--{loop $option['choices'] $id $value}-->
								<!--{if !$value[foptionid]}-->
								<option value="$id">$value[content] <!--{if $value['level'] != 1}-->&raquo;<!--{/if}--></option>
								<!--{/if}-->
							<!--{/loop}-->
						</select>
					</p>	
					<!--{/if}-->
					
				<!--{elseif $option['type'] == 'radio'}-->
				<div style="padding-top: 10px;">
			        <label style="font-size: 16px;">
			        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
				        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
							<em class="grey fz12">
							<!--{if $option['maxnum']}-->
								{lang maxnum} $option[maxnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['minnum']}-->
								{lang minnum} $option[minnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['maxlength']}-->
								{lang maxlength} $option[maxlength]&nbsp;
							<!--{/if}-->
							<!--{if $option['unchangeable']}-->
								{lang unchangeable}&nbsp;
							<!--{/if}-->
							<!--{if $option[description]}-->
								$option[description]
							<!--{/if}-->
							</em>
						<!--{/if}-->
					</label>
			        <ul class="cl bz-post-sortoption-ul">
						<!--{loop $option['choices'] $id $value}-->
						<li style="margin-right: 10px;float: left;">
							<label>
								<input type="radio" name="typeoption[{$option[identifier]}]" id="typeoption_$option[identifier]" class="bzpsul-input" tabindex="1" onclick="checkoption('$option[identifier]', '$option[required]', '$option[type]')" value="$id" $option['value'][$id] $option[unchangeable]>
								$value
							</label>
						</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{elseif $option['type'] == 'checkbox'}-->
				<div style="padding-top: 10px;">
			        <label style="font-size: 16px;">
			        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
				        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
							<em class="grey fz12">
							<!--{if $option['maxnum']}-->
								{lang maxnum} $option[maxnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['minnum']}-->
								{lang minnum} $option[minnum]&nbsp;
							<!--{/if}-->
							<!--{if $option['maxlength']}-->
								{lang maxlength} $option[maxlength]&nbsp;
							<!--{/if}-->
							<!--{if $option['unchangeable']}-->
								{lang unchangeable}&nbsp;
							<!--{/if}-->
							<!--{if $option[description]}-->
								$option[description]
							<!--{/if}-->
							</em>
						<!--{/if}-->
					</label>
			        <ul class="cl bz-post-sortoption-ul">
						<!--{loop $option['choices'] $id $value}-->
						<li style="margin-right: 10px;float: left;">
							<label>
								<input type="checkbox" name="typeoption[{$option[identifier]}][]" id="typeoption_$option[identifier]" class="bzpsul-input" tabindex="1" onclick="checkoption('$option[identifier]', '$option[required]', '$option[type]')" value="$id" $option['value'][$id][$id] $option[unchangeable]>
								$value
							</label>
						</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{/if}-->
			<!--{elseif in_array($option['type'], array('textarea'))}-->
			<p class="bz-post-sortoption-p">
		        <label>
		        		$option[title]<!--{if $option['required']}--><span class="rq"> * </span><!--{/if}--><span id="check{$option[identifier]}" class="y rq fz12"></span>
			        <!--{if $option['maxnum'] || $option['minnum'] || $option['maxlength'] || $option['unchangeable'] || $option[description]}-->
						<em class="grey fz12">
						<!--{if $option['maxnum']}-->
							{lang maxnum} $option[maxnum]&nbsp;
						<!--{/if}-->
						<!--{if $option['minnum']}-->
							{lang minnum} $option[minnum]&nbsp;
						<!--{/if}-->
						<!--{if $option['maxlength']}-->
							{lang maxlength} $option[maxlength]&nbsp;
						<!--{/if}-->
						<!--{if $option['unchangeable']}-->
							{lang unchangeable}&nbsp;
						<!--{/if}-->
						<!--{if $option[description]}-->
							$option[description]
						<!--{/if}-->
						</em>
					<!--{/if}-->
				</label>
		        <textarea name="typeoption[{$option[identifier]}]" tabindex="1" id="typeoption_$option[identifier]" rows="$option[rowsize]" cols="$option[colsize]" onBlur="checkoption('$option[identifier]', '$option[required]', '$option[type]', 0, 0{if $option[maxlength]}, '$option[maxlength]'{/if})" $option[unchangeable] class="">$option[value]</textarea>
			</p>	
			<!--{/if}-->
			$option[unit]
		</div>

		<!--{/loop}-->
		
	<!--{/if}-->
	
	<script type="text/javascript" reload="1">
		var CHECKALLSORT = false;
		function warning(obj, msg) {
			obj.style.display = '';
			obj.innerHTML = '<img src="{IMGDIR}/check_error.gif" width="12" height="12" class="vm" /> ' + msg;
			obj.className = "y fz12 rq";
			if(CHECKALLSORT) {
				popup.open(msg, 'alert');
			}
		}
		function validateextra() {
			CHECKALLSORT = true;
			<!--{loop $_G['forum_optionlist'] $optionid $option}-->
				if(!checkoption('$option[identifier]', '$option[required]', '$option[type]')) {
					return false;
				}
			<!--{/loop}-->
			return true;
		}
	</script>

</div>

