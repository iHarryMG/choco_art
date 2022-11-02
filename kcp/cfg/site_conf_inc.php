<?
    /* ============================================================================== */
    /* =   PAGE : 결제 정보 환경 설정 PAGE                                          = */
    /* = -------------------------------------------------------------------------- = */
    /* =   Copyright (c)  2010   KCP Inc.   All Rights Reserverd.                   = */
    /* ============================================================================== */


    /* ============================================================================== */
    /* =   01. 지불 데이터 셋업 (업체에 맞게 수정)                                  = */
    /* = -------------------------------------------------------------------------- = */
    /* = ※ 주의 ※                                                                 = */
    /* = * $g_conf_home_dir 변수 설정                                               = */
    /* = $g_conf_home_dir 값 = pp_cli 바이너리 파일이 존재하는                      = */
    /* =    bin 디렉토리 전까지의 경로를 입력                                       = */
    /* = -------------------------------------------------------------------------- = */

    $g_conf_home_dir  = "../";              // 절대경로 입력

    /* ============================================================================== */
    /* =   02. 쇼핑몰 지불 정보 설정                                                = */
    /* = -------------------------------------------------------------------------- = */

    /* = -------------------------------------------------------------------------- = */
    /* =     02-1. 쇼핑몰 지불 필수 정보 설정(업체에 맞게 수정)                     = */
    /* = -------------------------------------------------------------------------- = */
    /* = ※ 주의 ※                                                                 = */
    /* = * g_conf_site_cd, g_conf_site_key 설정                                     = */
    /* = 실결제시 KCP에서 발급한 사이트코드(site_cd), 사이트키(site_key)를 반드시   = */
    /* =   변경해 주셔야 결제가 정상적으로 진행됩니다.                              = */
    /* =                                                                            = */
    /* = 테스트 시 : 사이트코드(T0000)와 사이트키(3grptw1.zW0GSo4PQdaGvsF__)로      = */
    /* =            설정해 주십시오.                                                = */
    /* = 실결제 시 : 반드시 KCP에서 발급한 사이트코드(site_cd)와 사이트키(site_key) = */
    /* =            로 설정해 주십시오.                                             = */
    /* =                                                                            = */
    /* = -------------------------------------------------------------------------- = */
    /* = ※ 주의 ※                                                                 = */
    /* = * g_conf_gw_url 설정                                                       = */
    /* =                                                                            = */
    /* = 테스트 시 : testpaygw.kcp.co.kr로 설정해 주십시오.                         = */
    /* = 실결제 시 : paygw.kcp.co.kr로 설정해 주십시오.                             = */
    /* =																			= */		
    /* = * g_conf_js_url 설정                                                       = */
	/* = 테스트 시 : src="http://pay.kcp.co.kr/plugin/payplus_test.js"              = */
	/* =             src="https://pay.kcp.co.kr/plugin/payplus_test.js"             = */
    /* = 실결제 시 : src="http://pay.kcp.co.kr/plugin/payplus.js"                   = */
	/* =             src="https://pay.kcp.co.kr/plugin/payplus.js"                  = */
    /* =                                                                            = */
	/* = 테스트 시(UTF-8) : src="http://pay.kcp.co.kr/plugin/payplus_test_un.js"    = */
	/* =                    src="https://pay.kcp.co.kr/plugin/payplus_test_un.js"   = */
    /* = 실결제 시(UTF-8) : src="http://pay.kcp.co.kr/plugin/payplus_un.js"         = */
	/* =                    src="https://pay.kcp.co.kr/plugin/payplus_un.js"        = */
    /* =                                                                            = */
    /* = * g_conf_site_name 설정                                                    = */
    /* = 사이트명 설정(한글 불가) : Payplus Plugin에서 상점명 및 오른쪽 상단에      = */
	/* =                            표기되는 값입니다.                              = */
    /* =                            반드시 영문자로 설정하여 주시기 바랍니다.       = */
    /* = -------------------------------------------------------------------------- = */

    $g_conf_gw_url    = "testpaygw.kcp.co.kr";
	$g_conf_js_url	  = "http://pay.kcp.co.kr/plugin/payplus_test_un.js";
    $g_conf_site_cd   = "T0000" ;
    $g_conf_site_key  = "3grptw1.zW0GSo4PQdaGvsF__";
    $g_conf_site_name = "JejuChocoart";

    /* ============================================================================== */


    /* = -------------------------------------------------------------------------- = */
    /* =     01-2. 지불 데이터 셋업 (변경 불가)                                     = */
    /* = -------------------------------------------------------------------------- = */

    $g_conf_log_level = "3";           // 변경불가
    $g_conf_gw_port   = "8090";        // 포트번호(변경불가)

    /* ============================================================================== */
?>