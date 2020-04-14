<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-post-activity">
	<p class="bz-post-activity-p">
        <label>{lang post_event_time}<strong class="color-red"> * </strong><em class="grey fz12">&#22635;&#20889;&#26684;&#24335;&#20030;&#20363; : 2020-12-31 10:00</em></label>
        <input type="text" name="starttimefrom[0]" id="starttimefrom_0" class="txt_s" autocomplete="off" value="$activity[starttimefrom]" tabindex="1" />
	</p>
	<p class="bz-post-activity-p">
        <label for="activityplace">{lang activity_space}<strong class="color-red"> * </strong></label>
        <input type="text" name="activityplace" id="activityplace" class="txt_s" value="$activity[place]" tabindex="1" />
	</p>	
	<!--{if $_GET[action] == 'newthread'}-->
	<p class="bz-post-activity-p">
        <label for="activitycity">{lang activity_city}</label>
        <input name="activitycity" id="activitycity" class="txt_s" type="text" tabindex="1" />
	</p>
	<!--{/if}-->
	<div class="bz-post-activity-p">
        <label for="activityclass">{lang activiy_sort}<strong class="color-red"> * </strong></label>
        <!--{if $activitytypelist}-->
			<div id="activitytypelist" class="grey fz12">
			<!--{loop $activitytypelist $type}-->$type <!--{/loop}-->
			</div>
		<!--{/if}-->
        <input type="text" id="activityclass" name="activityclass" class="txt_s" value="$activity[class]" tabindex="1" />
	</div>	
	<p class="bz-post-activity-p">
        <label for="activitynumber">{lang activity_need_member}</label>
        <input type="text" name="activitynumber" id="activitynumber" class="txt_s" onkeyup="checkvalue(this.value, 'activitynumbermessage')" value="$activity[number]" tabindex="1" />
	</p>	
	<p class="bz-post-activity-p">
        <label>&#24615;&#21035;&#35201;&#27714;</label>
        <select name="gender" id="gender" class="sort_sel">
			<option value="0" {if !$activity['gender']}selected="selected"{/if}>{lang unlimited}</option>
			<option value="1" {if $activity['gender'] == 1}selected="selected"{/if}>{lang male}</option>
			<option value="2" {if $activity['gender'] == 2}selected="selected"{/if}>{lang female}</option>
		</select>
	</p>	
	<!--{if $_G['setting']['activityfield']}-->
	<div style="padding: 30px 0 20px 0;">
        <label style="font-size: 16px;">{lang optional_data}</label>
        <ul class="cl bz-post-activity-ul">
			<!--{loop $_G['setting']['activityfield'] $key $val}-->
			<li style="margin-right: 10px;float: left;">
				<label for="userfield_$key"><input type="checkbox" name="userfield[]" id="userfield_$key" class="bzpap-pc" value="$key"{if $activity['ufield']['userfield'] && in_array($key, $activity['ufield']['userfield'])} checked="checked"{/if} />$val</label>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->
	<!--{if $_G['setting']['activityextnum']}-->
	<p class="bz-post-activity-p">
        <label for="extfield">{lang other_data}</label>
        <textarea name="extfield" id="extfield" cols="50" rows="6" placeholder="{lang post_activity_message} $_G['setting']['activityextnum'] {lang post_option}"><!--{if $activity['ufield']['extfield']}-->$activity[ufield][extfield]<!--{/if}--></textarea>
	</p>	
	<!--{/if}-->
	<!--{if $_G['setting']['activitycredit']}-->
	<p class="bz-post-activity-p">
        <label for="activitycredit">{lang consumption_credit}({$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}) <em class="grey fz12">{lang user_consumption_money}</em></label>
        <input type="text" name="activitycredit" id="activitycredit" class="txt_s" value="$activity[credit]" />
	</p>
	<!--{/if}-->
	<p class="bz-post-activity-p">
        <label for="cost">{lang activity_payment}({lang payment_unit})</label>
        <input type="text" name="cost" id="cost" class="txt_s" onkeyup="checkvalue(this.value, 'costmessage')" value="$activity[cost]" tabindex="1" />
        <span id="costmessage"></span>
	</p>
	<p class="bz-post-activity-p">
        <label for="activityexpiration">{lang post_closing} <em class="grey fz12">&#22635;&#20889;&#26684;&#24335;&#20030;&#20363;: 2020-12-31 10:00</em></label>
        <input type="text" name="activityexpiration" id="activityexpiration" class="txt_s" autocomplete="off" value="$activity[expiration]" tabindex="1" />
	</p>	
	<!--{if $allowpostimg}-->
	<p class="bz-post-activity-p">
		<label>{lang post_topic_image}</label>
		<div class="grey fz12">&#26242;&#19981;&#25903;&#25345;&#27492;&#21151;&#33021;, &#21487;&#20351;&#29992;&#24213;&#37096;&#20256;&#22270;&#25353;&#38062;&#25110;{lang nomobiletype}&#20256;&#22270;&#25353;&#38062;</div>
	</p>	
	<!--{/if}-->
	<!--{hook/post_activity_extra}-->
</div>
