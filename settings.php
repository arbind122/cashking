<?php
include 'session.php';
include 'db.php';
include 'v.php';?>

<?php

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);



  $sql = "SELECT * FROM settings";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
 } else {
   header("Location: /");
 }
 
   $sql_L = "SELECT * FROM license";
   $result_L = mysqli_query($link, $sql_L);
   if (mysqli_num_rows($result_L) > 0) {
   $row_L = mysqli_fetch_assoc($result_L);
   
   }


 ?>

<?php include 'inc/head.php';?>
<style>
.bulder_tab_wrapper ul li .nav-link{
    padding-top: 10px;
    padding-bottom: 10px;
}

.white_card .white_card_header{
    padding: 7px 4px;
}

.white_card .white_card_body{
        padding: 5px 15px 25px;
}
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
      right: -10px;
  padding: 12px 25px!important;
  top: 5px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  top: 2px;
  left: 2px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.switch::after{
    display:none;
}

.sclayout{
    
display: flex;
    background: #faebd76e;
    padding: 12px 6px;
    align-items: center;
    justify-content: space-between;
    border-radius: 10px;
    padding-left: 18px;

}
</style>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

<div class="main_content_iner overly_inner ">
<div class="container-fluid p-0 ">

<div class="row">
<div class="col-12">
<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
<div class="page_title_left">
<h3 class="f_s_25 f_w_700 dark_text">Settings & Configuration</h3>
</div>
</div>
</div>
</div>

<div class="row ">
<div class="col-12">
<div class="white_card mb_30 ">
<div class="white_card_header">
<div class="bulder_tab_wrapper">
<ul class="nav" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="Themes-tab" data-toggle="tab" href="#Themes" role="tab" aria-controls="Themes" aria-selected="true">User Reward Setting</a>
</li>
<li class="nav-item">
<a class="nav-link" id="page-tab" data-toggle="tab" href="#page" role="tab" aria-controls="profile" aria-selected="false">Offerwalls</a>
</li>

<li class="nav-item">
<a class="nav-link" id="Header-tab" data-toggle="tab" href="#lic" role="tab" aria-controls="Header" aria-selected="false">License</a>
</li>

<li class="nav-item">
<a class="nav-link" id="Header-tab" data-toggle="tab" href="#sc" role="tab" aria-controls="Header" aria-selected="false">App Security</a>
</li>

</ul>
</div>
</div>
<div class="white_card_body">
<div class="tab-content" id="myTabContent">

<div class="tab-pane fade show active" id="Themes" role="tabpanel" aria-labelledby="Themes-tab">
<div class="builder_select">

<form action="admin_api.php" method="post">

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-email">Daily Bonus Coins</label>
        <input style="background: #f5f6ff;" type="number" name="d_b" class="form-control" placeholder="Enter Coins" value="<?php echo $row['daily_b_points']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Daily Spin Limit</label>
        <input style="background: #f5f6ff;" type="number" name="spin" class="form-control" placeholder="Spin Limit" value="<?php echo $row['daily_spins']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Invited User Bonus</label>
        <input style="background: #f5f6ff;" type="number" name="Invited" class="form-control" placeholder="Invited User Bonus" value="<?php echo $row['invited_user_bonus']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Referral Bonus</label>
        <input style="background: #f5f6ff;" type="number" name="Referral" class="form-control" placeholder="Referral Bonus" value="<?php echo $row['referral_bonus']; ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">Referral Shere Message</label>
        <textarea style="background: #f5f6ff; border: none; color: #8890b5; font-weight: 700; font-size: 14px;" class="form-control"  type="text" name="Shere" rows="4" cols="50"><?php echo $row['refer_msg']; ?></textarea>
          <input type="hidden" name="settings_user">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">OneSignal App ID</label>
        <input style="background: #f5f6ff;" type="text" name="os_app_id" class="form-control" placeholder="OneSignal App ID" value="<?php echo $row['os_app_id']; ?>">
      </div>
    </div>
  </div>
  
   <div class="row">
    <div class="col-lg-12">
      <div class="common_input mb_15">
        <label class="form-control-label" for="input-first-name">OneSignal Rest API</label>
        <input style="background: #f5f6ff;" type="text" name="os_rest_api" class="form-control" placeholder="OneSignal Rest API" value="<?php echo $row['os_rest_api']; ?>">
      </div>
    </div>
  </div>



 <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>
</div>

<div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
<div class="builder_select">

  <form action="admin_api.php" method="post">
      
      <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-email">OfferToro Publisher ID</label>
          <input style="background: #f5f6ff;" type="text" name="ot_pub" class="form-control" placeholder="OfferToro App ID" value="<?php echo $row['OT_PUB']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-email">OfferToro App ID</label>
          <input style="background: #f5f6ff;" type="text" name="ot_app" class="form-control" placeholder="OfferToro App ID" value="<?php echo $row['OT_APP_ID']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">OfferToro Key</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $row['OT_KEY']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">OfferToro Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $base_url ?>postback/ot.php" disabled>
        </div>
      </div>
    </div>


    <hr>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AdGetMedia Wall Code</label>
          <input style="background: #f5f6ff;" type="text" name="adg" class="form-control" placeholder="AdGetMedia Wall Code" value="<?php echo $row['AG_WALLCODE']; ?>">
            <input type="hidden" name="settings_wall">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AdGetMedia Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="ot_k" class="form-control" placeholder="OfferToro Key" value="<?php echo $base_url; ?>postback/adg.php?conversion_id={conversion_id}&user_id={s1}&point_value={points}&usd_value={payout}&offer_title={vc_title}" disabled>
        </div>
      </div>
    </div>


    <hr>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">AyetStudio Postback url</label>
          <input style="background: #f5f6ff;" type="text" name="adg" class="form-control" placeholder="AdGetMedia Wall Code" value="<?php echo $base_url; ?>postback/ayet.php?network=ayetstudios&amount={currency_amount}&uid={uid}&device={advertising_id}&payout_usd={payout_usd}" disabled>
            <input type="hidden" name="settings_wall">
        </div>
      </div>
    </div>

  

    <!--    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-first-name">PollFish ID</label>
          <input style="background: #f5f6ff;" type="hidden" name="p_id" class="form-control" placeholder="PollFish ID" value="<?php echo $row['PF_ID']; ?>">
        </div>
      </div>
    </div>-->

  



   <button type="submit" class="btn btn-primary">Save</button>
  </form>

</div>
</div>

<!--lic-->
<div class="tab-pane fade" id="lic" role="tabpanel" aria-labelledby="Header-tab">
<div class="builder_select">

    <h6 class="heading-small text-muted mb-4">License information</h6>

    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label">Package: <?php echo $row_L['package_name'];?></label>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="common_input mb_15">
          <label class="form-control-label" for="input-email">License Code</label>
          <input style="background: #f5f6ff;" type="text" name="afbads" class="form-control" value="<?php echo $row_L['license'];?>" disabled>
          <label class="form-control-label" for="input-email" style="color:green;">Activated</label>
        </div>
      </div>
    </div>


</div>
</div>


<!--security-->
<div class="tab-pane fade" id="sc" role="tabpanel" aria-labelledby="Header-tab">
<div class="builder_select">

    <h6 class="heading-small text-muted mb-4">Fraud Prevention</h6>

    <div class="row">
  
  <div class="col-lg-12">
  
<form action="admin_api.php" method="post">   
        <div class="sclayout">
            
        <div class="one">
        <div>Block VPN access</div>
        <div style="font-size: 11px;">Don't let the user open offers by using VPN.</div>
        </div>
            
            <div class="one">

            <label class="switch" for="myCheck">
              <input type="checkbox" name="vpn" id="myCheck" onclick="myFunction()" value="<?php echo $row['vpn']; ?>">
             
              <span class="slider round"></span>
            </label>
            
            <input type="hidden" name="vpn_check">
            
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
    
<script>

var checkBox = document.getElementById("myCheck");
if(checkBox.value=="1")
  {
      checkBox.checked = true;
  }else
  {
      checkBox.checked = false;
  }

function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  
  if (checkBox.checked == true){
    document.getElementById("myCheck").value = "1";
  } else {
     document.getElementById("myCheck").value = "0";
  }
}
</script>
    </div>
</div>
</div>


<div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
<div class="builder_select">
<!--add content-->
</div>
</div>

</div>
<br>
</div>
</div>
</div>
</div>
</div>
</div>

</section>

<?php include 'inc/foot.php';?>
