<?php echo 'Made by banzhuan,QQ:1074259861';exit;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<title><!--{if $_GET['forumlist'] == '1' || $_GET['mod'] == 'guide'}-->$_G['setting']['bbname']<!--{else}--><!--{if !empty($navtitle)}-->$navtitle<!--{/if}--><!--{if empty($nobbname)}-->-$_G['setting']['bbname']<!--{/if}--><!--{/if}--></title>
<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/jquery.min.js?{VERHASH}"></script>
<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/common.js?{VERHASH}" charset="{CHARSET}"></script>
<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/bznav.js"></script>
<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/jquery.SuperSlide.2.1.3.js"></script>
<script src="{$_G['style']['styleimgdir']}/touch/xmbbs/swiper.min.js"></script>
<link rel="stylesheet" href="{$_G['style']['styleimgdir']}/touch/xmbbs/swiper.min.css" type="text/css" media="all">
<link rel="stylesheet" href="{$_G['style']['styleimgdir']}/touch/xmbbs/bzstyle.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{$_G['style']['styleimgdir']}/touch/xmbbs/font/iconfont.css">
<!--{eval $_G['cookie']['extstyle'] && $_G[style][defaultextstyle] = $_G['cookie']['extstyle'];}-->
<link id="css_extstyle" type="text/css" rel="stylesheet" href='{if $_G[style][defaultextstyle]}$_G[style][defaultextstyle]{else}{$_G['style']['styleimgdir']}/style/t1{/if}/style.css'>
</head>
<body {if $_GET['mod'] == 'logging' || $_GET['mod'] == 'register' || $_GET['do'] == 'notice' || $_GET['do'] == 'pm' || $_GET['mod'] == 'spacecp' || $_GET['mod'] == 'announcement' || $_GET['mod'] == 'tag' || $_GET['mod'] == 'ranklist' || $_GET['mod'] == 'forum' || $_GET['mod'] == 'faq' }class="bz-bg-fff"{else}class="bg"{/if}>
<!--{hook/global_header_mobile}-->

