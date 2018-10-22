<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>iResource Management</title>
</head>
<body style="margin: 0; padding: 0;">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="center" style="background: #f5f5f5; padding: 20px 0 20px 0; font-family: Helvetica , Arial, sans-serif; font-size: 16px;">
				<table cellpadding="0" cellspacing="0" width="800" align="center">
					<tr>
						<td style="width: 800px; background: #ffffff;">
							<table cellpadding="0" cellspacing="0" width="100%">
								<tr style="background-color:#007bff">
									<td style="padding: 10px 0px 10px 0px;text-align: center;">
										<a href="{{ url('/') }}" target="_blank">
											<img src="{!! asset('images/logo.png') !!}"> 
										</a>
									</td>
								</tr>
								<tr>
									<td style="padding: 30px 10px 0 10px;">Hi Administartor,</td>
								</tr>
								<tr>
									<td style="padding: 10px;">{{ $email }} has subscribed to our site.</td>
								</tr>
								<tr>
									<td style="padding: 10px;">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="padding: 0px 0 20px 0;">Thank you</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 10px 0;">
													<strong>iResource Management</strong>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0px 0px 0px;">
													<a href="tel:+917940049450" style="text-decoration: none; color: #000;">
														+91-79-40049450
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 0px 0;">
													<a href="mailto:info@iresource.com" style="text-decoration: none; color: #000;">
														info@iresource.com
													</a>
												</td>
											</tr>
											<tr>
												<td style="padding: 0px 0 20px 0;">
													<a href="https://www.iresource.com/" style="text-decoration: none; color: #000;" target="_blank">
														www.iresource.com
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="padding: 10px; background: #007bff; text-align: center; font-size: 16px; color: #ffffff;" align="center">© <?= date('Y'); ?> 
										iResource Management
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>