<?php
$time_start = microtime ( true );
include (dirname ( __FILE__ ) . '/../../../.ba&4AhAF_mysql.php');
include (dirname ( __FILE__ ) . '/../../simple_html_dom.php');

//http://www.mpfa.org.hk/tch/public_registers/registered_schemes_cf/fulist.do

$html = str_get_html ( '<table width="100%" border="0" cellspacing="1" cellpadding="0" class="summarytable">
                      <tbody><tr>
                        <th width="130" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">計劃名稱(中)</th>
                        <th width="" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">計劃名稱(英)</th>
                        <th width="100" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">類別</th>
                        <th width="125" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">核准日期<br>(日／月／年)</th>
                        <th width="100" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">銷售文件</th>
                      </tr>
                      
                        
                        
                          
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000046">友邦強積金優選計劃</a></td>
                            <td valign="top">AIA MPF - Prime Value Choice</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00172_AIA_MPF_-_Prime_Value_Choice_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000041">安聯強積金計劃</a></td>
                            <td valign="top">Allianz Global Investors MPF Plan</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              17/07/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00490_Allianz_Global_Investors_MPF_Plan_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000042">AMTD 強積金計劃</a></td>
                            <td valign="top">AMTD MPF Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              25/05/2009
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00539_AMTD_MPF_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000051">交通銀行愉盈退休強積金計劃</a></td>
                            <td valign="top">BCOM Joyful Retirement MPF Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00393_BCOM_Joyful_Retirement_MPF_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000048">BCT (強積金) 行業計劃</a></td>
                            <td valign="top">BCT (MPF) Industry Choice</td>
                            <td valign="top">行業計劃</td>
                          
                            <td valign="top">
                              13/04/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/IS00017_BCT_(MPF)_Industry_Choice_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000043">BCT 積金之選</a></td>
                            <td valign="top">BCT (MPF) Pro Choice</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00016_BCT_(MPF)_Pro_Choice_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000055">東亞 (強積金) 行業計劃</a></td>
                            <td valign="top">BEA (MPF) Industry Scheme</td>
                            <td valign="top">行業計劃</td>
                          
                            <td valign="top">
                              13/04/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/IS00025_BEA_(MPF)_Industry_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000054">東亞 (強積金) 集成信託計劃</a></td>
                            <td valign="top">BEA (MPF) Master Trust Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00202_BEA_(MPF)_Master_Trust_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000061">東亞 (強積金) 享惠計劃</a></td>
                            <td valign="top">BEA (MPF) Value Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              21/08/2012
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00571_BEA_(MPF)_Value_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000057">中銀保誠簡易強積金計劃</a></td>
                            <td valign="top">BOC-Prudential Easy-Choice Mandatory Provident Fund Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00091_BOC-Prudential_Easy-Choice_Mandatory_Provident_Fund_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000001">中國人壽強積金集成信託計劃</a></td>
                            <td valign="top">China Life MPF Master Trust Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00083_China_Life_MPF_Master_Trust_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000027">富達退休集成信託</a></td>
                            <td valign="top">Fidelity Retirement Master Trust</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00288_Fidelity_Retirement_Master_Trust_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000038">富衛強積金集成信託基本計劃</a></td>
                            <td valign="top">FWD MPF Master Trust Basic Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00326_FWD_MPF_Master_Trust_Basic_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000037">富衛強積金集成信託綜合計劃</a></td>
                            <td valign="top">FWD MPF Master Trust Comprehensive Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00318_FWD_MPF_Master_Trust_Comprehensive_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000020">海通 MPF 退休金</a></td>
                            <td valign="top">Haitong MPF Retirement Fund</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00121_Haitong_MPF_Retirement_Fund_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000016">恒生強積金易選計劃 (此計劃合併至恒生強積金自選計劃之生效日期為2016年7月1日)</a></td>
                            <td valign="top">Hang Seng Mandatory Provident Fund - SimpleChoice (The effective date of merger of this Scheme into the Hang Seng Mandatory Provident Fund - ValueChoice is 1 July 2016)</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              09/01/2008
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000026">恒生強積金精選計劃 (此計劃合併至恒生強積金智選計劃之生效日期為2016年7月1日)</a></td>
                            <td valign="top">Hang Seng Mandatory Provident Fund - SuperTrust (The effective date of merger of the Scheme into Hang Seng Mandatory Provident Fund - SuperTrust Plus is 1 July 2016)</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000024">恒生強積金智選計劃</a></td>
                            <td valign="top">Hang Seng Mandatory Provident Fund - SuperTrust Plus</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00253_Hang_Seng_Mandatory_Provident_Fund_-_SuperTrust_Plus_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000019">恒生強積金自選計劃</a></td>
                            <td valign="top">Hang Seng Mandatory Provident Fund - ValueChoice</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              25/11/2010
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00563_Hang_Seng_Mandatory_Provident_Fund_-_ValueChoice_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000017">滙豐強積金易選計劃 (此計劃合併至滙豐強積金自選計劃之生效日期為2016年7月1日)</a></td>
                            <td valign="top">HSBC Mandatory Provident Fund - SimpleChoice (The effective date of the merger of this Scheme into the HSBC Mandatory Provident Fund - ValueChoice is 1 July 2016)</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              09/01/2008
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000025">滙豐強積金精選計劃 (此計劃合併至滙豐強積金智選計劃之生效日期為2016年7月1日)</a></td>
                            <td valign="top">HSBC Mandatory Provident Fund - SuperTrust (The effective date of the merger of the Scheme into the HSBC Mandatory Provident Fund - SuperTrust Plus is 1 July 2016)</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000023">滙豐強積金智選計劃</a></td>
                            <td valign="top">HSBC Mandatory Provident Fund - SuperTrust Plus</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00245_HSBC_Mandatory_Provident_Fund_-_SuperTrust_Plus_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000018">滙豐強積金自選計劃</a></td>
                            <td valign="top">HSBC Mandatory Provident Fund - ValueChoice</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              25/11/2010
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00555_HSBC_Mandatory_Provident_Fund_-_ValueChoice_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000044">景順強積金策略計劃</a></td>
                            <td valign="top">Invesco Strategic MPF Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00075_Invesco_Strategic_MPF_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000002">宏利環球精選 (強積金) 計劃</a></td>
                            <td valign="top">Manulife Global Select (MPF) Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              05/05/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00482_Manulife_Global_Select_MPF_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000039">宏利強積金計劃 - 全面</a></td>
                            <td valign="top">Manulife MPF Plan - Advanced</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            			<a href="/sch/public_registers/registered_schemes_cf/OD/MT00415_Manulife_MPF_Plan_-_Advanced_BILINGUAL.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000040">宏利強積金計劃 - 基本</a></td>
                            <td valign="top">Manulife MPF Plan - Basic</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            			<a href="/sch/public_registers/registered_schemes_cf/OD/MT00423_Manulife_MPF_Plan_-_Basic_BILINGUAL.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000004">萬全強制性公積金計劃</a></td>
                            <td valign="top">MASS Mandatory Provident Fund Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00350_MASS_Mandatory_Provident_Fund_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000056">我的強積金計劃</a></td>
                            <td valign="top">My Choice Mandatory Provident Fund Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              23/04/2010
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00547_My_Choice_Mandatory_Provident_Fund_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000031">信安強積金 - 易富之選</a></td>
                            <td valign="top">Principal MPF - Simple Plan</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              13/01/2005
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00504_Principal_MPF_-_Simple_Plan_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                        
                      
                      
                    </tbody></table>
		' );
$array = $html->find ( 'tr' );
$index = count ( $array );

$insertVaule = "";
for($i = 0; $i < $index; $i ++) {
	if ($i > 0 ) {
		$element = $array [$i];
		
		$result = $element->innertext;
		$result = str_replace ( '<a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=', "", $result );
		$result = str_replace ( '<td valign="top">', "','", $result );
		$result = str_replace ( '</td>', "", $result );
		$result = str_replace ( '</a>', "", $result );
		$result = str_replace ( '">', "','", $result );
		$result = str_replace ( '<table>', "',", $result );
		$result = str_replace ( "  ", "", $result );
		
		$insertVaule = $insertVaule . ",('".substr ( $result, 4, strrpos ( $result, '<a href="' ) - 4 )."')".PHP_EOL;
	}
}

echo "INSERT INTO fundy.mpfs_scheme (mpfa_id,name_tc,name,`type`,financial_year_date,`key`)
VALUES". substr($insertVaule,1) . "\n";

echo sql_insert_id( "INSERT INTO fundy.mpfs_scheme (mpfa_id,name_tc,name,`type`,financial_year_date,`key`)
VALUES". substr($insertVaule,1) . "\n");

echo "mysql_errno: " . mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;

$html = str_get_html ( '<table width="100%" border="0" cellspacing="1" cellpadding="0" class="summarytable">
                      <tbody><tr>
                        <th width="130" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">計劃名稱(中)</th>
                        <th width="" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">計劃名稱(英)</th>
                        <th width="100" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">類別</th>
                        <th width="125" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">核准日期<br>(日／月／年)</th>
                        <th width="100" align="left" style="background-color:#eceaea; border-top:2px solid #b2b2b2;" scope="col">銷售文件</th>
                      </tr>
                      
                        
                        
                          
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000032">信安強積金 - 明智之選</a></td>
                            <td valign="top">Principal MPF - Smart Plan</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00180_Principal_MPF_-_Smart_Plan_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000005">信安強積金計劃600系列</a></td>
                            <td valign="top">Principal MPF Scheme Series 600</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00040_Principal_MPF_Scheme_Series_600_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000006">信安強積金計劃800系列</a></td>
                            <td valign="top">Principal MPF Scheme Series 800</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00059_Principal_MPF_Scheme_Series_800_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000034">新地強積金僱主營辦計劃</a></td>
                            <td valign="top">SHKP MPF Employer Sponsored Scheme</td>
                            <td valign="top">僱主營辦計劃</td>
                          
                            <td valign="top">
                              30/10/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            		
                            		
                            			<a href="/sch/public_registers/registered_schemes_cf/OD/ES00020_SHKP_MPF_Employer_Sponsored_Scheme_BILINGUAL.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000021">永明強積金集成信託計劃</a></td>
                            <td valign="top">Sun Life MPF Master Trust</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00210_Sun_Life_MPF_Master_Trust_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                           <tr>
                            <td valign="top"><a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=SCH000000000035">永明彩虹強積金計劃</a></td>
                            <td valign="top">Sun Life Rainbow MPF Scheme</td>
                            <td valign="top">集成信託計劃</td>
                          
                            <td valign="top">
                              31/01/2000
                            </td>
                            <td valign="top">
                            	
                            		
                            			<a href="/tch/public_registers/registered_schemes_cf/OD/MT00067_Sun_Life_Rainbow_MPF_Scheme_CH.pdf" target="_blank"><img alt="" src="/tch/public_registers/registered_schemes_cf/images/pdf_logo.jpg" title="瀏覽"></a>
                            		
                            		
                            		
                            	
                            </td>
                        </tr>
                      
                        
                      
                      
                    </tbody></table>
		' );
$array = $html->find ( 'tr' );
$index = count ( $array );

$insertVaule = "";
for($i = 0; $i < $index; $i ++) {
	if ($i > 0 ) {
		$element = $array [$i];

		$result = $element->innertext;
		$result = str_replace ( '<a class="publiclink" href="/tch/public_registers/registered_schemes_cf/fudetail.do?schId=', "", $result );
		$result = str_replace ( '<td valign="top">', "','", $result );
		$result = str_replace ( '</td>', "", $result );
		$result = str_replace ( '</a>', "", $result );
		$result = str_replace ( '">', "','", $result );
		$result = str_replace ( '<table>', "',", $result );
		$result = str_replace ( "  ", "", $result );

		$insertVaule = $insertVaule . ",('".substr ( $result, 4, strrpos ( $result, '<a href="' ) - 4 )."')".PHP_EOL;
	}
}

echo  "INSERT INTO fundy.mpfs_scheme (mpfa_id,name_tc,name,`type`,financial_year_date,`key`)
VALUES". substr($insertVaule,1) . "\n";

echo sql_insert_id( "INSERT INTO fundy.mpfs_scheme (mpfa_id,name_tc,name,`type`,financial_year_date,`key`)
VALUES". substr($insertVaule,1) . "\n");

echo "mysql_errno: " . mysql_errno ( $_MYSQLCONNECTION ) . PHP_EOL;

function get_decorated_diff($old, $new) {
	$from_start = strspn ( $old ^ $new, "\0" );
	$from_end = strspn ( strrev ( $old ) ^ strrev ( $new ), "\0" );
	
	$old_end = strlen ( $old ) - $from_end;
	$new_end = strlen ( $new ) - $from_end;
	
	$start = substr ( $new, 0, $from_start );
	$end = substr ( $new, $new_end );
	$new_diff = substr ( $new, $from_start, $new_end - $from_start );
	$old_diff = substr ( $old, $from_start, $old_end - $from_start );
	
	$new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
	$old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
	return array (
			"old" => $old,
			"new" => $new 
	);
}

$string_old = "The quick brown fox jumped over the lazy dog";
$string_new = "The quick white rabbit jumped over the lazy dog";
$diff = get_decorated_diff ( $string_old, $string_new );
echo "<table>
    <tr>
        <td>" . $diff ['old'] . "</td>
        <td>" . $diff ['new'] . "</td>
    </tr>
</table>";

echo (microtime ( true ) - $time_start);
?>
