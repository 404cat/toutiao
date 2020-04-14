<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-post-reward">
    <!--{if $_GET[action] == 'newthread'}-->
    		<p class="bz-post-reward-p">
	        <label for="rewardprice">{lang reward_price} <em class="grey fz12">{lang you_have}<i class="color-red"> <!--{echo getuserprofile('extcredits'.$_G['setting']['creditstransextra'][2]);}--> </i>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}</em></label>
	        <input type="text" name="rewardprice" id="rewardprice" class="txt_s" value="{$_G['group']['minrewardprice']}"  />
		</p>
    <!--{elseif $_GET[action] == 'edit'}-->
        <!--{if $isorigauthor}-->
            <!--{if $thread['price'] > 0}-->
                <label for="rewardprice">{lang reward_price} <em class="grey fz12">{lang you_have}<i class="color-red"> <!--{echo getuserprofile('extcredits'.$_G['setting']['creditstransextra'][2]);}--> </i>{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}</em></label>
                <input type="text" name="rewardprice" id="rewardprice" class="txt_s" value="$rewardprice"  />
                {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
                ({lang reward_tax_add} <span id="realprice">0</span> {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]} , {lang reward_low} {$_G['group']['minrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}<!--{if $_G['group']['maxrewardprice'] > 0}--> - {$_G['group']['maxrewardprice']} {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}<!--{/if}-->)
            <!--{else}-->
                {lang post_reward_resolved}
                <input type="hidden" name="rewardprice" value="$rewardprice"  />
            <!--{/if}-->
        <!--{else}-->
            <!--{if $thread['price'] > 0}-->
                {lang reward_price}: $rewardprice {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][2]][title]}
            <!--{else}-->
                {lang post_reward_resolved}
            <!--{/if}-->
        <!--{/if}-->
    <!--{/if}-->
    <!--{if $_G['setting']['rewardexpiration'] > 0}-->
        <p class="grey fz12">$_G['setting']['rewardexpiration']{lang post_reward_message}</p>
    <!--{/if}-->
</div>