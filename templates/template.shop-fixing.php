{SERVER_MESSAGE}
<h1 class="title"><span>PayPal Shop<span class="line"></span></h1></span></h1><br>
<p><span class="subheaderRed"><h3>Become a V.I.P</h3></span><h4>Upgrade your account and get full access to Project Untitled V.I.P can enter exclusive areas, equip powerful weapons and use special features like colored name in game and much more!</p></h4>
<p><span class="subheaderRed">Buy AdventureCoins</span><br />AdventureCoins allow you to customize your character with rare permanent items including weapons, helms, capes and armors. Permanent means they are usable even when your membership expires. Also, you can use AdventureCoins to add more bag slots - increasing the number of items you can carry!</p>
<br />
<form target="paypal" action="{SERVER_PAYPAL_URL}" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="{SERVER_PAYPAL_BUSINESS}">
<input type="hidden" name="lc" value="{SERVER_PAYPAL_LANGUAGE}">
<input type="hidden" name="item_name" value="Project Untitled V.I.P / AdventureCoins Packages">
<input type="hidden" name="button_subtype" value="products">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="{SERVER_PAYPAL_CURRENCY_CODE}">
<input type="hidden" name="add" value="1">
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHostedGuest">

<input type="hidden" name="return" value="{SERVER_PAYPAL_URL_SUCCESS}&token=MQ==&session={UDATA_SESSION}" id="returnlink">
<input type="hidden" name="cancel_return" value="{SERVER_PAYPAL_URL_CANCEL}">
<!-- <input type="hidden" name="notify_url" value="{SERVER_PAYPAL_URL_NOTIFY}">
<input type="hidden" name="rm" value="{SERVER_PAYPAL_RETURN_METHOD}"> -->

<table>
<tr><td><h2><input type="hidden" name="on0" value="Become a V.I.P / Buy AdventureCoins">Please select a package:</h2></td></tr><tr><td>
<select name="os0" id="packtype">
	<option value="30 Days &amp; 2.500 ACs" id="MQ==">30 Days &amp; 2.500 ACs $3.00 USD</option>
	<option value="70 Days &amp; 5.000 ACs" id="Mg==">70 Days &amp; 5.000 ACs $5.00 USD</option>
	<option value="100 Days &amp; 10.000 ACs" id="Mw==">100 Days &amp; 10.000 ACs $10.00 USD</option>
	<option value="150 Days &amp; 15.000 ACs" id="NA==">150 Days &amp; 15.000 ACs $15.00 USD</option>
	<option value="200 Days &amp; 20.000 ACs" id="NQ==">200 Days &amp; 20.000 ACs $20.00 USD</option>
	<option value="500 Days &amp; 50.000 ACs" id="Ng==">500 Days &amp; 50.000 ACs $30.00 USD</option>
	<option value="1.000 ACs" id="Nw==">1.000 ACs $1.00 USD</option>
	<option value="3.000 ACs" id="OA==">3.000 ACs $2.50 USD</option>
	<option value="5.000 ACs" id="OQ==">5.000 ACs $4.00 USD</option>
	<option value="10.000 ACs" id="MTA=">10.000 ACs $7.00 USD</option>
</select> </td></tr>
</table>

<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="option_select0" value="30 Days &amp; 2.500 ACs">
<input type="hidden" name="option_amount0" value="3.00">
<input type="hidden" name="option_select1" value="70 Days &amp; 5.000 ACs">
<input type="hidden" name="option_amount1" value="5.00">
<input type="hidden" name="option_select2" value="100 Days &amp; 10.000 ACs">
<input type="hidden" name="option_amount2" value="10.00">
<input type="hidden" name="option_select3" value="150 Days &amp; 15.000 ACs">
<input type="hidden" name="option_amount3" value="15.00">
<input type="hidden" name="option_select4" value="200 Days &amp; 20.000 ACs">
<input type="hidden" name="option_amount4" value="20.00">
<input type="hidden" name="option_select5" value="500 Days &amp; 50.000 ACs">
<input type="hidden" name="option_amount5" value="30.00">
<input type="hidden" name="option_select6" value="1.000 ACs">
<input type="hidden" name="option_amount6" value="1.00">
<input type="hidden" name="option_select7" value="3.000 ACs">
<input type="hidden" name="option_amount7" value="2.50">
<input type="hidden" name="option_select8" value="5.000 ACs">
<input type="hidden" name="option_amount8" value="4.00">
<input type="hidden" name="option_select9" value="10.000 ACs">
<input type="hidden" name="option_amount9" value="7.00">
<input type="hidden" name="option_index" value="0">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" onclick="$.get('shop.php?generatenewid', function(data){ if(data != 'success') { alert('An error occured, please try again!'); return false; }});">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br />

<p><strong>PLEASE NOTE</strong><br />
<i>We've added a new payment system, so you are no longer have to submit your transaction ID manually. So after purchasing. click <b>"Return to {SERVER_PAYPAL_BUSINESS}"</b> to apply changes on your account!</i> See Example below:
</p>

<p style="text-align: center;">
<a href="images/payment.png" target="_blank">
<img style="display: block; margin-left: auto; margin-right: auto;" width="500" src="images/payment.png" alt="Example"></a>
<strong>Click to see <a href="images/payment.png" target="_blank"> full image</a>!</strong></p>

<br /><br />

<p><span class="subheaderRed">Frequently Asked Questions (F.A.Qs)</span>
<p><strong>What are V.I.P Features?</strong>
<ul>
    <li><span class="itemName">V.I.P Guild Status</span></li>
    <li><span class="itemName">User Colored Name</span></li>
    <li><span class="itemName">Rank Chat</span></li>
    <li><span class="itemName">V.I.P Shops (CardClasher Set, Chaos and Doom Mod Pack, Green Guitar, AE Calendar Shop)</span></li>
    <li><span class="itemName">V.I.P Only Maps!</span></li>
    <li><span class="itemName">.. and much much more!</span></li>
</ul></p>
<br />
<p><strong>I forgot to click the link (<i>Return to {SERVER_PAYPAL_BUSINESS}</i>)! What do i do?</strong><br />
Please contact our administrators, and bring them your transaction ID which can be found after purchasing any item from our shop
</p>
<br />
<p><strong>I still didn't recieve my V.I.P-ship status and/or AdventureCoins!</strong><br />
This is most likely a server problem, please contact our administrators immediately!
</p>
<br />
<p><strong>Where can i find my Transaction ID?</strong><br />
A PayPal transaction ID is a 17-character string (letters and numbers) that is used to identify a single PayPal transaction. All transactions have an unique transaction ID associated to them.
You can use the Transaction ID to track the status of transactions, or to search for past transactions. If you have purchased LauncherPro Plus and want to know the transaction ID associated to that transaction, you can find it in the "Receipt for Your Payment to Federico Carnales" email that PayPal sends to you after purchasing LauncherPro Plus. 
You can also find it in your PayPal account overview, selecting the transaction details of your payment to Federico Carnales. <a href="http://support.launcherpro.com/knowledgebase.php?article=9" target="_blank">Click here</a> to see original post and screenshots!</p>
<br />
<p><strong>Please keep in mind!</strong><br />Your donations are directed into our game's PayPal which will be used to hire employees for the game and for our servers. We do NOT benefit in some/any way from the donations that are donated from our shop.</p>

<script language="javascript" type="text/javascript">
<!--
$("#packtype").change(function() {
  var token = $(this).children(":selected").attr("id");
  $('#returnlink').attr('value', '{SERVER_PAYPAL_URL_SUCCESS}&token=' + token +'&session={UDATA_SESSION}');
});
// -->
</script>
<!--
        <center>
            <form method="post" action="">
                <span>Send your transaction ID</span>
                <br /><br />
                <table cellspacing="1" cellpadding="3" width="350">
                    <tr>
                        <td align="right" width="72">
                            <span id="Label2" style="width:63px;">Email:</span>
                        </td>
                        <td width="160">
                           <span id="lblEmail"><strong>{UDATA_EMAIL}</strong></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <span id="Label3" style="width:63px;">Transaction ID:</span>
                        </td>
                        <td>
                            <input name="txtTransactionID" type="txtTransactionID" id="txtTransaction" class="stdInput" style="width:14s4px;" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="btnSubmit" value="Submit" id="btnSubmit" />
                        </td>
                    </tr>
                </table>
                <p></p>
            </form>
        </center>
-->
<div class="container clearfix">
<div class="sixteen columns bottom">
<div class="alert info hideit" style="margin-top:20px;">
<p>PayGol prices <b>may differ</b> due to rate fluctuations, operator chargebacks and others possible factors.</p>
<p>If you haven't received your goods or something went wrong with your payment, report it <a href="/contact">here</a>.
<br>Please include your transaction ID if you purchased via PayPal or phone number if you made purchase using mobile.</p>
<span class="close"></span>
</div>
<h1 class="page-title">VIP / <span class="gray2">Purchase Membership</span><span class="line"></span></h1>
</div>
<div class="sixteen columns">
<div class="description bottom-2">
<p>
Upgrade your account and get full access to Emperor Lands! <br>VIP can enter exclusive areas, equip powerful weapons and use special features like colored name in game and much more!
</p>
</div>
<p>VIP is the sole source of income for the server, we rely on user donations to keep it running. All our staff are unpaid volunteers. Purchasing any package will also prove your commitment to the server and will definitely increase the chance of a moderator application being accepted in the future. Features and commands are subject to change at any time without notification and we reserve the right to ban any player from the server including vips at any time.</p>
 
<div class="pricing-tables-1">
<div class="tables-column">
<div class="header gray">
<h1>Basic</h1>
<h3><span>$4.99</span> 7 Days Membership</h3>
</div> 
<ul class="list"><li class="even">5,000+ AdventureCoins</li>
<li class="odd">10+ Backpack Spaces</li>
<li class="even">5+ House Items Slots</li>
<li class="odd">7 Days Membership</li>
<li class="even">7+ Daily Random</li>
<li class="odd">350+ Damage To All Monsters</li>
<li class="even">Access Exclusive Members Shops</li>
<li class="odd">And Much More</li>
</ul><div class="footer gray">
<h3><a href="#"><span>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Basic Membership for Eternal Emperor"><input type="hidden" name="amount" value="0.01"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=VIP499"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form>
<form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="68121"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="Basic VIP Membership"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="5.25"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form>
</span></a></h3>
</div> 
</div> 
<div class="tables-column">
<div class="header black">
<h1>Standard</h1>
<h3><span>$9.99</span> 3 Weeks Membership </h3>
</div> 
<ul class="list"><li class="even">10,000+ AdventureCoins</li>
<li class="odd">15+ Backpack Spaces</li>
<li class="even">10+ House Items Slots</li>
<li class="odd">3 Weeks Membership</li>
<li class="even">21+ Daily Random</li>
<li class="odd">1050+ Damage To All Monsters</li>
<li class="even">Access Exclusive Members Shops</li>
<li class="odd">And Much More</li>
</ul><div class="footer black">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Standard Membership for Eternal Emperor"><input type="hidden" name="amount" value="9.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=VIP999"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form>
<form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="68122"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="Standard VIP Membership"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="10.5"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form>
</span></a></h3>
</div> 
</div> 
 
<div class="tables-column featured">
<div class="header">
<h1>Premium</h1>
<h3><span>$14.99</span> 1 Month Membership</h3>
</div> 
<ul class="list"><li class="even colorTipContainer yellow">15,000+ AdventureCoins</li>
<li class="odd colorTipContainer yellow">25+ Backpack Spaces</li>
<li class="even colorTipContainer yellow">15+ House Items Slots</li>
<li class="odd colorTipContainer yellow">1 Month Membership</li>
<li class="even colorTipContainer yellow">31+ Daily Random</li>
<li class="odd colorTipContainer yellow">1550+ Damage To All Monsters</li>
<li class="even colorTipContainer yellow">Access Exclusive Members Shops</li>
<li class="odd colorTipContainer yellow">And Much More</li>
</ul><div class="footer">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Premium Membership for Eternal Emperor"><input type="hidden" name="amount" value="14.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=VIP1499"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form>
<form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="68123"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="Premium VIP Membership"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="15.75"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form>
</span></a></h3>
</div> 
</div> 
 
<div class="tables-column">
<div class="header black">
<h1>Ultimate</h1>
<h3><span>$19.99</span> 2 Months Membership</h3>
</div> 
<ul class="list"><li class="even">25,000+ AdventureCoins</li>
<li class="odd">35+ Backpack Spaces</li>
<li class="even">20+ House Items Slots</li>
<li class="odd">2 Months Membership</li>
<li class="even">62+ Daily Random</li>
<li class="odd">3100+ Damage To All Monsters</li>
<li class="even">Access Exclusive Members Shops</li>
<li class="odd">And Much More</li>
</ul><div class="footer black">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Ultimate Membership for Eternal Emperor"><input type="hidden" name="amount" value="19.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=VIP1999"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form>
<form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="68124"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="Ultimate VIP Membership"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="21"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form>
</span></a></h3>
</div> 
</div> 
</div>
 
</div>
<div class="sixteen columns bottom"><h1 class="page-title">ACs / <span class="gray2">Purchase AdventureCoins</span><span class="line"></span></h1>
<p>
AdventureCoins allow you to customize your character with rare permanent items including weapons, helms, capes and armors. Permanent means they are usable even when your membership expires. Also, you can use AdventureCoins to add more bag slots - increasing the number of items you can carry!
</p></div>
<div class="sixteen columns">
 
<div class="pricing-tables-1">
<div class="tables-column">
<div class="header gray" style="min-height:0px">
<h3><span>$2.99</span> for 3,000 Coins</h3>
</div> 
<ul class="list"><li class="even">3,000+ AdventureCoins</li>
</ul><div class="footer gray">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Basic ACs for Eternal Emperor"><input type="hidden" name="amount" value="2.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=AC299"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form><form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="70636"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="3000 AdventureCoins"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="3.15"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form></span></a></h3>
</div> 
</div> 
<div class="tables-column">
<div class="header black" style="min-height:0px">
<center><h3><span>$4.99</span> for 7,000 Coins</h3></center>
</div> 
<ul class="list"><li class="even">7,000+ AdventureCoins</li>
</ul><div class="footer black">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Standard ACs for Eternal Emperor"><input type="hidden" name="amount" value="4.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=AC499"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form><form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="70637"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="7000 AdventureCoins"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="5.25"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form></span></a></h3>
</div> 
</div> 
<div class="tables-column">
<div class="header black" style="min-height:0px">
<h3><span>$9.99</span> for 15,000 Coins</h3>
</div> 
<ul class="list"><li class="even colorTipContainer yellow">15,000+ AdventureCoins</li>
</ul><div class="footer black">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Premium ACs for Eternal Emperor"><input type="hidden" name="amount" value="9.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=AC999"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form><form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="70638"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="15000 AdventureCoins"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="10.5"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form></span></a></h3>
</div> 
</div> 
<div class="tables-column">
<div class="header black" style="min-height:0px">
<h3><span>$19.99</span> for 35,000 Coins</h3>
</div> 
<ul class="list"><li class="even">35,000+ AdventureCoins</li>
</ul><div class="footer black">
<h3><a href="#"><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="abdurrahmanalfatih123@yahoo.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Ultimate ACs for Eternal Emperor"><input type="hidden" name="amount" value="19.99"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="button_subtype" value="services"><input type="hidden" name="no_note" value="0"><input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><input type="hidden" name="custom" value="userid=198430&type=AC1999"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></form><form name="pg_frm">
<input type="hidden" name="pg_serviceid" value="70639"><input type="hidden" name="pg_currency" value="USD"><input type="hidden" name="pg_name" value="35000 AdventureCoins"><input type="hidden" name="pg_custom" value="198430"><input type="hidden" name="pg_price" value="21"><input type="hidden" name="pg_return_url" value="http://www.www.infinityarts.co/?playme&upgrade=success"><input type="hidden" name="pg_cancel_url" value=""><input type="image" name="pg_button" class="paygol" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!" onclick="pg_reDirect(this.form)"></form></span></a></h3>
</div> 
</div> 
</div>
 
</div>
</div> 
<script>
  $('#menu_upgrade').attr('class', 'active');
</script>