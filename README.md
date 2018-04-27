# memberpress_google_analytics_revenue_tracking
Track MemberPress Revenue in Google Analytics
<h3>1. Copy & paste the code inside the php file into your functions.php.</h3>

<h3>2. Create your custom event in google analytics.</h3>
<p>Copy and paste the required fields "ec" for the category & "ea" for your Action.</p>

<h3>3. Just swap the tid with your Google Analytics id</h3>
<ul>
  <li>'v'=>'1',</li>
  <li>'t'=>'event',</li>
  <li>'tid'=>'xx-xxx-xxx',</li>
  <li>'cid'=>'62f43561-72bd-438a-a16e-7b8e054e5c0c',</li>
  <li>'ec'=>'Revenue',</li>
  <li>'ea' => 'Transaction',</li>
  <li>'el' => $product,</li>
  <li>'ev' => $amount</li>
</ul>
