<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$link   = 'http://202.61.43.40:8056/caselaw/rpt_search_simple.php?CASENO=&CASEYEAR=1972&STD_CASETYPES=-1&STD_BENCHTYPES=-1&STD_COURTS=-1';
$html   = file_get_html($link);
echo $html;
?>
