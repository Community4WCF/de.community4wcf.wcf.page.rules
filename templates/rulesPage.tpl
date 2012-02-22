{include file="documentHeader"}
<head>
	<title>{lang}wcf.rules.title{/lang} - {lang}{PAGE_TITLE}{/lang}</title>
	{include file='headInclude' sandbox=false}
</head>
<body{if $templateName|isset} id="tpl{$templateName|ucfirst}"{/if}>
{include file='header' sandbox=false}

<div id="main">
	<ul class="breadCrumbs">
		<li><a href="index.php?page=Index{@SID_ARG_2ND}"><img src="{icon}indexS.png{/icon}" alt="" /> <span>{lang}{PAGE_TITLE}{/lang}</span></a> &raquo;</li>
	</ul>

	<div class="mainHeadline">
		<img src="{icon}rulesL.png{/icon}" alt="" />
		<div class="headlineContainer">
			<h2>{lang}wcf.rules.title{/lang}</h2>
			<p>{lang}wcf.rules.description{/lang}</p>
		</div>
	</div>
	
	{if $userMessages|isset}{@$userMessages}{/if}
	
	{if $additionalTopRules|isset}{@$additionalTopRules}{/if}
	
	<div class="border content">
		<div class="container-1">
			{lang}{@$rules}{/lang}
			{if $additionalRules|isset}{@$additionalRules}{/if}
		</div>
	</div>
	
	{if $additionalBottomRules|isset}{@$additionalBottomRules}{/if}
	
	{if RULES_BRANDINGFREE != 1}
	<div> 
		<div>
			<div style="text-align: center;">{lang}wcf.global.page.rules.copyright{/lang}</div>
		</div>
	</div>
	{/if}
</div>

{include file='footer' sandbox=false}
</body>
</html>