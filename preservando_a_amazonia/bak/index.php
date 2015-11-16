<?php
/**
 *
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */


require 'facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '195198150503346',
  'secret' => 'c69ccf35ee9b7670ace4863537e91348',
  'cookie' => true,
));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();

$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

// login or logout url will be needed depending on current user state.
if ($me) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt">

	<head>

		<title>Preservando A Amazônia</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<style type="text/css" media="screen">

		html, body { height:100%; background-color: #ffffff;}

		body { margin:0; padding:0; overflow:hidden; }

		#flashContent { width:100%; height:100%; }

		</style>

	</head>

	<body>

		<div id="flashContent">

			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="700" height="455" id="preservando_a_amazonia_preload" align="middle">

				<param name="movie" value="preservando_a_amazonia_preload.swf" />

				<param name="quality" value="high" />

				<param name="bgcolor" value="#ffffff" />

				<param name="play" value="true" />

				<param name="loop" value="true" />

				<param name="wmode" value="window" />

				<param name="scale" value="showall" />

				<param name="menu" value="true" />

				<param name="devicefont" value="false" />

				<param name="salign" value="" />

				<param name="allowScriptAccess" value="sameDomain" />

				<!--[if !IE]>-->

				<object type="application/x-shockwave-flash" data="preservando_a_amazonia_preload.swf" width="700" height="455">

					<param name="movie" value="preservando_a_amazonia_preload.swf" />

					<param name="quality" value="high" />

					<param name="bgcolor" value="#ffffff" />

					<param name="play" value="true" />

					<param name="loop" value="true" />

					<param name="wmode" value="window" />

					<param name="scale" value="showall" />

					<param name="menu" value="true" />

					<param name="devicefont" value="false" />

					<param name="salign" value="" />

					<param name="allowScriptAccess" value="sameDomain" />

				<!--<![endif]-->

					<a href="http://www.adobe.com/go/getflash">

						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash Player" />

					</a>

				<!--[if !IE]>-->

				</object>

				<!--<![endif]-->

			</object>

		</div>

	</body>

</html>
