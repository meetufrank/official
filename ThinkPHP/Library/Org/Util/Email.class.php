<?php
   namespace Org\Util;
   class Email{
			   public function sentemail($to,$subject,$body){
							//引入类
							Vendor('PHPMailer.PHPMailerAutoload');
											
							//实例化类
							$mail = new \PHPMailer;

							$mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->Host = 'smtp.mxhichina.com';  // Specify main and backup SMTP servers
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							
							
							$mail->CharSet = 'UTF-8';  //设置邮件内容的编码
							

							//发件邮箱
							$mail->Username = 'rflinker@rflinker.com';                 // SMTP username
							$mail->Password = 'Feig1991302';                           // SMTP password
			
						   
						   
							
							
							$mail->setFrom('rflinker@rflinker.com', 'Feig1991302');
						
							
							
							//发送邮件地址
							if($to == 1){
								$mail->addAddress('support@rflinker.com');     //其他类问题  
							 }elseif($to == 2){
								$mail->addAddress('sales@rflinker.com');         //销售类问题
							 }
							 
							 
						
							$mail->addReplyTo('jang.wang@meetuuu.com', 'aliyun');
							/* $mail->addCC('cc@example.com');
							$mail->addBCC('bcc@example.com'); */

					
							$mail->isHTML(true);                                  // Set email format to HTML

							$mail->Subject = $subject;
							$mail->Body    = $body;
							$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

							if(!$mail->send()) {
								echo false;
							} else {
								echo true;
							}
			}
			

			
   }



?>