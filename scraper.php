<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$years	=	array('1972','1974'
                /*,
'1973',
'1974',
'1975',
'1976',
'1977',
'1978',
'1979',
'1980',
'1981',
'1982',
'1983',
'1984',
'1985',
'1986',
'1987',
'1988',
'1989',
'1990',
'1991',
'1992',
'1993',
'1994',
'1995',
'1996',
'1997',
'1998',
'1999',
'2000',
'2001',
'2002',
'2003',
'2004',
'2005',
'2006',
'2007',
'2008',
'2009',
'2010',
'2011',
'2012',
'2013',
'2014',
'2015',
'2016',
'2017',
'2018',*/
);

for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
  $Mainpage	=	$years[$mainpage];
  $link   = 'http://202.61.43.40:8056/caselaw/rpt_search_simple.php?CASENO=&CASEYEAR='.$Mainpage.'&STD_CASETYPES=-1&STD_BENCHTYPES=-1&STD_COURTS=-1'; 
  $page   = file_get_html($link);
  foreach($page->find("//[@id='tblExport']/tbody/tr")as $element)
  {
      $code          	= $element->find('td',0)->plaintext;
      $s            	= $element->find('td',1)->plaintext;
      $citation     	= $element->find('td',2)->plaintext;
      $case_no    	= $element->find('td',3)->plaintext;
      $case_year    	= $element->find('td',4)->plaintext;
      $parties      	= $element->find('td',5)->plaintext;
      $bench        	= $element->find('td',6)->plaintext;
      $order_date   	= $element->find('td',7)->plaintext;
      $afr          	= $element->find('td',8)->plaintext;    
      $head  		= $element->find('td',9)->plaintext;     
     
      $judlinkone  	= $element->find('td/a',0)->href;  
      $jud_ordertwo  	= $element->find('td/a',1)->href;
	  
      $jud_orderek	=	'http://202.61.43.40:8056/caselaw/'."$judlink\n";
      $jud_orderdo	=	'http://202.61.43.40:8056/caselaw/'."$jud_ordertwo\n";
      
    if($code != null || $code != "")
    {
    echo "$jud_orderdo\n";
    $record = array( 'code' =>$code, 
		   's' => $s,
		   'citation' => $citation, 
		   'case_no' => $case_no, 
		   'case_year' => $case_year, 
		   'parties' => $parties, 
		   'bench' => $bench, 
		   'order_date' => $order_date, 
		   'afr' => $afr,
		   'head' => $head);
						
						
           scraperwiki::save(array('code','s','citation','case_no','case_year','parties','bench','order_date','afr','head'), $record);
    }
    
    
  }
}

?>
