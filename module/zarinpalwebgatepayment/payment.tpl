<!-- Zarinpal Payment Module -->
<p class="payment_module">
    <a href="javascript:$('#zarinpalwebgatepayment_form').submit();" title="{l s='Pay by Zarinpal' mod='zarinpalwebgatepayment'}">
        <img src="modules/zarinpalwebgatepayment/zarinpal.png" alt="{l s='Pay by Zarinpal' mod='zarinpalwebgatepayment'}" />
		{l s='Pay by Debit/Credit card through Zarinpal Online Merchent.' mod='zarinpalwebgatepayment'}
<br>
</a></p>
<a class="exclusive_large" href="javascript:$('#zarinpalwebgatepayment_form').submit();" title="{l s='Pay by Zarinpal' mod='zarinpalwebgatepayment'}">{l s='Pay by Zarinpal' mod='zarinpalwebgatepayment'}</a>
<form action="modules/zarinpalwebgatepayment/payment.php" method="post" id="zarinpalwebgatepayment_form" class="hidden">
    <input type="hidden" name="orderId" value="{$orderId}" />
</form>
<br><br>
<!-- End of Zarinpal Payment Module-->
