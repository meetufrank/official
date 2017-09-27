<?php
   namespace Org\Util;
   class Cs{
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
							$mail->Username = 'jiang.wang@meetuuu.com';                 // SMTP username
							$mail->Password = '1994107accd!@#$';                           // SMTP password
						
							$mail->setFrom('jiang.wang@meetuuu.com', '1994107accd!@#$');
									
							//发送邮件地址
							if($to == 1){
								$mail->addAddress('j.wang@meetuuu.com');     //1 等于在申请发送邮件
							 }
							 					
							$mail->addReplyTo('jang.wang@meetuuu.com', 'aliyun');
					
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