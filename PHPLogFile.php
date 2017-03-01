<!DOCTYPE html>
<html>        

	<head>
    	<?php
        	function Run()
            	{
                	OpenFileAndPrintDate();
                    PrintAccess(NumOfLog());
                }
                
            function NumOfLog()
                {
                    $i;
                	$myfile = fopen("newfile.txt", "r");
    
    				for ($i = 0; !feof($myfile); $i++)
	                   	fgets($myfile);
   
                    fclose($myfile);
                    return $i - 1;
                }
                
        	function OpenFileAndPrintDate()
            	{
                	$myfile = fopen("newfile.txt", "a");
					fputs($myfile, "Connessione al Server Stabilita in Data: <span style=\"color:red\">");
                    fputs($myfile, date("F j, Y, g:i a"));
                    fputs($myfile, "</span> con il Seguente IP: <span style=\"color:red\">"); 
                    fputs($myfile, $_SERVER['REMOTE_ADDR']);
                    fputs($myfile, "</span><BR>\n");
					fclose($myfile);
                }
                
            function PrintAccess($num)
            	{
                	$myfile = fopen("newfile.txt", "r");
                    if ($num >= 10)
                    	{
                        	for ($i = 0; $i < $num - 10; $i++)
                            	fgets($myfile);
                            for ($i = $num - 10; $i < $num; $i++)
                            	echo fgets($myfile);
                        }
                    else
                    	for ($i = 0; $i < $num; $i++)
  		            		echo fgets($myfile);        
                    fclose($myfile);
                }
        ?>
	</head>

	<body>   
    	<?php Run(); ?>
	</body>

</html> 