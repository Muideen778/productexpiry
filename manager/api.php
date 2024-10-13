<?php

error_reporting(0);
echo '<div>
  <div>
    <div>
      <div>
        <div>
          <div><strong>HTTP API: </strong></div>
          <div>Single SMS</div>
          <div><strong><br />
          </strong></div>
          <p><a href="http://trenetsms.com/components/com_spc/smsapi.php?username=user&amp;password=1234&amp;sender=trenetsms&amp;recipient=234809xxxxxxx,234803xxxxxx&amp;message=testing">http://www.</a><strong>trenetsms.com</strong>/components/com_sp<strong>c</strong><strong>/smsapi.php?username=user&amp;password=1234&amp;sender=trenetsms&amp;recipient=234809xxxxxxx,234803xxxxxx&amp;message=testing</strong></p>
          <div>Multiple</div>
          <div><strong><br />
          </strong></div>
          <p>http://www.<strong>trenetsms.com</strong>/components/com_spc/smsapi.php?username=yyyyyy&amp;password=xxxxx&amp;sender=@@sender@@&amp;recipient=@@recipient@@&amp;message=@@message@@&amp;</p>
          <div><strong>API response on Success:</strong> OK</div>
          <div><strong>API response confirmation: </strong>Contains</div>
          <div><strong><br />
          </strong></div>
          <div><strong>Account Balance API: </strong></div>
          <div>Connect to check remaining <strong>sms</strong> balance through the following api url:</div>
          <div><br />
            <strong>http://trenetsms.com/components/com_spc/smsapi.php?username=xxxx&amp;password=xxxxx&amp;balance=true&amp;</strong></div>
          <div><strong><br />
          </strong></div>
          <div>
            <div><strong>API Protocol: </strong>HTTP POST</div>
            <div><strong>Push to API as: </strong>BULK</div>
            <strong><br />
            </strong></div>
          <div><strong><br />
          </strong></div>
          <div><strong>The parameters are</strong><br />
            1. <strong>recipient </strong>: The destination phone numbers. Separate multiple numbers with comma(,)<br />
            3. <strong>username</strong>: Your <strong>trenetsms.com</strong> account username<br />
            4. <strong>password</strong>: Your <strong>trenetsms.com</strong> account password<br />
            5. <strong>sender</strong>: The sender ID to show on the receiver\'s phone<br />
            6. <strong>message</strong>: The text message to be sent<br />
            7. <strong>balance</strong>: Set to true only when you want to check your credit balance<br />
            6. <strong>schedule</strong>:   Specify this parameter only when you are scheduling an sms for later   delivery. It should contain the date the message should be delivered.   Supported format is &quot;2009-10-01 12:30:00&quot; i.e &quot;YYYY-MM-DD HH:mm:ss&quot;</div>
          <div> </div>
          <div><strong>The return values are </strong></div>
          <div><strong>OK</strong>=Successful<br />
            <strong>2904</strong>=SMS Sending Failed<br />
            <strong>2905</strong>=Invalid username/password combination<br />
            <strong>2906</strong>=Credit exhausted<br />
            <strong>2907</strong>=Gateway unavailable<br />
            <strong>2908</strong>=Invalid schedule date format<br />
            <strong>2909</strong>=Unable to schedule<br />
            <strong>2910</strong>=Username is empty<br />
            <strong>2911</strong>=Password is empty<br />
            <strong>2912</strong>=Recipient is empty<br />
            <strong>2913</strong>=Message is empty<br />
            <strong>2914</strong>=Sender is empty<br />
            <strong>2915</strong>=One or more required fields are empty</div>
          <div>Example:<br />
            On success, the following code will be returned<br />
            <strong>OK 21 08033333333,08022222222,08055555555</strong></div>
          <div>i.e <strong>OK</strong><strong>no of sms credits used</strong><strong>gsm numbers that failed</strong><br />
            where <strong>21</strong>=no of sms credits used<br />
            and <strong>08033333333,08022222222,08055555555</strong> are the 3 numbers that failed</div>
        </div>
      </div>
    </div>
  </div>
  <div></div>
</div>
<div></div>
';;?>
