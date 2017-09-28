<?php

include_once( PHPCMS_ROOT.'/util/core/config.php' );
include_once( PHPCMS_ROOT.'/util/core/saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );

header('location:'.$code_url);