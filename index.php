<?php
function printKeyByLanguage($key){
  include_once("library/getInformationFromIP.php");
  $getInformationFromIP = new getInformationFromIP();
  $getInformationFromIP->ip= $_SERVER['REMOTE_ADDR'];
  $getInformationFromIP->fetchData();
  $languageJSONFile = file_get_contents("assets/languages.json");
  $languageJSON = json_decode($languageJSONFile, true);
  $languageCode = $getInformationFromIP->getCurrentCountryCode();
  if ($languageCode != "TR" && $languageCode != "EN"){
    $languageCode = "EN";
  }
  echo $languageJSON[$languageCode][$key];
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?php printKeyByLanguage("page_title"); ?>  ❄️</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="css/style.css">

</head>
<body>
<canvas class="orb-canvas"></canvas>
<div id="queryPanel" style="margin-left: auto; margin-right: auto; display: table;" class="overlay animate__animated animate__zoomInDown">
  <div id="query" style="display:table;" class="overlay__inner">
    <h1 class="overlay__title">
    <?php printKeyByLanguage("type_site_address_1"); ?>
      <span class="text-gradient"><?php printKeyByLanguage("type_site_address_2"); ?></span> <?php printKeyByLanguage("type_site_address_3"); ?>
    </h1>
    <p class="overlay__description">

    <input type="textbox" class='typefun' id='text' onkeypress="handleKeyPress(event)" placeholder="<?php printKeyByLanguage("dummy_site_address"); ?>" />

    </p>
    <div class="overlay__btns">
      <button onclick="bringData()" class="overlay__btn overlay__btn--colors">
        <span><?php printKeyByLanguage("query_text"); ?></span>
        <span class="overlay__btn-emoji">🔎</span>
      </button>
    </div>
  </div>

  <div id="result" style="display:none; margin-left: auto; margin-right: auto;" class="overlay__inner">
    <h1 class="overlay__title" style="margin-left: auto; margin-right: auto; display: table;">
      <span id="siteName" class="text-gradient"><?php printKeyByLanguage("sitename_details"); ?></span> 
    </h1>
    <p class="overlay__description">


    <section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><?php printKeyByLanguage("domain"); ?></th>
          <th><input id="domain_name" class="w3-input" disabled type="text" value=""></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td><?php printKeyByLanguage("registrar"); ?></td>
          <td ><input id="registrar" class="w3-input" disabled type="text" value=""></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><?php printKeyByLanguage("expiration_date"); ?></th>
          <th ><input id="expiration_date" class="w3-input" disabled type="text" value=""></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td><?php printKeyByLanguage("nameservers"); ?></td>
          <td > <input id="name_servers" class="w3-input" disabled type="text" value=""></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><?php printKeyByLanguage("creation_date"); ?></th>
          <th ><input id="creation_date" class="w3-input" disabled type="text" value=""></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td><?php printKeyByLanguage("domain_owner"); ?></td>
          <td ><input id="emails" class="w3-input" disabled type="text" value=""></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><?php printKeyByLanguage("domain_owner_address"); ?></th>
          <th ><input id="address" class="w3-input" disabled type="text" value=""></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td><?php printKeyByLanguage("domain_owner_country"); ?></td>
          <td ><input id="country" class="w3-input" disabled type="text" value=""></td>
        </tr>
      </tbody>
    </table>
  </div>
</section>


    </p>
    <!-- Buttons -->
    <div class="overlay__btns">
      <button onclick="goBack()" class="overlay__btn overlay__btn--colors">
        <span><?php printKeyByLanguage("go_back"); ?></span>
        <span class="overlay__btn-emoji">🔙</span>
      </button>
    </div>
  </div>
</div>

<!-- partial -->
  <script type="module" src="js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script type="text/javascript" src="js/functions.js"></script>

</body>
<img src="images/loading.gif" id="loading" style="display:none; left:38%; top:38%; position:absolute; z-index:999;">
</html>
