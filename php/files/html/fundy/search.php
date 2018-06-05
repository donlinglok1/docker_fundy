<?php
ini_set ( "memory_limit", "256M" );
set_time_limit ( 0 ); // to infinity for example
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/simple_html_dom.php');

if (isset ( $_GET ['local'] )) {
	$symbol_google_array = sql_select_array ( "
		SELECT company, ticker_google 
		FROM fundy.stock_" . $_GET ['local'] . " 
		WHERE company LIKE '" . $_GET ['key'] . "%' 
		OR ticker_google LIKE '" . $_GET ['key'] . "%'
" );
	
	echo json_encode ( $symbol_google_array, true );
} else {
	$symbol_google_array = sql_select_array ( "
	(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_AFM WHERE company 
			LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION (SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_AMEX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_AMP 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_AMS 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ASX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ATH 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BAK 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BCN 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BDP 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BER 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BEY 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BIT 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BOT 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BRN 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BSH 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BSX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_BUL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CAI 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CAS 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CNQ 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_COL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CPH 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_CVE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_DFM 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_DSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_EBR 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ELI 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_EPA 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ETR 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_FRA 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_FUK 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_GHA 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_HEL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_HKG 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ISE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_IST 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_JAK 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_JNB 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_JSD 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_KAR 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_KDQ 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_KUL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_Lah 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%')
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_LJE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_LON 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_LUS 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_LUX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_MAL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_MCE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_MSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NAG 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NASDAQ 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NBO 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NIG 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NJM 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NYSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_NZE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_OFEX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_OSA 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_OSL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_PAS 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_PRG 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_PSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_RSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_RTC 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_SBX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_SEO 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_SHA 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_SHE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_SIN 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_STO 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_STU 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_TAL 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_TLV 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_TPE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_TSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_TYO 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_VSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_VTX 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_WAR 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_WBAG 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ZIM 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%') 
			UNION(SELECT company, stock_exchanges_symbol_google, ticker_google FROM fundy.stock_ZSE 
			WHERE company LIKE '" . $_GET ['key'] . "%' or ticker_google LIKE '" . $_GET ['key'] . "%')
" );
	
	echo json_encode ( $symbol_google_array, true );
}
?> 