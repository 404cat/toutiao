<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<div class="bz-post-debate">
    <p class="bz-post-debate-p">
	    	<label for="affirmpoint">{lang debate_square_point}<strong class="color-red"> *</strong></label>
	    	<textarea name="affirmpoint" id="affirmpoint" class="txt" rows="6" >$debate[affirmpoint]</textarea>
    </p>
    <p class="bz-post-debate-p">
	    	<label for="negapoint">{lang debate_opponent_point}<strong class="color-red"> *</strong></label>
	    	<textarea name="negapoint" id="negapoint" class="txt"  rows="6">$debate[negapoint]</textarea>
    </p>
    <p class="bz-post-debate-p">
	    	<label for="endtime">{lang endtime} <em class="grey fz12">&#22635;&#20889;&#26684;&#24335;&#20030;&#20363;: 2020-12-31 10:00</em></label>
	    <input type="text" name="endtime" id="endtime" class="txt_s" autocomplete="off" value="$debate[endtime]"  />
    </p>
    <p class="bz-post-debate-p">
	    	<label for="umpire">&#25351;&#23450;{lang debate_umpire} <em class="grey fz12">&#36755;&#20837;{lang debate_umpire}&#30340;{lang username}</em></label>
	    <input type="text" name="umpire" id="umpire" class="txt_s" value="$debate[umpire]"  />
    </p>
</div>
