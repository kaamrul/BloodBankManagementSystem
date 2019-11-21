<?php
    include("header.php");
?>
   		
			<?php 
			//echo $_GET['page'];
				  switch(@$_GET['page']) {
					  
                        case "doner-sign-up": {
                                include("sign_up/doner-sign-up.php");
                            }
                            break;
							
					    case "user-sign-up": {
                                include("sign_up/user-sign-up.php");
                            }							
                            break;							
							
						case "blood-bank-sign-up": {
                                include("sign_up/blood-bank-sign-up.php");
                            }							
                            break;			
							
                        case "blood-request": {
                                include("blood-request.php");
                            }
                            break;
							
                        case "blood-request-to-blood-bank": {
                                include("blood-request-to-blood-bank.php");
                            }
                            break;
						
                        case "doner-list": {
                                include("doner-list.php");
                            }
                            break;

                        case "request-list": {
                                include("request-list.php");
                            }
                            break;
						
                        case "camp": {
                                include("camp.php");
                            }
                            break;
							
						case "blood-bank": {
                            include("blood-bank.php");
                        }
                            break;

							
						case "why-donate-blood": {
                            include("about_blood/why-donate-blood.php");
                        }
                            break;	
						
						case "eligibility-to-donate-blood": {
                            include("about_blood/eligibility-to-donate-blood.php");
                        }
                            break;
						
						case "tips-for-a-successful-donation": {
                            include("about_blood/tips-for-a-successful-donation.php");
                        }
                            break;
						
						case "what-happens-to-donated-blood": {
                            include("about_blood/what-happens-to-donated-blood.php");
                        }
                            break;
							
						case "view-blood-bank": {
                            include("view-blood-bank.php");
                        }
                            break;
						
						case "view-doner-list": {
                            include("view-doner-list.php");
                        }
                            break;
							
						case "status-from-doner": {
                            include("status-from-doner.php");
                        }
                            break;
							
						case "status-from-blood-bank": {
                            include("status-from-blood-bank.php");
                        }
                            break;
							
                        case "home": {
                                include("home.php");
                            }
                            break;

                        default: {
                                include("home.php");
                            }
                    }
				?>	

<?php
    include("footer.php");
?>