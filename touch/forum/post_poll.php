<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-post-poll">
    <input type="hidden" name="polls" value="yes" />
    <input type="hidden" name="fid" value="$_G[fid]" />
    <!--{if $_GET[action] == 'newthread'}-->
        <input type="hidden" name="tpolloption" value="2" />
        <textarea name="polloptions" rows="6" placeholder="{lang post_poll_comment_s}" /></textarea>
    <!--{else}-->
        <!--{loop $poll['polloption'] $key $option}-->
            <p>
                <input type="hidden" name="polloptionid[{$poll[polloptionid][$key]}]" value="$poll[polloptionid][$key]" />
                <input type="text" name="displayorder[{$poll[polloptionid][$key]}]" class="" autocomplete="off"  value="$poll[displayorder][$key]" />
                <input type="text" name="polloption[{$poll[polloptionid][$key]}]" class="" autocomplete="off" style="width:290px;" value="$option"{if !$_G['group']['alloweditpoll']} readonly="readonly"{/if} />
            </p>
        <!--{/loop}-->
    <!--{/if}-->
    <p class="grey fz12">{lang post_poll_options} : {lang post_poll_comment}</p>
    <p class="bz-post-poll-p">
        <label for="maxchoices">{lang post_poll_allowmultiple}({lang post_option})</label>
        <input type="text" name="maxchoices" id="maxchoices" class="txt_s" value="{if $_GET[action] == 'edit' && $poll[maxchoices]}$poll[maxchoices]{else}1{/if}"  /> 
	</p>	
    <p class="bz-post-poll-p">
        <label for="polldatas">{lang post_poll_expiration}({lang days})</label>
        <input type="text" name="expiration" id="polldatas" class="txt_s" value="{if $_GET[action] == 'edit'}{if !$poll[expiration]}0{elseif $poll[expiration] < 0}{lang poll_close}{elseif $poll[expiration] < TIMESTAMP}{lang poll_finish}{else}{echo (round(($poll[expiration] - TIMESTAMP) / 86400))}{/if}{/if}"  />
    </p>
    <p class="bz-post-poll-p">
        <input type="checkbox" name="visibilitypoll" id="visibilitypoll" class="bzppp-pc" value="1"{if $_GET[action] == 'edit' && !$poll[visible]} checked{/if}  />
        <label for="visibilitypoll">{lang poll_after_result}</label>
    </p>
    <p class="bz-post-poll-p">
        <input type="checkbox" name="overt" id="overt" class="bzppp-pc" value="1"{if $_GET[action] == 'edit' && $poll[overt]} checked{/if}  />
        <label for="overt">{lang post_poll_overt}</label>
    </p>
</div>