<?php declare(strict_types=1);

namespace Sprain\SwissQrBill\PaymentPart\Output\HtmlOutput\Template;

class PaymentPartTemplate
{
    public const TEMPLATE = <<<EOT
<style>
table, td {font-size:12px;vertical-align:top;}
h1 {font-size:17px;}
h2 {font-size:13px;}
h3 {font-size:12px;}
td {padding-top:20px;
p {padding-top:20px;}

#qr-bill {
	box-sizing: border-box;
	border-collapse: collapse;
	color: #000;
}

#qr-bill * {
	font-family: Arial, Frutiger, Helvetica, "Liberation Sans";
}

#qr-bill img.qr-bill-placeholder {
    margin-top: 1pt;
}

#qr-bill-separate-info {
    text-align: center;
    font-size: 8pt;
    line-height: 9pt;
	border-bottom: 0.75pt solid black;
	height: 5mm;
	vertical-align: middle;
}

/* h1 / h2 */
#qr-bill h1 {
	font-size: 9pt;
	font-weight: bold;
	margin: 0;
	padding: 0;
	height: 7mm;
}

#qr-bill h2 {
	font-weight: bold;
	margin: 0;
	padding: 0;
}

#qr-bill-payment-part h2 {
	font-size: 8pt;
	line-height: 11pt;	
    margin-top: 11pt;
}

#qr-bill-receipt h2 {
	font-size: 6pt;
	line-height: 8pt;	
    margin-top: 8pt;
}

#qr-bill-payment-part h2:first-child,
#qr-bill-receipt h2:first-child {
	margin-top: 0;
}

/* p */
#qr-bill p {
	font-weight: normal;
	margin: 0;
	padding: 0;
}

#qr-bill-receipt p {
	font-size: 8pt;
	line-height: 9pt;
}

#qr-bill-payment-part p {
	font-size: 10pt;
	line-height: 11pt;
}

#qr-bill-amount-area-receipt p{
    line-height: 11pt;
}

#qr-bill-amount-area p{
    line-height: 13pt;
}

#qr-bill-payment-further-information p {
    font-size: 7pt;
    line-height: 9pt;
}

/* Receipt */
#qr-bill-receipt {
    box-sizing: border-box;
    width: 62mm;
	border-right: 0.2mm solid black;
	padding-left: 5mm;
	padding-top: 5mm;
	vertical-align: top;
}

#qr-bill-information-receipt {
    height: 56mm;
}

#qr-bill-amount-area-receipt {
    height: 14mm;
}

#qr-bill-currency-receipt {
	float: left;
	margin-right: 2mm;
}

#qr-bill-acceptance-point {
    height: 18mm;
    text-align: right;
    margin-right: 5mm;
}

#qr-bill img#placeholder_amount_receipt {
    float: right;
    margin-top: -9pt;
    margin-right: 5mm;
}

/* Main part */
#qr-bill-payment-part {
    box-sizing: border-box;
    width: 148mm;
	padding-left: 5mm;
	padding-top: 5mm;
	padding-right: 5mm;
	vertical-align: top;
}

#qr-bill-payment-part-left {
    float: left;
    box-sizing: border-box;
    width: 51mm;
}

#qr-bill-swiss-qr-image {
	width: 46mm;
	height: 46mm;
	margin: 5mm;
	margin-left: 0;
}

#qr-bill-amount-area {
    height: 22mm;
}

#qr-bill-currency {
	float: left;
	margin-right: 2mm;
}

#qr-bill-payment-further-information {
    clear: both;
}

#qr-bill img#placeholder_amount {
    margin-left: 11mm;
    margin-top: -11pt;
}

{{ printable-content }}
</style>

<table id="qr-bill" style="padding-left:0;table-layout: fixed;">
    <tr id="qr-bill-separate-info">
        <td style="padding-left:0;padding-bottom:30px;"><span id="qr-bill-separate-info-text">{{ text.separate }}</span></td>
    </tr>
    <tr>
        <td colspan="3" style="padding-left:0;padding-top:0px;padding-bottom:30px;box-sizing:border-box;border-top:1mm dashed black;">
        </td>
    </tr>
	<tr style="border-top:1px solid #000;">
	    <td id="qr-bill-receipt" style="padding-left:0;padding-top:0;width:260px;">
            <table>
                <tr><td style="padding-top:0;"><h1>{{ text.receipt }}</h1></td></tr>
                <tr>
                    <td style="height:250px;min-height:250px">
            	        <div id="qr-bill-information-receipt">
                            {{ information-content-receipt }}
                        </div>
                    </td>
                </tr>
            </table>
            <!--<div id="qr-bill-amount-area-receipt">-->
            <table style="padding:0;">
                <tr>
                    <td colspan="1" style="padding-left:0;padding-top:0;padding-right:15px;">
                        <div id="qr-bill-currency-receipt">
                            {{ currency-content }}
                        </div>
                    </td>
                    <td colspan="1" style="padding-left:0;padding-top:0;">
                        <div id="qr-bill-amount-receipt">
                            {{ amount-content-receipt }}
                        </div>
                    </td>
                    <td colspan="1"></td>
                </tr>
            </table>
            <table style="text-align:right" align="right">
                <tr>
                    <td colspan="3" style="text-align:right;padding-top:40px;padding-right:20px;" align="right">
                        <strong id="qr-bill-acceptance-point" style="text-align:right">{{ text.acceptancePoint }}</strong>
                    </td>
                </tr>
            </table>
            <!--</div>-->
        </td>

        <td style="padding-left:30px;padding-top:0;width:260px;">
            <table style="padding:0;">
                <tr>
                    <td colspan="3" style="height:253px;min-height:253px;padding-top:0;">
                        <h1>{{ text.paymentPart }}</h1>
                        <img src="{{ swiss-qr-image }}" id="qr-bill-swiss-qr-image">
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="padding-right:15px;width:50px;max-width:50px">
                        <div id="qr-bill-currency">
                            {{ currency-content }}
                        </div>
                    </td>
                    <td colspan="1" style="width:80px;max-width:80px">
                        <div id="qr-bill-amount">
                            {{ amount-content }}
                        </div>
                    </td>
                    <td colspan="1"></td>
                </tr>
            </table>
		</td>

		<td style="padding-top:0;height:253px;min-height:253px;width:260px;">
            <div id="qr-bill-payment-part-right">
                <div id="qr-bill-information">
                    {{ information-content }}
                </div>
            </div>
            <div id="qr-bill-payment-further-information" style="padding-top:20px;margin-top:20px;">
                {{ further-information-content }}
            </div>
        </td>
	</tr>
</table>
EOT;
}
