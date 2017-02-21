<? 
echo"<td>";
												
												$my=mysql_query("SELECT 'nb_jr' FROM nbjr_avan_inter ");
												$ass=mysql_fetch_array($my);
														
												
												
												$q=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$ta=mysql_fetch_array($q);
												
												
												$aff=mysql_query("SELECT COUNT(id_demande) FROM interventions WHERE id_demande='".$data['id_demande']."' and id_mat='".$ta['id_mat']."' ");
												$don=mysql_fetch_array($aff);
												
														if($don[0]==0 ){
														
															$date1 = strtotime($dat['dateheure_tamp'])+ (24*60*60*3) ;
															$date2 = time();
															$subTime = $date1 - $date2;
															$y = ($subTime/(60*60*24*365));
															$d = ($subTime/(60*60*24))%365;
															$h = ($subTime/(60*60))%24;
															$m = ($subTime/60)%60;


															echo $d." jours\n";
														}
												else {
															
															
												$aff1=mysql_query("SELECT * FROM interventions WHERE id_demande='".$data['id_demande']."' and id_mat='".$ta['id_mat']."'");		
														$etat=true;
														while($on=mysql_fetch_array($aff1)){
														
													
														
														
															if($on['regle']=='Non' && $etat==true){
																
																$etat=false;
															}
															
														}
														
														
														if($etat==false)
														 {// if non régle
															$date1 = strtotime($dat['date_prochaine_inter']);
															$date2 = time();
															$subTime = $date1 - $date2;
															$y = ($subTime/(60*60*24*365));
															$d = ($subTime/(60*60*24))%365;
															$h = ($subTime/(60*60))%24;
															$m = ($subTime/60)%60;


															echo $d." jours\n";
															}
														else
															{// if reglé
															$date1 = strtotime($dat['date_inter'])+ (24*60*60*3);
															$date2 = strtotime($dat['date_inter']);
															$subTime = $date1 - $date2;
															$y = ($subTime/(60*60*24*365));
															$d = ($subTime/(60*60*24))%365;
															$h = ($subTime/(60*60))%24;
															$m = ($subTime/60)%60;


															echo $d." jours\n";
															}
														}
												echo"</td>";
												
												
												if($test==0)
														{// en attente
															$date1 = strtotime($data['dateheure_demande'])+ (24*60*60*3) ;
															$date2 = time();
															$subTime = $date1 - $date1;
															$y = ($subTime/(60*60*24*365));
															$d = ($subTime/(60*60*24))%365;
															$h = ($subTime/(60*60))%24;
															$m = ($subTime/60)%60;


															echo $d." jours\n";
														}
														else
														{
														
															if($etat==false && $test1==0){
															// non régle
															
										$rq=mysql_query("SELECT MAX(date_prochaine_inter) as max FROM interventions");
									   $row2 = mysql_fetch_array($rq);
																$date1 = strtotime($row2['max']);
																$date2 = time();
																$subTime = $date1 - $date2;
																$y = ($subTime/(60*60*24*365));
																$d = ($subTime/(60*60*24))%365;
																$h = ($subTime/(60*60))%24;
																$m = ($subTime/60)%60;


																echo $d." jours\n";
															}
															else
																{// if reglé
																
												$a=mysql_query("SELECT COUNT(id_intervention) FROM interventions ");
												$n=mysql_fetch_array($aff);
												
												
														if($n[0]==1 ){
														
																				
										$rq=mysql_query("SELECT MAX(date_prochaine_inter) as max FROM interventions");
									   $row2 = mysql_fetch_array($rq);
																$date1 = strtotime($row2['max']);
																$date2 = strtotime($dat['dateheure_tamp']);
																$subTime = $date1 - $date2;
																$y = ($subTime/(60*60*24*365));
																$d = ($subTime/(60*60*24))%365;
																$h = ($subTime/(60*60))%24;
																$m = ($subTime/60)%60;


																echo $d." jours\n";
															
														}
														elseif($n[0]>1)
																
																$date1 = strtotime($dat['dateheure_tamp'])+ (24*60*60*3);
																$date2 = strtotime($dat['dateheure_tamp']);
																$subTime = $date1 - $date2;
																$y = ($subTime/(60*60*24*365));
																$d = ($subTime/(60*60*24))%365;
																$h = ($subTime/(60*60))%24;
																$m = ($subTime/60)%60;


																echo $d." jours\n";
																}
														}
												?>