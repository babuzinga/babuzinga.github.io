<?php

if (!empty($_GET['code'])) {
  $code = str_replace('#_', '', $_GET['code']);

  $fields = array(
    'app_id'        => '553811755416637',
    'app_secret'    => '9c1790d0d0952e702047ad0f67b44806',
    'grant_type'    => 'authorization_code',
    'redirect_uri'  => 'https://babuzinga.github.io',
    'code'          => $code,
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.instagram.com/oauth/access_token');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($ch);
  curl_close($ch);

  print_r($result);
} else {
  echo '<a href="https://api.instagram.com/oauth/authorize?app_id=553811755416637&redirect_uri=https://babuzinga.github.io/&scope=user_profile,user_media&response_type=code">Authenticate</a>';
}