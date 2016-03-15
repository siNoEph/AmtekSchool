<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="API Email register">
	<meta name="author" content="Septian Noerhadi">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Reset Password</title>
	<style>
		td a {
			text-decoration: inherit !important;
		}
	</style>
</head>
<body style='margin: 0px;'>
<div>
	<!-- Development By : Septian Noerhadi Pratama -->
	<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#2c3747" style="background-color:#e2e2e2;font-family:Helvetica,Arial,Geneva,sans-serif">	 
		<tbody>			 
			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" width="550" align="center" style="border-width:1px;border-spacing:0px;border-style:solid;border-color:#cccccc;border-collapse:collapse;background-color:#ffffff;margin-top: 20px;">

						<tbody>
							<tr>
								<td style="background-color:#1976D2;font-family:'Helvetica Neue',Calibri,Helvetica,Arial,sans-serif;padding: 10px;border-bottom:1px solid #ddd">
									<table cellpadding="0" cellspacing="0" border="0" align="center">
										<tbody>
											<tr>
												<td>
													<div style="display: inline-block;margin: 0 auto;">
														<!-- <img src="" border="0" height="40px" style="float: left;"> -->
														<h1 style="font-family: Lucida Sans Unicode,Lucida Grande,Sans-Serif;color: white;float: left;margin-top: 1px;margin-bottom: 0px;margin-left: 10px;">Amtek School</h1>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>

							<tr>
								<td style="background-color:#f7f7f7;font-family:'Helvetica Neue',Calibri,Helvetica,Arial,sans-serif;font-size:14px;line-height:24px;color:black;border-bottom:1px solid #ddd">
									<table cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0px 20px">
										<tbody>
											<tr>
												<td>
													<p style="margin: 10px 0;"> Click this link to reset your password :</p>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>

							<tr>
								<td style="font-family:'Helvetica Neue',Calibri,Helvetica,Arial,sans-serif;font-size:20px;text-align:center;line-height:24px;color:black;padding: 15px 0;">
									<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">Reset Password</a>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>


			<tr>
				<td>
					<table cellpadding="10" cellspacing="0" border="0" width="600" align="center" bgcolor="#e2e2e2" style="font-size:12px;font-family:Helvetica,Arial,Geneva,sans-serif">
						<tbody>
							<tr>
								<td>
									<table cellpadding="0" cellspacing="5" border="0" width="580" align="center">								      
										<tbody>
											<tr>
												<td align="center">
													<p style="font-family:'Helvetica Neue',Calibri,Helvetica,Arial,sans-serif;font-weight:normal;font-size:12px;color:#666;margin-left:6px">
														You're receiving this as a registered user of Amtek School.
													</p>
												</td>
											</tr>

										</tbody>
									</table>
								</td>
							</tr>

						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>